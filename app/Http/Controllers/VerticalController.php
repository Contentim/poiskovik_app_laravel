<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class VerticalController extends Controller
{
    public function index()
    {
        return Inertia::render('Vertical/Index');
    }
}
