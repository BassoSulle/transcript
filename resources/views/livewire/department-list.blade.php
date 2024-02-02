<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Departments</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Departments</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop"
                    style="float: right;">
                    +Add Department
                </button>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="position:absolute; top:0; right:0;">
        <!-- Add Department Modal -->
        <div class="modal fade" wire:ignore.self id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Department</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="clearForm"></button>
                    </div>
                    <div class="modal-body">

                        {{-- form inputs --}}
                        <form class="row g-3" wire:submit.prevent="SaveDepartment">
                            <div class="col-12">
                                <input type="text" wire:model="name" class="form-control"
                                    placeholder="Department Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal"
                                    wire:click="clearForm">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
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
                <th scope="col">Department Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $a = 1;
            @endphp
            @forelse ($departments as $department)
                <tr>
                    <th scope="row">{{ $a++ }}</th>
                    <td>{{ $department->name ?? 'None' }}</td>
                    <td>
                        <button type="button" wire:click="getDepartmentDetails({{ $department->id }})"
                            class="btn btn-warning text-white"><i class="bi bi-pen-fill"></i></button>
                        <button type="button" wire:click="getDeleteDepartment({{ $department->id }})"
                            class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No Department found.</td>
                </tr>
            @endforelse

        </tbody>
    </table>
    <!-- End Primary Color Bordered Table -->

    {{-- Edit Department Model --}}
    <div class="modal fade" wire:ignore.self id="EditDepartmentModel" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="clearForm"></button>
                </div>
                <div class="modal-body">

                    {{-- form inputs --}}
                    <form class="row g-3" wire:submit.prevent="EditDepartment">
                        <div class="col-12">
                            <input type="text" wire:model="name" class="form-control" placeholder="Department Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                    <form class="row g-3 align-items-center" wire:submit.prevent="DeleteDepartment">
                        <div class="text-center my-2 mt-3">
                            Do you want to delete this Department?
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
            $('#EditDepartmentModel').modal('hide');

        });

        window.addEventListener('open-edit-modal', event => {
            $('#EditDepartmentModel').modal('show');

        });

        window.addEventListener('closeDeleteModal', event => {
            $('#deleteModel').modal('hide');

        });

        window.addEventListener('openDeleteModal', event => {
            $('#deleteModel').modal('show');

        });
    </script>
@endpush
