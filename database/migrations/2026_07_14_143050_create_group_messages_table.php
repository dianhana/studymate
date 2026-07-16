<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMessage;
use Illuminate\Http\Request;

class GroupMessageController extends Controller
{
    public function store(Request $request, Group $group)
    {
        $request->validate([
            'message' => 'required'
        ]);

        GroupMessage::create([
            'group_id' => $group->id,
            'user_id' => auth()->id(),
            'message' => $request->message
        ]);

        return back();
    }
}