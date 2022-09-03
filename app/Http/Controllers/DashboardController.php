<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

      $groups_count = Group::count();
      $employees_count  = Employee::count();
        return view('dashboard',['groups_count'=>$groups_count,'employees_count'=>$employees_count]);
    }
}
