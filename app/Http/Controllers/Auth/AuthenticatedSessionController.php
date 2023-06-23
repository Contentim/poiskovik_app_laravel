<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Mail\ResetPassword;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'msg' => 'Указанного email не нашлось в списках пользователей',
            ]);
        }

        if (Auth::attempt($credentials)) {
            $request->authenticate();
            $request->session()->regenerate();

            return response()->json([
                'status' => 200,
                'msg' => 'Вы успешно авторизовались',
            ]);

            //return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            return response()->json([
                'status' => 400,
                'msg' => 'Пароль не соответствует указанному аккаунту',
            ]);
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Forgot password
     * @param NA
     * @return view
     */
    public function forgotPassword()
    {
        return Inertia::render('Auth/Forgot');
    }

    /**
     * Validate token for forgot password
     * @param token
     * @return view
     */
    public function forgotPasswordValidate($token)
    {
        $user = User::where('token', $token)->where('is_verified', 0)->first();
        if ($user) {
            $email = $user->email;
            return Inertia::render('Auth/ChangePassword');
        }
        return response()->json([
            'status' => 400,
            'msg' => 'Срок действия ссылки на сброс пароля истек',
        ]);
    }

    /**
     * Reset password
     * @param request
     * @return response
     */
    public function resetPassword(HttpRequest $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status' => 400,
                'msg' => 'Указанного email не нашлось в списках пользователей',
            ]);
        }

        $token = Str::random(60);

        $user['token'] = $token;
        $user['is_verified'] = 0;
        $user->save();

        Mail::to($request->email)->send(new ResetPassword($user->user_name, $token));

        if(Mail::failures() != 0) {
            return response()->json([
                'status' => 200,
                'msg' => 'Ссылка для сброса пароля была отправлена на ваш электронный адрес',
            ]);
        }

        return response()->json([
            'status' => 400,
            'msg' => 'Возникли проблемы с отправкой письма на электронный ящик',
        ]);
    }

    /**
     * Change password
     * @param request
     * @return response
     */
    public function updatePassword(HttpRequest $request) {

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user['is_verified'] = 0;
            $user['token'] = null;
            $user['password'] = Hash::make($request->password);
            $user->save();

            return response()->json([
                'status' => 200,
                'msg' => 'Пароль был изменен',
            ]);
        }

        return response()->json([
            'status' => 400,
            'msg' => 'Неизвестная ошибка. Не удалось изменить пароль.',
        ]);
    }

    public function getEmail(HttpRequest $request){
        
        if(!empty($request->token)){
            $data = DB::table('users')
                ->select('email')
                ->where('token', $request->token)
                ->first();
            
                return response()->json([
                    'status' => 200,
                    'email' => $data->email
                ]);
        }

        return response()->json([
            'status' => 400,
            'msg' => 'Bad request',
        ]);
    }
}
