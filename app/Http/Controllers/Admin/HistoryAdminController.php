<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoryAdmin;

class HistoryAdminController extends Controller
{
    public function index()
    {
        $history = HistoryAdmin::latest()->paginate(10);
        return view('admin.history.index', compact('history'));
    }
}
