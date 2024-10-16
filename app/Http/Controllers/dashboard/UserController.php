<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use App\Models\User ;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('dashboard.users.indexes.all-users-index', compact('users'));
    }

    public function StudentsIndex()
    {
        $students = User::where('user_type','student')->get();
        $students_count =$students->count();
        return view('dashboard.users.indexes.students-index', compact('students'));
    }

    public function InstructorsIndex()
    {
        $instructors = User::where('user_type','instructor')->get();
        $instructors_count =$instructors->count();
        return view('dashboard.users.indexes.instructors-index', compact('instructors'));
    }

    public function AdminsIndex()
    {
        $admins = User::where('user_type','admin')->get();
        $admins_count =$admins->count();
        return view('dashboard.users.indexes.admins-index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $rules=[
            'username'      =>'required|unique:users',
            'email'         =>'required|unique:users',
            'user_type'     =>'required'
        ];
        if(auth()->user()->user_type=="admin"){
            $rules['user_type'].='|in:student,instructor, admin';
        }
        elseif(auth()->user()->user_type=="instructor"){
            $rules['user_type'].='|in:student';
        }
        else{
            return abort(403);
        }

        $request->validate($rules);

        $request->merge([
            'password' => $rules['username'] . bcrypt("123456789"),
        ]);

        User::create($request->all());
        return redirect()->back()
        ->with('success', "User \"" . $request['username'] . "\" created Successfully.");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user= User::findOrFail($id);
        return view('dashboard.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $user= User::findOrFail($id);
        if(auth()->user()->id == $user->id || auth()->user()->user_type == 'admin' && $user->user_type != 'admin'){
            return view('dashboard.users.edit',compact('user'));
        }
        elseif(auth()->user()->user_type == 'admin' && $user->user_type == 'admin' && auth()->user()->id != $user->id){
            return redirect()->back()
            ->with ('unauthorized_action','You are unauthorized to do this action');
        }
        else{
            //auth()->user()->id --> means return to the edit page of him
            return redirect()->route('users.edit', auth()->user()->id);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user= User::findOrFail($id);
        $rules=[
            'username'  =>'required|unique:users,username,'.$id,
            'email'     =>'required|unique:users,email,'.$id,
            'user_type' =>'required'
        ];
        if(auth()->user()->user_type=="admin"){
            $rules['user_type'].='|in:student,instructor,admin';
        }
        elseif(auth()->user()->user_type=="instructor"){
            $rules['user_type'].='|in:student';
        }
        else{
            return abort(403);
        }

        $request->validate($rules);
        if($request->has('password')){
            $request->merge([
            'password' => $rules['username'] . bcrypt("123456789"),
            ]);
        }
        $user->update($request->all());
        return redirect()->route('users.index')
        ->with('success', "User \"" . $request['username'] . "\" updated Successfully.");
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::findOrFail($id);
        if(auth()->user()->user_type=='admin' && $user->user_type != 'admin' && auth()->user()->id != $user->id)
        {$user->delete();
          return redirect()->route('users.index')
        ->with('success','User Deleted Successfully');
        }
        return redirect()->back()
        ->with('unauthorized_action','You are unauthorized to do this action');
    }
}

