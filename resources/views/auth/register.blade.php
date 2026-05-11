<x-guest-layout>
    <div style="font-family: system-ui, -apple-system, sans-serif; padding: 16px;">
        <form method="POST" action="{{ route('faculty.store') }}" enctype="multipart/form-data" style="margin: 0;">
            @csrf

            <h3 style="font-weight: bold; font-size: 18px; color: #374151; margin-bottom: 12px; margin-top: 0;">Basic Details</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 16px;">
                <input type="text" name="first_name" placeholder="First Name" required
                       style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                <input type="text" name="last_name" placeholder="Last Name" required
                       style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                <input type="email" name="email" placeholder="Email" required
                       style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                <input type="password" name="password" placeholder="Password" required
                       style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                <input type="text" name="mobile" placeholder="Mobile" required
                       style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                <select name="gender" required style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none; background-color: white;">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <input type="date" name="dob" required
                       style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                <input type="file" name="profile_photo" required accept="image/*"
                       style="box-sizing: border-box; width: 100%; border: 1px solid #d1d5db; padding: 5px; border-radius: 4px; outline: none; background-color: #ffffff;">
            </div>

            <hr style="margin-top: 24px; margin-bottom: 24px; border: 0; border-top: 1px solid #e5e7eb;">

            <h3 style="font-weight: bold; font-size: 18px; color: #374151; margin-bottom: 12px; margin-top: 0;">Education Details</h3>
            <div id="education-wrapper">
                <div class="edu-row" style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap;">
                    <input type="text" name="educations[0][degree_name]" placeholder="Degree" required style="flex: 1; min-width: 120px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                    <input type="text" name="educations[0][university]" placeholder="University" required style="flex: 1.5; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                    <input type="number" name="educations[0][passing_year]" placeholder="Passing Year" required style="flex: 1; min-width: 100px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                    <input type="text" name="educations[0][percentage]" placeholder="CGPA/Percentage" required style="flex: 1; min-width: 100px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                    <button type="button" class="add-edu" style="background-color: #3b82f6; color: #ffffff; padding: 8px 16px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">+</button>
                </div>
            </div>

            <hr style="margin-top: 24px; margin-bottom: 24px; border: 0; border-top: 1px solid #e5e7eb;">

            <h3 style="font-weight: bold; font-size: 18px; color: #374151; margin-bottom: 12px; margin-top: 0; display: flex; align-items: center; justify-content: space-between;">
                Experience Details
                <label style="font-size: 14px; font-weight: normal; cursor: pointer;">
                    <input type="checkbox" name="is_fresher" id="is_fresher" value="1" style="margin-right: 4px;"> I am a Fresher
                </label>
            </h3>

            <div id="experience-wrapper">
                <div class="exp-row" style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap; border: 1px solid #e5e7eb; padding: 12px; background-color: #f9fafb; border-radius: 4px;">
                    <input type="text" name="experiences[0][company_name]" placeholder="Company" class="exp-req" style="flex: 1; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                    <input type="text" name="experiences[0][designation]" placeholder="Designation" class="exp-req" style="flex: 1; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                    <input type="date" name="experiences[0][start_date]" class="exp-req" title="Start Date" style="flex: 1; min-width: 130px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                    <input type="date" name="experiences[0][end_date]" class="end-date-input exp-req" title="End Date" style="flex: 1; min-width: 130px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">

                    <label style="font-size: 14px; margin-top: 8px; width: 100%; cursor: pointer;">
                        <input type="checkbox" name="experiences[0][currently_working]" class="currently-working" value="1" style="margin-right: 4px;"> Currently Working Here
                    </label>
                    <button type="button" class="add-exp" style="background-color: #3b82f6; color: #ffffff; padding: 8px 16px; border: none; border-radius: 4px; margin-top: 8px; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#2563eb'" onmouseout="this.style.backgroundColor='#3b82f6'">Add Experience</button>
                </div>
            </div>

            <button type="submit" style="width: 100%; background-color: #16a34a; color: #ffffff; padding: 12px; border-radius: 4px; margin-top: 24px; font-weight: bold; font-size: 16px; border: none; cursor: pointer; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#15803d'" onmouseout="this.style.backgroundColor='#16a34a'">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let eduIndex = 0;
            let expIndex = 0;

            // Add/Remove Education
            $(document).on('click', '.add-edu', function() {
                eduIndex++;
                $('#education-wrapper').append(`
                    <div class="edu-row" style="display: flex; gap: 8px; margin-bottom: 8px; flex-wrap: wrap; margin-top: 8px;">
                        <input type="text" name="educations[${eduIndex}][degree_name]" placeholder="Degree" required style="flex: 1; min-width: 120px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="text" name="educations[${eduIndex}][university]" placeholder="University" required style="flex: 1.5; min-width: 150px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="number" name="educations[${eduIndex}][passing_year]" placeholder="Passing Year" required style="flex: 1; min-width: 100px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <input type="text" name="educations[${eduIndex}][percentage]" placeholder="CGPA/Percentage" required style="flex: 1; min-width: 100px; box-sizing: border-box; border: 1px solid #d1d5db; padding: 8px; border-radius: 4px; outline: none;">
                        <button type="button" class="remove-edu" style="background-color: #ef4444; color: #ffffff; padding: 8px 16px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; transition: background-color 0.2s;" onmouseover="this.style.backgroundColor='#dc2626'" onmouseout="this.style.backgroundColor='#ef4444'">-</button>
                    </div>
                `);
            });
            $(document).on('click', '.remove-edu', function() { $(this).closest('.edu-row').remove(); });

            // Fresher Logic
            $('#is_fresher').change(function() {
                if(this.checked) {
                    $('#experience-wrapper').hide();
                    $('.exp-req').removeAttr('required');
                } else {
                    $('#experience-wrapper').show();
                    $('.exp-req').attr('required', 'required');
                }
            });

            // Add/Remove Experience
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

            // Currently Working Logic
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
</x-guest-layout>
