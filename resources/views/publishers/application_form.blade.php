@section('title') Application Form @endsection
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Application Form</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h4><b style="color: #0d6efd "><em>General Information</em></b></h4>
                            <hr>
                            <form method="POST" action="{{route('publishers.store')}}" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Name Of Firm</label>
                                        <input type="text" name="firm_name" class="form-control" id="validationDefault01" placeholder="First name" value="${{$publisher->firm_name}}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Phone # of Showroom</label>
                                        <input type="text" name="firm_phone" class="form-control" id="validationDefault01" value="{{$publisher->firm_phone}}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Cell # of Owner</label>
                                        <input type="text" name="firm_cell" class="form-control" id="validationDefault01" value="{{$publisher->firm_cell}}" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault02">Showroom Address</label>
                                        <textarea class="form-control" name="firm_address" rows="3" placeholder="Enter Adrress ...">{{$publisher->firm_address}}</textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Status of Firm</label>
                                        <select class="form-control" name="firm_status">
                                            <option disabled value="">--Select--</option>
                                            <option value="sole" {{ $publisher->firm_status == 'sole' ? 'selected' : '' }}>Sole Proprietorship</option>
                                            <option value="limited" {{ $publisher->firm_status == 'limited' ? 'selected' : '' }}>Limited Company</option>
                                            <option value="other" {{ $publisher->firm_status == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">National Tax No.</label>
                                        <input type="text" name="firm_tax_no" class="form-control" id="validationDefault01" placeholder="First name" value="{{$publisher->firm_tax_no}}" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">GST. No (if any)</label>
                                        <input type="text" name="firm_gst_no" class="form-control" id="validationDefault01" placeholder="First name" value="{{$publisher->firm_gst_no}}" required>
                                    </div>
                                </div>


                                {{--personal info of owner--}}
                                <div class="form-row">
                                    <div class="col-md-12 mb-3 mt-5">
                                        <h4><b style="color: #0d6efd "><em>Personal Information of Publisher</em></b></h4>
                                        <hr>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Name</label>
                                        <input type="text" name="name" class="form-control" id="validationDefault01" placeholder="First name" value="{{$publisher->name}}" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Father Name</label>
                                        <input type="text" name="father_name" class="form-control" id="validationDefault01" placeholder="First name" value="{{$publisher->name}}" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="validationDefault01" placeholder="First name" value="{{$publisher->name}}" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault02">Gender</label>
                                        <select class="form-control" name="gender">
                                            <option disabled value="">--Select Gender--</option>
                                            <option value="male" {{ $publisher->gender == 'male' ? 'selected' : '' }}>Male</option>
                                            <option value="female" {{ $publisher->gender == 'female' ? 'selected' : '' }}>Female</option>
                                            <option value="other" {{ $publisher->gender == 'other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Marital Status</label>
                                        <select class="form-control" name="marital_status">
                                            <option disabled value="">--Select--</option>
                                            <option value="single" {{ $publisher->marital_status == 'single' ? 'selected' : '' }}>Single</option>
                                            <option value="married" {{ $publisher->marital_status == 'married' ? 'selected' : '' }}>Married</option>
                                            <option value="widowed" {{ $publisher->marital_status == 'widowed' ? 'selected' : '' }}>Widowed</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Husband Name</label><em style="color: grey">(for Married Women)</em>
                                        <input type="text" name="husband_name" class="form-control" id="validationDefault01" placeholder="First name" value="{{$publisher->husband_name}}" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">CNIC No.</label>
                                        <input type="text" name="cnic" class="form-control" id="validationDefault01" placeholder="First name" value="{{$publisher->cnic}}" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Father CNIC No.</label><em style="color: grey">(if any)</em>
                                        <input type="text" name="father_cnic" class="form-control" id="validationDefault01" placeholder="First name" value="{{$publisher->father_cnic}}" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Husband CNIC No.</label><em style="color: grey">(if any)</em>
                                        <input type="text" name="husband_cnic" class="form-control" id="validationDefault01" placeholder="First name" value="{{$publisher->husband_cnic}}" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Email</label>
                                        <input type="text" name="email" class="form-control" id="validationDefault01" placeholder="First name" value="{{$publisher->email}}" disabled>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault02">Present Residential Address</label>
                                        <textarea class="form-control" name="present_address" rows="3" placeholder="Enter Adrress ...">{{$publisher->present_address}}</textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault02">Permenant Residential Address</label>
                                        <textarea class="form-control" name="permanent_address" rows="3" placeholder="Enter Adrress ...">{{$publisher->permanent_address}}</textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Save & Next</button>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!--/.col (right) -->
            </div>
    </div>


@endsection
