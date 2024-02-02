<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Awards</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Awards</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <button type="button" class="button btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#disablebackdrop" style="float: right;">
                    +Add Award
                </button>
            </div>
        </div>
    </div>
    <div class="position:absolute; top:0; right:0;">
        <div class="modal fade" wire:ignore.self id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Award</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="clearForm""></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" wire:submit.prevent="saveAward">
                            <div class="col-md-12">
                                <input type="text" wire:model="name" class="form-control" placeholder="Award Name">
                            </div>
                            <div class="col-md-6">
                                <input type="number" wire:model="high_gpa" class="form-control"
                                    placeholder="High Marks">
                            </div>
                            <div class="col-md-6">
                                <input type="number" wire:model="low_gpa" class="form-control" placeholder="Low Marks">
                            </div>
                            <div class="col-md-12">
                                <input type="number" wire:model="overall_gpa" class="form-control"
                                    placeholder="Grade points">
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
                <th scope="col">Name</th>
                <th scope="col">Low GPA</th>
                <th scope="col">High GPA</th>
                <th scope="col">Overall GPA</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @forelse ($awards as $award)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $award->name }}</td>
                    <td>{{ $award->low_gpa }}</td>
                    <td>{{ $award->high_gpa }}</td>
                    <td>{{ $award->overall_gpa }}</td>
                    <td>
                        <button type="button" wire:click="getAwardDetails({{ $award->id }})"
                            class="btn btn-warning text-white"><i class="bi bi-pen-fill"></i></button>
                        <button type="button" wire:click="getDeleteAward({{ $award->id }})"
                            class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @empty
                <td colspan="6" class="text-center">No Award found.</td>
            @endforelse

        </tbody>
    </table>
    <!-- End Primary Color Bordered Table -->

    {{-- Model to Edit Course --}}
    <div class="modal fade" wire:ignore.self id="EditCourseModel" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Award</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="clearForm"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- form inputs --}}
                    <form class="row g-3" wire:submit.prevent="EditAward">
                        <div class="col-md-12">
                            <input type="text" wire:model="name" class="form-control" placeholder="Award Name">
                        </div>
                        <div class="col-md-6">
                            <input type="number" wire:model="high_gpa" class="form-control" placeholder="High Marks">
                        </div>
                        <div class="col-md-6">
                            <input type="number" wire:model="low_gpa" class="form-control" placeholder="Low Marks">
                        </div>
                        <div class="col-md-12">
                            <input type="number" wire:model="overall_gpa" class="form-control"
                                placeholder="Grade points">
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
                    <form class="row g-3 align-items-center" wire:submit.prevent="DeleteAward">
                        <div class="text-center my-2 mt-3">
                            Do you want to delete this Award?
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
