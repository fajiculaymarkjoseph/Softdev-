@extends('layout.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold" align="center">Welcome to Interview Scheduler</h2>
        <p class="text-gray-600" align="center">Manage and schedule interviews efficiently.</p>

        <div class="mt-4" align="center">
            <a href="{{ url('/interviews') }}" class="bg-blue-500 text-white px-4 py-2 rounded">View Schedules</a>
        </div>
    </div>
@endsection
