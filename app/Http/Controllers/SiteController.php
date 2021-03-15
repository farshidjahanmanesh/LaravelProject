<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\NewsLetter;
use Illuminate\Validation\ValidationException;

class SiteController extends Controller
{
    public function login(Request $request)
    {

        //Auth::logout();
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
