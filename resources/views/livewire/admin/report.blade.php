<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Report')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Report</li>
    </ol>

    <div class="row">
        <div class="container my-4">
            <h4 class="mb-3 text-primary fw-bold">📋 Report Status</h4>
            <div class="table-responsive">
              <table class="table table-bordered table-hover text-center align-middle">
                  <thead class="thead-dark">
                      <tr>
                          <th>Name</th>
                          <th>Date</th>
                          <th>Title</th>
                          <th>Message</th>
                          <th>Attachment</th>
                      </tr>
                  </thead>
                  <tbody>
                      @forelse ($reports as $report)
                          <tr>
                              <td>{{ $report->user->name }}</td>
                              <td>{{ $report->date }}</td>
                              <td>{{ $report->title }}</td>
                              <td>{{ $report->message }}</td>
                              <td>
                                  @if ($report->attachment)
                                      <a href="{{ asset('storage/' . $report->attachment) }}" target="_blank" class="btn btn-sm btn-primary">View</a>
                                  @else
                                      <span class="badge bg-secondary">No Attachment</span>
                                  @endif
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="5" class="text-center text-muted fw-semibold py-3">
                                  🚫 No Reports Found
                              </td>
                          </tr>
                      @endforelse
                  </tbody>
              </table>
          </div>
          
          </div>
          
    </div>

    @include('livewire.resident.modal.report')
</div>



