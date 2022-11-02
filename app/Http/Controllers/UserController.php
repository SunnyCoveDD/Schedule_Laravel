<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\Pairs;
use App\Models\Roles;
use App\Models\User;
use DateTime;
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
        $pairs = Pairs::all();
        $groups = Groups::all();
        $group_sel = null;
        return view('pairs.pairs_list', compact('pairs', 'groups', 'group_sel'));
    }
    public function adminViewPost(Request $request)
    {
        $pairs = Pairs::all();
        $groups = Groups::all();
        $group_sel = $request->group_id;
        return view('pairs.pairs_list', compact('pairs', 'groups', 'group_sel'));
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

    public function editUser(User $user)
    {
        $roles = Roles::all();
        $roleUser = Roles::find($user->role_id);
        $groups = Groups::all();
        if(Auth::user()->role_id == 1){
            if($user->role_id == 2){
                $groupUser = Groups::find($user->group_id);
                return view('users.edit_user', compact('user', 'roles', 'groups', 'groupUser', 'roleUser'));
            }
            return view('users.edit_user', compact('user', 'roles', 'groups', 'roleUser'));
        }
    }

    public function editUserPost(Request $request, User $user)
    {
        if($request->role_id != 2)
        {
            $request->merge(['group_id' => null]);
        }
        $user->name = $request->input('name');
        $user->login = $request->input('login');
        $user->group_id = $request->input('group_id');
        $user->role_id = $request->input('role_id');
        $user->save();
        return redirect()->route('admin');
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
        $pairs = Pairs::all();
        foreach($pairs as $pair){
            if($pair->user_id == $user->id){
                return back()->with(['errorDelete' => 'У преподавателя есть пары. Для удаления пользователя измените/удалите пары с ним']);
            }
        }
        $user->delete();
        return redirect()->route('admin');

    }

    public function mySchedule()
    {
        $user = User::all();
        $pairs = Pairs::all();
        $groups = Groups::all();
        $userSel = null;
        foreach ($user as $us){
            if($us->id == Auth::id()){
                $userSel = $us->group_id;
            }
        }
        $myGroups = null;
        foreach ($groups as $group){
            if($group->id == $userSel){
                $myGroups = $group->id;
            }
        }
        return view('users.students_schedule', compact('pairs', 'groups', 'myGroups'));
    }

    public function noAccess()
    {
        return view('noaccess');
    }
}
