@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
@endif
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $event->title }}</h1>
        <p class="text-blue-600 font-medium mb-4">
            {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, H:i') }}
        </p>
        <p class="text-gray-600 mb-8">{{ $event->description }}</p>

        @auth
            @if($alreadyRegistered)
                <button disabled style="background:#9CA3AF; color:white; padding:12px 24px; border-radius:8px; border:none; cursor:not-allowed;">
                    ✓ Sudah Terdaftar
                </button>
            @else
                <form method="POST" action="/events/{{ $event->id }}/register">
                    @csrf
                    <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700">
                        Daftar Sekarang
                    </button>
                </form>
            @endif
        @else
            <a href="/login" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                Login untuk Mendaftar
            </a>
        @endauth
    </div>
@endsection