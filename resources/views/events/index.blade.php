@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Event</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($events as $event)
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $event->title }}</h2>
                <p class="text-gray-500 text-sm mb-2">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, H:i') }}</p>
                <p class="text-gray-600 text-sm mb-4">{{ Str::limit($event->description, 80) }}</p>
                <a href="/events/{{ $event->id }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">
                    Lihat Detail
                </a>
            </div>
        @empty
            <p class="text-gray-500">Belum ada event tersedia.</p>
        @endforelse
    </div>
@endsection