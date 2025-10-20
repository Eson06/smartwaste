<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Schedule')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Schedule</li>
    </ol>

    <div class="row">
      <div class="col-12 col-md-12 col-sm-12">
  
          <a href="#" class="btn btn-primary mb-2 mt-4" data-bs-toggle="modal" data-bs-target="#scheduleModal">
              <svg  class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                  <path d="M12 5l0 14"></path>
                  <path d="M5 12l14 0"></path>
               </svg>
             Assign Schedule
          </a>
      </div>
  </div>

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
                        @foreach ($drivers as $driver)
                            <tr>
                                <td class="fw-semibold text-start">{{ $driver->name }}</td>

                                @foreach (['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                                    @php
                                        // Get all barangays for this driver on the given day
                                        $daySchedules = $driver->schedules->where('day', $day);
                                    @endphp

                                    <td>
                                        @if ($daySchedules->count() > 0)
                                            @foreach ($daySchedules as $schedule)
                                                <span class="badge bg-success mb-1">{{ $schedule->barangay }}</span><br>
                                            @endforeach
                                        @else
                                            <span class="badge bg-danger">Off</span>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    

      @include('livewire.admin.modal.schedule')
</div>
