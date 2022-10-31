<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('users.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($request->only('login', 'password')))
        {
            $request->session()->regenerate();
            return redirect()->route('/');
        }
        return back()->with(['errorLogin' => 'Неверный логин или пароль']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function adminView()
    {
        return view('users.admin');
    }

    public function registration()
    {
        $roles = Roles::all();
        $groups = Groups::all();
        return view('users.registration', compact('roles', 'groups'));
    }

    public function registrationPost(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:users',
            'login'=>'required|unique:users',
            'password'=>'required|confirmed',
            'role_id' => 'required',
        ]);
        if($request->role_id != 2)
        {
            $request->merge(['group_id' => null]);
        }
        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('admin')->with(['success' => 'Пользователь зарегистрирован']);
    }

    public function studentList()
    {
        $students = User::where('role_id', 2)->get();
        return view('users.students_list', compact('students'));
    }
    public function teacherList()
    {
        $teachers = User::whereBetween('role_id', [3, 4])->get();
        return view('users.teacher_list', compact('teachers'));
    }

    public function deleteUser(User $user)
    {
        if(Auth::user()->role_id == 1){
            return view('users.delete_user', compact('user'));
        }
        return redirect()->route('/');
    }

    public function deleteUserPost(User $user)
    {
        $user->delete();
        return redirect()->route('admin');
    }
}
