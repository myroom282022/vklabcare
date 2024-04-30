<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class AdminFeedbackController extends Controller
{
    // show all data -------------------
    public function index(){
        $slider= Feedback::with('feedbackData')->latest()->paginate(10);
        return view('admins.feedback.index',compact('slider'));
    } 
    // show all data -------------------
    public function create(){
        return view('admins.feedback.create');
    } 
    // store and update funcinality data ---------------------
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'title' => 'required',
            'review' => ['required', 'numeric', 'between:0,5'],
            'description' => 'required|min:10'
        ]);
        
        $details = [
             'title' => $request->title,
             'review' => $request->review, 
             'description' => $request->description, 
             'user_id' => auth()->user()->id ?? '', 
        ];
        if($request->id){
            $data= Feedback::where('id',$request->id)->update($details);      
            return redirect()->route('feedback.index')->withSuccess('Feedback updated successfully');
        }else{
            $data= Feedback::create($details);      
            return redirect()->route('feedback.index')->withSuccess('Feedback Add successfully');
        }
    } 

    // edit function--------------------------
    public function edit($id){    
        $slider = Feedback::findOrFail($id);
        return view('admins.feedback.edit',compact('slider'));
    }

    // delete funconality --------------------------
    public function destroy($id) {
        $data = Feedback::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('Feedback Deleted successfully');
    }
}
