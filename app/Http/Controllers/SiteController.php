<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetter;

class SiteController extends Controller
{
    public function saveNewsLetter(Request $request){
        $validateData=$request->validate(['email'=>'required|email']);
        if(NewsLetter::where('email',$validateData['email'])->exists()){
            return view('bases.success',['email_valid'=>false]);
        }
        NewsLetter::create([
            'email'=>$validateData['email']
        ]);
        return view('bases.success',['email_valid'=>true]);

    }
}
