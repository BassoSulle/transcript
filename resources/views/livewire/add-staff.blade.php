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
          <h5 class="card-title">Multi Columns Form</h5>

          <!-- Multi Columns Form -->
          <form class="row g-3">
            <div class="col-md-12">
              <label for="inputName5" class="form-label">Your Name</label>
              <div class="row">
                <div class="col-4">
                    <input type="text" class="form-control" id="inputName5" placeholder="Enter first name">
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" id="inputName5" placeholder="Enter last name">
                </div>
                <div class="col-4">
                    <input type="text" class="form-control" id="inputName5" placeholder="Enter surname">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="inputEmail5" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail5">
            </div>
            <div class="col-md-6">
              <label for="inputPassword5" class="form-label">Department</label>
              <select id="inputState" class="form-select">
                <option selected>Choose department</option>
                <option>...</option>
              </select>
            </div>
            <div class="col-md-6">
                <label for="inputEmail5" class="form-label">Position</label>
                <select id="inputState" class="form-select">
                    <option selected>Choose position</option>
                    <option>...</option>
                  </select>
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- End Multi Columns Form -->

        </div>
      </div>
</div>
