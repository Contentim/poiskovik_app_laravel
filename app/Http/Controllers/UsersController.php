<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;

use Inertia\Inertia;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if($user->owner == true){
            return Inertia::render('Users/Index', [
                'user' => $user,
                'filters' => Request::all('search', 'role', 'trashed'),
                'users' => Auth::user()->account->users()
                    ->where('id', '<>', 1)
                    ->orderByName()
                    ->filter(Request::only('search', 'role', 'trashed'))
                    ->paginate(5)
                    ->withQueryString()
                    ->transform(fn ($user) => [
                        'id' => $user->id,
                        'user_name' => $user->user_name,
                        'email' => $user->email,
                        'owner' => $user->owner,
                    ]),
                // 'users' => Auth::user()->account->users()
                //     ->where('id', '<>', 1)
                //     ->orderByName()
                //     ->filter(Request::only('search', 'role', 'trashed'))
                //     ->get()
                //     ->transform(fn ($user) => [
                //         'id' => $user->id,
                //         'user_name' => $user->user_name,
                //         'email' => $user->email,
                //         'owner' => $user->owner,
                //         'deleted_at' => $user->deleted_at,
                //     ]),
            ]);
        } else {
            return Redirect::to('/');
        }
    }

    public function getUsersJSON()
    {
        $user = Auth::user();

        if($user->owner == true){

            //return response()->json([
            return Inertia::render('Users', [
                'status' => 200,
                'users' => Auth::user()->account->users()
                    ->where('id', '<>', 1)
                    ->orderByName()
                    ->filter(Request::only('search', 'role', 'trashed'))
                    ->paginate(5)
                    ->withQueryString()
                    ->transform(fn ($user) => [
                        'id' => $user->id,
                        'user_name' => $user->user_name,
                        'email' => $user->email,
                        'owner' => $user->owner,
                        'deleted_at' => $user->deleted_at,
                    ]),
            ]);

        } else {
            return Redirect::to('/');
        }
    }

    public function create()
    {
        $user = Auth::user();

        if($user->owner == true){
            return Inertia::render('Users/Create', [
                'user' => $user,
            ]);
        } else {
            return Redirect::to('/');
        }
    }

    public function store()
    {
        $hasUserDouble = DB::table('users')->where('email', '=', Request::get('email'))->first();

        if(isset($hasUserDouble)){
            return response()->json([
                'status' => 400,
                'msg' => 'Пользователь с таким email уже существует в базе данных. Используйте другой email',
            ]);
        }

        Request::validate([
            'user_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')],
            'password' => ['nullable'],
            'owner' => ['required', 'boolean'],
        ]);

        Auth::user()->account->users()->create([
            'user_name' => Request::get('user_name'),
            'email' => Request::get('email'),
            'password' => Request::get('password'),
            'owner' => Request::get('owner'),
        ]);

        return response()->json([
            'status' => 200,
            'msg' => 'Пользователь создан',
        ]);
    }

    public function edit(User $user)
    {
        $user_auth = Auth::user();

        if($user->owner == true)
        {
            return Inertia::render('Users/Edit', [
                'user' => [
                    'id' => $user->id,
                    'user_name' => $user->user_name,
                    'email' => $user->email,
                    'owner' => $user->owner,
                    'deleted_at' => $user->deleted_at,
                ],
            ]);
        } else {
            if($user->id === $user_auth->id)
            {
                return Inertia::render('Users/Edit', [
                    'user' => [
                        'id' => $user->id,
                        'user_name' => $user->user_name,
                        'email' => $user->email,
                        'owner' => $user->owner,
                        'photo' => $user->photo_path ? URL::route('image', ['path' => $user->photo_path, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
                        'deleted_at' => $user->deleted_at,
                    ],
                ]);
            } else {
                return Redirect::to('/');
            }
        }
    }

    public function update(User $user)
    {

        if (App::environment('local') && $user->isUserRoot()) {
            return response()->json([
                'msg' => 'Обновить ROOT-пользователя запрещено',
            ]);
        }

        $email =  Request::get('email');

        DB::table('users')
            ->where('id', $user->id)
            ->update(['email' => '']);

        $hasEmailDouble = count(DB::table('users')->where('email', '=', Request::get('email'))->get());

        if($hasEmailDouble > 0){
            
            $email_old =  Request::get('email_old');

            DB::table('users')
                ->where('id', $user->id)
                ->update(['email' => $email_old]);
            
            return response()->json([
                'status' => 400,
                'msg' => 'Пользователь с таким email уже существует в базе данных. Используйте другой email',
                'www' => $email_old
            ]);
        }

        DB::table('users')
            ->where('id', $user->id)
            ->update(['email' => Request::get('email')]);

        Request::validate([
            'user_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable'],
            'owner' => ['required', 'boolean'],
        ]);

        $user->update(Request::only('user_name', 'email', 'owner'));

        if (Request::get('password')) {
            $user->update(['password' => Request::get('password')]);
        }

        return response()->json([
            'status' => 200,
            'msg' => 'Учетная запись успешно отредактирована',
            'updated_at' => Carbon::parse($user->updated_at)->format('d-M-Y H:i:s')
        ]);
    }

    public function remove(Request $request, User $user)
    {
        if (App::environment('local') && $user->isUserRoot()) {
            return response()->json([
                'msg' => 'Удалить ROOT-пользователя запрещено',
            ]);
        }

        $email = $user->email;

        DB::table('users')->where('id', $user->id)->delete();

        $user = Auth::user();

        return response()->json([
            'status' => 200,
            'msg' => 'Пользователь ' .$email. ' был удален',
            'users' => Auth::user()->account->users()
                ->where('id', '<>', 1)
                ->orderByName()
                ->filter(Request::only('search', 'role', 'trashed'))
                ->paginate(5)
                ->withQueryString()
                ->transform(fn ($user) => [
                    'id' => $user->id,
                    'user_name' => $user->user_name,
                    'email' => $user->email,
                    'owner' => $user->owner,
                    'deleted_at' => $user->deleted_at,
                ]),
            // 'users' => Auth::user()->account->users()
            //     ->where('id', '<>', 1)
            //     ->orderByName()
            //     ->filter(Request::only('search', 'role', 'trashed'))
            //     ->get()
            //     ->transform(fn ($user) => [
            //         'id' => $user->id,
            //         'user_name' => $user->user_name,
            //         'email' => $user->email,
            //         'owner' => $user->owner,
            //         'deleted_at' => $user->deleted_at,
            //     ]),
        ]);

    }

}
