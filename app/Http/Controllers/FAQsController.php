<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FAQsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:student');
        $this->middleware('check_condition');
    }

    public function index() {
        return view('faqs');
    }
}
