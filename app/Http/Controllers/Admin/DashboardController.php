<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $metaTitle = 'Halaman Dashboard';
        return view('pages.admin.dashboard', compact('metaTitle'));
    }
}
