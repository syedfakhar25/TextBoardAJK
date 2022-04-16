@section('title') Dashboard @endsection
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-black-50" style="border: 2px solid red; border-radius: 45px">
                        <em style="text-shadow: 1px 1px 1px black; font-size: 35px;">
                            Welcome to Publisher Registration Portal
                        </em>
                    </h2>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="info-box col-md-6">
                    <a href="#" class="info-box-icon bg-info elevation-1"><i class="fas fa-angle-double-right"></i></a>
                    <div class="info-box-content">
                        <span class="info-box-text">Step 1</span>
                        <a href="#" class="info-box-number">
                            Application Form
                        </a>
                    </div>
                </div>
                <div class="info-box col-md-6">
                    <a href="#" class="info-box-icon bg-success elevation-1"><i class="fas fa-angle-double-right"></i></a>

                    <div class="info-box-content">
                        <span class="info-box-text">Step 2</span>
                        <a href="#" class="info-box-number">View Profile</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@endsection
