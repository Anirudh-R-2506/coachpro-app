<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Helpers\SmsHelper;
use App\Models\MobileVerify;

class MobileVerificationSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $otp = bin2hex(random_bytes(3));
        $to = $this->user->phone;

        $verify = MobileVerify::where('user_id', $this->user->id)->first();
        if (!$verify){
            MobileVerify::create([
                'user_id' => $this->user->id,
                'otp' => $otp
            ]);
        }
        else{
            $verify->otp = $otp;
            $verify->save();
        }

        $message = "Welcome to " . config('app.name') . ". Your OTP is " . $otp . ". Please do not share this OTP with anyone.";
        SmsHelper::send($to, $message);
    }
}
