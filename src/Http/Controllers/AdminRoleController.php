<?php

namespace App\Http\Controllers\Admin;

use Ramiawadallah\Multiauth\Model\Role;
use Illuminate\Routing\Controller;
use Ramiawadallah\Multiauth\Model\Admin;

class AdminRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:super');
    }

    public function attach(Admin $admin, Role $role)
    {
        $admin->roles()->attach($role->id);

        return redirect()->back();
    }

    public function detach(Admin $admin, Role $role)
    {
        $admin->roles()->detach($role->id);

        return redirect()->back();
    }
}
