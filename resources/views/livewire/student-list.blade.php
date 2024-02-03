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
                <a href="{{ route('add.students') }}" class="button btn btn-primary" style="float: right;">+ Add
                    Student</a>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Primary Color Bordered Table -->
    <table class="table table-bordered border-primary mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
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
                    <th scope="row">{{ $a++ }}</th>
                    <td>
                        {{ $student->first_name }} {{ $student->middle_name }}
                        {{ $student->surname }}
                    </td>
                    <td>{{ $student->registration_no }}</td>
                    <td>{{ $student->email ?? 'None' }}</td>
                    <td>{{ $student->gender ?? 'None' }}</td>
                    @php
                        $date = new DateTime($student->dob);
                        $formatted_date = $date->format('M d, Y');
                    @endphp
                    <td>{{ $formatted_date ?? 'None' }}</td>
                    <td>{{ $student->course->name ?? 'None' }}</td>
                    <td>
                        <button type="button" wire:click="getStudentDetails({{ $student->id }})"
                            class="btn btn-info text-white"><i class="bi bi-eye-fill"></i></button>
                        <a href="{{ route('edit.students', ['student' => $student->id]) }}"
                            class="btn btn-warning text-white"><i class="bi bi-pen-fill"></i></a>
                        <button type="button" id="student_id" wire:click="getDeleteStudent({{ $student->id }})"
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
    {{ $students->links() }}

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
                    <form class="row g-3 align-items-center" wire:submit.prevent="DeleteStudent">
                        <div class="text-center my-2 mt-3">
                            Do you want to delete this Student?
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
            $('#EditStudentModel').modal('hide');

        });

        window.addEventListener('open-edit-modal', event => {
            $('#EditStudentModel').modal('show');

        });

        window.addEventListener('closeDeleteModal', event => {
            $('#deleteModel').modal('hide');

        });

        window.addEventListener('openDeleteModal', event => {
            $('#deleteModel').modal('show');

        });
    </script>
@endpush
