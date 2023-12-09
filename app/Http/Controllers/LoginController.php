<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index')->with('logout', 'Kamu berhasil logout!');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|exists:users,email',
            'password'  => 'required|min:5',
        ], [
            'email.exists' => 'Email tidak terdaftar di database.',
        ]);

        if ($validator->fails()) {
            return back()
            ->with('failed', $validator->errors()->first())
                ->withInput()
                ->withErrors($validator);
        }

        $data = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard.index')->with('success', 'Kamu berhasil login!');
        } else {
            return redirect()->route('login.index')->with('failed', 'Email atau kata sandi salah!');
        }
    }


    public function proses_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'status'    => 'required',
            'email'     => ['required', 'unique:users'],
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Akun gagal ditambahkan!')
                ->withInput()
                ->withErrors($validator);
        }

        User::create([
            'name' => $request->name,
            'status' => $request->status,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login.index')->with('success', 'Berhasil daftar akun!');
    }

    public function send_request_reset(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email'
        ]);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Gagal mengirim email!')
                ->withInput()
                ->withErrors($validator);
        }

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('reset_password', ['token' => $token, 'email' => $request->email]);
        $body = "Kami menerima permintaan untuk reset password pada <b>SIG Pulau Tikus</b> dengan email " . $request->email .
            ". Tekan link untuk reset password";

        Mail::send('email-forgot', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->from('noreply@example.com', 'SIG Pulau Tikus');
            $message->to($request->email, 'SIG Pulau Tikus')
                ->subject('Reset Password');
        });
        return back()->with('success', 'Berhasil mengirim request reset password!');
    }

    public function reset_password(Request $request, $token = null)
    {
        return view('auth.reset_password')->with(['token' => $token, 'email' => $request->email]);
    }

    public function update_password(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                ->with('failed', 'Gagal ubah password!')
                ->withInput()
                ->withErrors($validator);
        }

        $check_token = DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$check_token) {
            return back()->withInput()->with('failed', 'Invalid Email!');
        } else {

            User::where('email', $request->email)->update([
                'password' => Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            return redirect()->route('login')->with('success', 'Password berhasil direset!');
        }
    }
}
