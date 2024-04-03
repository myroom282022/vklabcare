<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use File;

class SliderController extends Controller
{
    // show all data -------------------
    public function index()
    {
       $slider= Slider::latest()->paginate(10);
        return view('admins.slider.index',compact('slider'));
    } 
    // show all data -------------------
    public function create()
    {
        return view('admins.slider.create');
    } 
    // store and update funcinality data ---------------------
    public function store(Request $request)
    {  
        if(empty($request->id)){

            $validatedData= request()->validate([
                'slider_image'  =>  'required|image|mimes:jpg,png,jpeg',
            ],[
                'slider_image.required'    =>  'Please upload images ',
                'slider_image.mimes'    =>  'Please upload images only  jpg png jpeg',
            ]);
        }else{
            $validatedData= request()->validate([
                'slider_image'  =>  'mimes:jpg,png,jpeg',
            ],[
                'slider_image.mimes'    =>  'Please upload images only  jpg png jpeg',
            ]);
        }
        $details = [
             'title' => $request->title,
             'description' => $request->description, 
        ];
        
        if ($files = $request->file('slider_image')) {
            //delete old file
            if($request->id){
                $data = Slider::findOrFail($request->id);
                $destinationPath = 'public/storage/slider/img/'.$data->slider_image;
                if(File::exists($destinationPath)){
                    File::delete($destinationPath);
                }
            }
            $fileName = rand(0000,9999).time().'.'.$files->extension();  
            $path = 'public/storage/slider/img';
            $request->slider_image->move($path, $fileName);
            $details['slider_image'] = "$fileName";
        } 
        if($request->id){
            $data= Slider::where('id',$request->id)->update($details);      
            return redirect()->route('slider.index')->withSuccess('slider updated successfully');
        }else{
            $data= Slider::create($details);      
            return redirect()->route('slider.index')->withSuccess('slider Add successfully');
        }
    } 

    // edit function--------------------------
    public function edit($id)
    {    
        $slider = Slider::findOrFail($id);
        return view('admins.slider.edit',compact('slider'));

    }
     // store and update funcinality data ---------------------
    //  public function update(Request $request)
    //  {  
    //      $id=$request->id;
    //       $user = User::find($id);
    //      $validatedData= request()->validate([
    //          'name'          =>  'required',
    //          'email' => ['required',Rule::unique('users')->ignore($user->id)],
    //          'phone_number'  =>  'required|numeric|digits:10',
    //          'password'      =>  'required|min:6',
    //     ],[
    //          'name.required'         =>  'Please enter your name',
    //          'password.required'     =>  'Please enter your password',
    //          'password.required'     =>  'Please enter 6 digits password',
    //          'email.required'        =>  'Please enter your email',
    //          'email.email'           =>  'Please enter valid email',
    //          'email.unique'          =>  'This email is already exits',
    //          'phone_number.required' =>  'Please enter your phone number',
    //          'phone_number.min' =>  'Please enter 10 digites  phone number',
 
 
    //      ]);

    //      $details = [
    //           'name' => $request->name,
    //           'email' => $request->email, 
    //           'phone_number' => $request->phone_number,
    //      ];
  
    //      if ($files = $request->file('user_image')) {
    //         //delete old file
    //          if($request->id){
    //              $data = User::findOrFail($request->id);
    //              $destinationPath = 'public/storage/users/img/'.$data->user_image;
    //              if(File::exists($destinationPath)){
    //                  File::delete($destinationPath);
    //              }
    //          }
    //          //insert new file
    //          $fileName = rand(0000,9999).time().'.'.$files->extension();  
    //          $path = 'public/storage/users/img';
    //          $request->user_image->move($path, $fileName);
    //          $details['user_image'] = "$fileName";
    //      } 
    //      User::where('id',$id)->update($details);      
    //      return redirect()->route('users.index')->with('Users Updated successfully');
    //  } 
    // delete funconality --------------------------
    public function destroy($id) 
    {
        $data = Slider::findOrFail($id);
        $destinationPath = 'public/storage/slider/img/'.$data->slider_image;
        if(File::exists($destinationPath)){
            File::delete($destinationPath);
        }
        $data->delete();
        return redirect()->back()->with('slider Deleted successfully');
    }
}