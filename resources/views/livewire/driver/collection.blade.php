<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Collection')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Collection</li>
    </ol>

    <div class="row">
        <div class="col-12 col-md-12 col-sm-12">
    
            <a href="#" class="btn btn-primary mb-2 mt-4" data-bs-toggle="modal" data-bs-target="#collectionModal">
                <svg  class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                 </svg>
                Submit Collection
            </a>
        </div>
    </div>

    <div class="container my-5">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-gradient bg-primary text-white text-center py-3">
                <h5 class="mb-0 fw-semibold">
                    <i class="bi bi-trash3-fill me-2"></i> Trash Collection Summary
                </h5>
            </div>
    
            <div class="card-body bg-light">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center mb-0 shadow-sm bg-white rounded">
                        <thead class="table-primary text-uppercase small">
                            <tr>
                                <th>Date</th>
                                <th>Barangay</th>
                                <th>Kilogram</th>
                                <th>Type of Trash</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($trashs as $collection)
                                @php
                                    // Assign color based on trash type
                                    $badgeClass = match($collection->collection_type) {
                                        'Biodegradable' => 'bg-success',
                                        'Non-Biodegradable' => 'bg-secondary',
                                        'Recyclable' => 'bg-info text-dark',
                                        'Residual' => 'bg-warning text-dark',
                                        'Hazardous' => 'bg-danger',
                                        default => 'bg-dark'
                                    };
                                @endphp
                                <tr>
                                    <td class="fw-semibold">{{ $collection->collection_date }}</td>
                                    <td>{{ $collection->collection_barangay }}</td>
                                    <td>{{ $collection->collection_kilogram }} kg</td>
                                    <td>
                                        <span class="badge {{ $badgeClass }} px-3 py-2">
                                            {{ $collection->collection_type }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-muted py-4">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
    
    @include('livewire.driver.modal.collection')
</div>
