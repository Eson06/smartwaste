<div>
    @section ('pageTitle', isset($pageTitle) ? $pageTitle : 'Calendar')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">
        <li class="breadcrumb-item active text-muted" aria-current="page">Calendar</li>
    </ol>

    <div class="container my-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center fw-bold fs-5">
                🏘️ Barangay Weekly Schedule
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Day</th>
                                <th>Barangay</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-semibold text-start">Monday</td>
                                <td><span class="badge bg-success">Barangay San Isidro</span></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-start">Tuesday</td>
                                <td><span class="badge bg-success">Barangay Malinis</span></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-start">Wednesday</td>
                                <td><span class="badge bg-success">Barangay Mabini</span></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-start">Thursday</td>
                                <td><span class="badge bg-success">Barangay Bagong Silang</span></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-start">Friday</td>
                                <td><span class="badge bg-success">Barangay Sta. Lucia</span></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-start">Saturday</td>
                                <td><span class="badge bg-success">Barangay Balagtas</span></td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-start">Sunday</td>
                                <td><span class="badge bg-danger">No Schedule</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
