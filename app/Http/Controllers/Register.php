<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Carbon\Carbon;
use Log;
use Illuminate\Support\Str;
use Hash;
use DB;
class Register extends Controller
{

    public function getUserNameAjax(Request $request)
    {

      $user =User::where('username',$request->user_id)->first();
            if($user)
            {
                return $user->name;
            } 
            else{
                return 1;
            }       
    }

    public function index()
    {
        return view('auth.verify');
    }

    public function register_page()
    {
        return view('auth.register');
    }


    
   public function find_position($snode,$pos)
    {
        $q=User::select('id')->where('Parentid',$snode)->where('position',$pos)->first();
        if (empty($q))
         {
           $this->downline = $snode; 
         }
         else
         {
          $user = $q->id;
            // print_r($user);die();
          $this->find_position($user,$pos);   
         }
    }



public function sendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email'
    ]);

    // Generate OTP
    $otp = rand(100000, 999999);

   DB::table('password_resets')->updateOrInsert(
        ['email' => $request->email],
        [
            'token' => $otp,
            'created_at' => now(),
            'updated_at' => now(),
        ]
    );
  sendEmail($request->email, 'Your One-Time Password', [
                'name' => "User",
                'code' => $otp,
                'purpose' => 'Change Password',
                'viewpage' => 'one_time_password',

             ]);

    return response()->json([
        'status' => 'success',
        'message' => 'OTP sent to your email'
    ]);
}


  public function register(Request $request)
    {
        try{
            $validation =  Validator::make($request->all(), [
                'email' => 'required',
                'name' => 'required',
                'password' => 'required|confirmed|min:5',
                'sponsor' => 'required|exists:users,username',
                'phone' => 'required|max:10',

              
            ]);

            
            if($validation->fails()) {

                Log::info($validation->getMessageBag()->first());
     
                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            //check if email exist
            
            
                // Check OTP from password_resets table
                $record = DB::table('password_resets')
                    ->where('email', $request->email)
                    ->where('token', $request->code)
                    ->first();
            
                if (!$record) {
                    return back()->withErrors(['code' => 'Invalid or expired OTP']);
                }
            
                      
          
            
            $user = User::where('username',$request->sponsor)->where('active_status','Active')->first();
            if(!$user)
            {
                return Redirect::back()->withErrors(array('Introducer ID Not Active'));
            }
            $totalID = User::count();
            $totalID++;
            $username =substr(time(),4).$totalID;
             $username ="UW".substr(rand(),-2).substr(time(),-2).substr(mt_rand(),-1);
            
           $tpassword =substr(time(),-2).substr(rand(),-2).substr(mt_rand(),-1);
            $post_array  = $request->all();
                //  
          
            $data['name'] = $post_array['name'];
            $data['phone'] = $post_array['phone'];
            $data['username'] = $username;
            $data['email'] = $post_array['email'];
            $data['password'] =   Hash::make($post_array['password']);
            $data['tpassword'] =   Hash::make($tpassword);
            $data['PSR'] =  $post_array['password'];
            // $data['telegram'] =  $post_array['telegram'];
           
            $data['TPSR'] =  $tpassword;
            $data['sponsor'] = $user->id;
            $data['package'] = 0;
            $data['withdrawbutton'] = 0;

            $data['jdate'] = date('Y-m-d');
            $data['created_at'] = Carbon::now();
            $data['remember_token'] = substr(rand(),-7).substr(time(),-5).substr(mt_rand(),-4);
            $sponsor_user =  User::orderBy('id','desc')->limit(1)->first();
           $data['level'] = $user->level+1;

         
            $data['ParentId'] =  $sponsor_user->id;
            $user_data =  User::create($data);
            $registered_user_id = $user_data['id'];
            $user = User::find($registered_user_id);
            // Auth::loginUsingId($registered_user_id);
          
             sendEmail($user->email, 'Welcome to '.siteName(), [
                'name' => $user->name,
                'username' => $user->username,
                'password' => $user->PSR,
                'email' => $user->email,
                'tpassword' => $user->TPSR,
                'viewpage' => 'register_sucess',
                 'link'=>route('login'),
            ]);
            
            

            // return redirect()->route('Index');
             return redirect()->route('register_sucess')->with('messages', $user);

        }
        catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return back()->withErrors('error', $e->getMessage())->withInput();
           
        }

          
    } 
    
    
    public function getNonce(Request $request)
    {
        Log::info('Registration request received', $request->all());

        $request->validate([
            'wallet_address' => 'required',
            'sponsor' => 'required'
        ]);
        $sponsor = User::where('username', $request->sponsor)->first();

        if (!$sponsor) {
            return response()->json([
                'error' => 'Invalid referral code'
            ]);
        }

        $nonce = Str::random(32);

        Cache::put('nonce_'.$request->wallet_address, [
            'nonce' => $nonce,
            'sponsor_id' => $sponsor->id
        ], 300);
      
        return response()->json([
            'nonce' => $nonce
        ]);
    }


    public function verify(Request $request)
    {
         $request->validate([
        'wallet_address' => 'required|string',
        'signature' => 'required|string'
    ]);

    $wallet = strtolower($request->wallet_address);

    $nonceData = Cache::get('nonce_' . $wallet);

    if (!$nonceData) {
        return response()->json(['error' => 'Nonce expired'], 400);
    }

    $nonce = $nonceData['nonce'];
    $sponsorId = $nonceData['sponsor_id'];

    // 🔐 TODO: Add real signature verification here

    // ✅ Check if user already exists
    $user = User::where('wallet_address', $wallet)->first();

    if (!$user) {
        // 🆕 Create only if new
        $user = User::create([
            'wallet_address' => $wallet,
            'name' => 'User_' . substr($wallet, 2, 6),
            'username' => 'user_' . rand(10000,99999),
            'sponsor' => $sponsorId,
            'password' => bcrypt(Str::random(16))
        ]);
    }

    // 🧹 Remove nonce (important)
    Cache::forget('nonce_' . $wallet);

    auth()->login($user);

    return response()->json(['success' => true]);
    }





public function contactAdminMail(Request $request)
{
    $request->validate([
        'name'    => 'required',
        'email'   => 'required|email',
        'topic'   => 'required',
        'message' => 'required',
    ]);

    sendEmail(
        'sksfamily02@gmail.com',  
        $request->topic,                  
        [
            'name'     => $request->name,
            'email'    => $request->email,
            'topic'    => $request->topic,
            'message'  => $request->message,
            'viewpage' => 'admin_contact_mail'
        ]
    );

    return back()->with('success', 'Your message has been sent successfully.');
}




    public function register22(Request $request)
    {
        try{
            $validation =  Validator::make($request->all(), [
                'email' => 'required',
                'name' => 'required',
                  'position' => 'required',
                'password' => 'required|min:5',
                'sponsor' => 'required|exists:users,username',
                'phone' => 'required|numeric|min:10'
              
            ]);

            
            if($validation->fails()) {

                Log::info($validation->getMessageBag()->first());
     
                return Redirect::back()->withErrors($validation->getMessageBag()->first())->withInput();
            }
            //check if email exist
          
            $user = User::where('username',$request->sponsor)->first();
            if(!$user)
            {
                return Redirect::back()->withErrors(array('Introducer ID Not Active'));
            }
            
            
            
            for ($i=150; $i < 250 ; $i++) 
            { 
          
              $totalID = User::count();
            $totalID++;
            $username =substr(time(),4).$totalID;
             $username =substr(rand(),-2).substr(time(),-3).substr(mt_rand(),-2);
            
           $tpassword =substr(time(),-2).substr(rand(),-2).substr(mt_rand(),-1);
            $post_array  = $request->all();
                //  
          
            $data['name'] = "Sip fx ".$i;
            $data['phone'] = '1234567890';
            $data['username'] = $username;
            $data['email'] = 'sipfx'.$i."@gmail.com";
            $data['password'] =   Hash::make($post_array['password']);
            $data['tpassword'] =   Hash::make($tpassword);
            $data['PSR'] =  $post_array['password'];
            $data['position'] = $post_array['position'];
            $data['TPSR'] =  $tpassword;
            $data['sponsor'] = $user->id;
            $data['package'] = 0;
            $data['jdate'] = date('Y-m-d');
            $data['created_at'] = Carbon::now();
            $data['remember_token'] = substr(rand(),-7).substr(time(),-5).substr(mt_rand(),-4);
             $this->downline="";
            $this->find_position($user->id,$post_array['position']);
            $sponsor_user =  $this->downline; 
           $data['level'] = $user->level+1;

         
            $data['ParentId'] =  $sponsor_user;
            $user_data =  User::create($data);
            $registered_user_id = $user_data['id'];
            // $user = User::find($registered_user_id);
            // Auth::loginUsingId($registered_user_id);
          
            //  sendEmail($user->email, 'Welcome to '.siteName(), [
            //     'name' => $user->name,
            //     'username' => $user->username,
            //     'password' => $user->PSR,
            //     'tpassword' => $user->TPSR,
            //     'viewpage' => 'register_sucess',
            //      'link'=>route('login'),
            // ]);
            
          
            }

            
        
            

            // return redirect()->route('home');
             return redirect()->route('register_sucess')->with('messages', $user);

        }
        catch(\Exception $e){
            Log::info('error here');
            Log::info($e->getMessage());
            print_r($e->getMessage());
            die("hi");
            return back()->withErrors('error', $e->getMessage())->withInput();
           
        }

          
    } 

}
