<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }
    public function performance()
    {
        return view('front.performance');
    }
    public function growth_fund()
    {
        return view('front.growth_fund_2');
    }
    public function about_us()
    {
        return view('front.about_us');
    }
    public function contact_us()
    {
        return view('front.contact_us');
    }
    public function cookies()
    {
        return view('front.rules.cookies');
    }
    public function terms()
    {
        return view('front.rules.terms');
    }
    public function privacy()
    {
        return view('front.rules.privacy');
    }
}
