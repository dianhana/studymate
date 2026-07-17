<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Material;
use App\Models\GroupMember;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Upload Materi
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, Group $group)
    {
        if ($group->owner_id != auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable|max:1000',
            'file' => 'required|mimes:pdf,doc,docx,ppt,pptx,zip|max:20480',
            'is_premium' => 'nullable'
        ]);

        if (!file_exists(public_path('materials'))) {
            mkdir(public_path('materials'), 0777, true);
        }

        $file = $request->file('file');

        $filename = time().'_'.$file->getClientOriginalName();

        $fileSize = round($file->getSize()/1024/1024,2).' MB';

        $fileType = strtoupper($file->getClientOriginalExtension());

        $file->move(public_path('materials'),$filename);

        Material::create([
            'group_id'=>$group->id,
            'user_id'=>auth()->id(),
            'title'=>$request->title,
            'description'=>$request->description,
            'file'=>$filename,
            'file_size'=>$fileSize,
            'file_type'=>$fileType,
            'is_premium'=>$request->has('is_premium'),
            'downloads'=>0
        ]);

        return redirect()
            ->route('groups.show',$group->id)
            ->with('success','Materi berhasil diupload.');
    }

    /*
    |--------------------------------------------------------------------------
    | Download
    |--------------------------------------------------------------------------
    */

    public function download(Material $material)
    {
        $joined = GroupMember::where('group_id',$material->group_id)
            ->where('user_id',auth()->id())
            ->exists();

        if(!$joined){
            return back()->with(
                'warning',
                'Kamu harus join group terlebih dahulu.'
            );
        }

        if($material->is_premium && !auth()->user()->isPremium()){
            return redirect()
                ->route('premium')
                ->with(
                    'warning',
                    'Materi ini hanya untuk member Premium.'
                );
        }

        $material->increment('downloads');

        $path = public_path('materials/'.$material->file);

        if(!file_exists($path)){
            return back()->with('error','File tidak ditemukan.');
        }

        return response()->download($path);
    }

    /*
    |--------------------------------------------------------------------------
    | Form Edit
    |--------------------------------------------------------------------------
    */

    public function edit(Material $material)
    {
        if($material->user_id != auth()->id()){
            abort(403);
        }

        return view('material-edit',compact('material'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Material $material)
    {
        if($material->user_id != auth()->id()){
            abort(403);
        }

        $request->validate([
            'title'=>'required|max:255',
            'description'=>'nullable|max:1000',
            'file'=>'nullable|mimes:pdf,doc,docx,ppt,pptx,zip|max:20480'
        ]);

        $data = [
            'title'=>$request->title,
            'description'=>$request->description,
            'is_premium'=>$request->has('is_premium')
        ];

        if($request->hasFile('file')){

            if(file_exists(public_path('materials/'.$material->file))){
                unlink(public_path('materials/'.$material->file));
            }

            $file = $request->file('file');

            $filename = time().'_'.$file->getClientOriginalName();

            $fileSize = round($file->getSize()/1024/1024,2).' MB';

            $fileType = strtoupper($file->getClientOriginalExtension());

            $file->move(public_path('materials'),$filename);

            $data['file']=$filename;
            $data['file_size']=$fileSize;
            $data['file_type']=$fileType;
        }

        $material->update($data);

        return redirect()
            ->route('groups.show',$material->group_id)
            ->with('success','Materi berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete
    |--------------------------------------------------------------------------
    */

    public function destroy(Material $material)
    {
        if($material->user_id != auth()->id()){
            abort(403);
        }

        $path = public_path('materials/'.$material->file);

        if(file_exists($path)){
            unlink($path);
        }

        $group = $material->group_id;

        $material->delete();

        return redirect()
            ->route('groups.show',$group)
            ->with('success','Materi berhasil dihapus.');
    }
}