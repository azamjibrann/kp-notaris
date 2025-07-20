<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /* ============================================================
     *  1.  FORM LOGIN / REGISTER (1 File, 2 Mode)
     * ============================================================
    */
    public function authPage(string $mode = 'login')
    {
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user()->role);
        }

        if (!in_array($mode, ['login', 'register'])) {
            $mode = 'login';
        }

        return response()
            ->view('login', compact('mode'))
            ->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma', 'no-cache')
            ->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT');
    }

    /* ============================================================
     *  2.  REGISTRASI (role user default)
     * ============================================================
    */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:4|max:25|unique:users,username',
            'email'    => 'nullable|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'username' => $validated['username'],
            'email'    => $validated['email'] ?? null,
            'password' => Hash::make($validated['password']),
            'role'     => 'user', // default role user
        ]);

        return redirect()->route('login.form')
                         ->with('success', 'Registrasi berhasil, silakan login.');
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

            return $this->redirectByRole(Auth::user()->role);
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

    /* ============================================================
     *  5.  REDIRECT SESUAI ROLE
     * ============================================================
    */
    protected function redirectByRole($role)
    {
        return match ($role) {
            'admin' => redirect()->route('admin.dashboard'),
            'user'  => redirect()->route('user.dashboard'),
            default => redirect('/'), // fallback jika role tidak dikenali
        };
    }
}
