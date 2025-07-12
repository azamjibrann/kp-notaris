<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* ============================================================
     *  1.  FORM (satu file, dua mode)
     * ============================================================
    */
    /**
     * Tampilkan halaman auth.blade.php
     * @param  string $mode  'login' | 'register'
     */
    public function authPage(string $mode = 'login')
    {
        // fallback jika mode aneh
        if (! in_array($mode, ['login', 'register'])) {
            $mode = 'login';
        }

        /*  View: resources/views/auth/auth.blade.php
         *  berisi dua form, CSS‑JS Anda yang men‑toggle panel
         */
        return view('login', compact('mode'));
    }

    /* ============================================================
     *  2.  REGISTRASI
     * ============================================================
    */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:4|max:25|unique:users,username',
            'email'    => 'nullable|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        // dd($validated);

        $user = User::create([
            'username' => $validated['username'],
            'email'    => $validated['email'] ?? null,
            'password' => Hash::make($validated['password']), // WAJIB pakai Hash
        ]);

        return redirect()->route('login.form')
                         ->with('success', 'Registrasi berhasil, silakan login.');

        // return redirect()->intended('dashboard');
    }

    /* ============================================================
     *  3.  LOGIN
     * ============================================================
    */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $field = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $field     => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()
            ->withErrors(['username' => 'Kredensial salah'])
            ->onlyInput('username');
    }

    /* ============================================================
     *  4.  LOGOUT
     * ============================================================
    */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.form');
    }
}
