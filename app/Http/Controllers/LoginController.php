<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->route('home')->with('message', 'Berhasil Login!');
        }
        return back()->with('error', 'gagal login!');
    }

    public function login()
    {
        $user = Auth::user();
        return view('components.index', compact('user'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('message', 'Berhasil Logout!');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('components.users-profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nik' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'ttd' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('images'), $imageName);
            $user->foto = $imageName;
        }

        if ($request->hasFile('ttd')) {
            $ttdName = time() . '_ttd.' . $request->ttd->extension();
            $request->ttd->move(public_path('images'), $ttdName);
            $user->ttd = $ttdName;
        }

        $user->nik = $request->nik;
        $user->name = $request->name;
        $user->username = $request->username;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('home')->with('success', 'Profile updated successfully.');
    }
}
