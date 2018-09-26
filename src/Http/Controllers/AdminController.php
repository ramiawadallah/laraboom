<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Model\Admin;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }

    public function index()
    {
        return view('admin.admin.home');
    }

    public function show()
    {
        $admins = Admin::where('id', '!=', 1)->get();

        return view('admin.admin.show', compact('admins'));
    }
}
