@section('title') Publisher Profile @endsection
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile for Initial Registration</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row" >
                                <h5 style="color: green" align="center">
                                    <em>Go through the information carefully, if anything is missing click edit button then
                                        <a href="{{route('submit_registration')}}" style="color: red "><b><u>Submit</u></b></a>
                                    </em>
                                </h5>
                                <hr width="100%">
                            </div>
                            <h5><b><em>Challan</em></b></h5>
                            <div class="row">
                                <img src="{{asset('publisher_register/'. $register_publisher['challan_image'])}}   " alt="img" height="300px" >

                            </div>
                            <div class="row">
                                <br>
                            </div>
                            <h5><b><em>1. General Information</em> &nbsp; <a href="{{route('publisher_application')}}" class="btn btn-danger">Edit</a></b></h5>
                            <div class="row">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Name of Firm</td>
                                        <td>{{$user->firm_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Showroom Address</td>
                                        <td>{{$user->firm_phone}}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone # of showroom</td>
                                        <td>{{$user->firm_cell}}</td>
                                    </tr>
                                    <tr>
                                        <td>Cell # of owner</td>
                                        <td>{{$user->firm_address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status of Firm</td>
                                        <td>{{$user->firm_status}}</td>
                                    </tr>
                                    <tr>
                                        <td>National Tax No. (compulsory)</td>
                                        <td>{{$user->firm_tax_no}}</td>
                                    </tr>
                                    <tr>
                                        <td>GST. No. (if any)</td>
                                        <td>{{$user->firm_gst_no}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row"><hr></div>
                            <h5><b><em>2. PERSONAL INFORMATION ABOUT PUBLISHER</em></b></h5>
                            <div class="row">
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Name </td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Father’s Name </td>
                                        <td>{{$user->father_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of birth </td>
                                        <td>{{$user->dob}}</td>
                                    </tr>
                                    <tr>
                                        <td>Gender </td>
                                        <td>{{$user->gender}}</td>
                                    </tr>
                                    <tr>
                                        <td>Marital Status </td>
                                        <td>{{$user->marital_status}}</td>
                                    </tr>
                                    <tr>
                                        <td>Husband’s Name(only for married females) </td>
                                        <td>{{$user->husband_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>CNIC No. </td>
                                        <td>{{$user->cnic}}</td>
                                    </tr>
                                    <tr>
                                        <td>Father’s CNIC No. (if any)  </td>
                                        <td>{{$user->father_cnic}}</td>
                                    </tr>
                                    <tr>
                                        <td>Husband’s CNIC No.
                                            (only for married females)
                                        </td>
                                        <td>{{$user->husband_cnic}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email </td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Present Residential Address  </td>
                                        <td>{{$user->present_address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Permanent Residential Address </td>
                                        <td>{{$user->permanent_address}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row"><hr></div>
                            <h5><b><em>3. DETAIL OF INFRASTRUCTURE & FACILITIES</em> &nbsp; <a href="{{route('showroom.index')}}" class="btn btn-danger">Edit</a></b></h5>
                            <div class="row">
                                <b>i) SHOWROOM </b>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Dimensions (In Sq. ft.)  </td>
                                        <td>{{$show_room->dimensions}}</td>
                                    </tr>
                                    <tr>
                                        <td>Location   </td>
                                        <td>{{$show_room->location}}</td>
                                    </tr>
                                    <tr>
                                        <td>Property Number of Showroom   </td>
                                        <td>{{$show_room->property_number}}</td>
                                    </tr>
                                    <tr>
                                        <td>Owned or Rented  </td>
                                        <td>{{$show_room->showroom_owner}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <b>ii) PRINTING MACHINERY/EQUIPMENTS (OWNED/CONTRACTED) </b>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Colour quantity of Printing Machine
                                        </td>
                                        <td>{{$printing_machine->color}}</td>
                                    </tr>
                                    <tr>
                                        <td>No. of machines</td>
                                        <td>{{$printing_machine->no_of_machines}}</td>
                                    </tr>
                                    <tr>
                                        <td>Size of printing  Model Machine</td>
                                        <td>{{$printing_machine->size}}</td>
                                    </tr>
                                    <tr>
                                        <td>Model</td>
                                        <td>{{$printing_machine->model}}</td>
                                    </tr>
                                    <tr>
                                        <td>Make </td>
                                        <td>{{$printing_machine->make}}</td>
                                    </tr>
                                    <tr>
                                        <td>Impressions in one hour</td>
                                        <td>{{$printing_machine->impressions}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <b>iii) POWER ARRANGEMENT </b>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Colour quantity of Printing Machine
                                        </td>
                                        <td>{{$power_arrangements->alternative_arrangements}}</td>
                                    </tr>
                                    <tr>
                                        <td>No. of machines</td>
                                        <td>{{$power_arrangements->generator_capacity}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <b>iv) BINDING FACILITIES </b>
                                <table class="table table-bordered">
                                    <thead>
                                        <td>Binding Facilities</td>
                                        <td>Owned or Contracted </td>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>No. of Automatic folding machine (s)</td>
                                        <td>{{$binding->auto_machine}}</td>
                                    </tr>
                                    <tr>
                                        <td>No. of saddle stitching machines</td>
                                        <td>{{$binding->stich_machine}}</td>
                                    </tr>
                                    <tr>
                                        <td>No. of sewing machines</td>
                                        <td>{{$binding->sewing_machine}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <b>&nbsp;Hot Glue Binding Machine </b>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>No of single clamp machine</td>
                                        <td>{{$binding->single_clamp}}</td>
                                    </tr>
                                    <tr>
                                        <td>No of three clamps machine</td>
                                        <td>{{$binding->three_clamp}}</td>
                                    </tr>
                                    <tr>
                                        <td>No of five clamps machine</td>
                                        <td>{{$binding->five_clamp}}</td>
                                    </tr>
                                    <tr>
                                        <td>No of upto ten clamps machine & above</td>
                                        <td>{{$binding->ten_clamps}}</td>
                                    </tr>
                                    <tr>
                                        <td>Single knife trimmer</td>
                                        <td>{{$binding->single_knife}}</td>
                                    </tr>
                                    <tr>
                                        <td>Three knives trimmer</td>
                                        <td>{{$binding->three_knives}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <b>v) FINANCIAL POSITION/INVESTMENT CAPACITY </b>
                                <table class="table table-bordered">
                                    <thead>
                                    <td><b>Average monthly Balance for the financial year</b></td>
                                    <td>Rs.</td>
                                    </thead>
                                    <tbody>
                                    @foreach($financial_position as $fp)
                                        <tr>
                                            <td>{{$fp->financial_year}}</td>
                                            <td>{{$fp->yearly_amount}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td><b>Approximate current value of Immovable property / Assets.
                                            </b></td>
                                        <td>{{$financial_position[0]->assets_amount}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table class="table table-bordered">
                                    <tbody>
                                    @foreach($financial_position as $fp)
                                        <thead>
                                        <td><b>Income Tax paid for the financial year</b></td>
                                        <td>Rs.</td>
                                        </thead>
                                        <tr>
                                            <td>{{$fp->tax_year}}</td>
                                            <td>{{$fp->yearly_tax_amount}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="row">
                                <b>vi) PUBLISHING EXPERIENCE </b>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td>Number of years in publishing trade or AJKTBB</td>
                                        <td>{{$publishing->years_in_publishing}}</td>
                                    </tr>
                                    <tr>
                                        <td>Number of standard books published other than AJKTBB textbooks </td>
                                        <td>{{$publishing->no_of_books}}</td>
                                    </tr>
                                    <tr>
                                        <td>Number of Holy Quran published (Colour / Black & white)</td>
                                        <td>{{$publishing->no_of_qurans}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            <div class="row">
                                <b>vii) GODOWN FACILITIES </b>
                                <table class="table table-bordered" width="100%">
                                    <tbody>
                                    <tr>
                                        <td>Owned or rented</td>
                                        <td>{{$godown->godown_owner}}</td>
                                    </tr>
                                    <tr>
                                        <td>Dimension (Area in cub. ft.) </td>
                                        <td>{{$godown->godown_area}}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{$godown->godown_address}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!--/.col (right) -->
            </div>
        </div>


@endsection
