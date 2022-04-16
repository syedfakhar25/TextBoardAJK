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
                            <form method="POST" action="" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Name Of Firm</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Phone # of Showroom</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Cell # of Owner</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault02">Showroom Address</label>
                                        <textarea class="form-control" name="address" rows="3" placeholder="Enter Adrress ..."></textarea>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Status of Firm</label>
                                        <select class="form-control" name="gender">
                                            <option disabled value="">--Select--</option>
                                            <option value="sole" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Sole Proprietorship</option>
                                            <option value="limited" >Limited Company</option>
                                            <option value="other" >Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">National Tax No.</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">GST. No (if any)</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
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
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Father Name</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Date of Birth</label>
                                        <input type="date" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault02">Gender</label>
                                        <select class="form-control" name="gender">
                                            <option disabled value="">--Select Gender--</option>
                                            <option value="male" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Male</option>
                                            <option value="female" >Female</option>
                                            <option value="other" >Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Marital Status</label>
                                        <select class="form-control" name="gender">
                                            <option disabled value="">--Select--</option>
                                            <option value="sole" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Single</option>
                                            <option value="limited" >Married</option>
                                            <option value="other" >Widowed</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Husband Name</label><em style="color: grey">(for Married Women)</em>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">CNIC No.</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Father CNIC No.</label><em style="color: grey">(if any)</em>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Husband CNIC No.</label><em style="color: grey">(if any)</em>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Email</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault02">Present Residential Address</label>
                                        <textarea class="form-control" name="address" rows="3" placeholder="Enter Adrress ..."></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault02">Permenant Residential Address</label>
                                        <textarea class="form-control" name="address" rows="3" placeholder="Enter Adrress ..."></textarea>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>

                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!--/.col (right) -->
            </div>
    </div>


@endsection
