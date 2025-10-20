<div>
    @section ('pageTitle',isset($pageTitle) ? $pageTitle : 'Driver')

    <ol class="breadcrumb fs-3" aria-label="breadcrumbs">

        <li class="breadcrumb-item active text-muted" aria-current="page">Driver</li>
    </ol>

    <div class="row">
        <div class="col-12 col-md-12 col-sm-12">
    
            <a href="#" class="btn btn-primary mb-2 mt-4" data-bs-toggle="modal" data-bs-target="#driverModal">
                <svg  class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 5l0 14"></path>
                    <path d="M5 12l14 0"></path>
                 </svg>
                Add Driver
            </a>
        </div>
    </div>


    <div class="container py-4">
        <h4 class="mb-4 text-center fw-bold text-primary">Drivers Information</h4>
    
        <div class="row g-3">
            @forelse ($drivers as $driver)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body d-flex align-items-center">
                            {{-- Driver Photo --}}
                            <div class="me-3">
                                @if ($driver->photo)
                                    <img src="{{ asset('storage/' . $driver->photo) }}" 
                                        alt="Driver Photo" 
                                        class="rounded-circle shadow-sm" 
                                        width="90" height="90"
                                        style="object-fit: cover;">
                                @else 
                                <img src="{{ asset('images/NoPhotoAvailable.jpg') }}" 
                                    alt="No Photo Available" 
                                    class="rounded-circle shadow-sm border border-light"
                                    width="90" height="90"
                                    style="object-fit: cover;">
                                @endif
                            </div>
    
                            {{-- Driver Info --}}
                            <div class="flex-grow-1">
                                <h5 class="fw-bold mb-1">{{ $driver->name }}</h5>
                                <p class="text-muted small mb-2">{{ $driver->address }}</p>
    
                                <ul class="list-unstyled small mb-2">
                                    <li><strong>Birthdate:</strong> {{ \Carbon\Carbon::parse($driver->birthdate)->format('F d, Y') }}</li>
                                    <li><strong>Contact:</strong> {{ $driver->contact_number ?? 'N/A' }}</li>
                                    <li><strong>License No.:</strong> {{ $driver->license_number }}</li>
                                    <li><strong>Expiration:</strong> 
                                        {{ $driver->license_expiration 
                                            ? \Carbon\Carbon::parse($driver->license_expiration)->format('F d, Y') 
                                            : 'N/A' }}
                                    </li>
                                </ul>
    
                                <button wire:click="editDriver({{ $driver->id }})" class="btn btn-sm btn-primary w-100 mt-2">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <div class="alert alert-info mt-4">
                        No driver records found.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
    
    

    @include('livewire.admin.modal.driver')
</div>
