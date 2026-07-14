<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friend;
use App\Models\FriendRequest;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    /**
     * Halaman Partner
     */
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())
            ->orderBy('name')
            ->get();

        return view('partners', compact('users'));
    }

    /**
     * Kirim Permintaan Partner
     */
    public function sendRequest($id)
    {
        if ($id == auth()->id()) {
            return back()->with('error', 'Tidak dapat menambah diri sendiri.');
        }

        // Sudah berteman?
        $friend = Friend::where('user_id', auth()->id())
            ->where('friend_id', $id)
            ->exists();

        if ($friend) {
            return back()->with('error', 'User sudah menjadi partner.');
        }

        // Sudah pernah request?
        $request = FriendRequest::where(function ($query) use ($id) {
            $query->where('sender_id', auth()->id())
                ->where('receiver_id', $id);
        })->orWhere(function ($query) use ($id) {
            $query->where('sender_id', $id)
                ->where('receiver_id', auth()->id());
        })->exists();

        if ($request) {
            return back()->with('error', 'Permintaan partner sudah ada.');
        }

        FriendRequest::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $id,
            'status' => 'pending'
        ]);

        return back()->with('success', 'Permintaan partner berhasil dikirim.');
    }

    /**
     * Halaman Permintaan Partner
     */
    public function requests()
    {
        $requests = FriendRequest::where('receiver_id', auth()->id())
            ->where('status', 'pending')
            ->with('sender')
            ->latest()
            ->get();

        return view('partner-requests', compact('requests'));
    }

    /**
     * Terima Partner
     */
    public function accept($id)
    {
        $request = FriendRequest::findOrFail($id);

        if ($request->receiver_id != auth()->id()) {
            abort(403);
        }

        // Update Status
        $request->status = 'accepted';
        $request->save();

        // User A -> User B
        Friend::firstOrCreate([
            'user_id' => $request->sender_id,
            'friend_id' => $request->receiver_id
        ]);

        // User B -> User A
        Friend::firstOrCreate([
            'user_id' => $request->receiver_id,
            'friend_id' => $request->sender_id
        ]);

        return redirect()
            ->route('partner.requests')
            ->with('success', 'Partner berhasil ditambahkan.');
    }

    /**
     * Tolak Partner
     */
    public function reject($id)
    {
        $request = FriendRequest::findOrFail($id);

        if ($request->receiver_id != auth()->id()) {
            abort(403);
        }

        $request->status = 'rejected';
        $request->save();

        return back()->with('success', 'Permintaan ditolak.');
    }

    /**
     * Daftar Partner
     */
    public function friends()
    {
        $friends = Friend::where('user_id', auth()->id())
            ->with('friend')
            ->get();

        return view('friends', compact('friends'));
    }
}