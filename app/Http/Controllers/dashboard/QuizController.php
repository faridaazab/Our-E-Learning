<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::get();
        return view('dashboard.quizzes.index', compact('quizzes'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->user_type=="admin"){
            return view('dashboard.quizzes.create');
        }
        return redirect()->route('quizzes.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'link' => 'required|unique:quizzes',
            'grades' => 'required'
        ]);

        Quiz::create($request->all());
        return redirect()->back()
            ->with('success', "Quiz \"" . $request['link'] . "\" created Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $quiz= Quiz::findOrFail($id);
        return view('dashboard.quizzes.show',compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        if(auth()->user()->user_type=='admin'){
            $quiz= Quiz::findOrFail($id);
        return view('dashboard.quizzes.edit',compact('quiz'));
        }
        return redirect()->route('quizzes.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'link'=>'required|unique:quizzes,name,'.$id,
            'grades'=>'required'
           ]);


          $quiz=Quiz::findOrFail($id);
          $quiz->update($request->all());

           return redirect()->route('quizzes.index')
           ->with('success', "Quiz \"" . $request['link'] . "\" created Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz=Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route('quizzes.index')
        ->with('success','Quiz Deleted Successfully');
    }


    public function destroyALL()
    {
            $quizzes =Quiz::all();
            foreach( $quizzes as $quiz){
                $quiz->delete();
            }


            return redirect()->route('quizzes.index')
            ->with('success','All the quizzes has been deleted successfully');
    }
    //softDelete
        // Recyle bin/Trash {view/blade}

        // restore(from trash.blade.php)

        // forceDelete(from trash.blade.php) --> default of laravel => forceDelete


        public function trash(){
            if(auth()->user()->user_type=="admin"){
            $quizzes = Quiz::onlyTrashed()->orderBy('id','desc')->get();
            $quizzes_count=$quizzes->count();
            return view('dashboard.quizzes.trash', compact('quizzes', 'quizzes_count'));
        }}

        public function restore(string $id){
        if(auth()->user()->user_type=="admin"){
            $quiz = Quiz::withTrashed()->find($id);
            $quiz->restore();
            return redirect()->back()
            ->with ('success',"Quiz \"$quiz->name\" has been restored successfully");
        }
        }

        public function forceDelete(string $id){
            $quiz=Quiz::where('id',$id);
            $quiz->forceDelete();
            return redirect()->back();
        }


}

