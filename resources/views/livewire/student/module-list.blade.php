<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Module Registration</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Module Registration</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <span type="button" class="badge bg-success py-2 mt-2" style="float: right; font-size: 13px;">
                    {{ $current_modules->semister->name }}
                </span>
            </div>
        </div>
    </div>

    <div class="row mt-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row pt-3">
                        <div class="col-md-12">
                            <!-- Primary Color Bordered Table -->
                            <table class="table table-bordered border-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Module Code</th>
                                        <th scope="col">Module Name</th>
                                        <th scope="col">Credit</th>
                                        {{-- <th scope="col">Semister name</th> --}}
                                        <th scope="col" class="text-center">Select</th>
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
                                            <td class="justify-content-center align-items-center text-center">
                                                <input wire:ignore.self type="checkbox" class=""
                                                    wire:model="module_ids" value="{{ $module->id }}"
                                                    style="width: 30px; height: 30px; border-radius: 100px; border: 1px solid #ccc;">
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="9" class="text-center">No module found.</td>
                                    @endforelse

                                </tbody>
                            </table>
                            <!-- End Primary Color Bordered Table -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="button" wire:click='registerModules' class="button btn btn-success"
                                style="float: right;">
                                Register Modules
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
