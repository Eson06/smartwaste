<div>
    @section ('pageTitle', isset($pageTitle) ? $pageTitle : 'Calendar')

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
                        @if ($drivers->count() > 0)
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
                    @else
                        <tr>
                            <td colspan="8" class="text-center text-muted fw-semibold py-3">
                                🚫 No Collection Schedule Available
                            </td>
                        </tr>
                    @endif
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
