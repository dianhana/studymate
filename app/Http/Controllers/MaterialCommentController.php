<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialComment;
use Illuminate\Http\Request;

class MaterialCommentController extends Controller
{
    public function store(Request $request, Material $material)
    {
        $request->validate([
            'comment'=>'required'
        ]);

        MaterialComment::create([

            'material_id'=>$material->id,

            'user_id'=>auth()->id(),

            'comment'=>$request->comment

        ]);

        return back()->with('success','Komentar berhasil ditambahkan.');
    }
}