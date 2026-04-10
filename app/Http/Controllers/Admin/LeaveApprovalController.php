<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeaveRequest;

class LeaveApprovalController extends Controller
{
   
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role !== 'admin') {
                abort(403);
            }
            return $next($request);
        });
    }

    public function index()
    {
        $requests = LeaveRequest::where('status', 'pending')->get();
        return view('admin.leave_requests', compact('requests'));
    }

    public function approve($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $leave->status = 'approved';
        $leave->save();

        return back()->with('success', 'Leave approved.');
    }

    public function reject($id)
    {
        $leave = LeaveRequest::findOrFail($id);
        $leave->status = 'rejected';
        $leave->save();

        return back()->with('success', 'Leave rejected.');
    }
}