<?php

namespace App\Http\Controllers\student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class studentController extends Controller
{
    public function showDashboard(){
        $current_student = Auth::user();
        dd ($current_student);
    }
}

