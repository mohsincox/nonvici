<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\VicidialUser;
use Validator;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    public function create(Request $request)
    {
    	if($request->session()->has('_auth_session')) {
           
            return redirect('/home');
        }
        else {
            return view('log_in');
        }
    	
    }

    public function store(Request $request)
    {
    	//return $request->all();
        $input = Input::all();
        $rules = [
            'user' => 'required',
            'pass' => 'required'
        ];
        $messages = [];
        
        $validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
            flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

    	$user = VicidialUser::where('user', $request->user)->where('pass', $request->pass)->where('user_level', '>=', 8)->first();

        if (!count($user)) {
            flash()->error('Username or Password not matched!');
            return redirect()->back()->withInput();
        }

    	$authSession = ['user_id' => $user->user_id, 'user' => $user->user];
    	$request->session()->put('_auth_session', $authSession);

    	return redirect('/home');
    }

    public function forget(Request $request)
    {
        if($request->session()->has('_auth_session')) {
            $request->session()->forget('_auth_session');
            return redirect('/log-in');
        }
        else {
            return redirect('home');
        }
    }

    public function login3()
    {
        return view('login3');
    }
}
