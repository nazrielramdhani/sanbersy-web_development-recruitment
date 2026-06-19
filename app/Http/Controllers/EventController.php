<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('events.show', compact('event'));
    }
}