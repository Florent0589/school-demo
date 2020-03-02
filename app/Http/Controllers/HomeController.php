<?php

namespace App\Http\Controllers;

use App\Role;
use App\Student;
use App\StudentGurdain;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \Auth::user();

        $students = Student::whereIn('status_id', [1,2])->count();
        $guardian = StudentGurdain::whereIn('status_id', [1,2])->count();
        $tutors   = User::where('role_id', Role::GURDIAN)->whereIn('status_id', [1,2])->count();

        return view('home', compact('students', 'guardian', 'tutors'));
    }
}
