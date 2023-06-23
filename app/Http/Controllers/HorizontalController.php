<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class HorizontalController extends Controller
{
    public function index()
    {
        return Inertia::render('Horizontal/Index');
    }
}
