@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Event (Admin)</h1>
        <a href="/admin/events/create" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Event</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600">
                <tr>
                    <th class="px-6 py-3 text-left">Judul Event</th>
                    <th class="px-6 py-3 text-left">Tanggal</th>
                    <th class="px-6 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($events as $event)
                    <tr>
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $event->title }}</td>
                        <td class="px-6 py-4 text-gray-500">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, H:i') }}</td>
                        <td class="px-6 py-4">
                            <div style="display:flex; gap:8px;">
                                <a href="/admin/events/{{ $event->id }}/edit" style="background:#EAB308; color:white; padding:4px 12px; border-radius:4px; font-size:12px; text-decoration:none;">Edit</a>
                                <form method="POST" action="/admin/events/{{ $event->id }}" onsubmit="return confirm('Yakin hapus event ini?')" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background:#EF4444; color:white; padding:4px 12px; border-radius:4px; font-size:12px; border:none; cursor:pointer;">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="px-6 py-4 text-gray-500">Belum ada event.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection