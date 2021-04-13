<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\NewsLetter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Process\InputStream;
use Illuminate\Support\Facades\Mail;

class BaseAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->role != 'BaseAdmin') {
                return redirect('login')->send();
            }
            return $next($request);
        });

    }

    public function index()
    {
        $users=User::where('id','!=',Auth::user()->id)->get();
        return view('BaseAdmin.Users',['users'=>$users]);
    }

    public function roleAccess(Request $request)
    {
        $segmentCount = count($request->segments());
        $userId = $request->segment($segmentCount);
        $user=User::find($userId);
        $categories=Category::select('catName')->get();
        $addedRoles=array();
        $addedRoles[0]="سر دبیر";
        return view('BaseAdmin.RoleChange',['userData'=>$user,'categories'=>$categories,'tempRoles'=>$addedRoles]);
    }

    public function EditAccess(Request $request){
        $inputs = $request->all();
        $userId=$inputs['id'];
        $user=User::find($userId);
        $roleName=$inputs["roleId"];
        $user->role=$roleName;
        $user->save();
        return redirect()->route("BaseAdmin");
    }

    public function SendEmail()
    {
        return view('BaseAdmin.SendEmail');
    }

    public function SendEmailToUsers(Request $request){
        $subjectText=$request['subject'];
        $text=$request['emailText'];

        $users=NewsLetter::all();
        $data = array("body" => $text);
        foreach($users as $user){

            Mail::send('mail', $data, function($message)use($subjectText,$user) {
                $message->to($user->email, 'کاربر گرامی')->subject
                   ($subjectText);
                   $message->from('samicancel2@gmail.com','سایت خبری ما');
             });

        }
        return redirect()->route('BaseAdmin');
    }

}
