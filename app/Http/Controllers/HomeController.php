<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
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
        if(\Auth::user()->hasRole('student')){
            $studentId = Student::where('user_id', \Auth::id())->pluck('id')->first();
            $student = Student::with(['user', 'courses','road_tests', 'fees'])->find($studentId);
            return view('modules.students.view', compact('student'));
        }
        return view('welcome');
    }
}
