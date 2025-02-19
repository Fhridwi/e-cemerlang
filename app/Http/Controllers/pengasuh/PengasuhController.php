<?php

namespace App\Http\Controllers\pengasuh;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengasuhController extends Controller
{
    public function index() {
        return view('pengasuh.dashboard');
    }
}
