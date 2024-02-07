<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Academic Year Progress</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Academic Year Progress</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <button type="button" class="button btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#disablebackdrop" style="float: right;">
                    +New Academic year
                </button>
            </div>
        </div>
    </div>

    <div class="position:absolute; top:0; right:0;">
        <div class="modal fade" wire:ignore.self id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New Academic year</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="clearForm"></button>
                    </div>
                    <div class="modal-body">

                        {{-- form inputs --}}
                        <form class="row g-3" wire:submit.prevent="SaveAcademicYear">
                            <div class="col-md-12">
                                <input type="text" wire:model="year_of_studies" class="form-control"
                                    placeholder="Enter Academic yaer">
                            </div>
                            {{-- <div class="col-md-12">
                                <input type="text" wire:model="name" class="form-control" placeholder="Module Name">
                            </div> --}}
                            {{-- <div class="col-md-12">
                                <input type="number" wire:model="credit" class="form-control"
                                    placeholder="Module credit">
                            </div> --}}
                            <div class="col-md-12">
                                <select id="semister_id" wire:model="semister_id" class="form-select">
                                    <option selected>Select Semiter</option>
                                    @foreach ($semisters as $semister)
                                        <option value="{{ $semister->id }}">{{ $semister->name }}</option>
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
                <th scope="col">Academic year</th>
                <th scope="col">Current Semister</th>
                <th scope="col" class="text-center">Status</th>
                {{-- <th scope="col">Semister name</th> --}}
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @forelse ($acYears as $acYear)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $acYear->year_of_studies }}</td>
                    <td>{{ $acYear->semister->name }}</td>
                    <td class="text-success fw-bold text-center">
                        @if ($acYear->semister->name == 'Semister 1')
                            25%
                        @elseif ($acYear->semister->name == 'Semister 2')
                            50%
                        @elseif ($acYear->semister->name == 'Semister 3')
                            75%
                        @elseif ($acYear->semister->name == 'Semister 4')
                            100%
                        @endif
                    </td>
                    {{-- <td>{{ $module->semister->name ?? 'None' }}</td> --}}
                    <td>
                        <button type="button" wire:click="getAcademicYearDetails({{ $acYear->id }})"
                            class="btn btn-warning text-white"><i class="bi bi-pen-fill"></i></button>
                        {{-- <button type="button" wire:click="getDeleteModule({{ $acYear->id }})"
                            class="btn btn-danger"><i class="bi bi-trash-fill"></i></button> --}}
                    </td>
                </tr>
            @empty
                <td colspan="9" class="text-center">No Records found.</td>
            @endforelse

        </tbody>
    </table>
    <!-- End Primary Color Bordered Table -->

    {{-- Model to edit Module --}}
    <div class="modal fade" wire:ignore.self id="EditAcademicYearModel" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Academic year</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="clearForm"></button>
                </div>
                <div class="modal-body">

                    {{-- form inputs --}}
                    <form class="row g-3" wire:submit.prevent="EditAcademicYear">
                        <div class="col-md-12">
                            <input type="text" wire:model="year_of_studies" class="form-control"
                                placeholder="Module Code">
                        </div>
                        {{-- <div class="col-md-12">
                            <input type="text" wire:model="name" class="form-control" placeholder="Module Name">
                        </div> --}}
                        {{-- <div class="col-md-12">
                            <input type="number" wire:model="credit" class="form-control" placeholder="Module credit">
                        </div> --}}
                        <div class="col-md-12">
                            <select id="semister_id" wire:model="semister_id" class="form-select">
                                <option selected>Select Semiter</option>
                                @foreach ($semisters as $semister)
                                    <option value="{{ $semister->id }}">{{ $semister->name }}</option>
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

</div>

@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#disablebackdrop').modal('hide');
            $('#EditAcademicYearModel').modal('hide');

        });

        window.addEventListener('open-edit-modal', event => {
            $('#EditAcademicYearModel').modal('show');

        });
    </script>
@endpush
