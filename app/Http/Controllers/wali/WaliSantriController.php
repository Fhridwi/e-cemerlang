<?php

namespace App\Http\Controllers\wali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WaliSantriController extends Controller
{
    public function index() {
        return view('wali.dashboard');
    }
}
