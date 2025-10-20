<div>
    <div wire:ignore.self class="modal fade" id="scheduleModal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">

            <form class="modal-content" method="POST" wire:submit.prevent="ScheduleSave" enctype="multipart/form-data">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Driver Information</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Driver</label>
                        <select wire:model="driver_id" class="form-select">
                            <option value="">-- Select Driver --</option>
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                            @endforeach
                        </select>
                        @error('driver_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Barangay -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Barangay</label>
                        <select class="form-control" wire:model="barangay" >
                            <option value="">-- Select Barangay --</option>
                            <option value="Balansay">Balansay</option>
                            <option value="Fatima (Tii)">Fatima (Tii)</option>
                            <option value="Payompon">Payompon</option>
                            <option value="Poblacion 1">Poblacion 1</option>
                            <option value="Poblacion 2">Poblacion 2</option>
                            <option value="Poblacion 3">Poblacion 3</option>
                            <option value="Poblacion 4">Poblacion 4</option>
                            <option value="Poblacion 5">Poblacion 5</option>
                            <option value="Poblacion 6">Poblacion 6</option>
                            <option value="Poblacion 7">Poblacion 7</option>
                            <option value="Poblacion 8">Poblacion 8</option>
                            <option value="San Luis (Ligang)">San Luis (Ligang)</option>
                            <option value="Talabaan">Talabaan</option>
                            <option value="Tangkalan">Tangkalan</option>
                            <option value="Tayamaan">Tayamaan</option>
                        </select>
                        @error('barangay') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>

                    <!-- Day -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">Day</label>
                        <select wire:model="day" class="form-select">
                            <option value="">-- Select Day --</option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                        @error('day') <small class="text-danger">{{ $message }}</small> @enderror
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
