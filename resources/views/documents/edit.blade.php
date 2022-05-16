@section('title') Publisher Documents @endsection
@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Added Documents</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <!-- /.card-header -->
                    <div class="card-body">
                        <hr>
                        <form method="POST" action="{{route('documents.update', $document->id)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label class="form-label" for="customFile">CNIC of Proprietor/Director</label>
                                    <input type="file" name="cnic" class="form-control" id="customFile" />
                                    <img src="{{asset('publisher_docs/'. $document['cnic'])}}   " alt="img" height="100px" width="auto">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="customFile">CNIC of Father/Husband</label>
                                    <input type="file" name="father_cnic" class="form-control" id="customFile" />
                                    <img src="{{asset('publisher_docs/'. $document['father_cnic'])}}   " alt="img" height="100px">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="customFile">Copy of Declaration</label>
                                    <input type="file" name="declaration" class="form-control" id="customFile" />
                                    <img src="{{asset('publisher_docs/'. $document['declaration'])}}   " alt="img" height="100px">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="customFile">Copy of Purchased deed</label>
                                    <input type="file" name="purchase_deed" class="form-control" id="customFile" />
                                    <img src="{{asset('publisher_docs/'. $document['purchase_deed'])}}   " alt="img" height="100px">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="customFile">Copy of Rent deed</label>
                                    <input type="file" name="rent_deed" class="form-control" id="customFile" />
                                    <img src="{{asset('publisher_docs/'. $document['rent_deed'])}}   " alt="img" height="100px">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="customFile">Electricity Bill</label>
                                    <input type="file" name="electricity_bill" class="form-control" id="customFile" />
                                    <img src="{{asset('publisher_docs/'. $document['electricity_bill'])}}   " alt="img" height="100px">
                                </div>
                            </div>
                            <div class="row">
                                <hr width="100%">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label" for="customFile">Purchase Voucher of Equipment (Printing, Binding etc)</label>
                                    <input type="file" name="equipment_voucher" class="form-control" id="customFile"/>
                                    <img src="{{asset('publisher_docs/'. $document['equipment_voucher'])}}   " alt="img" height="100px">
                                </div>
                            </div>
                            <div class="row">
                                <br><br>
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
