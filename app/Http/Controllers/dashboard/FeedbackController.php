<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::get();
        return view('dashboard.feedbacks.index', compact('feedbacks'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('dashboard.feedbacks.show',compact('feedback'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $feedback=Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->route('feedbacks.index')
        ->with('success','Feedback Deleted Successfully');
    }


    public function destroyALL()
    {
            $feedbacks =Feedback::all();
            foreach( $feedbacks as $feedback){
                $feedback->delete();
            }
            return redirect()->route('feedbacks.index')
            ->with('success','All the feedbacks has been deleted successfully');
    }
}
