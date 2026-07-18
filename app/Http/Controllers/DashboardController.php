<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Material;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Total partner user
        $partnerCount = Friend::where('user_id', $user->id)
            ->orWhere('friend_id', $user->id)
            ->count();

        // Group yang diikuti user
        $groupCount = GroupMember::where('user_id', $user->id)
            ->count();

        // Total materi
        $materialCount = Material::count();

        // Pesan belum dibaca
        $messageCount = Message::where('receiver_id', $user->id)
            ->where('is_read', false)
            ->count();

        // Group terbaru
        $recentGroups = Group::withCount('members')
            ->latest()
            ->take(5)
            ->get();

        // Materi terbaru
        $recentMaterials = Material::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'partnerCount',
            'groupCount',
            'materialCount',
            'messageCount',
            'recentGroups',
            'recentMaterials'
        ));
    }
}