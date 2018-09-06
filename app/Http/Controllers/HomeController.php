<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$products = [1,2,3,4];
        //$request->session()->put('my_name', $products);

        //$request->session()->put('my_name', 'Mohsin');

        //$request->session()->forget('_auth_session');

        if($request->session()->has('_auth_session')) {
            $authSession = $request->session()->get('_auth_session');

            //print_r($a);
            echo $authSession['user'];
            return view('home');
        }
        else {
            return redirect('/log-in');
        }  
    }
}
