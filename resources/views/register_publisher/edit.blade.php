@section('title') Publisher Registration @endsection
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Challan</h1>
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
                            <h6 class="" style="color: red"><b>Make sure to add the correct Information</b></h6>
                            <hr>
                            <form method="POST" action="{{route('initial_registration.update', $initial_registration->id)}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label class="form-label" for="customFile">Upload image of Challan</label>
                                        <input type="file" name="challan_image" class="form-control" id="customFile" />
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{asset('publisher_register/'. $initial_registration['challan_image'])}}   " alt="img" height="100px" width="auto">
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
