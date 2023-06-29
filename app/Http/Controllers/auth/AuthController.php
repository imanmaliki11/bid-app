<?php

namespace App\Http\Controllers\auth;

use App\Mail\RegistrationVerification;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public static function helper_random($length = 20) {
        $allChar = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lengthAllChar = strlen($allChar);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $allChar[random_int(0, $lengthAllChar - 1)];
        }
        return $randomString;
    }

    public function index() {
        return view('auth.login');
    }

    public function register() {
        return view('auth.register');
    }

    public function login(Request $request) {
        if(Auth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ])) {
            return redirect()->to('/');
        } else {
            echo "Invalid credentials";
        }
    }

    // Store regsitration data to database
    public function save(Request $request) {
        $request->validate([
            "name" => 'required|min:3|max:30',
            "email" => 'required|email:dns|unique:users,email',
            "password" => 'required|min:8|max:20|confirmed',
            "password_confirmation" => 'required|min:8|max:20',
        ], $request->all());

        $data = $request->all();
        $data["email_token_validation"] = $this->helper_random();
        $data["password"] = Hash::make($request->password);
        $user = User::create($data);
        Mail::to($user->email)
            ->send(new RegistrationVerification($user->email_token_validation . encrypt($user->email)));
        return redirect()->route('login');
    }

    public function validate_email($code) {
        try {
            $db_code = substr($code, 0, 20);
            $email_code = substr($code, 20, strlen($code) - 20);
            $decrypt_email = decrypt($email_code);

            $user = User::where(['email' => $decrypt_email,
                                 'email_token_validation' => $db_code]
                                )->first();
            if(!$user) {
                echo "Invalide code";
                return;
            }

            $user->email_verified_at = Carbon::now();
            $user->save();

            return redirect()->route('login');
        } catch (\Throwable $t) {
            echo "Invalid code";
        }
    }
}
