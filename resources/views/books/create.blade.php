@section('title') EOI Advertisement @endsection
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New</h1>
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
                            <form method="POST" action="{{route('books.store')}}" enctype="multipart/form-data">
                                @method('POST')
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label class="form-label" for="customFile">Upload Advertisement</label>
                                        <input type="file" name="advert" class="form-control" id="customFile" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="customFile">Last Date</label>
                                        <input type="date" name="date" class="form-control" id="customFile" />
                                    </div>
                                </div>
                                <div class="row">
                                    <hr width="100%">
                                    <h5>Add Books</h5> &nbsp; &nbsp;
                                    <button id="addRow" type="button" class="btn btn-info"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-4">
                                        <div id="inputFormRow">
                                            <div class="input-group mb-3">
                                                <input type="text" name="books[]" class="form-control m-input" placeholder="Book Name.." autocomplete="off">
                                                <div class="input-group-append">
                                                    <button id="removeRow" type="button" class="btn btn-danger"><i class="fa fa-minus"></i></button>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="newRow" class="row"></div>

                                    </div>
                                </div>
                                <div class="row">
                                    <br>
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary" type="submit">Save & Next</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
                <!--/.col (right) -->
            </div>
        </div>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>

            $("#addRow").click(function () {
                var html = '';
                html += '<div id="inputFormRow">';
                html += '<div class="input-group mb-3">';
                html += '<input type="text" name="books[]" class="form-control m-input" placeholder="Book Name" autocomplete="off">';
                html += '<div class="input-group-append">';
                html += '<button id="removeRow" type="button" class="btn btn-danger"><i class="fa fa-minus"></i></button>';
                html += '</div>';
                html += '</div>';

                $('#newRow').append(html);
            });

            // remove row
            $(document).on('click', '#removeRow', function () {
                $(this).closest('#inputFormRow').remove();
            });
        </script>


@endsection
