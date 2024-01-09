<?php

namespace App\Http\Controllers\API;

use App\Actions\OtpAction;
use App\Actions\PasswordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\OtpVerificationRequest;
use App\Http\Requests\Auth\PasswordChangeRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\EmailAddressRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Handle an incoming api authentication request.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {


        // TODO implement rate limiter

        $user = User::where('email', $request['email'])->first();

        if ($user && \Hash::check($request['password'], $user->password)) {
            return $this->generateToken($user);
        }

        return response()->json([
            'response' => false,
            'errors' => [__('auth.failed')]
        ], 401);
    }

    /**
     * Generate login token for user.
     *
     * @param User $user
     * @return JsonResponse
     */
    private function generateToken(User $user): JsonResponse
    {
        // Revoke previously generated tokens
        $user->tokens()->delete();

        $user->access_token = $user->createToken('mobile-app')->plainTextToken;
        $user->user_id = $user->id;
        return response()->json([
            'response' => true,
            'data' => $user,
        ]);
    }

    /**
     * Register a new account.
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {


        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'type' => 'visitor',
            ]);

            $user->assignRole('visitor');

            if ($request->has('user_profile')) {
                if (!empty($request->user_profile)) {
                    $user->addMediaFromBase64($request->user_profile)->usingFileName('user_profile_' . time() . '.png')->toMediaCollection('user_profile');
                }
            }
        }


        return $this->generateToken($user);
    }

    /**
     * Verify user's OTP.
     *
     * @param OtpVerificationRequest $request
     * @param OtpAction $otpAction
     * @return JsonResponse
     */
    public function otpVerification(OtpVerificationRequest $request, OtpAction $otpAction): JsonResponse
    {
        if ($otpAction->verifyOtp($request['otp'])) {
            return response()->json();
        } else {
            return response()->json([
                'message' => __('interface.otp-code-invalid')
            ], 422);
        }
    }

    /**
     * Resend the OTP code.
     *
     * @param OtpAction $otpAction
     * @return JsonResponse
     */
    public function otpResend(OtpAction $otpAction): JsonResponse
    {
        if ($otpAction->resetOtp()) {
            return response()->json([
                'message' => __('interface.resent-otp')
            ]);
        } else {
            return response()->json([
                'message' => __('interface.resent-otp-not-allowed'),
                'waiting-time-seconds' => $otpAction->remainingSecondsForResettingOtp()
            ], 422);
        }
    }

    /**
     * Logout user.
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $user = auth()->user();
        $user->fcm_token = null;
        $user->save();
        $user->tokens()->delete();
        return response()->json();
    }

    /**
     * Send password reset link to user.
     *
     * @param EmailAddressRequest $request
     * @param PasswordAction $passwordAction
     * @return JsonResponse
     */
    public function sendResetLink(EmailAddressRequest $request, PasswordAction $passwordAction): JsonResponse
    {
        $status = $passwordAction->sendResetLink($request['email']);

        return response()->json($status, $status['status'] === 'success' ? 200 : 422);
    }

    /**
     * Change user's password.
     *
     * @param PasswordChangeRequest $request
     * @param PasswordAction $passwordAction
     * @return JsonResponse
     */
    public function changePassword(PasswordChangeRequest $request, PasswordAction $passwordAction)
    {
        $status = $passwordAction->changePassword($request['old_password'], $request['new_password']);
        if ($status) {
            return $this->logout();
        }
        return response()->json([], Response::HTTP_FORBIDDEN);
    }
}
