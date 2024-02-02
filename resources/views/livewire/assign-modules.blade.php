<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Assign modules</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Assign modules</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <a href="{{ route('staffs') }}" class="button btn btn-primary" style="float: right;">Back</a>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <form class="row g-3 mt-2 justify-content-between" wire:submit.prevent="saveSemisterModules">
                <div class="col-md-7">
                    <label for="keywords" class="form-label fw-bold">Lecturer: <span
                            class="mx-2">{{ $lect_name }}</span></label>
                </div>
                <div class="col-md-3">
                    <label for="keywords" class="form-label fw-bold">Selected modules: <span
                            class="mx-2">{{ count($module_ids) }}</span></label>
                </div>
                <div class="col-md-7">
                    <label for="semister_id" class="form-label">Semister</label>
                    <select id="semister_id" wire:model="semister_id" class="form-select">
                        <option selected>Select Semister</option>
                        @foreach ($semisters as $key => $semister)
                            <option value="{{ $semister->id }}">{{ $semister->name }}</option>
                        @endforeach
                    </select>
                    @error('semister_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-12 mt-4">
                    <!-- Primary Color Bordered Table -->
                    <table class="table table-bordered border-primary">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Module Code</th>
                                <th scope="col">Module Name</th>
                                <th scope="col">Credit</th>
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
                                            class="btn btn-primary text-white" title="Assign"><i
                                                class="bi bi-check-all"></i></button>
                                        {{-- <button type="button" wire:click="getDeleteModule({{ $module->id }})"
                                            class="btn btn-danger" title="Remove"><i
                                                class="bi bi-trash-fill"></i></button> --}}
                                    </td>
                                </tr>
                            @empty
                                <td colspan="9" class="text-center">No module found.</td>
                            @endforelse

                        </tbody>
                    </table>
                    <!-- End Primary Color Bordered Table -->
                </div>
                <div class="text-end mt-5 mb-3">
                    @if ($editMode == true)
                        <button type="submit" class="btn btn-success" wire:loading.attr="disabled"
                            wire:target="SaveStaff">Update</button>
                    @else
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                            wire:target="SaveStaff">Finish</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
