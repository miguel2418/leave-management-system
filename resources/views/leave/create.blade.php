@extends('layouts.app')

@section('content')






<h2>Leave Request</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ route('leave.store') }}">
    @csrf

    <label>Leave Type:</label><br>
    <select name="leave_type">
        <option value="Sick Leave">Sick Leave</option>
        <option value="Vacation Leave">Vacation Leave</option>
        <option value="Emergency Leave">Emergency Leave</option>
    </select><br><br>

    <label>Start Date:</label><br>
    <input type="date" name="start_date"><br><br>

    <label>End Date:</label><br>
    <input type="date" name="end_date"><br><br>

    <label>Reason:</label><br>
    <textarea name="reason"></textarea><br><br>

    <button type="submit">Submit</button>
</form>

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@endsection