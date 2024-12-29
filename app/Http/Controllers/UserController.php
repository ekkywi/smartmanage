<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->save();

        return redirect()->route('user')->with('success', 'Data user berhasil diupdate');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->delete();
            return redirect()->route('user')->with('success', 'Data user berhasil dihapus');
        }
        return redirect()->route('user.index')->with('error', 'Data user tidak ditemukan');
    }
}
