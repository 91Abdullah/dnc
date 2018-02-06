<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all()->except(['id' => 1]);
        return view('users.index', compact('users'));
    }

    public function create(Request $request) 
    {
        if($request->isMethod('post')) {
            $this->validator($request->all())->validate();

            event(new Registered($user = $this->createUser($request->all())));

            return redirect()->route('users');
        } else {
            return view('users.create');
        }
    }

    public function update(Request $request, User $user)
    {
        if($request->isMethod('patch')) {
            if($request->has('password')) {
                try {
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password)
                    ]);
                    session()->flash('success', 'User has been updated.');
                } catch (Exception $e) {
                    session()->flash('danger', 'User updated failed.');
                }
            } else {
                try {
                    $user->update([
                        'name' => $request->name,
                        'email' => $request->email
                    ]);
                    session()->flash('success', 'User has been updated.');
                } catch(Exception $e) {
                    session()->flash('danger', 'User updated failed.');
                }
            }
            return redirect()->route('users');
        } else {
            return view('users.update', compact('user'));
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            session()->flash('success', 'User has been deleted.');
        } catch (Exception $e) {
            session()->flash('danger', 'User deletion failed.');
        }
        return redirect()->route('users');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
