<div>
    <div wire:ignore.self class="modal fade" id="driverModal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">

            <form class="modal-content" method="POST" wire:submit.prevent="DriverSave" enctype="multipart/form-data">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Driver Information</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Personal Info -->

                    <h6 class="fw-bold text-primary mb-3"><i class="fas fa-user-lock me-1"></i> Personal Info</h6>
                    <div class="form-group mb-3">
                        <label for="name" class="form-label fw-bold">Full Name</label>
                        <input type="text" wire:model="name" id="name" class="form-control" placeholder="Enter full name">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="birthdate" class="form-label fw-bold">Birthdate</label>
                        <input type="date" wire:model="birthdate" id="birthdate" class="form-control">
                        @error('birthdate') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="address" class="form-label fw-bold">Address</label>
                        <textarea wire:model="address" id="address" class="form-control" rows="2" placeholder="Enter address"></textarea>
                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="contact_number" class="form-label fw-bold">Contact Number</label>
                        <input type="text" wire:model="contact_number" id="contact_number" class="form-control" placeholder="Enter contact number">
                        @error('contact_number') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="license_number" class="form-label fw-bold">License Number</label>
                        <input type="text" wire:model="license_number" id="license_number" class="form-control" placeholder="Enter license number">
                        @error('license_number') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="license_expiration" class="form-label fw-bold">License Expiration</label>
                        <input type="date" wire:model="license_expiration" id="license_expiration" class="form-control">
                        @error('license_expiration') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="photo" class="form-label fw-bold">Photo</label>
                        <input type="file" wire:model="photo" id="photo" class="form-control">
                        @error('photo') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <hr>

                    <!-- Login Credentials -->
                    <h6 class="fw-bold text-primary mb-3"><i class="fas fa-user-lock me-1"></i> Login Credentials</h6>

                    <div class="form-group mb-3">
                        <label for="user_name" class="form-label fw-bold">Username</label>
                        <input type="text" wire:model="user_name" id="user_name" class="form-control" placeholder="Enter username">
                        @error('user_name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" wire:model="password" id="password" class="form-control" placeholder="Enter password">
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row g-2">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal">
                                    Cancel
                                </button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary w-100">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
