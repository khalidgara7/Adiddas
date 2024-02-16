<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view("roles.index", compact("roles"));
    }

    public function addrole(){

        return view("roles.create");
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Role::class::create([
            'name' => $request->name,
            'created_at' => $request->created_at
        ]);
        return redirect('/roles');
    }

    public function deleteRole($id)
    {
        $roles = Role::find($id);
        $roles->delete();
        return redirect('/roles');
    }

    public function editRoles($id)
    {
        $role = Role::find($id);
        return view('roles.edit', compact('role'));
    }

    public function updateRoles(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->update();
        return redirect('/roles');
    }
}
