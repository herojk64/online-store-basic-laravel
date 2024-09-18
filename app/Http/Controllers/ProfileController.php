<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => 'nullable|min:8|confirmed', // Ensure password is at least 8 characters and matches confirmation
        ]);

        $user = Auth::user();
        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($request->input('password')),
            ]);
        }

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }

    public function dashboard()
    {
        $orders = Order::where('user_id', Auth::id())->get();

        return view('profile.dashboard', compact('orders'));
    }
}
