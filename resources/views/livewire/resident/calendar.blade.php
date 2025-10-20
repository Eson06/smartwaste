<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Calendar')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Calendar</li>
    </ol>

    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-header bg-primary text-white text-center fw-bold fs-5">
            🚘 Driver Weekly Schedule
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered align-middle text-center table-hover">
                <thead class="table-primary">
                  <tr>
                    <th>Driver Name</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="fw-semibold text-start">Juan Dela Cruz</td>
                    <td><span class="badge bg-success">8:00 AM - 4:00 PM</span></td>
                    <td><span class="badge bg-success">8:00 AM - 4:00 PM</span></td>
                    <td><span class="badge bg-danger">Off</span></td>
                    <td><span class="badge bg-success">8:00 AM - 4:00 PM</span></td>
                    <td><span class="badge bg-success">8:00 AM - 4:00 PM</span></td>
                    <td><span class="badge bg-warning text-dark">Half Day</span></td>
                    <td><span class="badge bg-danger">Off</span></td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-start">Pedro Santos</td>
                    <td><span class="badge bg-danger">Off</span></td>
                    <td><span class="badge bg-success">9:00 AM - 5:00 PM</span></td>
                    <td><span class="badge bg-success">9:00 AM - 5:00 PM</span></td>
                    <td><span class="badge bg-warning text-dark">Half Day</span></td>
                    <td><span class="badge bg-success">9:00 AM - 5:00 PM</span></td>
                    <td><span class="badge bg-success">9:00 AM - 1:00 PM</span></td>
                    <td><span class="badge bg-danger">Off</span></td>
                  </tr>
                  <tr>
                    <td class="fw-semibold text-start">Maria Lopez</td>
                    <td><span class="badge bg-success">7:00 AM - 3:00 PM</span></td>
                    <td><span class="badge bg-success">7:00 AM - 3:00 PM</span></td>
                    <td><span class="badge bg-success">7:00 AM - 3:00 PM</span></td>
                    <td><span class="badge bg-danger">Off</span></td>
                    <td><span class="badge bg-warning text-dark">Half Day</span></td>
                    <td><span class="badge bg-success">8:00 AM - 2:00 PM</span></td>
                    <td><span class="badge bg-success">8:00 AM - 2:00 PM</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    


</div>
