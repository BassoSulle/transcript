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

    <div class="position:absolute; top:0; right:0;">
        <!-- Disabled Backdrop Modal -->
        <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Semister</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {{-- form inputs --}}
                    <form class="row g-3" wire:submit.prevent="AddSemister">
                    <div class="col-12">
                        <input type="text" wire:model="name" class="form-control" placeholder="Semiter Name">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                    </form>
                </div>

                </div>
            </div>
        </div><!-- End Disabled Backdrop Modal-->
    </div>

    <!-- Primary Color Bordered Table -->
    <table class="table table-bordered border-primary mt-2">
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
                $a=1;
            @endphp
            @forelse ( $staffs as $staff )
                <tr>
                    <th scope="row">{{$a++}}</th>
                    <td>{{$staff->first_name }} {{$staff->middle_name }} {{$staff->surname }}</td>
                    <td>{{$staff->email }}</td>
                    <td>{{$staff->gender }}</td>
                    <td>{{empty($staff->department_id) ? 'N/A' : $staff->department_id }}</td>
                    <td>{{$staff->role }}</td>
                    <td>
                        <button type="button" class="btn btn-warning"><i class="bi bi-pen-fill"></i></button>
                        <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No student found.</td>
                </tr>
            @endforelse 
        </tbody>
    </table>
    <!-- End Primary Color Bordered Table -->

</div>
