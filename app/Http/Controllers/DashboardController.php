<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view("dashboard");
    }

    public function store(Request $request): void
    {
        dd($request);
    }
}

