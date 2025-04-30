<x-layout>
    <x-page-heading></x-page-heading>

    <x-form.form method="POST" action="{{ url('/update') }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <!-- Role Selection -->
        <x-form.select id="role" label="Role" name="role">
            <option value="applicant" {{ old('role', $user->role) === 'applicant' ? 'selected' : '' }}>Applicant</option>
            <option value="employer" {{ old('role', $user->role) === 'employer' ? 'selected' : '' }}>Employer</option>
        </x-form.select>

        <!-- Employer Fields -->
        <div id="employer-fields" style="display: none;">
            <x-form.input label="Company Name" name="company_name" value="{{ old('company_name', $user->company_name) }}"/>
            <x-form.input label="Company Logo" name="logo" type="file" />
        </div>

        <!-- Applicant Fields -->
        <div id="applicant-fields">
            <x-form.input label="Applicant's Resume" name="resume" type="file" />
        </div>
       <div>
       <x-form.input type="number" name="phone_number" label="Phone Number"/>
       <x-form.textarea name="about" label="About" />
       <x-form.input name="skills" label="Skills"/>
       <x-form.input name="location" label="Your Location"/>
       </div>


        <x-form.button>Submit</x-form.button>
    </x-form.form>

    <!-- JavaScript to Toggle Fields -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const roleSelect = document.getElementById('role');
            const employerFields = document.getElementById('employer-fields');
            const applicantFields = document.getElementById('applicant-fields');

            function toggleFields() {
                if (roleSelect.value === 'employer') {
                    employerFields.style.display = 'block';
                    applicantFields.style.display = 'none';
                } else {
                    employerFields.style.display = 'none';
                    applicantFields.style.display = 'block';
                }
            }

            // Run on page load (to handle form resubmissions)
            toggleFields();

            // Run when selection changes
            roleSelect.addEventListener('change', toggleFields);
        });
    </script>
</x-layout>
