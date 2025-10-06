<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        $templates = Template::orderBy('views', 'desc')->get();

        return view('dashboard', compact('templates'));
    }
}
