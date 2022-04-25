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
                <div class="row">
                    <div class="col-4 offset-4">
                        <div class="basic-form">
                            <div class="form-group">
                                <select wire:model="complainType" class="form-control">
                                    <option value="">--Select Complain Type--</option>
                                    @foreach ($this->complainTypeSelection() as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($registeredStudDropDown)
                    <div class="row">
                        <div class="col-4 offset-4">
                            <div class="basic-form">
                                <div class="form-group">
                                    <select wire:model="studNum" class="form-control">
                                        <option value="">--Select Student--</option>
                                        @foreach (\App\Models\StudProfile::all() as $item)
                                            <option value="{{ $item->stud_num }}">{{ $item->stud_num }} - {{ $item->fname }} {{ $item->lname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($searchStudentForm)
                    <div class="row mb-3">
                        <div class="col-4 offset-4">
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model="studentSearchNum">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" wire:click="searchStudent()" type="button">Search</button>
                                </div>
                            </div>
                            @error('studentSearchNum') <span class="error ml-3" style="color: red">{{ $message }}</span> @enderror
                        </div>
                    </div>
                @endif

                @if ($registerStudForm)
                    <div class="form-validation">
                        <div class="row">
                            <div class="col-xl-6" style="border-right: 1px dashed #333;">
                                <h6>Student Info</h6>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="stud_num">Student Number<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="stud_num" name="stud_num"
                                            placeholder="ex: 12345678910" autofocus wire:model="studNumForm">
                                    </div>
                                    @error('studNumForm') <span class="error ml-3" style="color: red">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="stud_fname">Student First Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="stud_fname" name="stud_fname"
                                            placeholder="e.g Juan" wire:model="studFNameForm">
                                    </div>
                                    @error('studFNameForm') <span class="error ml-3" style="color: red">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="stud_lname">Student Last Name
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="stud_lname" name="stud_lname"
                                            placeholder="e.g Dela Cruz" wire:model="studLNameForm">
                                    </div>
                                    @error('studLNameForm') <span class="error ml-3" style="color: red">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="email">email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="..." wire:model="studEmailForm">
                                    </div>
                                    @error('studEmailForm') <span class="error ml-3" style="color: red">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="phone_num">Phone Number<span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="phone_num" name="phone_num"
                                            placeholder="..." wire:model="studPhoneForm">
                                    </div>
                                    @error('studPhoneForm') <span class="error ml-3" style="color: red">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="address">Address
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="address" name="address"
                                            placeholder="..." wire:model="studAddressForm">
                                    </div>
                                    @error('studAddressForm') <span class="error ml-3" style="color: red">{{ $message }}</span> @enderror
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
                @endif
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('focusAdmin/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
</div>
