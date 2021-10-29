<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(StoreAttachmentRequest $request)
    {
        $attachment = new Attachment;
        $attachment->name = $request->name;
        $attachment->path = $attachment->upload($request->attachment);

        $attachment->save();

        return response()->json([
            'message' => 'Attachment has been successfully uploaded.',
        ]);
    }
}
