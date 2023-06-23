<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class WatermarkController extends Controller
{
    public function index()
    {
        return Inertia::render('Watermark/Index');
    }
}
