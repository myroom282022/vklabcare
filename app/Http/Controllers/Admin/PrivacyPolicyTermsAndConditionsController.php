<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivacyAndTerm;

class PrivacyPolicyTermsAndConditionsController extends Controller
{
    public function privacyPolicy(Request $request){
       $date  = PrivacyAndTerm::where('type','privacy')->first();
       $privacy = $date ?? '';
        return view('admins.PrivacyAndTerm.Privacy_policy',compact('privacy'));
    }
    public function TermsAndConditions(Request $request){
        $date  = PrivacyAndTerm::where('type','terms')->first();
        $privacy = $date ?? '';
         return view('admins.PrivacyAndTerm.terms_and_condisation',compact('privacy'));
     }

    public function privacyPolicyStore(Request $request){
        $data = [
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
        ];

        $post = PrivacyAndTerm::updateOrCreate([
            'id' => $request->id,
            'type' => $request->type ?? '',
        ], [
            'title' => $request->title ?? '',
            'description' => $request->description?? '',
            'user_id' => auth()->user()->id,
        ]);
        if($post->type === 'privacy'){
            return redirect()->route('privacy-policy')->withSuccess('Privacy policy successfully !');
        }else{
            return redirect()->route('terms-and-conditions')->withSuccess('Terms and Condisation successfully !');
        }

    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('media'), $fileName);
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }

}
