<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Report')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Report</li>
    </ol>

    <div class="row">
        <div class="col-12 col-md-12 col-sm-12">
    
            <a href="#" class="btn btn-primary mb-2 mt-4" data-bs-toggle="modal" data-bs-target="#reportModal">
                <svg  class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                 </svg>
                Add Report
            </a>
        </div>
    </div>

    <div class="row">
        <div class="container my-4">
            <h4 class="mb-3 text-primary fw-bold">📋 Report Status</h4>
          
            <div class="table-responsive">
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover align-middle text-center">
                        <thead class="table-primary">
                          <tr>
                            <th>ID</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>2025-10-15</td>
                            <td>Garbage Overflow</td>
                            <td>Overflowing bins in Zone A need immediate attention.</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                            <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                          </tr>
                          <tr>
                            <td>2</td>
                            <td>2025-10-14</td>
                            <td>Schedule Missed</td>
                            <td>Collection truck did not arrive on schedule.</td>
                            <td><span class="badge bg-success">Resolved</span></td>
                            <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                          </tr>
                          <tr>
                            <td>3</td>
                            <td>2025-10-13</td>
                            <td>Damaged Bin</td>
                            <td>Bin #12 at Park Area needs replacement.</td>
                            <td><span class="badge bg-danger">Rejected</span></td>
                            <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
          </div>
          
    </div>

    @include('livewire.resident.modal.report')
</div>



