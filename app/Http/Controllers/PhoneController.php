<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Phone;
use App\Models\VicidialUser;


class PhoneController extends Controller
{
    public function index()
    {
        $phones = Phone::get();

        return view('phone.index', compact('phones'));
    }

    public function create()
    {
    	return view('phone.create');
    }

    public function store(Request $request)
    {
    	//return $request->all();
    	$input = Input::all();
	    $rules = [
	    	'extension' => 'required|min:2|max:10',
	    	'registration_password' => 'required'
	    ];
	    $messages = [];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

    	$extension = $request->extension;
    	$regPass = $request->registration_password;



        $authSession = $request->session()->get('_auth_session');

        $authUser = VicidialUser::find($authSession['user_id']);

        $authUsername = $authUser->user;
        $authPassword = $authUser->pass;

        if ($authUser->user_level < 8) {
            flash()->error('USER DOES NOT HAVE PERMISSION TO ADD PHONES! (Level)');
            return redirect()->back()->withInput();
        }

        //for User
        // if ($authUser->modify_users == 0) {
        //     flash()->error('USER DOES NOT HAVE PERMISSION TO ADD USERS! (Modify)');
        //     return redirect()->back()->withInput();
        // }

        if ($authUser->vdc_agent_api_access == 0) {
            flash()->error('USER DOES NOT HAVE PERMISSION TO ADD PHONES! (API)');
            return redirect()->back()->withInput();
        }

        //for Extension
        if ($authUser->ast_admin_access == 0) {
         flash()->error('USER DOES NOT HAVE PERMISSION TO ADD PHONES (Access)');
            return redirect()->back()->withInput();
        }

        $userUniqueCheck = Phone::where('extension', $extension)->first();
        if (count($userUniqueCheck)) {
            flash()->error('PHONE ALREADY EXISTS!');
            return redirect()->back()->withInput();
        }

    	$client = new \GuzzleHttp\Client();
        //$res = $client->request('GET', 'http://192.168.100.26/vicidial/non_agent_api.php?source=test&function=add_phone&user=apiuser&pass=apiuser&extension=55003&dialplan_number=55003&voicemail_id=55003&phone_login=55003&phone_pass=55003&server_ip=192.168.100.26&protocol=SIP&registration_password=55003MYOL&phone_full_name=55003&local_gmt=+6.00&outbound_cid=55003');
        $res = $client->request('GET', 'http://192.168.100.26/vicidial/non_agent_api.php?source=test&function=add_phone&user='.$authUsername.'&pass='.$authPassword.'&extension='.$extension.'&dialplan_number='.$extension.'&voicemail_id='.$extension.'&phone_login='.$extension.'&phone_pass='.$extension.'&server_ip=192.168.100.26&protocol=SIP&registration_password='.$regPass.'&phone_full_name='.$extension.'&local_gmt=+6.00&outbound_cid='.$extension);
        $a = $res->getBody();
        // flash()->error($a);
        // return redirect()->back();

        //return redirect()->back()->with('success', $a);

     //    session()->flash('msg', $a);
    	// return redirect()->back();

        return view('extension.create', compact('a'));
    }
}
