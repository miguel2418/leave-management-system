@extends('layouts.app')

@section('content')

<h2>My Leave Requests</h2>

<a href="/dashboard">Back to Dashboard</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Leave Type</th>
        <th>Dates</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>

    @foreach($requests as $req)
    <tr>
        <td>{{ $req->leave_type }}</td>
        <td>{{ $req->start_date }} to {{ $req->end_date }}</td>
        <td>{{ $req->reason }}</td>
        <td>
            @if($req->status == 'pending')
                <span style="color:orange;">Pending</span>
            @elseif($req->status == 'approved')
                <span style="color:green;">Approved</span>
            @else
                <span style="color:red;">Rejected</span>
            @endif
        </td>
    </tr>
    @endforeach
</table>

@endsection