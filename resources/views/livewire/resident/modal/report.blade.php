<div>
    <div wire:ignore.self class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md modal-dialog-centered" role="document">

            <form class="modal-content" method="POST" wire:submit.prevent="saveReport">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Submit Report</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Date Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Date</label>
                        <input type="date" class="form-control" wire:model="report_date" required>
                        @error('report_date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Title Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" wire:model="report_title" required>
                        @error('report_title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Message Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Message</label>
                        <textarea class="form-control" rows="3" placeholder="Enter your message" wire:model="report_message" required></textarea>
                        @error('report_message') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <!-- Attachment Input -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Attachment</label>
                        <input type="file" class="form-control" wire:model="report_attachment" accept="image/*,.pdf,.doc,.docx">
                        @error('report_attachment') <small class="text-danger">{{ $message }}</small> @enderror
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
