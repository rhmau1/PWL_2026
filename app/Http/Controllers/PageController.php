<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function index()
    {
        return 'selamat datang';
    }
    public function about()
    {
        return '244107020069 - Fijriati Rahmatur Rizqi';
    }
    public function articles($id)
    {
        return 'halaman artikel dengan id: ' . $id;
    }
}
