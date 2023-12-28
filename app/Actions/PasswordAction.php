<?php

namespace App\Actions;

use App\Http\Requests\PasswordResetRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordAction
{
    /**
     * Send password reset link to the given user.
     *
     * @param string $email
     * @return array
     */
    public function sendResetLink(string $email): array
    {
        try {
            Password::sendResetLink(['email' => $email]);

            return [
                'status' => 'success',
                'message' => __('interface.reset-link-sent'),
            ];
        } catch (\Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage(),
            ];
        }
    }

    /**
     * Reset the given user's password.
     *
     * @param PasswordResetRequest $request
     * @return string|null
     */
    public function resetPassword(PasswordResetRequest $request): string|null
    {
        return Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request['password']),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );
    }

    /**
     * Change user's password.
     *
     * @param $oldPassword
     * @param $newPassword
     * @return bool
     */
    public function changePassword($oldPassword, $newPassword): bool
    {
        $user = auth()->user();
        if (Hash::check($oldPassword, $user->password)) {
            $user->password = Hash::make($newPassword);
            $user->save();

            return true;
        }

        return false;
    }

}