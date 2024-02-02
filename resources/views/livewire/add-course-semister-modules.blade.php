<div>
    <div class="pagetitle">
        <div class="row">
            <div class="col">
                <h1>Add Semister modules</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Semister modules</li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <a href="{{ route('course_semister_modules') }}" class="button btn btn-primary"
                    style="float: right;">Back</a>
            </div>
        </div>
    </div>
    <!-- End Page Title -->
    <div class="card">
        <div class="card-body">
            <form class="row g-3 mt-2 justify-content-between" wire:submit.prevent="saveSemisterModules">
                <div class="col-md-7">
                    <label for="course_id" class="form-label">Course</label>
                    <select id="course_id" wire:model="course_id" class="form-select">
                        <option selected>Select Course</option>
                        @foreach ($courses as $key => $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-4">
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
                <div class="col-md-12">
                    <fieldset class="row mt-2">
                        <legend class="col-form-label col-sm-12 pt-0">Select Modules</legend>
                        <div class="col-12 d-flex justify-content-start mx-3">
                            <div class="row col-12">
                                @foreach ($modules as $key => $module)
                                    <div class="col-md-6 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" wire:model="module_ids"
                                                id="module-{{ $key }}" value="{{ $module->id }}">
                                            <label class="form-check-label" for="module-{{ $key }}">
                                                {{ $module->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </fieldset>
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
