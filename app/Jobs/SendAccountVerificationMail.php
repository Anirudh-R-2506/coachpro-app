<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use App\Models\UserVerify;
use App\Mail\AccountVerificationMail;

class SendAccountVerificationMail implements ShouldQueue
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
        $token = Str::random(64) . md5($this->user->email);

        $verify = UserVerify::where('user_id', $this->user->id)->first();

        if (!$verify){

            UserVerify::create([
                'user_id' => $this->user->id,
                'token' => $token
            ]);
        }
        else{
            $verify->token = $token;
            $verify->save();
        }

        $url = route('services.verification.verify', ['token' => $token]);

        Mail::to($this->user->email)->send(new AccountVerificationMail($url));
        
    }
}
