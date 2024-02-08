<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Add Student</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Student</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <a href="{{ route('students') }}" class="button btn btn-primary" style="float: right;">Back</a>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <form class="row g-3 mt-2 justify-content-between" wire:submit.prevent="SaveStaff">
                <div class="col-md-12">
                    <label for="inputName5" class="form-label">Name</label>
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="form-control" id="inputName5" wire:model="first_name"
                                placeholder="Enter first name">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="inputName5" wire:model="middle_name"
                                placeholder="Enter middle name">
                            @error('middle_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="inputName5" wire:model="surname"
                                placeholder="Enter surname">
                            @error('surname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Registration Number</label>
                    <input type="number" wire:model="registration_no" class="form-control"
                        placeholder="Enter Registration Number">
                    @error('registration_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Email</label>
                    <input type="email" class="form-control" wire:model="email" id="inputEmail5"
                        placeholder="Enter email address">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Date of birth</label>
                    <input type="date" wire:model="dob" class="form-control" placeholder="Enter  Date of Birth">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">Course</label>
                    <select id="inputState" wire:model="course_id" class="form-select">
                        <option selected>Choose Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                @if ($editMode == true)
                    <div class="col-md-3">
                        <center class="mt-1">
                            <img wire:ignore.self
                                src="{{ empty($passport_size) ? asset('assets/img/profile-img.jpg') : asset('storage/student_passports/' . $passport_size) }}"
                                alt="Passport" id="showImage" class="rounded-3" style="width: 150px; height: 130px;">
                        </center>
                    </div>
                    <div class="col-md-5">
                        <label for="inputPassword5" class="form-label mt-4">Passport</label>
                        <input type="file" wire:model="passport_size" class="form-control"
                            placeholder="Upload your passport" id="image">
                        @error('passport_size')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif

                <div class="col-md-4">
                    <fieldset class="row mt-2">
                        <legend class="col-form-label col-sm-12 pt-0 mt-4">Gender</legend>
                        <div class="col-sm-12 d-flex justify-content-start mx-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="gender" id="male"
                                    value="male">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check mx-5">
                                <input class="form-check-input" type="radio" wire:model="gender" id="female"
                                    value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-end mt-5 mb-3">
                    @if ($editMode == true)
                        <button type="submit" class="btn btn-success" wire:loading.attr="disabled"
                            wire:target="SaveStaff">Update</button>
                    @else
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                            wire:target="SaveStaff">Save</button>
                    @endif
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>
</div>

@push('scripts')
    {{-- js to show selected image in real time --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }

                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endpush
