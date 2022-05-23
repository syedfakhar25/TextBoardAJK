@section('title') Dashboard @endsection
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{--<div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>--}}
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
                <h4 style="color: #0d6efd; font-weight: bold"><em>A) Initial Registration</em></h4>
            </div>
            <div class="row">
                <div class="info-box col-md-3">
                    <a href="#" class="info-box-icon bg-danger elevation-1"><i class="fas fa-angle-double-right"></i></a>
                    <div class="info-box-content">
                        <span class="info-box-text">Step 1</span>
                        <a href="{{route('publisher_application')}}" class="info-box-number">
                            General Information
                        </a>
                    </div>
                </div>
                <div class="info-box col-md-3">
                    <a href="#" class="info-box-icon bg-success elevation-1"><i class="fas fa-angle-double-right"></i></a>

                    <div class="info-box-content">
                        <span class="info-box-text">Step 2</span>
                        <a href="{{route('showroom.index')}}" class="info-box-number">Showroom Details</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="info-box col-md-3">
                    <a href="{{route('documents.index')}}" class="info-box-icon bg-primary elevation-1"><i class="fas fa-angle-double-right"></i></a>

                    <div class="info-box-content">
                        <span class="info-box-text">Step 3</span>
                        <a href="{{route('documents.index')}}" class="info-box-number">Documents</a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="info-box col-md-3">
                    <a href="{{route('initial_registration.index')}}" class="info-box-icon bg-dark elevation-1"><i class="fas fa-angle-double-right"></i></a>
                    @if($publihser_register != NULL && $publihser_register->submit == 1)
                        <div class="info-box-content">
                            <span class="info-box-text">Step 4</span>
                            <a href="{{route('publisher_profile')}}" class="info-box-number">Applied, View Profile</a>
                        </div>
                    @else
                    <div class="info-box-content">
                        <span class="info-box-text">Step 4</span>
                        <a href="{{route('initial_registration.index')}}" class="info-box-number">Apply Now</a>
                    </div>
                    @endif
                    <!-- /.info-box-content -->
                </div>
            </div>

            <div class="row">
                <hr width="100%">
            </div>
            @if($user->initial_approve ==0 )
                <div class="row">
                    <h6 style="color: red; font-weight: bold">
                        <em>You will be able to see the second step when Department approves your Registration after checking the Challan</em>
                    </h6>
                </div>
            @elseif($user->initial_approve ==1)

                <div class="row">
                    <h4 style="color: #0d6efd; font-weight: bold"><em>B) Apply for Books against the Ad</em></h4>
                </div>
                <div class="row">
                    <div class="info-box col-md-3">
                        <a href="#" class="info-box-icon bg-danger elevation-1"><i class="fas fa-angle-double-right"></i></a>
                        <div class="info-box-content">
                            <span class="info-box-text">Step 1</span>
                            <a href="#" class="info-box-number">
                                Select Books
                            </a>
                        </div>
                    </div>
                    <div class="info-box col-md-3">
                        <a href="#" class="info-box-icon bg-success elevation-1"><i class="fas fa-angle-double-right"></i></a>

                        <div class="info-box-content">
                            <span class="info-box-text">Step 2</span>
                            <a href="#" class="info-box-number">Apply </a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

@endsection
