<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name','wallet_address','email', 'password','phone','username','sponsor','ParentId','position','active_status','jdate','googlepay','level','tpassword','adate','PSR','TPSR','telegram','withdrawbutton'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'sponsor');
    } 


    public function sponsor_detail()
    {
        return $this->belongsTo('App\Models\User', 'sponsor');
    } 


    public function FundBalance()
    {
    $balance = Auth::user()->buy_fundAmt->sum('amount_total_fiat')-(Auth::user()->buy_packageAmt());
    return $balance;
    } 

    public function buy_fundAmt(){
        return $this->hasMany('App\Models\CoinpaymentTransaction','buyer_name','username')->where('status','>=',1);
    }



    public function buy_packageAmt(){
        $amt= Investment::where('active_from',Auth::user()->username)->where('walletType',1)->sum('amount');
        return $amt;
    }

    public function dailyIncentive()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Order Revenue');
    } 

    public function user_direct()
    {
        return $this->hasMany('App\Models\User','sponsor','id')->where('active_status','Active');
    } 
    public function user_directall()
    {
        return $this->hasMany('App\Models\User','sponsor','id');
    } 



    
    public function leadership_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Leadership Income');
    } 
        
    public function profit_income()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Profit Sharing Income');
    } 
      
    public function trading_profit()
    {
        return $this->hasMany('App\Models\User_trade','user_id','id')->where('profitType',1);
    } 
       
    public function debit()
    {
        return $this->hasMany('App\Models\Debit','user_id','id');
    } 
   
    public function trading_lose()
    {
        return $this->hasMany('App\Models\User_trade','user_id','id')->where('profitType',2);
    } 

    public function sponsorship_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->whereIn('remarks',['Referral Bonus']);
    } 

     public function tradingBalance()
    {
    $balance = (Auth::user()->trading_profit->sum('comm')) - (Auth::user()->trading_lose->sum('comm'));
    return $balance;
    }      
          
    // public function reward_bonus()
    // {
    //     return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Royalty Bonus');
    // } 

    public function booster_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Booster Income');
    } 
    
    public function reward_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Reward Income');
    } 
    
    public function passive_bonus()
    {
        return $this->hasMany('App\Models\Income','user_id','id')->where('remarks','Passive Income');
    } 
    
     
    public function totalIncome()
    {
        return $this->hasMany('App\Models\Income','user_id','id');
    } 
    
     public function totalcompound()
    {
        return $this->hasMany('App\Models\Compound','user_id','id');
    } 
    
    
    
    public function available_balance()
    {
    $balance = (Auth::user()->users_incomes()) - (Auth::user()->withdrawtotal());
    return $balance;
    } 

        public function principleBalance()
    {
        $invested = Auth::user()->investment->sum('amount');
        $withdrawn = Auth::user()->withdrawPrinciple();   // already withdrawn principal
        return max(0, $invested - $withdrawn);
    }

    public function releasablePrinciple()
    {
        $user = Auth::user();
        $investments = $user->investment;   // Collection of investments (amount, created_at)
        // Sum how much is allowed from each investment depending on its age
        $allowed = $investments->sum(function ($inv) {
            $days = now()->diffInDays($inv->created_at);
            $rate = $days < 100 ? 0.25 : 1.0;       // 25% before 100 days, else 100%
            return $inv->amount * $rate;
        });

        $alreadyWithdrawn = $user->withdrawPrinciple();

        // Allowed left by the policy (cannot go below 0)
        $policyRoomLeft = max(0, $allowed - $alreadyWithdrawn);

        // Also never allow more than remaining principal
        $remainingPrincipal = max(0, $investments->sum('amount') - $alreadyWithdrawn);

        return min($policyRoomLeft, $remainingPrincipal);
    }
        
    public function investMentWithWithdraw()
    {
    $balance = (Auth::user()->investment->sum('amount'))-(Auth::user()->withdrawPrinciple());
    return $balance;
    } 

    public function users_incomes()
    {
        return  Income::where('user_id',Auth::user()->id)->where('credit_type',0)->sum('comm');
    } 
    

    public function withdraw()
    {
        return  Withdraw::where('user_id',Auth::user()->id)->where('status','Pending')->sum('amount');
    } 
    public function withdrawtotal()
    {
        return  Withdraw::where('user_id',Auth::user()->id)->where('status','!=','Failed')->sum('amount');
    } 
     public function compound()
    {
        return  Compound::where('user_id',Auth::user()->id)->where('walletType',1)->where('active_from','Transfered')->sum('amount');
    } 
    
    
    public function withdrawPrinciple()
    {
        return  Withdraw::where('user_id',Auth::user()->id)->where('status','!=','Failed')->where('walletType',2)->sum('amount');
    } 


    // App\Models\User.php

    public function investment()
    {
          return $this->hasMany('App\Models\Investment','user_id','id')->where('status',"Active");
    }
    public function Activeinvestment(){
            return $this->hasMany('App\Models\Investment','user_id','id')->where('status','Active');
        }


    public function withdrawal(){
        return $this->hasMany('App\Models\Withdraw','user_id','id')->where('walletType',1);
    }

  public function Priciplewithdrawal(){
        return $this->hasMany('App\Models\Withdraw','user_id','id')->where('walletType',2);
    }


  

    
}
