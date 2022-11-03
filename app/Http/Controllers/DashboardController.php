<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Job;
use App\Models\Recruiter;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $job = Job::count();
        $recruiter = Recruiter::count();
          
        return view('dashboard',compact('user','job','recruiter'));
    }
         
    }

