<x-app-layout>
    <div style="padding-top: 48px; padding-bottom: 48px; font-family: system-ui, -apple-system, sans-serif; background-color: #f9fafb;">
        <div style="max-width: 896px; margin-left: auto; margin-right: auto; padding-left: 24px; padding-right: 24px;">
            <div style="background-color: #ffffff; padding: 24px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); border-radius: 8px; border: 1px solid #e5e7eb;">
                <h2 style="font-size: 24px; font-weight: bold; color: #1f2937; margin-top: 0; margin-bottom: 24px;">Edit Faculty Information</h2>

                <form method="POST" action="{{ route('admin.faculty.update', $faculty->id) }}" style="margin: 0;">
                    @csrf @method('PUT')

                    <h3 style="font-weight: bold; font-size: 18px; color: #374151; margin-bottom: 8px; margin-top: 0;">Basic Details</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                        <input type="text" name="first_name" value="{{ $faculty->first_name }}" required
                               style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="text" name="last_name" value="{{ $faculty->last_name }}" required
                               style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="text" name="mobile" value="{{ $faculty->mobile }}" required
                               style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <select name="gender" required style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                            <option value="Male" {{ $faculty->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $faculty->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $faculty->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        <input type="date" name="dob" value="{{ $faculty->dob }}" required
                               style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                    </div>

                    <hr style="margin-top: 16px; margin-bottom: 16px; border: 0; border-top: 1px solid #e5e7eb;">

                    <h3 style="font-weight: bold; font-size: 18px; color: #374151; margin-bottom: 8px; margin-top: 0;">Education Details</h3>
                    <div id="education-wrapper">
                        @foreach($faculty->educations as $index => $edu)
                            <div class="edu-row" style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap;">
                                <input type="text" name="educations[{{$index}}][degree_name]" value="{{ $edu->degree_name }}" required placeholder="Degree" style="flex: 1; min-width: 120px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                                <input type="text" name="educations[{{$index}}][university]" value="{{ $edu->university }}" required placeholder="University" style="flex: 1.5; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                                <input type="number" name="educations[{{$index}}][passing_year]" value="{{ $edu->passing_year }}" required placeholder="Year" style="flex: 1; min-width: 100px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                                <input type="text" name="educations[{{$index}}][percentage]" value="{{ $edu->percentage }}" required placeholder="Result" style="flex: 1; min-width: 100px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">

                                @if($index == 0)
                                    <button type="button" class="add-edu" style="background-color: #3b82f6; color: #ffffff; padding: 8px 16px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">+</button>
                                @else
                                    <button type="button" class="remove-edu" style="background-color: #ef4444; color: #ffffff; padding: 8px 16px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">-</button>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <hr style="margin-top: 16px; margin-bottom: 16px; border: 0; border-top: 1px solid #e5e7eb;">

                    <h3 style="font-weight: bold; font-size: 18px; color: #374151; margin-bottom: 8px; margin-top: 0; display: flex; align-items: center; justify-content: space-between;">
                        Experience Details
                        <label style="font-size: 14px; font-weight: normal; cursor: pointer;">
                            <input type="checkbox" name="is_fresher" id="is_fresher" value="1" {{ $faculty->experiences->count() == 0 ? 'checked' : '' }} style="margin-right: 4px;"> I am a Fresher
                        </label>
                    </h3>

                    <div id="experience-wrapper" style="{{ $faculty->experiences->count() == 0 ? 'display:none;' : '' }}">
                        @if($faculty->experiences->count() > 0)
                            @foreach($faculty->experiences as $index => $exp)
                                <div class="exp-row" style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap; border: 1px solid #e5e7eb; padding: 12px; background-color: #f9fafb; border-radius: 4px;">
                                    <input type="text" name="experiences[{{$index}}][company_name]" value="{{ $exp->company_name }}" placeholder="Company" class="exp-req" style="flex: 1; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                                    <input type="text" name="experiences[{{$index}}][designation]" value="{{ $exp->designation }}" placeholder="Designation" class="exp-req" style="flex: 1; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                                    <input type="date" name="experiences[{{$index}}][start_date]" value="{{ $exp->start_date }}" class="exp-req" style="flex: 1; min-width: 130px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                                    <input type="date" name="experiences[{{$index}}][end_date]" value="{{ $exp->end_date }}" class="end-date-input exp-req" {{ is_null($exp->end_date) ? 'style=display:none;' : 'style=flex:1;min-width:130px;box-sizing:border-box;border:1pxsolid#d1d5db;padding:8px;border-radius:4px;outline:none;' }}>

                                    <label style="font-size: 14px; margin-top: 8px; width: 100%; cursor: pointer;">
                                        <input type="checkbox" name="experiences[{{$index}}][currently_working]" class="currently-working" value="1" {{ is_null($exp->end_date) ? 'checked' : '' }} style="margin-right: 4px;"> Currently Working Here
                                    </label>

                                    @if($index == 0)
                                        <button type="button" class="add-exp" style="background-color: #3b82f6; color: #ffffff; padding: 8px 16px; border: none; border-radius: 4px; margin-top: 8px; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">Add Experience</button>
                                    @else
                                        <button type="button" class="remove-exp" style="background-color: #ef4444; color: #ffffff; padding: 8px 16px; border: none; border-radius: 4px; margin-top: 8px; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">Remove</button>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <div class="exp-row" style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap; border: 1px solid #e5e7eb; padding: 12px; background-color: #f9fafb; border-radius: 4px;">
                                <input type="text" name="experiences[0][company_name]" placeholder="Company" class="exp-req" style="flex: 1; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                                <input type="text" name="experiences[0][designation]" placeholder="Designation" class="exp-req" style="flex: 1; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                                <input type="date" name="experiences[0][start_date]" class="exp-req" style="flex: 1; min-width: 130px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                                <input type="date" name="experiences[0][end_date]" class="end-date-input exp-req" style="flex: 1; min-width: 130px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                                <label style="font-size: 14px; margin-top: 8px; width: 100%; cursor: pointer;">
                                    <input type="checkbox" name="experiences[0][currently_working]" class="currently-working" value="1" style="margin-right: 4px;"> Currently Working Here
                                </label>
                                <button type="button" class="add-exp" style="background-color: #3b82f6; color: #ffffff; padding: 8px 16px; border: none; border-radius: 4px; margin-top: 8px; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">Add Experience</button>
                            </div>
                        @endif
                    </div>

                    <button type="submit" style="width: 100%; background-color: #16a34a; color: #ffffff; padding: 12px; border-radius: 4px; margin-top: 24px; font-weight: bold; font-size: 16px; border: none; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#15803d'" onmouseout="this.style.backgroundColor='#16a34a'">Update Faculty</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let eduIndex = {{ $faculty->educations->count() }};
            let expIndex = {{ max(1, $faculty->experiences->count()) }};

            // Inline CSS added directly into the appended HTML string
            $(document).on('click', '.add-edu', function() {
                eduIndex++;
                $('#education-wrapper').append(`
                    <div class="edu-row" style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap; margin-top: 8px;">
                        <input type="text" name="educations[${eduIndex}][degree_name]" placeholder="Degree" required style="flex: 1; min-width: 120px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="text" name="educations[${eduIndex}][university]" placeholder="University" required style="flex: 1.5; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="number" name="educations[${eduIndex}][passing_year]" placeholder="Passing Year" required style="flex: 1; min-width: 100px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="text" name="educations[${eduIndex}][percentage]" placeholder="Result" required style="flex: 1; min-width: 100px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <button type="button" class="remove-edu" style="background-color: #ef4444; color: #ffffff; padding: 8px 16px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">-</button>
                    </div>
                `);
            });
            $(document).on('click', '.remove-edu', function() { $(this).closest('.edu-row').remove(); });

            $('#is_fresher').change(function() {
                if(this.checked) {
                    $('#experience-wrapper').hide();
                    $('.exp-req').removeAttr('required');
                } else {
                    $('#experience-wrapper').show();
                    $('.exp-req').attr('required', 'required');
                }
            });

            // Inline CSS added directly into the appended HTML string
            $(document).on('click', '.add-exp', function() {
                expIndex++;
                $('#experience-wrapper').append(`
                    <div class="exp-row" style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap; border: 1px solid #e5e7eb; padding: 12px; background-color: #f9fafb; border-radius: 4px; margin-top: 8px;">
                        <input type="text" name="experiences[${expIndex}][company_name]" placeholder="Company" required class="exp-req" style="flex: 1; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="text" name="experiences[${expIndex}][designation]" placeholder="Designation" required class="exp-req" style="flex: 1; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="date" name="experiences[${expIndex}][start_date]" required class="exp-req" style="flex: 1; min-width: 130px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="date" name="experiences[${expIndex}][end_date]" required class="end-date-input exp-req" style="flex: 1; min-width: 130px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <label style="font-size: 14px; margin-top: 8px; width: 100%; cursor: pointer;">
                            <input type="checkbox" name="experiences[${expIndex}][currently_working]" class="currently-working" value="1" style="margin-right: 4px;"> Currently Working Here
                        </label>
                        <button type="button" class="remove-exp" style="background-color: #ef4444; color: #ffffff; padding: 8px 16px; border: none; border-radius: 4px; margin-top: 8px; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">Remove</button>
                    </div>
                `);
            });
            $(document).on('click', '.remove-exp', function() { $(this).closest('.exp-row').remove(); });

            $(document).on('change', '.currently-working', function() {
                let endDateInput = $(this).closest('.exp-row').find('.end-date-input');
                if(this.checked) {
                    endDateInput.val('').hide().removeAttr('required');
                } else {
                    endDateInput.show().attr('required', 'required');
                }
            });
        });
    </script>
</x-app-layout>
