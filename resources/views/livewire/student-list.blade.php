<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Students</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Students</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <button type="button" class="button btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#disablebackdrop" style="float: right;">+Add Student</button>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <div class="position:absolute; top:0; right:0;">
        <!-- Disabled Backdrop Modal -->
        <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
<<<<<<< HEAD
                    <div class="col-md-4">
                        <input type="text" wire:model="middle_name" class="form-control" placeholder="Enter Middle Name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <input type="text" wire:model="surname" class="form-control" placeholder="Enter  Surname">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                        <div class="col-md-8">
                            <input type="integer" wire:model="registration_no" class="form-control" placeholder="Enter  Registration Number">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input type="email" wire:model="email" class="form-control" placeholder="Enter  Email">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <select id="course_id" wire:model="course_id" class="form-select">
                              <option selected>Course</option>
                          @foreach ($courses as $course)
                              <option value="{{$course->id}}">{{$course->name}}</option>
                          @endforeach
                            </select>
                          </div>
                          <div class="col-md-6">
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="gender" id="male" value="male" >
                                    <label class="form-check-label" for="male">
                                    Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="gender" id="female" value="female">
                                    <label class="form-check-label" for="female">
                                    Female
                                    </label>
                                </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <input type="date" wire:model="dob" class="form-control" placeholder="Enter  Date of Birth">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
=======
                    <div class="modal-body">
>>>>>>> origin/bashiri

                        {{-- form inputs --}}
                        <form class="row g-3" wire:submit.prevent="SaveStudent">
                            <div class="col-md-4">
                                <input type="text" wire:model="first_name" class="form-control"
                                    placeholder="Enter First Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input type="text" wire:model="middle_name" class="form-control"
                                    placeholder="Enter Middle Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <input type="text" wire:model="surname" class="form-control"
                                    placeholder="Enter  Surname">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <input type="integer" wire:model="registartion_no" class="form-control"
                                    placeholder="Enter  Registration Number">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <input type="email" wire:model="email" class="form-control"
                                    placeholder="Enter  Email">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <select id="course_id" wire:model="course_id" class="form-select">
                                    <option selected>Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="gender"
                                                id="male" value="male">
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" wire:model="gender"
                                                id="female" value="female">
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <input type="date" wire:model="dob" class="form-control"
                                    placeholder="Enter  Date of Birth">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-8">
                                <input type="file" wire:model="passport_size" class="form-control"
                                    placeholder="Upload your passport">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div><!-- End Disabled Backdrop Modal-->
    </div>

    <!-- Primary Color Bordered Table -->
    <table class="table table-bordered border-primary mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Full name</th>
                <th scope="col">Reg.No.</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Date of Birth</th>
                <th scope="col">Course</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $a = 1;
            @endphp
            @forelse ($students as $student)
                <tr>
<<<<<<< HEAD
                    <th scope="row">{{$a++}}</th>
                    <td>{{$student->first_name ?? 'None'}}</td>
                    <td>{{$student->middle_name ?? 'None'}}</td>
                    <td>{{$student->surname ?? 'None'}}</td>
                    <td>{{$student->registration_no}}</td>
                    <td>{{$student->email ?? 'None'}}</td>
                    {{-- <td>{{$student->dob ?? 'None'}}</td> --}}
                    <td>{{$student->gender ?? 'None'}}</td>
                    <td>{{$student->course->name ?? 'None'}}</td>
=======
                    <th scope="row">{{ $a++ }}</th>
>>>>>>> origin/bashiri
                    <td>
                        {{ $student->first_name ?? 'None' }} {{ $student->middle_name ?? 'None' }}
                        {{ $student->surname ?? 'None' }}
                    </td>
                    <td>{{ $student->registartion_no }}</td>
                    <td>{{ $student->email ?? 'None' }}</td>
                    <td>{{ $student->dob ?? 'None' }}</td>
                    <td>{{ $student->gender ?? 'None' }}</td>
                    <td>{{ $student->course->name ?? 'None' }}</td>
                    <td>
                        <button type="button" wire:click="getStudentDetails({{ $student->id }})"
                            data-bs-toggle="modal" data-bs-target="#ViewStudentModel" class="btn btn-info"><i
                                class="bi bi-eye-fill"></i></button>
                        <button type="button" wire:click="getStudentDetails({{ $student->id }})"
                            data-bs-toggle="modal" data-bs-target="#EditStudentModel" class="btn btn-warning"><i
                                class="bi bi-pen-fill"></i></button>
                        <button type="button" id="student_id" wire:click="DeleteStudent({{ $student->id }})"
                            class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No student found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Model to edit student --}}
    <div class="modal fade" id="EditStudentModel" wire:ignore.self tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

<<<<<<< HEAD
            {{-- form inputs --}}
            <form class="row g-3" wire:submit.prevent="EditStudent">
            <div class="col-md-4">
                <input type="text" wire:model="first_name" class="form-control" placeholder="Enter First Name">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <input type="text" wire:model="middle_name" class="form-control" placeholder="Enter Middle Name">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-4">
                <input type="text" wire:model="surname" class="form-control" placeholder="Enter  Surname">
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
                <div class="col-md-8">
                    <input type="integer" wire:model="registration_no" class="form-control" placeholder="Enter  Registration Number">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-8">
                    <input type="email" wire:model="email" class="form-control" placeholder="Enter  Email">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-8">
                    <select id="course_id" wire:model="course_id" class="form-select">
                      <option selected>Course</option>
                  @foreach ($courses as $course)
                      <option value="{{$course->id}}">{{$course->name}}</option>
                  @endforeach
                    </select>
                  </div>
                  <div class="col-md-6">
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                        <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="gender" id="male" value="male" >
                            <label class="form-check-label" for="male">
                            Male
                            </label>
=======
                    {{-- form inputs --}}
                    <form class="row g-3" wire:submit.prevent="EditStudent">
                        <div class="col-md-4">
                            <input type="text" wire:model="first_name" class="form-control"
                                placeholder="Enter First Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
>>>>>>> origin/bashiri
                        </div>
                        <div class="col-md-4">
                            <input type="text" wire:model="middle_name" class="form-control"
                                placeholder="Enter Middle Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <input type="text" wire:model="surname" class="form-control"
                                placeholder="Enter  Surname">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input type="integer" wire:model="registartion_no" class="form-control"
                                placeholder="Enter  Registration Number">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <input type="email" wire:model="email" class="form-control"
                                placeholder="Enter  Email">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-8">
                            <select id="course_id" wire:model="course_id" class="form-select">
                                <option selected>Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="row mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="gender"
                                            id="male" value="male">
                                        <label class="form-check-label" for="male">
                                            Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model="gender"
                                            id="female" value="female">
                                        <label class="form-check-label" for="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <input type="date" wire:model="dob" class="form-control"
                                placeholder="Enter  Date of Birth">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-8">
                            <input type="file" wire:model="passport_size" class="form-control"
                                placeholder="Upload your passport">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- End Primary Color Bordered Table -->


</div>
@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#disablebackdrop').modal('hide');
            $('#EditStudentModel').modal('hide');

        });

        window.addEventListener('open-edit-modal', event => {
            $('#EditStudentModel').modal('show');

        });
    </script>
@endpush
