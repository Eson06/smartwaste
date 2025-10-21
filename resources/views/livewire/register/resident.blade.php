@extends('back.layout.auth')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Resident Registration')
<link rel="manifest" href="{{ asset('/manifest.json') }}">
<script src="{{ asset('/sw.js') }}"></script>

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-dark text-white text-center py-3">
                    <h4 class="mb-0">🏠 Resident Registration Form</h4>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('resident.store') }}">
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    
                        @csrf

                        <!-- Login Credentials -->
                        <div class="mb-4">
                            <h5 class="text-secondary mb-3">🔐 Login Credentials</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="user_name" class="font-weight-bold">Username</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter username" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="font-weight-bold">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Basic Information -->
                        <div class="mb-4">
                            <h5 class="text-secondary mb-3">🧍 Basic Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="font-weight-bold">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter full name" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="gender" class="font-weight-bold">Gender</label>
                                    <select id="gender" name="gender" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="birthdate" class="font-weight-bold">Birthdate</label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Address and Contact -->
                        <div class="mb-4">
                            <h5 class="text-secondary mb-3">📍 Address & Contact</h5>
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label for="house_no" class="font-weight-bold">House No.</label>
                                    <input type="text" class="form-control" id="house_no" name="house_no" placeholder="House No.">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="purok" class="font-weight-bold">Purok</label>
                                    <input type="text" class="form-control" id="purok" name="purok" placeholder="Purok">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="barangay" class="font-weight-bold">Barangay</label>
                                    <select id="barangay" name="barangay" class="form-control">
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
                                </div>

                                
                                <div class="col-md-3 mb-3">
                                    <label for="contact" class="font-weight-bold">Contact No.</label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="09XXXXXXXXX">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Additional Details -->
                        <div class="mb-4">
                            <h5 class="text-secondary mb-3">📄 Additional Details</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="font-weight-bold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="occupation" class="font-weight-bold">Occupation</label>
                                    <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="civil_status" class="font-weight-bold">Civil Status</label>
                                    <select id="civil_status" name="civil_status" class="form-control">
                                        <option selected disabled>Choose...</option>
                                        <option>Single</option>
                                        <option>Married</option>
                                        <option>Widowed</option>
                                        <option>Separated</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-dark btn-lg px-5">
                                Register Now
                            </button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center text-muted small py-3">
                    <p class="mb-0">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-dark font-weight-bold">Login here</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
