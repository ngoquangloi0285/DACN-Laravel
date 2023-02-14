<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public $email;

    public function register()
    {
        $data['title'] = 'Sign Up';
        return view('auth/register', $data);
    }
    public function register_action(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'name' => 'required|unique:nql_user',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User([
            'fullname' => $request->fullname,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->status = '1';
        $user->gender = 'Male';
        $user->save();
        return redirect()->route('auth.login')->with('success', 'Registration Success. Please Login!');
    }
    public function login()
    {
        $data['title'] = 'Login';
        return view('auth/login', $data);
    }
    public function login_action(Request $request)
    {
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $arr_login = [
                'email' => $request->username,
                'password' => $request->password,
            ];
        } else {
            $arr_login = [
                'name' => $request->username,
                'password' => $request->password,
            ];
        }
        if (Auth::attempt($arr_login)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return redirect()->route("auth.login")->with('danger', 'Wrong user name or email or password!');
    }
    public function password()
    {
        $data['title'] = 'Change Password';
        return view('auth/changepassword', $data);
    }
    public function password_action(Request $request)
    {
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        $request->session()->regenerate();
        return redirect()->route('auth.login')->with('success', 'Password changed!');
    }
    // forgot password
    public function forgot_form()
    {
        $data['title'] = 'Change Password';
        return view('auth/forgotpassword', $data);
    }
    public function forgot_action(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:nql_user,email',
        ], [
            'email.required' => 'The :attribute is required',
            'email.email' => 'Invalid email address',
            'email.exists' => 'The :attribute is not resgister',
        ]);

        $token = base64_encode(Str::random(64));
        DB::table('password_resets')->insert(
            [
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]
        );
        $user = User::where('email', $request->email)->first();
        // dd($user);
        $link = route('auth.forgot_form', ['token' => $token, 'email' => $request->email]);
        $message = '<h1>Quên mật khẩu!</h1>';
        $message .= '<p>Đừng lo, bạn có thể đặt lại mật khẩu bằng cách nhấp vào đường liên kết bên dưới:!</p>';
        $message .= '<a href="' . $link . '" 
        style="color: text-decoration: none;
        color: #1ed760;
        padding: 10px 0;
        font-weight: 400;
        font-size: 21px;
        cursor: pointer;
        ">Đặt lại mật khẩu</a>';
        $message .= '<p>Tên người dùng của bạn là: '.$user->name.'</p>';
        $message .= '<p>Nếu bạn không yêu cầu đặt lại mật khẩu cho thiết bị, hãy xóa email này và tiếp tục!</p>';
        $message .= '<p>Trận trọng!</p>';
        $data = array(
            'name' => $user->fullname,
            'message' => $message,
        );
        Mail::send('forgot-email--template', $data, function ($message) use ($user) {
            $message->from("no-reply@spotify.com", "ALTT");
            $message->to($user->email, $user->fullname)->subject('Đặt lại mật khẩu');
        });
        $request->email = null;
        session()->flash('success', 'Chúng tối có gửi email link đặt lại mật khẩu của bạn!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    // admin login
    public function adminlogin()
    {
        $data['title'] = 'Login Admin';
        return view('auth/adminlogin', $data);
    }
    public function adminlogin_action(Request $request)
    {
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $arr_login = [
                'email' => $request->username,
                'password' => $request->password,
                'role' => '1',
            ];
        } else {
            $arr_login = [
                'name' => $request->username,
                'password' => $request->password,
                'role' => '1',
            ];
        }
        if (Auth::attempt($arr_login)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }
        echo '<h3 class="alert alert-danger">Rất tiếc .Bạn không có quyền truy cập vào trang này! Ngưng cố gắng</h3>';
        return view('backend/404');
    }
}
