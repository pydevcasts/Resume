<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Model\PDF;

class PDFController extends Controller
{
    public function index()
    {
        $upload = PDF::all();
        return response()->json([
            'upload' => $upload
        ], 200);
    }

    public function uploadFile(Request $request)
    {

        $this->validate($request, [
            'file' => 'required',

        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Storage::disk('local')->putFileAs('pdf/', $image, $filename);
        }

        $file = new PDF;
        $file->file = $filename;
        $file->save();
        return response()->json(['success' => 'Uploaded Successfully.']);
    }



    public function downloadFile($file)
    { 
       
        //  $path = './storage/app/public/pdf/1604679184.txt';
        $upload = PDF::first();
       
        $path = Storage::disk('local')->path('pdf/'.$upload['file']);
   
        $header = [
            'Content-Type' => 'application/*',
        ];

        return response()->download($path,'resume.pdf',$header);
        // return Storage::download($path, $id, $header);

    }

    public function deleteFile($id)
    {
        $upload = PDF::find($id);
        Storage::disk('local')->delete('pdf/' . $upload['file']);
        $upload->delete();
        return response()->json([
            'message' => 'Pdf deleted Successfully .'
        ], 200);
    }
}
