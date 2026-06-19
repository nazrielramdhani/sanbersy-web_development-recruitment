@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard</h1>

    <div class="bg-white rounded-lg shadow p-6 mb-6 inline-block">
        <p class="text-gray-500 text-sm">Total Event Diikuti</p>
        <p class="text-4xl font-bold text-blue-600">{{ $totalEvents }}</p>
    </div>

    <h2 class="text-xl font-semibold text-gray-700 mb-4">Event yang Saya Ikuti</h2>

    @if($myEvents->isEmpty())
        <p class="text-gray-500">Kamu belum mendaftar event apapun.</p>
    @else
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">Nama Event</th>
                        <th class="px-6 py-3 text-left">Tanggal</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Didaftarkan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($myEvents as $event)
                        <tr>
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $event->title }}</td>
                            <td class="px-6 py-4 text-gray-500">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y, H:i') }}</td>
                            <td class="px-6 py-4"><span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">{{ $event->status }}</span></td>
                            <td class="px-6 py-4 text-gray-500">{{ \Carbon\Carbon::parse($event->registered_at)->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection