<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Network;
use App\Models\Payment;
use Razorpay\Api\Api;
use DB;
use Mail;
use Illuminate\Support\Facades\URL;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class UserController extends Controller
{

    public function index(Request $request)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Check if a payment with status "captured" exists for the logged-in user
            $capturedPaymentFound = Payment::where('user_id', Auth::id())
                ->where('payment_status', 'captured')
                ->exists();
        } else {
            // If user is not logged in, assume no captured payment
            $capturedPaymentFound = false;
        }
        return view('index', compact('capturedPaymentFound'));
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function register()
    {
        return view('user.register');
    }
    public function payment()
    {
        $payment = Payment::all();
        return view('payment', compact('payment'));
    }

    public function razorpay(Request $request)
    {
        // dd($request->all());

        if (isset($request->razorpay_payment_id) && $request->razorpay_payment_id != '') {
            // $payment_id = $request->s;
            $api = new Api("rzp_test_vI7kANMNUUxKsB", "cOJ07x8HNu535EHWzCgBfrx8");

            $payment = $api->payment->fetch($request->razorpay_payment_id);
            // dd($payment);

            if ($payment->status === 'captured') {
                echo "<script>alert('Payment has been captured, no need to pay again.');</script>";
            } else {
                $response = $payment->capture(array('amount' => $payment->amount));
                // dd($response);
                $user_id = Auth::id();

                $payment = new Payment();

                $payment->user_id = $user_id;
                $payment->payment_id = $response['id'];
                $payment->amount = $response['amount'] / 100;
                $payment->currency = $response['currency'];
                $payment->payment_status = $response['status'];
                $payment->payment_method = 'Razorpay';
                $payment->save();

                return redirect('/success');
            }

        } else {
            return redirect('/failed');
        }



    }
    public function success()
    {
        return view('payment.success');
    }
    public function failed()
    {
        return view('payment.failed');
    }
    public function login()
    {
        return view('user.login');
    }
    public function admin()
    {
        $user = Auth::user();
        $totalAmount = User::sum('wallet');

        return view('admin.admin', compact(['user', 'totalAmount']));
    }
    public function adminusers()
    {
        $user = Auth::user();
        $users = User::all();

        // You can then loop through the $users collection and call the referrals() method on each User model

        return view('admin.users', compact(['user', 'users']));
    }



    public function adminpayments()
    {
        $user = Auth::user();
        $payment = Payment::all();
        $payments = DB::table('payments')
            ->join('users', 'payments.user_id', '=', 'users.id')
            ->select('payments.*', 'users.name', 'users.email')
            ->get();

        return view('admin.payments', compact(['user', 'payment', 'payments']));
    }
    public function adminnetworks()
    {
        $user = Auth::user();
        $network = Network::all();
        $networks = DB::table('networks')
            ->join('users', 'networks.parent_user_id', '=', 'users.id')
            ->select('networks.*', 'users.name', 'users.email')
            ->get();

        return view('admin.networks', compact(['user', 'network', 'networks']));
    }






    public function registered(Request $request)
    {

        $request->validate([
            'referral_code',
            'name' => 'required|string|min:2',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|max:11',
            'birth_date' => 'required',
            'gender' => 'required',
            'pancard' => 'required|max:10',
            'state' => 'required',
            'city' => 'required',
            'bank_name' => 'required',
            'account_no' => 'required',
            'ifsc_code' => 'required',
            'pincode' => 'required|max:6',
            'address' => 'required',
        ]);

        $referral_code = Str::random(10);
        $token = Str::random(50);

        $referralBonus = [0, 100, 80, 50, 20]; // Referral bonus points for each level

        if (isset($request->referral_code)) {
            $referrer = User::where('referral_code', $request->referral_code)->first();

            if (!$referrer) {
                return back()->with('error', 'Please Enter a Valid Referral Code!');
            }
        } else {
            $referrer = null;
        }


        if (isset($request->referral_code)) {

            $userData = User::where('referral_code', $request->referral_code)->get();

            if (count($userData) > 0) {
                $referrer = User::where('referral_code', $request->referral_code)->first();


                $user_id = User::insertGetId([
                    'referral_code' => $referral_code,
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                    'birth_date' => $request->birth_date,
                    'gender' => $request->gender,
                    'pancard' => $request->pancard,
                    'state' => $request->state,
                    'city' => $request->city,
                    'bank_name' => $request->bank_name,
                    'account_no' => $request->account_no,
                    'ifsc_code' => $request->ifsc_code,
                    'pincode' => $request->pincode,
                    'address' => $request->address,
                    'remember_token' => $token,
                    'wallet' => 0,
                ]);

                Network::insert([
                    'referral_code' => $request->referral_code,
                    'user_id' => $user_id,
                    'parent_user_id' => $referrer->id,
                ]);

                // Update referrer's wallet
                if ($referrer) {
                    $this->updateWallet($referrer, $referralBonus[1]); // 1st level referral bonus

                    // Update higher-level referrers' wallets recursively
                    $this->updateReferrerWallets($referrer, $referralBonus, 2);
                }

            } else {
                return back()->with('error', 'Please Enter a Valid Refferal Code !');
            }

        } else {
            User::insert([
                'referral_code' => $referral_code,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'pancard' => $request->pancard,
                'state' => $request->state,
                'city' => $request->city,
                'bank_name' => $request->bank_name,
                'account_no' => $request->account_no,
                'ifsc_code' => $request->ifsc_code,
                'pincode' => $request->pincode,
                'address' => $request->address,
                'remember_token' => $token,
                'wallet' => 0,
            ]);
        }

        $domain = URL::to('/');
        $url = $domain . '/referral-register?ref=' . $referral_code;

        $data['url'] = $url;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['title'] = "Registered";

        Mail::send('emails.registerMail', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });

        // Varification mail send 
        $url = $domain . '/email-verification/' . $token;

        $data['url'] = $url;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['title'] = "Referral Verification Mail";

        Mail::send('emails.verifyMail', ['data' => $data], function ($message) use ($data) {
            $message->to($data['email'])->subject($data['title']);
        });

        return redirect('/login')->with('success', 'Your Registration has been Successfully! Please Verify your mail');
    }


    public function updateWallet($user, $points)
    {
        $user->wallet += $points;
        $user->save();
    }

    public function updateReferrerWallets($user, $referralBonus, $level)
    {
        $parent = Network::where('user_id', $user->id)->first();
        if ($parent && $level < count($referralBonus)) {
            $referrer = User::find($parent->parent_user_id);
            if ($referrer) {
                $this->updateWallet($referrer, $referralBonus[$level]);
                $this->updateReferrerWallets($referrer, $referralBonus, $level + 1);
            }
        }
    }


    public function loadReferralRegister(Request $request)
    {
        if (isset($request->ref)) {
            $referral = $request->ref;
            $userData = User::where('referral_code', $referral)->get();

            if (count($userData) > 0) {
                return view('referralRegister', compact('referral'));
            } else {
                return view('404');
            }
        } else {
            return redirect('/');
        }
    }

    public function emailverification($token)
    {
        $userData = User::where('remember_token', $token)->get();
        if (count($userData) > 0) {

            if ($userData[0]['is_verified'] == 1) {
                return view('verified', ['message' => 'Your mail is already verified!']);
            }

            User::where('id', $userData[0]['id'])->update([
                'is_verified' => 1,
                'email_verified_at' => date('Y-m-d H:i:s')
            ]);
            return view('verified', ['message' => 'Your' . $userData[0]['email'] . 'Mail is verified successfully!']);

        } else {
            return view('verified', ['message' => '404 Page Not Found !']);
        }
    }

    public function userlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        $userData = User::where('email', $request->email)->first();

        if (!empty($userData)) {
            if ($userData->is_verified == 0) {
                return back()->with('error', 'Please Verify your mail!');
            }
        }

        $userCredential = $request->only('email', 'password');


        if (Auth::attempt($userCredential)) {
            $user = Auth::user();
            if ($user->user_type == 1) {
                // user_type is 1, so redirect to admin dashboard
                return redirect('/admin');
            } else {
                // user_type is 0, so redirect to user dashboard
                return redirect('/');
            }
        } else {
            return back()->with('error', 'Email and Password is incorrect!');
        }

    }

    public function dashboard()
    {


        $networkCount = Network::where('parent_user_id', Auth::user()->id)->orWhere('parent_user_id', Auth::user()->id)->count();

        $networkData = Network::with('user')->where('parent_user_id', Auth::user()->id)->get();

        $shareComponent = \Share::page(
            URL::to('/') . '/referral-register?ref=' . Auth::user()->referral_code,
            'Share and Earn points by Referral Link',
        )
            ->facebook()
            ->twitter()
            ->telegram()
            ->whatsapp();


        return view('dashboard', compact(['networkCount', 'networkData', 'shareComponent',]));
    }

    public function referrals(Request $request)
    {


        $networkCount = Network::where('parent_user_id', Auth::user()->id)->orWhere('parent_user_id', Auth::user()->id)->count();

        $user = Auth::user();

        $networkData = Network::with('user')->where('parent_user_id', Auth::user()->id)->get();



        return view('referrals', compact(['networkData', 'networkCount', 'user']));
    }



    public function profile()
    {
        $profile = Auth::user();
        return view('user.profile', compact('profile'));
    }
    public function profile_update()
    {
        $profile = Auth::user();
        return view('user.profile_update', compact('profile'));
    }


    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'birth_date' => $request->birth_date,
            'pancard' => $request->pancard,
            'state' => $request->state,
            'city' => $request->city,
            'bank_name' => $request->bank_name,
            'account_no' => $request->account_no,
            'ifsc_code' => $request->ifsc_code,
            'pincode' => $request->pincode,
            'address' => $request->address,
            'updated_at' => now()
        ]);


        return redirect('/profile')->with('success', 'Profile Updated Successfully !!');
    }



    public function logout(Request $request)
    {
        $request->session()->flush();
        AUth::logout();
        return redirect('/');
    }


    public function deleteAccount(Request $request)
    {
        try {
            User::where('id', Auth::user()->id)->delete();
            $request->session()->flush();
            Auth::logout();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }




}