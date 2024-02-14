<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("users.index", compact("users"));
    }

    public function adduser(){

        return view("users.create");
    }

     public function create(Request $request)
     {
         $request->validate([
             'name' => 'required',
             'email' => 'required',
         ]);

         User::class::create([
             'name' => $request->name,
             'email' => $request->email
         ]);
         return redirect('/users');
     }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/users');
    }

    public function editUsers($id)
    {
       /* $roles=Role::all();*/
        $user = User::find($id);
        return view('Users.edit', compact('user',/*'roles'*/));
    }

    public function updateUsers(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
//            'role_id' => 'required',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
//        $user->id_role = $request->role_id;
        $user->update();

        return redirect('/users');
    }
}
