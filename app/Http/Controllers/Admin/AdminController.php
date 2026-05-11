<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        // has('user') ensures we only get faculties where the linked User exists (is not soft-deleted)
        $faculties = Faculty::has('user')->with('user')->get();
        return view('admin.dashboard', compact('faculties'));
    }

    public function show($id)
    {
        $faculty = Faculty::with(['user', 'educations', 'experiences'])->findOrFail($id);
        return view('admin.view-faculty', compact('faculty'));
    }

    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = ($user->status == 'active') ? 'inactive' : 'active';
        $user->save();
        return back()->with('success', 'Status updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // This performs a Soft Delete
        return back()->with('success', 'Faculty deleted successfully');
    }

    // Load Edit Form
    public function edit($id)
    {
        $faculty = Faculty::with(['educations', 'experiences'])->findOrFail($id);
        return view('admin.edit-faculty', compact('faculty'));
    }

    // Process Update
    public function update(Request $request, $id)
    {
        $faculty = Faculty::findOrFail($id);

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'educations' => 'required|array|min:1',
        ]);

        // 1. Update Basic Details
        $faculty->update($request->only('first_name', 'last_name', 'mobile', 'gender', 'dob'));

        // 2. Safely Update Dynamic Arrays (Delete old, Insert new)
        $faculty->educations()->delete();
        $faculty->educations()->createMany($request->educations);

        $faculty->experiences()->delete();
        if (!$request->has('is_fresher') && $request->has('experiences')) {
            $experienceData = [];
            foreach ($request->experiences as $exp) {
                $endDate = isset($exp['currently_working']) ? null : $exp['end_date'];
                $experienceData[] = [
                    'company_name' => $exp['company_name'],
                    'designation' => $exp['designation'],
                    'start_date' => $exp['start_date'],
                    'end_date' => $endDate,
                    'total_years' => $exp['total_years'] ?? 0,
                ];
            }
            $faculty->experiences()->createMany($experienceData);
        }

        return redirect()->route('admin.faculty.show', $faculty->id)->with('success', 'Information updated successfully.');
    }
}
