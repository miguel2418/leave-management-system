<h2>Pending Leave Requests</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>User</th>
        <th>Leave Type</th>
        <th>Dates</th>
        <th>Reason</th>
        <th>Action</th>
    </tr>

    @foreach($requests as $req)
    <tr>
        <td>{{ $req->user_id }}</td>
        <td>{{ $req->leave_type }}</td>
        <td>{{ $req->start_date }} to {{ $req->end_date }}</td>
        <td>{{ $req->reason }}</td>
        <td>
            <form method="POST" action="/admin/leave/{{ $req->id }}/approve" style="display:inline;">
                @csrf
                <button type="submit">Approve</button>
            </form>

            <form method="POST" action="/admin/leave/{{ $req->id }}/reject" style="display:inline;">
                @csrf
                <button type="submit">Reject</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>