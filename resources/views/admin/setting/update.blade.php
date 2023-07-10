@extends('layouts.admin')

@section('content')

<section style="background-color: #eee;">

    <div class="container">
        <h2> Update Profile</h2>
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{Auth()->user()->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Edit Modal -->
            <div class="card">
                <div class="card-content">
                    <div class="card-header">
                        <h4 class="card-title text-warning" id="exampleModalLabel">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3 d-flex" action="{{ route('settings.update',auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control" placeholder="image">
                                    <label for="floatingImage">Avatar</label>
                                    <img src="{{ asset('images/employee/'.auth()->user()->image) }}" alt="image" width="100px" height="100px">
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" value="{{ auth()->user()->name }}" id="floatingName" name="name" placeholder="User Name">
                                        <label for="floatingName">User Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" value="{{ auth()->user()->email }}" name="email" id="floatingEmail" placeholder="Your Email">
                                        <label for="floatingEmail">Your Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="first_name" value="{{ auth()->user()->first_name }}" id="floatingFirstName" placeholder="First Name">
                                        <label for="floatingFirstName">First Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="last_name" value="{{ auth()->user()->last_name }}" id="floatingLastName" placeholder="Last Name">
                                        <label for="floatingLastName">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="company" value="{{ auth()->user()->company }}" id="floatingCompany" placeholder="Company">
                                        <label for="floatingLastName">Company</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="job_title" value="{{ auth()->user()->job_title }}" id="floatingJob" placeholder="Job Title">
                                        <label for="floatingJob">Job Title</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="phone_number" value="{{ auth()->user()->phone_number }}" id="floatingPhone" placeholder="Phone Number">
                                        <label for="floatingPhone">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="webpage" value="{{ auth()->user()->webpage }}" id="floatingWebpage" placeholder="Webpage">
                                        <label for="floatingJob">Webpage</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" value="{{ auth()->user()->street }}" name="street" id="floatingStreet" placeholder="Street">
                                            <label for="floatingStreet">Street</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" value="{{ auth()->user()->city }}" name="city" id="floatingCity" placeholder="City">
                                            <label for="floatingCity">City</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="country" value="{{ auth()->user()->country }}" id="floatingSelect" aria-label="Country" />
                                        <label for="floatingSelect">Country</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="province" value="{{ auth()->user()->province }}" id="floatingSelect" aria-label="Province" />
                                        <label for="floatingSelect">State</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" value="{{ auth()->user()->zip_code }}" name="zip_code" id="floatingZip" placeholder="Zip">
                                        <label for="floatingZip">Zip</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="role_as" value="{{ auth()->user()->role_as }}" id="floatingSelect" aria-label="Role">
                                            <option>Please Select Role</option>
                                            <option value="1">Administrator</option>
                                            <option value="0">Seller</option>
                                        </select>
                                        <label for="floatingSelect">Role as</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" value="{{ auth()->user()->note }}" name="note" placeholder="Note" id="floatingTextarea" style="height: 100px;"></textarea>
                                        <label for="floatingTextarea">Note</label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center py-2">
                                <button type="submit" class="btn btn-warning">Update</button>
                                <a href="{{ route('settings.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

@endsection