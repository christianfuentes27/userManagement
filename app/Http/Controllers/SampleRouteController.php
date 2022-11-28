<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleRouteController extends Controller
{
    function guest() {
        return view('sampleroute.guest');
    }
    
    function logged() {
        return view('sampleroute.logged');
    }
    
    function verified() {
        return view('sampleroute.verified');
    }
    
    function public() {
        return view('sampleroute.public');
    }
    
    function sensitive() {
        return view('sampleroute.sensitive');
    }
}
