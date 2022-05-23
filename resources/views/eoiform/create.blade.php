@section('title') Publisher EOI  @endsection
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">EOI Form</h1>
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
                            <h6 style="color: red; font-weight: bold"><em>Choose the book you want, pay the amount and upload the challan </em></h6>
                            <span><b>Total Price: </b> {{$ad->price}} RS/-</span>
                            <hr>
                            <form method="POST" action="{{route('eoiform.store')}}" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="form-row">
                                    <?php $count=1;?>
                                    @foreach($books as $bk)
                                        <div class="col-md-3">
                                            <b>{{$count++.': '.$bk->books}}</b> &nbsp;<input type="checkbox" name="books[]" value="{{$bk->id}}">
                                        </div>

                                    @endforeach
                                        &nbsp;<input type="text" name="advert" value="{{$ad->id}}" hidden>
                                </div>
                                <div class="form-row">
                                    <hr width="100%">
                                    <div class="col-md-3">
                                        <label>Upload Challan</label>
                                        <input class="form-control" name="challan" type="file" required>
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
