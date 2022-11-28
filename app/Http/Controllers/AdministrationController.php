<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdministrationController extends Controller
{
    
    function __construct() {
        $this->middleware('admin');
    }
    
    public function index()
    {
        $users = User::all();
        return view('admin.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        try {
            $user = new User($request->all());
            $user->password = Hash::make($request->input('password'));
            $user->email_verified_at = Carbon::parse(Carbon::now());
            $message = 'User has been created.';
            $user->save();
        } catch(Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['message' => 'An unexpected error occurred while creating.']);
        }
        return redirect('admin')->with('message', $message);
    }

    public function show(User $user)
    {
        return view('admin.show');
    }

    public function edit(User $user)
    {
        return view('admin.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user) {
        //validar name email password
        $user->name = $request->input('name');
        $user->email = $request->input('email');
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

    public function destroy(User $user) {
        $message = 'User ' . $user->name . ' has not been removed.';
        if($user->email != 'admin@admin.es') {
            try {
                $user->delete();
                $message = 'User ' . $user->name . ' has been removed.';
            } catch(\Exception $e) {}
        }
        return redirect('admin')->withErrors(['message' => $message]);
    }
}
