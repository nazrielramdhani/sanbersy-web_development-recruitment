<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventRegistrationConfirmation;

class EventController extends Controller
{
    public function index()
    {
        $events = DB::table('events')->orderBy('event_date')->get();
        return view('events.index', compact('events'));
    }

    public function show($id)
    {
        $event = DB::table('events')->where('id', $id)->first();
        if (!$event) abort(404);

        $alreadyRegistered = false;
        if (auth()->check()) {
            $alreadyRegistered = DB::table('event_registrations')
                ->where('user_id', auth()->id())
                ->where('event_id', $id)
                ->exists();
        }

        return view('events.show', compact('event', 'alreadyRegistered'));
    }

    public function register(Request $request, $id)
    {
        $event = DB::table('events')->where('id', $id)->first();
        if (!$event) abort(404);

        $alreadyRegistered = DB::table('event_registrations')
            ->where('user_id', auth()->id())
            ->where('event_id', $id)
            ->exists();

        if ($alreadyRegistered) {
            return redirect()->back()->with('error', 'Kamu sudah mendaftar event ini!');
        }

        DB::table('event_registrations')->insert([
            'user_id' => auth()->id(),
            'event_id' => $id,
            'status' => 'registered',
            'registered_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Kirim email konfirmasi
        $user = auth()->user();
        Mail::to($user->email)->send(
            new EventRegistrationConfirmation($user->name, $event->title, $event->event_date)
        );

        return redirect()->back()->with('success', 'Berhasil mendaftar event! Email konfirmasi telah dikirim.');
    }
}