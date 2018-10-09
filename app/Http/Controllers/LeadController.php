<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Excel;
use App\Models\VicidialUser;
use DB;
use Validator;

class LeadController extends Controller
{
    public function create()
    {
    	$listIdList = DB::table('vicidial_lists')->pluck('list_id', 'list_id');

    	return view('lead.create', compact('listIdList'));
    }

    public function store(Request $request)
	{
		$input = Input::all();
	    $rules = [
	    	'list_id' => 'required',
	    	'file' => 'required|mimes:xlsx,csv,xls'
	    	
	    ];
	    $messages = [];
	    
    	$validator = Validator::make($input, $rules, $messages);
        if ($validator->fails()) {
        	flash()->error('Something Wrong!');
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

		 $authSession = $request->session()->get('_auth_session');

        $authUser = VicidialUser::find($authSession['user_id']);

        $authUsername = $authUser->user;
        $authPassword = $authUser->pass;

        if ($authUser->user_level < 8) {
            flash()->error('USER DOES NOT HAVE PERMISSION TO UPLOAD LEAD! (Level)');
            return redirect()->back()->withInput();
        }

        //for Lead
        if ($authUser->modify_leads == 0) {
            flash()->error('USER DOES NOT HAVE PERMISSION TO UPLOAD LEAD! (Modify)');
            return redirect()->back()->withInput();
        }

        if ($authUser->vdc_agent_api_access == 0) {
            flash()->error('USER DOES NOT HAVE PERMISSION TO UPLOAD LEAD! (API)');
            return redirect()->back()->withInput();
        }

        $listId = $request->list_id;


		if(Input::hasFile('file')){
			$path = Input::file('file')->getRealPath();
			$results=Excel::load($path)->get();

			foreach ($results as $row) {

				  	$client = new \GuzzleHttp\Client();
			        $res = $client->request('GET', 'http://192.168.100.29/vicidial/non_agent_api.php?source=test&function=add_lead&user='.$authUsername.'&pass='.$authPassword.'&phone_number='.$row->phone_number.'&list_id='.$listId);

			        //http://192.168.100.29/vicidial/non_agent_api.php?source=test&user=admin&pass=MyoL2017&function=add_lead&phone_number=1719307656&list_id=1001&first_name=Rashed
			        
			        //$a = $res->getBody();
			    

			}
  			flash()->success('Excel file imported successfully');
   			return redirect()->back();
		}
		flash()->error('File not selected.');
        return redirect()->back();
	}
}
