<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Requests\StoreProfileEditRequest;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.register');
    }
    public function handleRegister(StoreRegisterRequest $request)
    {
        $avatar = $request->file('avatar');
        $fileName = time() . '.' . $avatar->getClientOriginalExtension();
        $uploadedAvatar = $avatar->storeAs('images', $fileName, 'public');

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->avatar = $uploadedAvatar;
        $user->save();

        Auth::login($user);

        return redirect()->route('loginForm');
    }
    public function loginForm()
    {
        return view('auth.login');
    }
    public function handleLogin(StoreLoginRequest $request) {
        
        $user = User::where('email', $request->email)->first();
        if(Hash::check($request->password, $user->password)){
            Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            return view('auth.dashboard', compact('user'));
        }else{
            return 'no';
        }
    }
    public function logout()  {
        Auth::logout();
        return redirect()->route('registerForm');
    }
    public function editProfile()  {
        
        return view('auth.edit');
    }
    public function updateProfile(StoreProfileEditRequest $request, $id) {
        $user = User::findOrFail($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
    
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                @unlink(storage_path('app/public/' . $user->avatar));
            }
    
            $avatar = $request->file('avatar');
            $fileName = time() . '.' . $avatar->getClientOriginalExtension();
            $user->avatar = $avatar->storeAs('images', $fileName, 'public');
        }
    
        $user->save();
    
        return redirect()->route('dashboard');
    }
    
    public function dashboard(){
        return view('auth.dashboard');
    }
}
