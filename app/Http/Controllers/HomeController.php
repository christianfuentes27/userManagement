<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    function edit() {
        return view('user.edit', ['user' => Auth::user()]);
    }
    
    public function update(Request $request) {
        //validar name email password
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        //comprobaciones: 
        //- si se cambia el password, la nueva contraseña coincida repetida y la anterior con la anterior
        //- si el email se modifica, quitamos la verificacion y enviamos un correo de verificacion al nuevo email
        if($request->input('password') != null) {
         $user->password = Hash::make($request->input('password'));
        }
        try {
            $user->save();
            $message = 'User has been updated.';
        } catch(Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating.']);
        }
        return redirect('admin')->with('message', $message);
    }
}
