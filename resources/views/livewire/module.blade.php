<div>
<div class="position:absolute; top:0; right:0;">
    <!-- Disabled Backdrop Modal -->
    <button  type="button" class="button btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
+Add Module
     </button>
     <div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Add Module</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">

            {{-- form inputs --}}
            <form class="row g-3">
                <div class="col-md-6">
                  <input type="email" class="form-control" placeholder="Module Code">
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control" placeholder="Module Name">
                </div>
                <div class="col-md-4">
                  <select id="inputState" class="form-select">
                    <option selected>Semiter</option>
                    <option>...</option>
                  </select>
                </div>

              </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
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
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Age</th>
            <th scope="col">Start Date</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Brandon Jacob</td>
            <td>Designer</td>
            <td>28</td>
            <td>2016-05-25</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Bridie Kessler</td>
            <td>Developer</td>
            <td>35</td>
            <td>2014-12-05</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Ashleigh Langosh</td>
            <td>Finance</td>
            <td>45</td>
            <td>2011-08-12</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Angus Grady</td>
            <td>HR</td>
            <td>34</td>
            <td>2012-06-11</td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Raheem Lehner</td>
            <td>Dynamic Division Officer</td>
            <td>47</td>
            <td>2011-04-19</td>
          </tr>
        </tbody>
      </table>
      <!-- End Primary Color Bordered Table -->


</div>
