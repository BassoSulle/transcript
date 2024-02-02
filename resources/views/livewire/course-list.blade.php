<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Courses</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Courses</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <button type="button" class="button btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#disablebackdrop" style="float: right;">
                    +Add Course
                </button>
            </div>
        </div>
    </div>
    <div class="position:absolute; top:0; right:0;">
        <div class="modal fade" wire:ignore.self id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="clearForm"></button>
                    </div>
                    <div class="modal-body">

                        {{-- form inputs --}}
                        <form class="row g-3" wire:submit.prevent="SaveCourse">
                            <div class="col-md-12">
                                <input type="text" wire:model="name" class="form-control"
                                    placeholder="Enter course name">
                            </div>
                            <div class="col-md-12">
                                <input type="number" wire:model="duration" class="form-control"
                                    placeholder="Enter Course Duration">
                            </div>
                            <div class="col-12">
                                <select id="department_id" wire:model="nta_level_id" class="form-select">
                                    <option selected>Select NTA Level</option>
                                    @foreach ($nta_levels as $nta_level)
                                        <option value="{{ $nta_level->id }}">{{ $nta_level->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <select id="department_id" wire:model="department_id" class="form-select">
                                    <option selected>Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal"
                                    wire:click="clearForm">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- End Disabled Backdrop Modal-->
    </div>


    <!-- Primary Color Bordered Table -->
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Course Name</th>
                <th scope="col">Course Duration(Yrs)</th>
                <th scope="col">NTA Level</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @forelse ($courses as $course)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }}</td>
                    <td>{{ $course->nta_level->name }}</td>
                    <td>{{ $course->department->name }}</td>
                    <td>
                        <button type="button" wire:click="getCourseDetails({{ $course->id }})"
                            data-bs-toggle="modal" data-bs-target="#EditCourseModel"
                            class="btn btn-warning text-white"><i class="bi bi-pen-fill"></i></button>
                        <button type="button" wire:click="getDeleteCourse({{ $course->id }})"
                            class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @empty
                <td colspan="9" class="text-center">No course found.</td>
            @endforelse

        </tbody>
    </table>
    <!-- End Primary Color Bordered Table -->

    {{-- Model to Edit Course --}}
    <div class="modal fade" wire:ignore.self id="EditCourseModel" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="clearForm"></button>
                </div>
                <div class="modal-body">

                    {{-- form inputs --}}
                    <form class="row g-3" wire:submit.prevent="EditCourse">
                        <div class="col-md-12">
                            <input type="text" wire:model="name" class="form-control"
                                placeholder="Enter course name">
                        </div>
                        <div class="col-md-12">
                            <input type="number" wire:model="duration" class="form-control"
                                placeholder="Enter Course Duration">
                        </div>
                        <div class="col-12">
                            <select id="department_id" wire:model="nta_level_id" class="form-select">
                                <option selected>Select NTA Level</option>
                                @foreach ($nta_levels as $nta_level)
                                    <option value="{{ $nta_level->id }}">{{ $nta_level->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <select id="department_id" wire:model="department_id" class="form-select">
                                <option selected>Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal"
                                wire:click="clearForm">Close</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete madal --}}
    <div class="modal fade" wire:ignore.self id="deleteModel" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="clearForm"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form inputs --}}
                    <form class="row g-3 align-items-center" wire:submit.prevent="DeleteCourse">
                        <div class="text-center my-2 mt-3">
                            Do you want to delete this Course?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-bs-dismiss="modal"
                                wire:click="clearForm">Close</button>
                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#disablebackdrop').modal('hide');
            $('#EditCourseModel').modal('hide');

        });

        window.addEventListener('open-edit-modal', event => {
            $('#EditCourseModel').modal('show');

        });


        window.addEventListener('closeDeleteModal', event => {
            $('#deleteModel').modal('hide');

        });

        window.addEventListener('openDeleteModal', event => {
            $('#deleteModel').modal('show');

        });
    </script>
@endpush
