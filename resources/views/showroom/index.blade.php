@section('title') Showroom Form @endsection
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
                            <form method="POST" action="{{route('showroom.store')}}" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Dimensions (Sq. Ft)</label>
                                        <input type="text" name="dimensions" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Location</label>
                                        <input type="text" name="location" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Property Number</label>
                                        <input type="text" name="property_number" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Owned or Rented</label>
                                        <input type="text" name="showroom_owner" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
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
                                        <input type="text" name="color" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">No. of Machines</label>
                                        <input type="text" name="no_of_machines" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">Size</label>
                                        <input type="text" name="size" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">Model</label>
                                        <input type="text" name="model" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">Make</label>
                                        <input type="text" name="make" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationDefault01">Impressions/hour</label>
                                        <input type="text" name="impressions"  class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
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
                                        <select class="form-control" name="alternative_arrangements">
                                            <option disabled value="">--Select--</option>
                                            <option value="sole" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Yes</option>
                                            <option value="limited" >No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Power Generator Capacity (K.W)</label>
                                        <input type="text" name="generator_capacity" class="form-control" id="validationDefault01" placeholder="First name" value="Mark" required>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5><b style="color: #0d6efd "><em>4. Binding Facilities</em></b></h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">No. of Automatic folding machine (s)</label>
                                        <select class="form-control" name="auto_machine">
                                            <option disabled value="">--Select--</option>
                                            <option value="owned" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Owned</option>
                                            <option value="contracted" >Contracted</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">No. of saddle stitching machines</label>
                                        <select class="form-control" name="stich_machine">
                                            <option disabled value="">--Select--</option>
                                            <option value="owned" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Owned</option>
                                            <option value="contracted" >Contracted</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">No. of sewing machines</label>
                                        <select class="form-control" name="sewing_machine">
                                            <option disabled value="">--Select--</option>
                                            <option value="owned" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Owned</option>
                                            <option value="contracted" >Contracted</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="col-md-12 m-2"> <h5 style="color: green">Hot Glue Binding Machine</h5> </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">No of single clamp machine</label>
                                        <select class="form-control" name="single_clamp">
                                            <option disabled value="">--Select--</option>
                                            <option value="owned" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Owned</option>
                                            <option value="contracted" >Contracted</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">No of three clamps machine</label>
                                        <select class="form-control" name="three_clamp">
                                            <option disabled value="">--Select--</option>
                                            <option value="owned" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Owned</option>
                                            <option value="contracted" >Contracted</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">No of five clamps machine</label>
                                        <select class="form-control" name="five_clamp">
                                            <option disabled value="">--Select--</option>
                                            <option value="owned" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Owned</option>
                                            <option value="contracted" >Contracted</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">No of upto ten clamps machine & above</label>
                                        <select class="form-control" name="ten_clamps">
                                            <option disabled value="">--Select--</option>
                                            <option value="owned" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Owned</option>
                                            <option value="contracted" >Contracted</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Single knife trimmer</label>
                                        <select class="form-control" name="single_knife">
                                            <option disabled value="">--Select--</option>
                                            <option value="owned" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Owned</option>
                                            <option value="contracted" >Contracted</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationDefault01">Three knives trimmer</label>
                                        <select class="form-control" name="three_knives">
                                            <option disabled value="">--Select--</option>
                                            <option value="owned" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Owned</option>
                                            <option value="contracted" >Contracted</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5><b style="color: #0d6efd "><em>5. FINANCIAL POSITION/INVESTMENT CAPACITY</em></b></h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <b>i) Bank Statement</b> <em>(Annual Bank Statement (s) showing turn over for the last three years issued by any
                                            scheduled Banks(s) in the name of the firm (Statements shall be verified from the Manager of the concerned branch).)</em>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Financial Year</label>
                                        <input type="text" name="financial_year" class="form-control" id="validationDefault01" placeholder="2021-22" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">RS/-</label>
                                        <input type="text" name="yearly_amount" class="form-control" id="validationDefault01" placeholder="e.g; 45000" value="" required>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 3%">
                                        <a class="btn btn-danger"><i class="fa fa-plus-circle"></i>Add More</a>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <b>ii) Approximate current value of Immovable property / Assets.
                                        </b>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <input type="text" name="assets_amount" class="form-control" id="validationDefault01" placeholder="e.g; 45000" value="" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <b>iii) Income Tax (Obligatory Requirement)
                                        </b>
                                        <em>Detail of Income Tax paid / deducted during the last three years</em>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Tax Year</label>
                                        <input type="text" name="tax_year" class="form-control" id="validationDefault01" placeholder="e.gs 2021" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="validationDefault01">Amount</label>
                                        <input type="text" name="yearly_tax_amount" class="form-control" id="validationDefault01" placeholder="e.g; 45000" value="" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5><b style="color: #0d6efd "><em>6. PUBLISHING EXPERIENCE </em></b></h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault01">Number of years in publishing trade or AJKTBB</label>
                                        <input type="text" name="years_in_publishing" class="form-control" id="validationDefault01" placeholder="e.g 5" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault01">Number of standard books published other than AJKTBB textbooks</label>
                                        <input type="text" name="no_of_books" class="form-control" id="validationDefault01" placeholder="e.g 5" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault01">Number of Holy Quran published (Colour / Black & white)</label>
                                        <input type="text" name="no_of_qurans" class="form-control" id="validationDefault01" placeholder="e.g 5" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h5><b style="color: #0d6efd "><em>7. GODOWN FACILITIES</em></b></h5>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <select class="form-control" name="godown_owner">
                                            <option disabled value="">--Owned or Rented--</option>
                                            <option value="owned" {{--{{ $user->gender == 'male' ? 'selected' : '' }}--}}>Owned</option>
                                            <option value="rented" >Rented</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault01">Dimension (Area in cub. ft.)</label>
                                        <input type="text" name="godown_area" class="form-control" id="validationDefault01" placeholder="e.g 5" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationDefault01">Address</label>
                                        <textarea class="form-control" name="godown_address" rows="3" placeholder="Enter Adrress ..."></textarea>
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
