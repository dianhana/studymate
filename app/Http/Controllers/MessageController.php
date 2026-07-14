<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $friends = Friend::where('user_id', auth()->id())
            ->with('friend')
            ->get();

        // Tambahkan last message & unread
        foreach ($friends as $friend) {

            $friend->lastMessage = Message::where(function ($q) use ($friend) {

                    $q->where('sender_id', auth()->id())
                      ->where('receiver_id', $friend->friend_id);

                })

                ->orWhere(function ($q) use ($friend) {

                    $q->where('sender_id', $friend->friend_id)
                      ->where('receiver_id', auth()->id());

                })

                ->latest()
                ->first();

            $friend->unread = Message::where('sender_id', $friend->friend_id)
                ->where('receiver_id', auth()->id())
                ->where('is_read', false)
                ->count();
        }

        $selectedUser = null;
        $messages = collect();

        if ($request->user) {

            $selectedUser = User::findOrFail($request->user);

            $messages = Message::where(function ($q) use ($request) {

                    $q->where('sender_id', auth()->id())
                      ->where('receiver_id', $request->user);

                })

                ->orWhere(function ($q) use ($request) {

                    $q->where('sender_id', $request->user)
                      ->where('receiver_id', auth()->id());

                })

                ->orderBy('created_at')
                ->get();

            // Tandai pesan sebagai sudah dibaca
            Message::where('sender_id', $request->user)
                ->where('receiver_id', auth()->id())
                ->where('is_read', false)
                ->update([
                    'is_read' => true
                ]);
        }

        return view('messages', compact(
            'friends',
            'selectedUser',
            'messages'
        ));
    }

    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required'
        ]);

        Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }
}