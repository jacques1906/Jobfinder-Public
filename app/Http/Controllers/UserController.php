<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Listing;



class UserController extends Controller
{
    public function index(): View
    {
        $users = User::paginate();
        $listings = Listing::all();
    
        $company = Listing::query();
        if (request('company')) {
            $company->where('company', 'like', '%' . request('company') . '%');
            session(['company_search' => request('company')]);
        } else {
            session()->forget('company_search');
        }
        
        $listings = $company->orderBy('id', 'DESC')->paginate(10);
        
        $students = User::query();
        if (request('student')) {
            $students->where('role', 'Student')->where('name', 'like', '%' . request('student') . '%');
            session(['student_search' => request('student')]);
        } else {
            session()->forget('student_search');
        }
        
        $students = $students->orderBy('id', 'DESC')->paginate(10);
        
        return view('users.index', compact('users', 'listings', 'students'))
            ->with('company_search', request('company'))
            ->with('student_search', request('student'));
        
    }
    
}

