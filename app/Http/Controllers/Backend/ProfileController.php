<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Profile;
use App\Model\Tag;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();

        return response()->json([
            'profiles' => $profiles
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {

        $this->validate($r,[
            'photo'=>'required',
            'tags'=>'required|exists:tags,id',
            'title'=>'required',
            'description'=>'required',
            'social_media_1'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'address'=>'required',
            'email'=>'required',

            ]);

            if($r->hasFile('photo')){
            $image = $r->file('photo');
            $filename =time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('profile/', $image, $filename);

        }

            $profile = New Profile();
            $profile->photo = $filename;
            $profile->tag_id = $r->tags;
            $profile->title = $r->title;
            $profile->description = $r->description;
            $profile->social_media_1 = $r->social_media_1;
            $profile->social_media_2 = $r->social_media_2;
            $profile->social_media_3 = $r->social_media_3;
            $profile->phone = $r->phone;
            $profile->email = $r->email;
            $profile->address = $r->address;
            $profile->save();
            return response()->json(['success'=>'Uploaded Successfully.']);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile =Profile::findOrFail($id);
        return response()->json([
            'profile'=>'$profile'
        ],200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'photo'=>'required',
            'title'=>'required',
            'description'=>'required',
            'social_media_1'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'address'=>'required',
            'email'=>'required',
            ]);
            if($request->hasFile('photo')){
                $image = $request->file('photo');
            $filename =time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('profile/', $image, $filename);
            $profile =Profile::findOrFail($id);
            Storage::disk('local')->delete('profile/'.$profile['photo']);
            $profile->photo = $filename;
            $profile->title = $request->title;
            $profile->description = $request->description;
            $profile->social_media_1 = $request->social_media_1;
            $profile->social_media_2 = $request->social_media_2;
            $profile->social_media_3 = $request->social_media_3;
            $profile->phone = $request->phone;
            $profile->email = $request->email;
            $profile->address = $request->address;
      
            $profile->save();
            return response()->json(['success'=>'Uploaded Successfully.']);
        }
    else {
        return response()->json(['error'=>'File not exist!']);
    }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = Profile::find($id);
        Storage::disk('local')->delete('profile/'.$profile['photo']);
        $profile->delete();
        return response()->json([
            'message'=>'Profile deleted Successfully .'
        ],200);
    }



// public function allTags(){

// return ['tags' => Tag::all()];

// }


}
