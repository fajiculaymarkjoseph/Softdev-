@extends('layout.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex space-x-4 border-b pb-4">
            <button class="px-4 py-2 bg-gray-200 rounded">All Applicants (102)</button>
            <button class="px-4 py-2 bg-green-300 rounded">Interview Progress</button>
            <button class="px-4 py-2 bg-gray-200 rounded">Scores</button>
        </div>

        <table class="w-full mt-4 border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Applicant No.</th>
                    <th class="border border-gray-300 px-4 py-2">Applicant Name</th>
                    <th class="border border-gray-300 px-4 py-2">Program</th>
                    <th class="border border-gray-300 px-4 py-2">Interview Progress</th>
                    <th class="border border-gray-300 px-4 py-2">Time Slot</th>
                    <th class="border border-gray-300 px-4 py-2">Interviewer</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($interviews as $interview)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $interview->applicant_no }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $interview->applicant_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $interview->program }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @if($interview->progress == 'In Progress')
                                <span class="text-yellow-500">🟡 In Progress</span>
                            @elseif($interview->progress == 'Completed')
                                <span class="text-green-500">🟢 Completed</span>
                            @elseif($interview->progress == 'Cancelled')
                                <span class="text-red-500">🔴 Cancelled</span>
                            @else
                                <span class="text-blue-500">🔵 Upcoming</span>
                            @endif
                        </td>
                        <td class="border border-gray-300 px-4 py-2">{{ $interview->time_slot }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $interview->interviewer }}</td>
                        <td class="border border-gray-300 px-4 py-2 space-x-2">
                            <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                            <button class="bg-yellow-500 text-white px-3 py-1 rounded">Edit</button>
                            <button class="bg-blue-500 text-white px-3 py-1 rounded">View</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-gray-500">No interview schedules found.</td>
                    </tr>
                @endforelse
            </tbody>            
        </table>
    </div>
@endsection
