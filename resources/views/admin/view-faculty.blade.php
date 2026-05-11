<x-app-layout>
    <div style="padding-top: 48px; padding-bottom: 48px; background-color: #f9fafb; font-family: system-ui, -apple-system, sans-serif;">
        <div style="max-width: 896px; margin-left: auto; margin-right: auto; padding-left: 24px; padding-right: 24px;">
            <div style="background-color: #ffffff; padding: 32px; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); border-radius: 8px; border: 1px solid #e5e7eb;">

                <div style="display: flex; align-items: flex-start; gap: 24px; margin-bottom: 32px; border-bottom: 1px solid #e5e7eb; padding-bottom: 24px;">
                    <img src="{{ asset('storage/' . $faculty->profile_photo) }}"
                         style="width: 112px; height: 112px; object-fit: cover; border-radius: 50%; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); border: 4px solid #f3f4f6; flex-shrink: 0;">

                    <div style="margin-top: 0;">
                        <h2 style="font-size: 30px; font-weight: bold; color: #1f2937; margin: 0;">{{ $faculty->first_name }} {{ $faculty->last_name }}</h2>
                        <div style="color: #4b5563; margin-top: 8px; display: flex; flex-direction: column; gap: 4px;">
                            <p style="margin: 0;"><strong>Email:</strong> {{ $faculty->user->email }} | <strong>Mobile:</strong> {{ $faculty->mobile }}</p>
                            <p style="margin: 0;"><strong>DOB:</strong> {{ $faculty->dob }} | <strong>Gender:</strong> {{ $faculty->gender }}</p>
                        </div>
                    </div>
                </div>

                <div style="margin-bottom: 32px;">
                    <h3 style="font-size: 20px; font-weight: bold; color: #1d4ed8; margin-top: 0; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                        <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        </svg>
                        Education
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        @foreach($faculty->educations as $edu)
                            <div style="background-color: #eff6ff; padding: 16px; border-radius: 4px; border-left: 4px solid #3b82f6;">
                                <p style="font-weight: bold; color: #1f2937; margin: 0 0 4px 0;">{{ $edu->degree_name }}</p>
                                <p style="color: #4b5563; font-size: 14px; margin: 0;">{{ $edu->university }} | Year: {{ $edu->passing_year }} | {{ $edu->percentage }}%</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div style="margin-bottom: 32px;">
                    <h3 style="font-size: 20px; font-weight: bold; color: #15803d; margin-top: 0; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                        <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Experience
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        @if($faculty->experiences->count() > 0)
                            @foreach($faculty->experiences as $exp)
                                <div style="background-color: #f0fdf4; padding: 16px; border-radius: 4px; border-left: 4px solid #22c55e;">
                                    <p style="font-weight: bold; color: #1f2937; margin: 0 0 4px 0;">{{ $exp->designation }}</p>
                                    <p style="color: #4b5563; font-size: 14px; margin: 0;">{{ $exp->company_name }} | {{ $exp->start_date }} to {{ $exp->end_date ?? 'Present' }}</p>
                                </div>
                            @endforeach
                        @else
                            <p style="color: #6b7280; font-style: italic; padding: 16px; background-color: #f9fafb; border-radius: 4px; border: 1px solid #e5e7eb; margin: 0;">Registered as a Fresher.</p>
                        @endif
                    </div>
                </div>

                <div style="margin-top: 32px; border-top: 1px solid #e5e7eb; padding-top: 24px; display: flex; justify-content: space-between; align-items: center;">

                    <a href="{{ route('admin.dashboard') }}"
                       style="background-color: #6b7280; color: #ffffff; padding: 8px 20px; border-radius: 4px; display: flex; align-items: center; gap: 8px; text-decoration: none; font-weight: 500; transition: background-color 0.2s;"
                       onmouseover="this.style.backgroundColor='#4b5563'"
                       onmouseout="this.style.backgroundColor='#6b7280'">
                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back
                    </a>

                    <a href="{{ route('admin.faculty.edit', $faculty->id) }}"
                       style="background-color: #facc15; color: #111827; padding: 8px 24px; border-radius: 4px; font-weight: bold; box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05); display: flex; align-items: center; gap: 8px; text-decoration: none; transition: background-color 0.2s;"
                       onmouseover="this.style.backgroundColor='#eab308'"
                       onmouseout="this.style.backgroundColor='#facc15'">
                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        Edit Details
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
