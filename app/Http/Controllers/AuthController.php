<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\UserAcc;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function showLogin(Request $request)
    {
        Log::info('=== SHOW LOGIN METHOD CALLED ===');

        // Jika sudah login, redirect ke dashboard yang sesuai
        if (Auth::check()) {
            $user = Auth::user();
            Log::info('User already authenticated: ' . $user->email);

            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('home');
        }

        Log::info('Showing login view for guest user');

        return view('auth.login');
    }

    public function register(Request $request)
    {
        Log::info('Register attempt:', [
            'email' => $request->email,
            'name' => $request->name,
            'role' => $request->role
        ]);

        try {
            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users_acc,email',
                'password' => 'required|string|min:6',
                'password_confirmation' => 'required|string|min:6|same:password',
                'role' => 'required|string|in:user,admin',
            ], [
                'name.required' => 'Nama wajib diisi.',
                'email.required' => 'Email wajib diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah terdaftar.',
                'password.required' => 'Password wajib diisi.',
                'password.min' => 'Password minimal 6 karakter.',
                'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
                'password_confirmation.same' => 'Konfirmasi password tidak cocok.',
                'role.required' => 'Role wajib dipilih.',
                'role.in' => 'Role tidak valid.',
            ]);

            // Buat user baru
            $user = UserAcc::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
            ]);

            Log::info('User created successfully:', [
                'user_id' => $user->id,
                'email' => $user->email,
                'role' => $user->role
            ]);

            return redirect()->back()->with('success', "User {$user->name} berhasil ditambahkan dengan role {$user->role}!");

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed during registration', [
                'errors' => $e->errors()
            ]);

            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput($request->except(['password', 'password_confirmation']));

        } catch (\Exception $e) {
            Log::error('Registration failed with exception', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->withErrors(['error' => 'Gagal menambahkan user: ' . $e->getMessage()])
                ->withInput($request->except(['password', 'password_confirmation']));
        }
    }

    public function login(Request $request)
    {
        Log::info('=== LOGIN ATTEMPT START ===');
        Log::info('Request details:', [
            'email' => $request->email,
            'password_provided' => $request->password ? 'YES' : 'NO',
            'method' => $request->method(),
            'url' => $request->url(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        // Validasi input dengan pesan custom
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
        ]);

        Log::info('Validation passed');

        // Cek apakah user ada di database
        $user = UserAcc::where('email', $request->email)->first();
        if (!$user) {
            Log::warning('User not found in database:', ['email' => $request->email]);
            return back()->withErrors(['email' => 'Email tidak ditemukan di sistem.'])->withInput();
        }

        Log::info('User found in database:', [
            'id' => $user->id,
            'email' => $user->email,
            'role' => $user->role,
            'created_at' => $user->created_at,
            'password_hash_preview' => substr($user->password, 0, 20) . '...'
        ]);

        // Cek password secara manual untuk debugging
        $passwordCheck = Hash::check($request->password, $user->password);
        Log::info('Manual password check result: ' . ($passwordCheck ? 'PASS' : 'FAIL'));

        if (!$passwordCheck) {
            Log::warning('Password check failed for user: ' . $user->email);
            return back()->withErrors(['password' => 'Password yang Anda masukkan salah.'])->withInput($request->only('email'));
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        Log::info('Attempting Laravel Auth::attempt with credentials');

        // Attempt login
        if (Auth::attempt($credentials, $request->has('remember'))) {
            $authUser = Auth::user();
            Log::info('LOGIN SUCCESS:', [
                'user_id' => $authUser->id,
                'email' => $authUser->email,
                'role' => $authUser->role,
                'session_id' => session()->getId()
            ]);

            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Redirect berdasarkan role
            if ($authUser->isAdmin()) {
                Log::info('Redirecting admin to dashboard');
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Login berhasil sebagai Admin!');
            }

            Log::info('Redirecting user to home');
            return redirect()->intended(route('home'))
                ->with('success', 'Login berhasil!');
        }

        Log::error('AUTH ATTEMPT FAILED - Laravel Auth::attempt returned false');
        Log::info('Auth configuration debug:', [
            'default_guard' => config('auth.defaults.guard'),
            'provider' => config('auth.providers.users'),
            'model' => config('auth.providers.users.model'),
            'guards' => config('auth.guards')
        ]);

        return back()->withErrors([
            'email' => 'Login gagal. Periksa kembali email dan password Anda.'
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Log::info('=== LOGOUT ATTEMPT ===');

        if (Auth::check()) {
            Log::info('Logging out user: ' . Auth::user()->email);
        }

        // Logout user
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        Log::info('Logout successful');

        return redirect()->route('landing')->with('success', 'Anda telah berhasil logout.');
    }
}