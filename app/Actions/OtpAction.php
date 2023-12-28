<?php

namespace App\Actions;

use App\Jobs\SendEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;

class OtpAction
{
    /**
     * Generate OTP for email verification
     *
     * @param User|Authenticatable|null $user
     * @return void
     */
    public function generateOtp(User|Authenticatable $user = null): void
    {
        $otp = rand(1000, 9999);
        $otp_expiry = Carbon::now()->addMinutes(5);

        if (!$user) $user = auth()->user();

        if ($user->email_verified_at) {
            return;
        }

        $user->otp = $otp;
        $user->otp_expiration = $otp_expiry;
        $user->save();

        SendEmail::dispatch('sendOtpEmail', ['user' => $user, 'otp' => $otp]);
    }

    /**
     * Check the remaining time user has to wait for re-sending the OTP for email verification
     *
     * @return int
     */
    public function remainingSecondsForResettingOtp(): int
    {
        $user = auth()->user();

        $afterFourMinutes = Carbon::now()->addMinutes(4);
        if ($user->otp_expiration >= $afterFourMinutes) {
            return $user->otp_expiration->diffInSeconds($afterFourMinutes);
        }
        return 0;
    }

    /**
     * Regenerate OTP for email verification (only if OTP is sent one minute ago)
     *
     * @return bool
     */
    public function resetOtp(): bool
    {
        if ($this->remainingSecondsForResettingOtp() == 0) {
            $this->generateOtp();
            return true;
        }
        return false;
    }

    /**
     * Verify the OTP sent to the user's email
     *
     * @param $otp
     * @return bool
     */
    public function verifyOtp($otp): bool
    {
        $user = auth()->user();

        if ($user->email_verified_at) {
            return true;
        }

        if ($user->otp == $otp && $user->otp_expiration > Carbon::now()) {
            $user->otp = null;
            $user->otp_expiration = null;
            $user->email_verified_at = now();
            $user->save();
            return true;
        }
        return false;
    }
}
