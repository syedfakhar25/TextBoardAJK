@section('title') EOI Publishers @endsection
@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">EOI Publishers</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card" style="width: 100%">
                    <div class="card-header">
                        <h3 class="card-title">Publisher's List &nbsp;
                            {{-- <a href="{{route('publishers.store')}}" type="button" class="btn btn-primary">
                                 Add new <i class="fa fa-plus-circle"></i>
                             </a>--}}
                        </h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Name</th>
                                <th>Firm Name</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count = 1;?>
                            @foreach($publishers as $publisher)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td><a  type="button" class="" data-toggle="modal" data-target="#exampleModal{{$publisher->id}}">
                                             <b><u>
                                                     {{$publisher->name}}
                                                 </u>
                                             </b>
                                        </a>

                                        <div class="modal fade" id="exampleModal{{$publisher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Check the Security Challan of Publisher then Approve
                                                            </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{asset('eoiimages/'. $publisher->challan)}}" height="auto" width="100%">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{route('approve_eoi_publisher', $publisher->id)}}" type="button" class="btn btn-primary">Approve</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                   <td>{{$publisher->firm_name}}</td>
                                    <td>
                                        @if($publisher->eoi_approve == 0)
                                            <em class="text-warning" style="font-weight: bold">Pending</em>
                                        @elseif($publisher->eoi_approve == 1)
                                            <em class="text-success" style="font-weight: bold">Approved</em>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

