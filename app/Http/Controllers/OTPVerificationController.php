<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Auth;
use Nexmo;
use App\Models\OtpConfiguration;
use App\Models\User;
use App\Utility\SmsUtility;
use Twilio\Rest\Client;
use Hash;

class OTPVerificationController extends Controller
{
    use RegistersUsers;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verification(Request $request, User $user)
    {
//        if (Auth::check() && Auth::user()->email_verified_at == null) {
        if (Auth::check() && Auth::user()) {
            return redirect()->route('home');
        } else {
            return view('otp_systems.frontend.user_verification', array('user' => $user));
        }
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function verify_phone(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        if ($user->verification_code == $request->verification_code) {
            $user->email_verified_at = date('Y-m-d h:m:s');
            $user->save();
            $this->guard()->login($user);
            if ($user->email == null && session()->has('is_register') && session()->get('is_register') == 1) {
                flash('Register successfully')->success();
                flash('Please complete profile to begin with us.')->success();
                return redirect('profile');
            } else {
                flash('Login successfully')->success();
                if (session('link') != null) {
                    return redirect(session('link'));
                } else {
                    return redirect()->route('home');
                }
            }
        } else {
            flash('Invalid Code')->error();
            return back();
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function resend_verificcation_code(Request $request, $user_id)
    {
        $user = User::findOrFail(decrypt($user_id));
        $user->verification_code = rand(1000, 9999);
        $user->save();
        SmsUtility::phone_number_verification($user);
        flash('Code resend successfully')->success();
        return back();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function reset_password_with_code(Request $request)
    {
        if (($user = User::where('phone', $request->phone)->where('verification_code', $request->code)->first()) != null) {
            if ($request->password == $request->password_confirmation) {
                $user->password = Hash::make($request->password);
                $user->email_verified_at = date('Y-m-d h:m:s');
                $user->save();
                event(new PasswordReset($user));
                auth()->login($user, true);

                if (auth()->user()->user_type == 'admin' || auth()->user()->user_type == 'staff') {
                    return redirect()->route('admin.dashboard');
                }
                return redirect()->route('home');
            } else {
                flash("Password and confirm password didn't match")->warning();
                return back();
            }
        } else {
            flash("Verification code mismatch")->error();
            return back();
        }
    }

    /**
     * @param User $user
     * @return void
     */

    public function send_code($user)
    {
        SmsUtility::phone_number_verification($user);
    }

    /**
     * @param Order $order
     * @return void
     */
    public function send_order_code($order)
    {
        $phone = json_decode($order->shipping_address)->phone;
        if ($phone != null) {
            SmsUtility::order_placement($phone, $order);
        }
    }

    /**
     * @param Order $order
     * @return void
     */
    public function send_delivery_status($order)
    {
        $phone = json_decode($order->shipping_address)->phone;
        if ($phone != null) {
            SmsUtility::delivery_status_change($phone, $order);
        }
    }

    /**
     * @param Order $order
     * @return void
     */
    public function send_payment_status($order)
    {
        $phone = json_decode($order->shipping_address)->phone;
        if ($phone != null) {
            SmsUtility::payment_status_change($phone, $order);
        }
    }
}
