<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $totalEvents = DB::table('event_registrations')
            ->where('user_id', $userId)
            ->count();

        $myEvents = DB::table('event_registrations')
            ->join('events', 'event_registrations.event_id', '=', 'events.id')
            ->where('event_registrations.user_id', $userId)
            ->select('events.title', 'events.event_date', 'event_registrations.status', 'event_registrations.registered_at')
            ->orderBy('events.event_date')
            ->get();

        return view('dashboard', compact('totalEvents', 'myEvents'));
    }
}