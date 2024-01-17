<div>
            <div class="position:absolute; top:0; right:0;" >

                <!-- Add semister Modal -->
                <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
            +Add Department
                 </button>
                 <div class="modal fade"  wire:ignore.self id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
                   <div class="modal-dialog">
                     <div class="modal-content">
                       <div class="modal-header">
                         <h5 class="modal-title">Add Department</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                       </div>
                       <div class="modal-body">

                        {{-- form inputs --}}
                        <form class="row g-3" wire:submit.prevent="SaveDepartment">
                            <div class="col-12">
                              <input type="text" wire:model="name" class="form-control" placeholder="Department Name">
                              @error('name')
                              <span
                                  class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
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
                        <th scope="col">Department Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                @php
                $a=1;
                @endphp
                @forelse ( $departments as $department )
                                <tr>
                                    <th scope="row">{{$a++}}</th>
                                    <td>{{$department->name ?? 'None'}}</td>
                                    <td>
                                        <button type="button" wire:click="getDeptmentDetails({{$department->id}})" class="btn btn-warning"><i class="bi bi-pen-fill"></i></button>
                                        <button type="button" id="semister_id" wire:click="DeleteDepartment({{$department->id}})" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </td>
                                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No Department found.</td>
                </tr>
                @endforelse

                    </tbody>
                  </table>
                  <!-- End Primary Color Bordered Table -->

{{-- Edit Department Model --}}
<div class="modal fade"  wire:ignore.self id="EditDepartmentModel" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Department</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

         {{-- form inputs --}}
         <form class="row g-3" wire:submit.prevent="EditDepartment({{$department_id}})">
             <div class="col-12">
               <input type="text" wire:model="name" class="form-control" placeholder="Department Name">
               @error('name')
               <span
                   class="text-danger">{{ $message }}</span>
             @enderror
             </div>

             <div class="modal-footer">
                 <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                 <button type="submit" class="btn btn-success">Update</button>
             </div>

           </form>
                 </div>

                 </div>
             </div>
             </div>
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