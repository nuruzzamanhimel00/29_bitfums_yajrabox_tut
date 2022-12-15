<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;

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
        // $users = User::get();
        return view('home');
        // return view('home',compact('users'));
    }

    public function getUsers(Request $request){
        return Datatables::of(User::query())
        // ->setRowClass(function ($user) {
        //     return $user->id % 2 == 0 ? 'text-success' : 'text-danger';
        // })
        ->setRowClass('{{ $id % 2 == 0 ? "text-success" : "text-danger" }}')
        ->setRowId(function ($user) {
            return "user_".$user->id;
        })
        ->setRowAttr([
            'align' => 'center',
        ])
        ->make(true);
    }
}
