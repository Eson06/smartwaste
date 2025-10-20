<div>
    <div wire:ignore.self class="modal fade" id="collectionModal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">

            <form class="modal-content" method="POST" wire:submit.prevent="submitCollection">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">🗑️ Trash Collection Report</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Date Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Date of Collection</label>
                        <input type="date" class="form-control" wire:model="collection_date" required>
                        @error('collection_date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Barangay Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Barangay</label>
                        <select class="form-control" wire:model="collection_barangay" required>
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
                        @error('collection_barangay') 
                            <small class="text-danger">{{ $message }}</small> 
                        @enderror
                    </div>
                    

                    <!-- Kilogram Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Total Kilograms</label>
                        <input type="number" class="form-control" placeholder="Enter weight in kg" wire:model="collection_kilogram" min="0" step="0.1" required>
                        @error('collection_kilogram') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Type of Trash -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Type of Trash</label>
                        <select class="form-select" wire:model="collection_type" required>
                            <option value="">Select type</option>
                            <option value="Biodegradable">Biodegradable</option>
                            <option value="Non-Biodegradable">Non-Biodegradable</option>
                            <option value="Recyclable">Recyclable</option>
                            <option value="Residual">Residual</option>
                            <option value="Hazardous">Hazardous</option>
                        </select>
                        @error('collection_type') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
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
