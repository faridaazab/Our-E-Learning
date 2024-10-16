<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;
use App\Models\Category as Cat;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Cat::get();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(auth()->user()->user_type=="admin"){
            return view('dashboard.categories.create');
        }
        return redirect()->route('categories.index');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'nullable',
            'smallDescription' => 'nullable',
        ]);
        // register the user automatic
        $request->merge(["create_user_id" => auth()->user()->id]);
        Cat::create($request->all());
        return redirect()->back()
            ->with('success', "Category \"" . $request['name'] . "\" created Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category= Cat::findOrFail($id);
        return view('dashboard.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        if(auth()->user()->user_type=='admin'){
            $category= Cat::findOrFail($id);
        return view('dashboard.categories.edit',compact('category'));
        }
        return redirect()->route('categories.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|unique:categories,name,'.$id,
            'description'=>'nullable',
            'smallDescription' => 'nullable'
           ]);

           $request->merge(["update_user_id" => auth()->user()->id]);
            $category=Cat::findOrFail($id);
          $category->update($request->all());
           return redirect()->route('categories.index')
           ->with('success', "Category \"" . $request['name'] . "\" created Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category=Cat::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')
        ->with('success','Category Deleted Successfully');
    }


    public function destroyALL()
    {
            $categories =Cat::all();
            foreach( $categories as $category){
                $category->delete();
            }


            return redirect()->route('categories.index')
            ->with('success','All the categories has been deleted successfully');
    }
    //softDelete
        // Recycle bin/Trash {view/blade}

        // restore(from trash.blade.php)

        // forceDelete(from trash.blade.php) --> default of laravel => forceDelete


        public function trash(){
            if(auth()->user()->user_type=="admin"){
            $categories = Cat::onlyTrashed()->orderBy('id','desc')->get();
            $categories_count=$categories->count();
            return view('dashboard.categories.trash', compact('categories', 'categories_count'));
        }}

        public function restore(string $id){
        if(auth()->user()->user_type=="admin"){
            $category = Cat::withTrashed()->find($id);
            $category->restore();
            return redirect()->back()
            ->with ('success',"Category \"$category->name\" has been restored successfully");
        }
        }

        public function forceDelete(string $id){
            $category=Cat::where('id',$id);
            $category->forceDelete();
            return redirect()->back();
        }


}

