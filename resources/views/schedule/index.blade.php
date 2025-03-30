@extends('layout')

@section('content')
    <h1>Interview Schedule List</h1>

    <table border="1">
        <tr>
            <th>Candidate</th>
            <th>Interviewer</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
        @foreach($schedules as $schedule)  {{-- Changed from $interviews to $schedules --}}
            <tr>
                <td>{{ $schedule->candidate_name }}</td>
                <td>{{ $schedule->interviewer }}</td>
                <td>{{ $schedule->date }}</td>
                <td>{{ $schedule->time }}</td>
                <td>{{ $schedule->status }}</td>
            </tr>
        @endforeach
    </table>
@endsection
