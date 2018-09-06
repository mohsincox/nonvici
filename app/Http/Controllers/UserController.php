<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
use App\Models\VicidialUser;

class UserController extends Controller
{
	public function index()
	{
		$users = VicidialUser::get();

		return view('user.index', compact('users'));
	}

    public function create()
    {
    	$agentUserGroupList = DB::table('vicidial_user_groups')->pluck('user_group', 'user_group');
    	return view('user.create', compact('agentUserGroupList'));
    }

    public function store(Request $request)
    {
    	//return $request->all();
    	$input = Input::all();
	    $rules = [
	    	'agent_user' => 'required|min:2|max:10',
	    	'agent_pass' => 'required|min:2|max:10',
	    	'agent_full_name' => 'required|min:2|max:20',
	    	'agent_user_group' => 'required'
	    ];
	    $messages = [];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

    	$agentUser = $request->agent_user;
    	$agentPass = $request->agent_pass;
    	$agentFullName = $request->agent_full_name;
    	$agentUserGroup = $request->agent_user_group;

    	$authSession = $request->session()->get('_auth_session');

    	$authUser = VicidialUser::find($authSession['user_id']);

    	$authUsername = $authUser->user;
    	$authPassword = $authUser->pass;

    	if ($authUser->user_level < 8) {
    		flash()->error('USER DOES NOT HAVE PERMISSION TO ADD USERS! (Level)');
            return redirect()->back()->withInput();
    	}

    	if ($authUser->modify_users == 0) {
    		flash()->error('USER DOES NOT HAVE PERMISSION TO ADD USERS! (Modify)');
            return redirect()->back()->withInput();
    	}

    	if ($authUser->vdc_agent_api_access == 0) {
    		flash()->error('USER DOES NOT HAVE PERMISSION TO ADD USERS! (API)');
            return redirect()->back()->withInput();
    	}

    	//for Extension
    	// if ($authUser->ast_admin_access == 0) {
    	// 	flash()->error('USER DOES NOT HAVE PERMISSION TO ADD PHONES');
     //        return redirect()->back()->withInput();
    	// }

    	$userUniqueCheck = VicidialUser::where('user', $agentUser)->first();
    	if (count($userUniqueCheck)) {
    		flash()->error('USER ALREADY EXISTS!');
            return redirect()->back()->withInput();
    	}

    	


    	$client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://192.168.100.26/vicidial/non_agent_api.php?source=test&function=add_user&user='.$authUsername.'&pass='.$authPassword.'&agent_user='.$agentUser.'&agent_pass='.$agentPass.'&agent_user_level=1&agent_full_name='.$agentFullName.'&agent_user_group='.$agentUserGroup);

        //$res = $client->request('GET', 'http://192.168.100.26/vicidial/non_agent_api.php?source=test&function=add_user&user=apiuser&pass=apiuser&agent_user=mohsin&agent_pass=mohsin&agent_user_level=1&agent_full_name=Mohsin+Iqbal&agent_user_group=AGENTS');
        
        $a = $res->getBody();
        

        return view('extension.create', compact('a'));
    }
}
