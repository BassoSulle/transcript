<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Semister modules</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Semister modules</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <a href="{{ route('add.course_semister_modules') }}" class="button btn btn-primary"
                    style="float: right;">+Add New</a>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Primary Color Bordered Table -->
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Academic year</th>
                <th scope="col">Course</th>
                <th scope="col">Duration</th>
                <th scope="col">Semister</th>
                <th scope="col">Number of modules</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $a = 1;
            @endphp
            @forelse ($course_semister_modules as $item)
                <tr>
                    <th scope="row">{{ $a++ }}</th>
                    <td>{{ $item->acYear->year_of_studies }}</td>
                    <td>{{ $item->course->name }}</td>
                    <td>{{ $item->course->duration }}</td>
                    <td>{{ $item->semister->name }}</td>
                    @php
                        $jsonArray = $item->module_ids;
                        $phpArray = json_decode($jsonArray, true);
                        $module_no = count($phpArray);
                    @endphp
                    <td>{{ $module_no }}</td>
                    <td>
                        <a href="{{ route('edit.course_semister_modules', ['course' => $item->id]) }}" type="button"
                            class="btn btn-warning text-white"><i class="bi bi-pen-fill"></i></a>
                        <button type="button" class="btn btn-danger" wire:click="getDeleteCsm({{ $item->id }})"><i
                                class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No Semister modules found.</td>
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
                    <form class="row g-3 align-items-center" wire:submit.prevent="DeleteCsm">
                        <div class="text-center my-2 mt-3">
                            Do you want to delete this Course semister modules?
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
