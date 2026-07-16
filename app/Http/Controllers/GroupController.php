<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::withCount('members')
            ->latest()
            ->get();

        return view('groups', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|max:100',
        'description' => 'nullable|max:500',
        'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $cover = 'group.jpg';

    if ($request->hasFile('cover')) {

        $cover = time().'_'.$request->file('cover')->getClientOriginalName();

        $request->file('cover')->move(
            public_path('images/groups'),
            $cover
        );

    }

    $group = Group::create([
        'owner_id'   => auth()->id(),
        'name'       => $request->name,
        'description'=> $request->description,
        'cover'      => $cover
    ]);

        GroupMember::create([
            'group_id'=>$group->id,
            'user_id'=>auth()->id()
        ]);

        return back()->with('success','Group berhasil dibuat.');
    }

    public function join($id)
    {
        GroupMember::firstOrCreate([
            'group_id'=>$id,
            'user_id'=>auth()->id()
        ]);

        return back()->with('success','Berhasil bergabung.');
    }

    public function leave($id)
    {
        GroupMember::where('group_id',$id)
            ->where('user_id',auth()->id())
            ->delete();

        return back()->with('success','Keluar dari group.');
    }

    public function show(Group $group)
    {
        $group->load([
        'owner',
        'members.user',
        'messages.user',
        'materials.user'
    ]);

    $joined = GroupMember::where('group_id', $group->id)
        ->where('user_id', auth()->id())
        ->exists();

    return view('group-detail', compact('group','joined'));
    }
    
}