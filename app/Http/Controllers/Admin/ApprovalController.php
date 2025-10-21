<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SemesterEnrollments;
use App\Models\ApprovalLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function index()
    {
        $submissions = SemesterEnrollments::where('status', 'submitted')->with('student.user')->get();
        return view('admin.approvals.index', compact('submissions'));
    }

    public function approve(Request $request, SemesterEnrollments $enrollment)
    {
        $enrollment->update(['status' => 'approved']);
        ApprovalLogs::create([
            'enrollment_id' => $enrollment->id,
            'approved_by' => Auth::id(),
            'action' => 'approved',
            'action_date' => now(),
        ]);
        return back()->with('success', 'Enrollment approved');
    }

    public function reject(Request $request, SemesterEnrollments $enrollment)
    {
        $enrollment->update(['status' => 'rejected']);
        ApprovalLogs::create([
            'enrollment_id' => $enrollment->id,
            'approved_by' => Auth::id(),
            'action' => 'rejected',
            'action_date' => now(),
            'notes' => $request->input('notes')
        ]);
        return back()->with('success', 'Enrollment rejected');
    }
}
