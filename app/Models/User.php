<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Helper\UserBalance;
use App\Helper\UserTransfer;
use App\Notifications\MailResetPasswordToken;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    public UserBalance $balance;
    public UserTransfer $transfer;

    function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->balance = new UserBalance($this);
        $this->transfer = new UserTransfer($this);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'password',
        'username',
        'email',
        'secret_question',
        'secret_answer',
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
        'password' => 'hashed',
        'div_comp' => 'boolean'
    ];

    const ACCOUNT_PERSONAL = "Personal";
    const ACCOUNT_JOINT = "Joint";
    const ACCOUNT_BUSINESS = "Business";

    function withdrawals(){
        return $this->hasMany(Withdrawal::class,"user_id","id");
    }

    function balance(){

    }

    function transfers(){
        return $this->hasMany(Transfer::class,'user_id','id');
    }

    function deposites(){
        return $this->hasMany(Deposit::class,"user_id","id");
    }

    function bank_profile(){
        return $this->hasOne(BankAccount::class,"id",'bank_id');
    }

    function logs(){
        return $this->hasMany(UserLog::class,"user_id","id");
    }

    function log(){
        return $this->hasOne(UserLog::class,"user_id","id")->orderByDesc("created_at")->limit(1);
    }

    function sendEmailVerificationNotification(){
        try{
            $this->notify(new VerifyEmailNotification);
        }catch (\Exception $e){

        }
    }

    public function sendPasswordResetNotification($token)
    {
        try{
            $this->notify(new MailResetPasswordToken($token));
        }catch (\Exception $e){

        }
    }

    function info(){
        return $this->hasMany(UserInfo::class,"user_id",'id');
    }
}
