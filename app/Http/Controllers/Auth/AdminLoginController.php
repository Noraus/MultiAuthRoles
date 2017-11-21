<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admins');
    }

    public function showLoginForm() {
        return view('auth.admin-login');
    }

    public function login(Request $request) {
        //validar
        $this->validate($request, [
            'key' => 'required|min:8',
            'password' => 'required|min:6'
        ]);
        //intentar login
        if (Auth::guard('admins')->attempt(['key' => $request->key, 'password' => $request->password])) {
            //si se conecta, redirigir a donde sea necesario
            return redirect()->intended(route('admin.dashboard'));
        }

        //si no se conecta, redirigir a login
        return redirect()->back()->withInput($request->only('key', 'remember'));
    }

}
