<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(){
        $title = "Dashboard Petufas";
        return view("petugas.dashboard",compact('title'));
    }
}
