<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Modules</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Modules</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <button type="button" class="button btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#disablebackdrop" style="float: right;">
                    +Add Module
                </button>
            </div>
        </div>
    </div>
    <div class="position:absolute; top:0; right:0;">
        <div class="modal fade" wire:ignore.self id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Module</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="clearForm"></button>
                    </div>
                    <div class="modal-body">

                        {{-- form inputs --}}
                        <form class="row g-3" wire:submit.prevent="SaveModule">
                            <div class="col-md-12">
                                <input type="text" wire:model="code" class="form-control" placeholder="Module Code">
                            </div>
                            <div class="col-md-12">
                                <input type="text" wire:model="name" class="form-control" placeholder="Module Name">
                            </div>
                            <div class="col-md-12">
                                <input type="number" wire:model="credit" class="form-control"
                                    placeholder="Module credit">
                            </div>
                            {{-- <div class="col-md-12">
                                <select id="semister_id" wire:model="semister_id" class="form-select">
                                    <option selected>Semiter</option>
                                    @foreach ($semisters as $semister)
                                        <option value="{{ $semister->id }}">{{ $semister->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}
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
                <th scope="col">Module Code</th>
                <th scope="col">Module Name</th>
                <th scope="col">Credit</th>
                {{-- <th scope="col">Semister name</th> --}}
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @forelse ($modules as $module)
                <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $module->code }}</td>
                    <td>{{ $module->name }}</td>
                    <td>{{ $module->credit }}</td>
                    {{-- <td>{{ $module->semister->name ?? 'None' }}</td> --}}
                    <td>
                        <button type="button" wire:click="getModuleDetails({{ $module->id }})"
                            class="btn btn-warning text-white"><i class="bi bi-pen-fill"></i></button>
                        <button type="button" wire:click="getDeleteModule({{ $module->id }})"
                            class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @empty
                <td colspan="9" class="text-center">No module found.</td>
            @endforelse

        </tbody>
    </table>
    <!-- End Primary Color Bordered Table -->

    {{-- Model to edit Module --}}
    <div class="modal fade" wire:ignore.self id="EditModuleModel" tabindex="-1" data-bs-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Module</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click="clearForm"></button>
                </div>
                <div class="modal-body">

                    {{-- form inputs --}}
                    <form class="row g-3" wire:submit.prevent="EditModule">
                        <div class="col-md-12">
                            <input type="text" wire:model="code" class="form-control" placeholder="Module Code">
                        </div>
                        <div class="col-md-12">
                            <input type="text" wire:model="name" class="form-control" placeholder="Module Name">
                        </div>
                        <div class="col-md-12">
                            <input type="number" wire:model="credit" class="form-control" placeholder="Module credit">
                        </div>
                        {{-- <div class="col-md-12">
                            <select id="semister_id" wire:model="semister_id" class="form-select">
                                <option selected>Semiter</option>
                                @foreach ($semisters as $semister)
                                    <option value="{{ $semister->id }}">{{ $semister->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
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
                    <form class="row g-3 align-items-center" wire:submit.prevent="DeleteModule">
                        <div class="text-center my-2 mt-3">
                            Do you want to delete this Module?
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

</div>
@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#disablebackdrop').modal('hide');
            $('#EditModuleModel').modal('hide');

        });

        window.addEventListener('open-edit-modal', event => {
            $('#EditModuleModel').modal('show');

        });


        window.addEventListener('closeDeleteModal', event => {
            $('#deleteModel').modal('hide');

        });

        window.addEventListener('openDeleteModal', event => {
            $('#deleteModel').modal('show');

        });
    </script>
@endpush
