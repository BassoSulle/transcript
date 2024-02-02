<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Staffs</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Staffs</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <a href="{{ route('add.staff') }}" class="button btn btn-primary" style="float: right;">+Add Staff</a>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Primary Color Bordered Table -->
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Department</th>
                <th scope="col">Position</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $a = 1;
            @endphp
            @forelse ($staffs as $staff)
                <tr>
                    <th scope="row">{{ $a++ }}</th>
                    <td>{{ $staff->first_name }} {{ $staff->middle_name }} {{ $staff->surname }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->gender }}</td>
                    <td>{{ empty($staff->department_id) ? 'N/A' : $staff->department->name }}</td>
                    <td>{{ $staff->role }}</td>
                    <td>
                        <a href="{{ route('assign_modules', ['staff' => $staff->id]) }}" type="button"
                            class="btn btn-info text-white" title="Assign modules"><i class="bi bi-book-fill"></i></a>
                        <a href="{{ route('edit.staff', ['staff' => $staff->id]) }}" type="button"
                            class="btn btn-warning text-white" title="Edit"><i class="bi bi-pen-fill"></i></a>
                        <button type="button" class="btn btn-danger" wire:click="getDeleteStaff({{ $staff->id }})"
                            title="Delete"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No staff found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- End Primary Color Bordered Table -->

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
                    <form class="row g-3 align-items-center" wire:submit.prevent="DeleteStaff">
                        <div class="text-center my-2 mt-3">
                            Do you want to delete this Staff?
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
        window.addEventListener('closeDeleteModal', event => {
            $('#deleteModel').modal('hide');

        });

        window.addEventListener('openDeleteModal', event => {
            $('#deleteModel').modal('show');

        });
    </script>
@endpush
