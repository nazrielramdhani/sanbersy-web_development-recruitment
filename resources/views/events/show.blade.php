@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $event->title }}</h1>
        <p class="text-blue-600 font-medium mb-4">
            {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, H:i') }}
        </p>
        <p class="text-gray-600 mb-8">{{ $event->description }}</p>

        @auth
            <form method="POST" action="/events/{{ $event->id }}/register">
                @csrf
                <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                    Daftar Sekarang
                </button>
            </form>
        @else
            <a href="/login" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                Login untuk Mendaftar
            </a>
        @endauth
    </div>
@endsection