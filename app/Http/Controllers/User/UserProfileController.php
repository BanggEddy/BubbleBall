<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    /**     
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();

        return view('users.profil.index', compact('user'));
    }
}
