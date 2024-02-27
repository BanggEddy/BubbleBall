<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function show()
    {
        $admin = Auth::user();

        return view('admin.profil.index', compact('admin'));
    }
}
