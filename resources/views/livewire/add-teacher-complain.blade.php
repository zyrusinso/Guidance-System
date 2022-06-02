<div>
<link rel="stylesheet" href="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Complain</h4>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div>
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="form-validation">
                    <div class="row">
                        <div class="col-xl-6" style="border-right: 1px dashed #333;">
                            <h6>Teacher Info</h6>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="teacherName">Teacher Full Name
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="teacherName" name="teacherName"
                                        placeholder="e.g Juan Dela Cruz" wire:model="teacherName">
                                </div>
                                @error('teacherName') <span class="error ml-3" style="color: red">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <h6>Complain</h6>
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="offense_title">Offense Title
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="offense_title" name="offense_title"
                                        placeholder="Student Offense" wire:model="offenseTitleForm">
                                </div>
                                @error('offenseTitleForm') <span class="error ml-3" style="color: red">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-5 col-form-label" for="offense_desc">Offense Description <span
                                        class="text-danger">*</span>
                                </label>
                                <div class="col-lg-12">
                                    <textarea class="form-control" id="offense_desc" name="offense_desc" rows="5"
                                        placeholder="Description of Offense" wire:model="offenseDescriptionForm"></textarea>
                                </div>
                                @error('offenseDescriptionForm') <span class="error ml-3" style="color: red">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 text-center mt-2">
                            <button type="submit" wire:click="create" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
</div>
