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

                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li>
                                            <a href="{{route('eoiform.show', $ad->id)}}">Open: {{$ad->date}}</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <img src="{{asset('advertisment/'. $ad['advert'])}}" height="auto" >
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!--/.col (right) -->
            </div>
        </div>


@endsection
