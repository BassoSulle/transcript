<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
        <h1>Students</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Students</li>
            </ol>
        </nav>
        </div>
        <div class="col">
            <button type="button" class="button btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop" style="float: right;">+Add Semister</button>
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
                <th scope="col">Photo</th>
                <th scope="col">Full name</th>
                <th scope="col">Reg.No.</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Course</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $a=1;
            @endphp
            @forelse ( $students as $student )
                <tr>
                    <th scope="row">{{$a++}}</th>
                    <td>{{$student->name ?? 'None'}}</td>
                    <td>
                        <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
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
