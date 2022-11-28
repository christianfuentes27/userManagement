<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddlewareController extends Controller
{
    function __construct() {
        $this->middleware('verified')->except(['ruta2']);
        $this->middleware('auth')->only(['ruta2']);
    }
    
    function ruta1() {
        echo 'ruta1';
    }
    
    function ruta2() {
        echo 'ruta2';
    }
    
    function ruta3() {
        echo 'ruta3';
    }
}
