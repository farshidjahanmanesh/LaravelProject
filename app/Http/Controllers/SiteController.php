<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\NewsLetter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
class SiteController extends Controller
{
    public function login(Request $request)
    {
        $inputs = $request->all();
        try {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required'
            ]);
        } catch (ValidationException $e) {
            return $e->getMessage();
        }

        if (Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password']])) {
            return "salam";
        }else{
            $error = 'your username or password is incorrect';
            return view('bases.login', ['errorLogin' => $error]);
        }
    }

    public function Register(Request $request){


        $inputs = $request->all();
        try{
            $this->validate($request, [
                'email' => ['required', 'email', 'unique:users'],
                'password' => 'required_with:confirmPassword|same:confirmPassword',
                'confirmPassword' => 'required',
                'familyName' => 'required'
            ]);
        }catch (\Throwable $e){
            return $e->getMessage();
        }

        $createdUser= User::create([
            'name' => $inputs['familyName'],
            'password' => Hash::make($inputs['password']),
            'email' => $inputs['email']
        ]);

        Auth::login($createdUser,false);
        Return view('bases.index');
    }


    public function saveNewsLetter(Request $request)
    {
        $validateData = $request->validate(['email' => 'required|email']);
        if (NewsLetter::where('email', $validateData['email'])->exists()) {
            return view('bases.success', ['email_valid' => false]);
        }
        NewsLetter::create([
            'email' => $validateData['email']
        ]);
        return view('bases.success', ['email_valid' => true]);
    }
}
