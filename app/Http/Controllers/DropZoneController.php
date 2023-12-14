<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dropzone;


class DropZoneController extends Controller
{
    public function index(){
        return view('dropzone.index');
    }

    public function store(Request $req)
    {
        $image = $req->file('file');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $imageName = $image->storeAs('imgs', $imageName, 'public');

        $imageUpload = new Dropzone();
        $imageUpload->filename = $imageName;
        $imageUpload->save();

        return response()->json(['success' => $imageName]);
    }
}
