@section('title') Publisher Royalty  @endsection
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Royalty Fee</h1>
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
                            @if(count($noc)<1)
                                <h4>No NOC assigned against this Ad</h4>
                            @else
                            @if(count($royalty)>0)
                                <div class="row">
                                    <div class="col-md-3">
                                        <b>Total Amount</b>: {{$royalty[0]->total_price}}
                                    </div>
                                    <div class="col-md-3">
                                        <b>Paid Amount</b>: {{$royalty[0]->current_price}}
                                    </div>
                                    <div class="col-md-3">
                                        <b>Remaining Amount</b>: {{$royalty[0]->total_price - $royalty[0]->current_price}}
                                    </div>

                                </div>
                            @endif
                                <form method="POST" action="{{route('royalty.store')}}" enctype="multipart/form-data">
                                    @method('POST')
                                    @csrf
                                    <div class="form-row">
                                        @if(count($royalty)==0)
                                        <div class="col-md-4">
                                            <label>Enter Total Payable Amount</label>
                                            <input class="form-control" name="total_price" type="text">
                                        </div>
                                        @endif
                                        <div class="col-md-4">
                                            <label>Enter Amount You are Paying Now</label>
                                            <input class="form-control" name="current_price" type="text">
                                            <input class="form-control" name="user_id" type="text" value="{{$user_id}}" style="display: none">
                                            <input class="form-control" name="advert_id" type="text" value="{{$advert_id}}" style="display: none">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <hr width="100%">
                                        <div class="col-md-3">
                                            <label>Upload Challan of Payed Amount</label>
                                            <input class="form-control" name="challan" type="file" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <br><br>
                                    </div>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </form>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!--/.col (right) -->
            </div>
        </div>


@endsection
