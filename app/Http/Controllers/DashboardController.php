<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aset;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userCount = User::count();
        $asetCount = Aset::count();

        return view('dashboard', compact('userCount', 'asetCount'));
    }
}
