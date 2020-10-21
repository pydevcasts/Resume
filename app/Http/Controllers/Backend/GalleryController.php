<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Gallery;
use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return response()->json([
            'galleries' => $galleries,
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
    public function store(Request $request)
    {      
        
        $this->validate($request, [
            'title'=>'required|min:2|max:50',
            'summary'=>'required|min:2|max:100',
            'photo'=>'required',
            ]);

            if ($request->hasFile('photo')) {
                $image =$request->file('photo');
                $generated_new_name = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('local')->putFileAs('gallery/', $image, $generated_new_name);
                $gallery = New Gallery();
                $gallery->title = $request->title;
            
                $gallery->summary = $request->summary;
                $gallery->photo = $generated_new_name;
                $gallery->save();
                return response()->json(['success'=>'Uploaded Successfully.']);
        } else {
            return response()->json(['error'=>'File not exist!']);
        }
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
        $gallery = Gallery::find($id);
        return response()->json([
            'gallery'=>$gallery,
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
    
        $this->validate($request, [
            'title'=>'required|min:2|max:50',
            'summary'=>'required|min:2|max:100',
            'photo' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
          
            ]);
            
            
            if ($request->hasFile('photo')) {
                $image =$request->file('photo');
                $generated_new_name = time() . '.' . $image->getClientOriginalExtension();
                Storage::disk('local')->putFileAs('gallery/', $image, $generated_new_name);
                $gallery = Gallery::findOrFail($id);
                $gallery->title = $request->title;
                $gallery->summary = $request->summary;
                Storage::disk('local')->delete('gallery/'.$gallery['photo']);
                $gallery->photo = $generated_new_name;
                $gallery->save();
                return response()->json(['success'=>'Uploaded Successfully.']);
        } else {
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
        $gallery = Gallery::find($id);
        Storage::disk('local')->delete('gallery/'.$gallery['photo']);
        $gallery->delete();
    }
}
