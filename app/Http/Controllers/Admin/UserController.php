<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormSubmission;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $data = User::with('roles')->select('id','name','email','last_logged_in');
        $search = $request->input('search');
        if($search)
        {
            $data->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%');
        }
        $data = $data->paginate(30);
        return view('admin.users.index',[
            'title' => 'Admin Users',
            'breadcrumbs' => [
                ['label' => 'Admin Users', 'route_name' => 'admin.users.index']
            ],
            'data' => $data,
            'search' => $search
        ]);
    }

    public function create()
    {
        return view('admin.users.create',[
            'title' => 'Create User',
            'breadcrumbs' => [
                ['label' => 'Admin Users', 'route_name' => 'admin.users.index'],
                ['label' => 'Edit', 'route_name' => 'admin.users.index']
            ],
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required'
        ]);

        $user = new User($request->only(['name','email']));
        $user->password = Hash::make($request->input('password'));
        $user->assignRole($request->input('role'));
        $user->save();
        return Response::redirectToRoute('admin.users.index')->with('success','User Created Successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit',[
            'user' => $user,
            'title' => 'Edit: '.$user->name,
            'breadcrumbs' => [
                ['label' => 'Admin Users', 'route_name' => 'admin.users.index'],
                ['label' => 'Edit', 'route_name' => 'admin.users.index']
            ],
        ]);
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required'
        ]);
        $user = User::find($id);
        $user->fill($request->only(['name','email']));
        $user->syncRoles([$request->input('role')]);
        $user->save();
        return Response::redirectToRoute('admin.users.index')->with('success','User Updated Successfully');
    }

    public function changePassword(Request $request,$id)
    {
        $user = User::find($id);
        if($request->input('password')) {
            $user->password = Hash::make($request->input('password'));
            $user->save();
        }
        return Response::redirectToRoute('admin.users.index')->with('success','User Password Changed Successfully');
    }

    public function destroy($id) {
        $authUser = User::find(Auth::user()->id);
        $user = User::find($id);
        if($authUser->id == $user->id) {
            return Response::redirectToRoute('admin.users.index')->with('danger','You cannot delete yourself');
        }
        if($authUser->hasRole('super_admin')) {
            $user->delete();
            return Response::redirectToRoute('admin.users.index')->with('info','User deleted Successfully');
        }
        return Response::redirectToRoute('admin.users.index')->with('danger','Does not have permisssion');
    }
}
