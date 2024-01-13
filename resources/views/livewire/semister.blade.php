<div>
    <div>
        <div class="position:absolute; top:0; right:0;">
            <!-- Disabled Backdrop Modal -->
            <button  type="button" class="button btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
        +Add Semister
             </button>
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
                          <span
                              class="text-danger">{{ $message }}</span>
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
             <table class="table table-bordered border-primary mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Semister Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
            @php
            $a=1;
            @endphp
            @forelse ( $semisters as $semister )
                            <tr>
                                <th scope="row">{{$a++}}</th>
                                <td>{{$semister->name ?? 'None'}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-primary"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">No semisters found.</td>
            </tr>
            @endforelse

                </tbody>
              </table>
              <!-- End Primary Color Bordered Table -->


        </div>


</div>
