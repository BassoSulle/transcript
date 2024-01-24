<div>
    <div>
        <div class="position:absolute; top:0; right:0;">
            <!-- Disabled Backdrop Modal -->
            <button type="button" class="button btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
                +Add Module
            </button>
            <div class="modal fade" wire:ignore.self id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Module</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            {{-- form inputs --}}
                            <form class="row g-3" wire:submit.prevent="SaveModule">
                                <div class="col-md-6">
                                    <input type="text" wire:model="code" class="form-control"
                                        placeholder="Module Code">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" wire:model="name" class="form-control"
                                        placeholder="Module Name">
                                </div>
                                <div class="col-md-4">
                                    <select id="semister_id" wire:model="semister_id" class="form-select">
                                        <option selected>Semiter</option>
                                        @foreach ($semisters as $semister)
                                            <option value="{{ $semister->id }}">{{ $semister->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- End Disabled Backdrop Modal-->
        </div>


        <!-- Primary Color Bordered Table -->
        <table class="table table-bordered border-primary mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Module Name</th>
                    <th scope="col">Module Code</th>
                    <th scope="col">Semister name</th>
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
                        <td>{{ $module->name }}</td>
                        <td>{{ $module->code }}</td>
                        <td>{{ $module->semister->name ?? 'None' }}</td>
                        <td>
                            <button type="button" wire:click="getModuleDetails({{ $module->id }})"
                                data-bs-toggle="modal" data-bs-target="#EditModuleModel" class="btn btn-primary"><i
                                    class="bi bi-pen-fill"></i></button>
                            <button type="button" wire:click="DeleteModule({{ $module->id }})"
                                class="btn btn-primary"><i class="bi bi-trash-fill"></i></button>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{-- form inputs --}}
                        <form class="row g-3" wire:submit.prevent="EditModule">
                            <div class="col-md-6">
                                <input type="text" wire:model="code" class="form-control" placeholder="Module Code">
                            </div>
                            <div class="col-md-6">
                                <input type="text" wire:model="name" class="form-control" placeholder="Module Name">
                            </div>
                            <div class="col-md-4">
                                <select id="semister_id" wire:model="semister_id" class="form-select">
                                    <option selected>Semiter</option>
                                    @foreach ($semisters as $semister)
                                        <option value="{{ $semister->id }}">{{ $semister->name }}</option>
                                    @endforeach
                                </select>
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
    </script>
@endpush
