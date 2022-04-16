@section('title') Application Form @endsection
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DETAIL OF INFRASTRUCTURE & FACILITIES</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <h5><b style="color: #0d6efd "><em>1. Showroom</em></b></h5>
                            <hr>
                            <form method="POST" action="" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Dimensions (Sq. Ft)</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Location</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Property Number</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Owned or Rented</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5><b style="color: #0d6efd "><em>2. Printing Machine</em></b></h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">Color</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">No. of Machines</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">Size</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">Model</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">Make</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">Impressions/hour</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5><b style="color: #0d6efd "><em>3. Power Arrangements</em></b></h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Alternative Power Arrangements</label>
                                        <select class="form-control" name="gender">
                                            <option disabled value="">--Select--</option>
                                            <option value="sole" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Yes</option>
                                            <option value="limited" >No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Power Generator Capacity (K.W)</label>
                                        <input type="text" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
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
