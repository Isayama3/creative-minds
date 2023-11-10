<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User as Model;
use App\Http\Requests\Web\User\AuthRequest as FormRequest;
use Core\User\User\Requests\Web\AuthRequest;

class AuthController extends Controller
{
    public function __construct(FormRequest $request, Model $model)
    {
        parent::__construct(
            $request,
            $model,
        );
    }

    public function loginView()
    {
        return view($this->path . __FUNCTION__);
    }

    public function loginPost()
    {
        $credentials = [
            'email' => $this->request->input('email'),
            'password' => $this->request->input('password'),
        ];


        if (Auth::guard('user')->attempt($credentials))
            return redirect(route('user.home'));

        return back()->withInput()->withErrors(['email' => 'خطأ في البريد الإلكتروني أو كلمة المرور']);
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();

        $request->session()->invalidate();

        $request->session()->regenerate();

        return redirect(route('user.login.form'));
    }
}
