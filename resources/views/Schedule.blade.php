@extends('layout')

@section('content')
    <h2>Schedule an Interview</h2>
    <form id="scheduleForm">
        <input type="text" id="interviewer_id" placeholder="Interviewer ID" required>
        <input type="text" id="applicant_id" placeholder="Applicant ID" required>
        <input type="datetime-local" id="date_time" required>
        <input type="text" id="room_number" placeholder="Room Number" required>
        <select id="modality">
            <option value="Online">Online</option>
            <option value="Offline">Offline</option>
        </select>
        <button type="submit">Schedule</button>
    </form>
    <p id="scheduleMessage"></p>

    <h2>Interview Schedules</h2>
    <button onclick="fetchInterviews()">Load Interviews</button>
    <ul id="interviewList"></ul>
@endsection
