<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Add Staff</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Staff</li>
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
            <form class="row g-3 mt-2 justify-content-between" wire:submit.prevent="SaveStaff">
                <div class="col-md-12">
                    <label for="inputName5" class="form-label">Name</label>
                    <div class="row">
                        <div class="col-4">
                            <input type="text" class="form-control" id="inputName5" wire:model="first_name"
                                placeholder="Enter first name">
                            @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="inputName5" wire:model="middle_name"
                                placeholder="Enter middle name">
                            @error('middle_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="inputName5" wire:model="surname"
                                placeholder="Enter surname">
                            @error('surname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Email</label>
                    <input type="email" class="form-control" wire:model="email" id="inputEmail5">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputPassword5" class="form-label">Department</label>
                    <select id="inputState" wire:model="department_id" class="form-select">
                        <option selected>Choose department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="inputEmail5" class="form-label">Position</label>
                    <select id="inputState" wire:model="role" class="form-select">
                        <option selected>Choose position</option>
                        <option value="Admin">Administrator</option>
                        <option value="HOD">Head of Department</option>
                        <option value="Register">Register</option>
                        <option value="Lecturer">Lecturer</option>
                    </select>
                    @error('role')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <fieldset class="row mt-2">
                        <legend class="col-form-label col-sm-12 pt-0">Gender</legend>
                        <div class="col-sm-12 d-flex justify-content-start mx-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="gender" id="male"
                                    value="male">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check mx-5">
                                <input class="form-check-input" type="radio" wire:model="gender" id="female"
                                    value="female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-end mt-5 mb-3">
                    @if ($editMode == true)
                        <button type="submit" class="btn btn-success" wire:loading.attr="disabled"
                            wire:target="SaveStaff">Update</button>
                    @else
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled"
                            wire:target="SaveStaff">Save</button>
                    @endif
                </div>
            </form><!-- End Multi Columns Form -->

        </div>
    </div>
</div>
