<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use App\Models\FriendRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    /**
     * Menampilkan daftar partner.
     */
    public function index()
    {
    $myId = auth()->id();

    // ==========================
    // Daftar partner saya
    // ==========================
    $friends = Friend::where('user_id', $myId)
        ->with('friend')
        ->get();

    // ==========================
    // ID partner
    // ==========================
    $friendIds = Friend::where('user_id', $myId)
        ->pluck('friend_id')
        ->toArray();

    // Jangan tampilkan diri sendiri
    $friendIds[] = $myId;

    // ==========================
    // User yang belum menjadi partner
    // ==========================
    $users = User::whereNotIn('id', $friendIds)->get();

    // ==========================
    // Request yang sudah dikirim
    // ==========================
    $sentRequests = FriendRequest::where('sender_id', $myId)
        ->where('status', 'pending')
        ->pluck('receiver_id')
        ->toArray();

    return view('partners', compact(
        'users',
        'friends',
        'sentRequests'
    ));
    }

    /**
     * Mengirim permintaan partner.
     */
    public function sendRequest($id)
    {
        // Tidak boleh mengirim ke diri sendiri
        if ($id == auth()->id()) {
        return back()->with('error','Tidak bisa menambah diri sendiri.');
    }

    // Sudah berteman?
    $alreadyFriend = Friend::where('user_id', auth()->id())
        ->where('friend_id', $id)
        ->exists();

    if ($alreadyFriend) {
        return back()->with('error','User sudah menjadi partner.');
    }

    // Sudah pernah kirim request?
    $exists = FriendRequest::where(function($q) use ($id){
            $q->where('sender_id', auth()->id())
              ->where('receiver_id', $id);
        })
        ->orWhere(function($q) use ($id){
            $q->where('sender_id', $id)
              ->where('receiver_id', auth()->id());
        })
        ->where('status','pending')
        ->exists();

    if($exists){
        return back()->with('error','Permintaan sudah dikirim.');
    }

    FriendRequest::create([
        'sender_id'=>auth()->id(),
        'receiver_id'=>$id,
        'status'=>'pending'
    ]);

    return back()->with('success','Permintaan partner berhasil dikirim.');
    }
    

    /**
     * Menampilkan permintaan partner yang masuk.
     */
    public function requests()
    {
        $requests = FriendRequest::where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->with('sender')
            ->get();

        return view('partner-requests', compact('requests'));
    }

    public function accept($id)
{
    $request = FriendRequest::findOrFail($id);

    if ($request->receiver_id != auth()->id()) {
        abort(403);
    }

    $request->update([
        'status' => 'accepted'
    ]);

    Friend::updateOrCreate(
    [
        'user_id' => $request->sender_id,
        'friend_id' => $request->receiver_id,
    ],
    []
    );

    Friend::updateOrCreate(
        [
            'user_id' => $request->receiver_id,
            'friend_id' => $request->sender_id,
        ],
    []
    );

    return back()->with('success','Partner berhasil ditambahkan.');
}

public function reject($id)
{
    $request = FriendRequest::findOrFail($id);

    if ($request->receiver_id != auth()->id()) {
        abort(403);
    }

    $request->update([
        'status' => 'rejected'
    ]);

    return back()->with('success', 'Permintaan ditolak.');
}

public function friends()
{
    $friends = Friend::where('user_id', auth()->id())
        ->with('friend')
        ->get();

    return view('friends', compact('friends'));
}
}