<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Grades</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Grades</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <button type="button" class="button btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#disablebackdrop" style="float: right;">
                    +Add Grade
                </button>
            </div>
        </div>
    </div>
    <div class="position:absolute; top:0; right:0;">
        <div class="modal fade" wire:ignore.self id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Grade</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="clearForm"></button>
                    </div>
                    <div class="modal-body">

                        {{-- form inputs --}}
                        <form class="row g-3" wire:submit.prevent="SaveGrade">
                            <div class="col-md-12">
                                <input type="text" wire:model="name" class="form-control" placeholder="Grade Name">
                            </div>
                            <div class="col-md-6">
                                <input type="integer" wire:model="high_marks" class="form-control"
                                    placeholder="High Marks">
                            </div>
                            <div class="col-md-6">
                                <input type="integer" wire:model="low_marks" class="form-control"
                                    placeholder="Low Marks">
                            </div>
                            <div class="col-md-12">
                                <input type="integer" wire:model="point" class="form-control"
                                    placeholder="Grade points">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
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
                <th scope="col">Grade Name</th>
                <th scope="col">Low Marks</th>
                <th scope="col">High Marks</th>
                <th scope="col">Points</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @forelse ($grades as $grade)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $grade->name }}</td>
                    <td>{{ $grade->low_marks }}</td>
                    <td>{{ $grade->high_marks }}</td>
                    <td>{{ $grade->point }}</td>
                    <td>
                        <button type="button" wire:click="getGradeDetails({{ $grade->id }})" data-bs-toggle="modal"
                            data-bs-target="#EditGrademodel"class="btn btn-warning text-white"><i
                                class="bi bi-pen-fill"></i></button>
                        <button type="button" wire:click="DeleteGrade({{ $grade->id }})" class="btn btn-danger"><i
                                class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @empty
                <td colspan="9" class="text-center">No grade found.</td>
            @endforelse

        </tbody>
    </table>
    <!-- End Primary Color Bordered Table -->

    {{-- Edit Grade Model  --}}
    <div class="modal fade" wire:ignore.self id="EditGrademodel" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Grade</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="clearForm"></button>
                </div>
                <div class="modal-body">

                    {{-- form inputs --}}
                    <form class="row g-3" id="EditGrademodel" wire:submit.prevent="EditGrade">
                        <div class="col-md-12">
                            <input type="text" wire:model="name" class="form-control" placeholder="Grade Name">
                        </div>
                        <div class="col-md-6">
                            <input type="integer" wire:model="high_marks" class="form-control"
                                placeholder="High Marks">
                        </div>
                        <div class="col-md-6">
                            <input type="integer" wire:model="low_marks" class="form-control"
                                placeholder="Low Marks">
                        </div>
                        <div class="col-md-12">
                            <input type="integer" wire:model="point" class="form-control"
                                placeholder="Grade points">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                wire:click="clearForm">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
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
            $('#EditGradeModel').modal('hide');

        });

        window.addEventListener('open-edit-modal', event => {
            $('#EditGradeModel').modal('show');

        });
    </script>
@endpush
