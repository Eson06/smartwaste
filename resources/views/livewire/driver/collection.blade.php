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
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center fw-bold fs-5">
                🗑️ Trash Collection Summary
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Date</th>
                                <th>Barangay</th>
                                <th>Kilogram</th>
                                <th>Type of Trash</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2025-10-14</td>
                                <td>Barangay San Isidro</td>
                                <td>120</td>
                                <td><span class="badge bg-success">Biodegradable</span></td>
                            </tr>
                            <tr>
                                <td>2025-10-15</td>
                                <td>Barangay Malinis</td>
                                <td>80</td>
                                <td><span class="badge bg-warning text-dark">Recyclable</span></td>
                            </tr>
                            <tr>
                                <td>2025-10-16</td>
                                <td>Barangay Mabini</td>
                                <td>150</td>
                                <td><span class="badge bg-danger">Non-Biodegradable</span></td>
                            </tr>
                            <tr>
                                <td>2025-10-17</td>
                                <td>Barangay Bagong Silang</td>
                                <td>65</td>
                                <td><span class="badge bg-secondary">Residual</span></td>
                            </tr>
                            <tr>
                                <td>2025-10-18</td>
                                <td>Barangay Sta. Lucia</td>
                                <td>25</td>
                                <td><span class="badge bg-dark">Hazardous</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

    @include('livewire.driver.modal.collection')
</div>
