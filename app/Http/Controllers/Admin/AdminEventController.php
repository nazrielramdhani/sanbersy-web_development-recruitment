<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminEventController extends Controller
{
    private function checkAdmin()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }
    }

    public function index()
    {
        $this->checkAdmin();
        $events = DB::table('events')->orderBy('event_date')->get();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $this->checkAdmin();
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $this->checkAdmin();
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
        ]);

        DB::table('events')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/admin/events')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $this->checkAdmin();
        $event = DB::table('events')->where('id', $id)->first();
        if (!$event) abort(404);
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $this->checkAdmin();
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
        ]);

        DB::table('events')->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'updated_at' => now(),
        ]);

        return redirect('/admin/events')->with('success', 'Event berhasil diupdate!');
    }

    public function destroy($id)
    {
        $this->checkAdmin();
        DB::table('events')->where('id', $id)->delete();
        return redirect('/admin/events')->with('success', 'Event berhasil dihapus!');
    }
}