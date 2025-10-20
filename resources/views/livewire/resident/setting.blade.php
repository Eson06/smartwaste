<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Setings')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Setings</li>
    </ol>

<div class="card shadow border-0 mb-5">
    <div class="card-header bg-success text-white text-center">
      <h4 class="mb-0 fw-bold">👤 Edit Personal Information</h4>
    </div>
    <div class="card-body">
      <form>
        <div class="row g-3">
          <!-- Personal Information -->
          <div class="col-md-6">
            <label class="form-label fw-semibold">Full Name</label>
            <input type="text" class="form-control" placeholder="Enter full name">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control" placeholder="Enter email">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-semibold">Phone Number</label>
            <input type="text" class="form-control" placeholder="Enter phone number">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-semibold">Address</label>
            <input type="text" class="form-control" placeholder="Enter address">
          </div>

          <!-- Login Details -->
          <div class="col-12 mt-4">
            <h5 class="fw-bold text-success">🔐 Login Details</h5>
            <hr>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-semibold">Username</label>
            <input type="text" class="form-control" placeholder="Enter username">
          </div>
          <div class="col-md-6">
            <label class="form-label fw-semibold">Password</label>
            <input type="password" class="form-control" placeholder="Enter password">
          </div>
          <div class="col-12 text-end">
            <button type="submit" class="btn btn-success px-4">Save Changes</button>
          </div>
        </div>
      </form>
    </div>

</div>