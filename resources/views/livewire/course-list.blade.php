<div>
    <div>
        <div>
            <div class="position:absolute; top:0; right:0;">
                <!-- Disabled Backdrop Modal -->
                <button  type="button" class="button btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
            +Add Course
                 </button>
                 <div class="modal fade" wire:ignore.self id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title">Add Course</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       <div class="modal-body">

                        {{-- form inputs --}}
                        <form class="row g-3" wire:submit.prevent="SaveCourse">
                            <div class="col-md-12">
                              <input type="text" wire:model="name" class="form-control" placeholder="Enter course name" >
                            </div>
                            <div class="col-md-12">
                              <input type="number" wire:model="duration" class="form-control" placeholder="Enter Course Duration">
                            </div>
                            <div class="col-12">
                              <select id="department_id" wire:model="department_id" class="form-select">
                                <option selected>Select Department</option>
                                @foreach ($departments as $department)
                                  <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                              </select>
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
                 <table class="table table-bordered border-primary mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Course Duration(Yrs)</th>
                        <th scope="col">Department name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                    @forelse ($courses as $course)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$course->name}}</td>
                        <td>{{$course->duration}}</td>
                        <td>{{$course->department->name}}</td>
                        <td>
                            <button type="button" class="btn btn-warning"><i class="bi bi-pen-fill"></i></button>
                            <button type="button" wire:click="DeleteCourse({{$course->id}})" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    @empty

                    @endforelse

                    </tbody>
                  </table>
                  <!-- End Primary Color Bordered Table -->

</div>

@push('scripts')

  <script>
      window.addEventListener('close-modal', event => {
          $('#disablebackdrop').modal('hide');
          $('#EditDepartmentModel').modal('hide');

      });

      window.addEventListener('open-edit-modal', event => {
          $('#EditDepartmentModel').modal('show');

      });

  </script>

@endpush
