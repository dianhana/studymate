<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function store(Request $request, Group $group)
    {

        $request->validate([

            'title'=>'required',

            'file'=>'required|mimes:pdf,doc,docx,ppt,pptx,zip|max:20480'

        ]);

        $filename=time().'_'.$request->file('file')->getClientOriginalName();

        $request->file('file')->move(
            public_path('materials'),
            $filename
        );

        Material::create([

            'group_id'=>$group->id,

            'user_id'=>auth()->id(),

            'title'=>$request->title,

            'file'=>$filename

        ]);

        return back()->with('success','Materi berhasil diupload.');

    }

    public function download(Material $material)
    {
        return response()->download(
            public_path('materials/'.$material->file)
        );
    }
}