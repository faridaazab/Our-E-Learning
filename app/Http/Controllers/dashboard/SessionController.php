<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = Session::get();
        return view('dashboard.sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:sessions',
            'description' => 'nullable',
             'course_id'=>'required|exists:sessions,id'
        ]);
        $request->merge(["create_user_id"=>auth()->user()->id]);
        Session::create($request->all());
        return redirect()->back()
            ->with('success', "Session \"" . $request['name'] . "\" created Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $session= Session::findOrFail($id);
        return view('dashboard.sessions.show',compact('session'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $session= Session::findOrFail($id);
        return view('dashboard.sessions.edit',compact('session'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|unique:sessions,name,'.$id,
            'description'=>'nullable',
            'course_id'=>'required|exists:sessions,id'
           ]);

           $request->merge(["update_user_id"=>auth()->user()->id]);
          $session=Session::findOrFail($id);
          $session->update($request->all());

           return redirect()->route('sessions.index')
           ->with('success', "Session \"" . $request['name'] . "\" created Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $session=Session::findOrFail($id);
        $session->delete();

        return redirect()->route('sessions.index')
        ->with('success','Session Deleted Successfully');
    }


    public function destroyALL()
    {
            $sessions =Session::all();
            foreach( $sessions as $session){
                $session->delete();
            }


            return redirect()->route('sessions.index')
            ->with('success','All the sessions has been deleted successfully');
    }
}


