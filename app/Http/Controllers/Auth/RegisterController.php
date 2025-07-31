<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Division;
use App\Models\User;
use App\Models\UserLog;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    function step($step, Request $request){
		
		if($request->account == 'personal')		
			Session::put("account", 'personal');
		if($request->account == 'joint')		
			Session::put("account", 'joint');
		
		$data['account'] = \request()->get("account", Session::get("account"));

        $data['user_data'] = Session::get("user_data",[]);
        $data['countries'] = Country::all();
        $data['regions'] = Division::query()->select(['country_id',"name"])->get()->groupBy("country_id");
        if($step > 1){
            $data['account'] = \request()->get("account",Session::get("account"));
        }else{
            Session::flush();
        }
	
		$holder = (Session::get("holder") !== null) ? Session::get("holder") : 1;
		$data['holder'] = $holder;
	
		
		
        if(($step == 3 || $step == 4) && !Session::get("user_data",null)){
            return response()->redirectToRoute("register.step",1);
			
        }
        if($step == 5){
            $data['user_data'] = Session::get("user_data",[]);
            Session::flush();
        }
		
		
        return view("auth.register.step_".$step,$data);
    }

    function step_post($step,Request $request){
        if($step == 2){
            $data = $request->validate([
				
                'account' => ['required'],
                'first_name' => ['required', 'string'],
                'middle_name' => ['nullable','string'],
                'last_name' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:user_infos'],
            ]);
            $account = $data['account'];
			
			
            /* unset($data['account']); */

            if($request->has("holder")){
				$data['holder'] = $request->get("holder");
                if($request->get("holder") == 1){
                    $user_data = [
                        "account" => $account,
                        "info" => [
                            $data
                        ]
                    ];
                    Session::put("user_data",$user_data);
					Session::put("holder",2);
                    return response()->redirectToRoute("register.step",[2,'account=joint']);
                }else{
                    $user_data = Session::get("user_data");
                    $user_data['info'][] = $data;
					Session::forget('holder');
                    Session::put("user_data",$user_data);
                    return response()->redirectToRoute("register.step",'2_1');
                }
            }else{
                $user_data = [
                    "account" => $account,
                    "info" => [
                        $data
                    ]
                ];
                Session::put("user_data",$user_data);
                return response()->redirectToRoute("register.step",'2_1');
            }

        }
		
		
		if($step == '2_2'){
            $data = $request->validate([
				'account' => ['required'],
                'year' => ['required'],
                'day' => ['required'],
                'month' => ['required'],
                'ss_dl' => ['string','nullable'],
            ]);
			
			$account = $data['account'];
            unset($data['account']);
			
			$user_data = Session::get('user_data');
			if($account == 'joint'){
				//foreach($user_data['info'] as $user){
					if($request->get("holder") == 1){
						$user_data['info'][0] = array_merge($user_data['info'][0],$data);
						Session::put("user_data",$user_data);
						Session::put("holder",2);
						return response()->redirectToRoute("register.step",['2_2','account=joint']);
					}
					if($request->get("holder") == 2){
						$user_data['info'][1] = array_merge($user_data['info'][1],$data);
						Session::forget('holder');
						Session::put("user_data",$user_data);
						return response()->redirectToRoute("register.step",'3');
					}
				//}
			} else {
				
                /* $user_data = [
                    "account" => $account,
                    "info" => [
                        $data
                    ]
                ];
                Session::put("user_data",$user_data); */
				$user_data = Session::get('user_data');
				$user_data['info'][0] = array_merge($user_data['info'][0],$data);
				Session::put("user_data",$user_data);
                return response()->redirectToRoute("register.step",'3');
            }
			

        }
		
		
		
		
		if($step == '2_1'){
            $data = $request->validate([
                'address' => ['string','nullable'],
                'city' => ['string','nullable'],
                'state' => ['string','nullable'],
                'zip' => ['string','nullable'],
                'country' => ['string','nullable'],
            ]);
			
            $user_data = Session::get('user_data');
            $user_data['info'][0] = array_merge($user_data['info'][0],$data);
            Session::put("user_data",$user_data);
            return response()->redirectToRoute("register.step",'2_2');
        }
		
		
        
        if($step == 3){
			
            $data = $request->validate([
                'username' => ['required', 'string','unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'secret_question' => ['string','nullable'],
                'secret_answer' => ['string','nullable'],
            ]);
            $user_data = Session::get('user_data');
            $data = array_merge($data,$user_data);
            Session::put("user_data",$data);
            return response()->redirectToRoute("register.step",4);
        }
        if($step == 4){
            $request->validate([
                'g-recaptcha-response' => 'required|recaptcha',
            ]);
            $user_data = Session::get('user_data');

            $user = User::create([
                "type" => $user_data['account'],
                "password" => $user_data['password'],
                "username" => $user_data['username'],
                "secret_question" => $user_data['secret_question'],
                "secret_answer" => $user_data['secret_answer'],
                "email" => $user_data['info'][0]['email']
            ]);
			
            foreach ($user_data['info'] as $info) {
				$c_date = date('Y-m-d', time());
				$year = isset($info['year']) ?  $info['year'] : '';
				$month = isset($info['month']) ?  $info['month'] : '';
				$day = isset($info['day']) ?  $info['day'] : '';
                $bday = ($day != '' && $month != '' && $year != '') ? $year. "-" . $month . "-" . $day : $c_date;
				$Country = isset($info['country']) ? Country::query()->where("id", $info['country'])->first()->name : '';
				
                $user->info()->create([
                    "first_name" => isset($info['first_name']) ? $info['first_name'] : '',
                    "last_name" => isset($info['last_name']) ? $info['last_name'] : '',
                    "middle_name" => isset($info['middle_name']) ? $info['middle_name'] : '',
                    "phone" => isset($info['phone']) ? $info['phone'] : '',
                    "email" => isset($info['email']) ? $info['email'] : '',
                    "ss_dl" => isset($info['ss_dl']) ? $info['ss_dl'] : '',
                    "address" => isset($info['address']) ? $info['address'] : '',
                    "city" => isset($info['city']) ? $info['city'] : '',
                    "state" => isset($info['state']) ? $info['state'] : '',
                    "zip" => isset($info['zip']) ? $info['zip'] : '',
                    "country" => $Country,
                    "birth_day" => $bday,
                ]);
            }

            $user->log()->create(
                [
                    "ip" => $request->ip(),
                    "referrer" => Session::get('first_input_referer'),
                    "url" => $request->url(),
                    "user_agent" => $request->userAgent()
                ]
            );
            event(new Registered($user));
            return response()->redirectToRoute("register.step", 5);
        }
    }
    function not_approved()
    {
        if(Auth::user() && Auth::user()->approved){
            return response()->redirectToRoute("dashboard.index");
        }
        return view('auth.not_approved');
    }

}
