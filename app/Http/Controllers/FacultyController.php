<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Faculty;
use Illuminate\Support\Facades\Hash;

class FacultyController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validation
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'mobile' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'educations' => 'required|array|min:1',
            'educations.*.degree_name' => 'required',
            'educations.*.university' => 'required',
            'educations.*.passing_year' => 'required|numeric', // <-- ADD THIS
            'educations.*.percentage' => 'required',
        ]);

        // 2. Create User
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'faculty',
        ]);

        // 3. Upload Photo
        $photoPath = $request->file('profile_photo')->store('profiles', 'public');

        // 4. Create Faculty
        $faculty = Faculty::create([
            'user_id' => $user->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'profile_photo' => $photoPath,
        ]);

        // 5. Store Educations
        $faculty->educations()->createMany($request->educations);

        // 6. Store Experiences (Only if NOT a fresher)
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

        return redirect()->route('login')->with('success', 'Registration Successful. Please Login.');
    }
}
