<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller {
    public function showLogin() {
        if (session('user_id')) return redirect()->route('kegiatan.index');
        return view('auth.login');
    }
    public function login(Request $request) {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $user = DB::table('users')->where('username', $request->username)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id, 'username' => $user->username]);
            return redirect()->route('kegiatan.index')->with('success', 'Selamat datang, ' . $user->username . '!');
        }
        return back()->withInput()->with('error', 'Username atau password salah!');
    }
    public function logout() {
        session()->flush();
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
