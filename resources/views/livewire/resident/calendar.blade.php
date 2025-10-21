<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Calendar')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Calendar</li>
    </ol>

  
          <div class="container my-5">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center fw-bold fs-5">
                    🗓️ Weekly Barangay Collection Schedule
                </div>
        
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle text-center table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>Barangay</th>
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
                                @foreach ($schdecules->groupBy('barangay') as $barangay => $barangayschdecules)
                                    <tr>
                                        <td class="fw-semibold text-start">{{ $barangay }}</td>
        
                                        @foreach (['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
                                            @php
                                                // Filter schdecules for this barangay and day
                                                $dayschdecules = $barangayschdecules->where('day', $day);
                                            @endphp
        
                                            <td>
                                                @if ($dayschdecules->count() > 0)
                                                    @foreach ($dayschdecules as $schedule)
                                                        <div class="mb-2">
                                                            <span class="fw-semibold text-success">
                                                                {{ $schedule->driver->name }}
                                                            </span><br>
                                                            <span class="badge bg-success">With Pickup</span>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <span class="badge bg-danger">No Pickup</span>
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
        