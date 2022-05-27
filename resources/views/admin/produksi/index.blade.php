@extends('admin.layouts.app')
@section('css')
{{-- Data table --}}
<link href="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet"
    type="text/css" />
<link href="{{asset('adminto/dist/')}}/assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet"
    type="text/css" />
<link href="{{asset('adminto/dist/')}}/assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet"
    type="text/css" />
<link href="{{asset('adminto/dist/')}}/assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
{{-- Select2 --}}
<link href="{{asset('adminto/dist/')}}/assets/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
<link href="{{asset('adminto/dist/')}}/assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('sass/custom.css') }}">


@endsection
@section('title')
Produksi - Wilayah
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Error</strong> {{ $error }}
        </div>
        @endforeach
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Success</strong> {{ $message }}
        </div>
        @endif
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
            <strong>Error</strong> {{ $message }}
        </div>
        @endif
        <div id="importData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Import Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.produksi.import')}}" enctype="multipart/form-data" method="POST"
                            data-parsley-validate="" novalidate="">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Berkas</label>
                                    <input type="file" id="file" class="form-control" accept="excel/*" name="file"
                                        placeholder="Berkas" />
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <div class="card-box">
            <div class="row head_table">
                <div class="col-md-6">
                    <h4 class="mt-0 header-title">Produksi Semua Wilayah</h4>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-block btn-success" data-toggle="modal" data-target="#importData"><i
                            class="mdi mdi-import"></i> Impor Data</button>
                </div>
            </div>
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Wilayah</th>
                        <th rowspan="1" colspan="2">Produksi</th>
                        <th rowspan="1" colspan="2">Tandan</th>
                        <th rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th>Hari ini</th>
                        <th>S/D Hari ini</th>
                        <th>Hari ini</th>
                        <th>S/D Hari ini</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div> <!-- end row -->
@endsection
@section('js')
{{-- Datatable --}}
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.bootstrap4.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.responsive.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/responsive.bootstrap4.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.buttons.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/buttons.html5.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/buttons.flash.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/buttons.print.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.keyTable.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/datatables/dataTables.select.min.js"></script>
<script src="{{asset('adminto/dist/')}}/assets/libs/pdfmake/vfs_fonts.js"></script>

{{-- Select2 --}}
<script src="{{asset('adminto/dist')}}/assets/libs/select2/select2.min.js"></script>

<script type="text/javascript">
    $(".select2").select2();
    $("#menu_aset").addClass('active');
    $("#menu_aset > a").addClass('active');
    $("#menu_aset > ul").addClass('active mm-show');
    $("#menu_aset_kelapa").addClass('mm-active');
    $(function() {
        window.table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 25,
            ajax: {
                url: "{{ route('admin.produksi.data')}}",
            },
            columns: [
                {   
                    data: 'DT_RowIndex', 
                    orderable: false, 
                    width:'10px',
                },
                {
                    data: 'nama',
                    name: 'nama',
                    defaultContent: '-', 
                    orderable: false, 
                },
                {
                    data: 'produksi_today',
                    name: 'produksi_today',
                    defaultContent: '-', 
                    orderable: false,
                    className:'kanan',
                },
                {
                    data: 'produksi',
                    name: 'produksi',
                    defaultContent: '-', 
                    orderable: false,
                    className:'kanan',
                },
                {
                    data: 'tandan_today',
                    name: 'tandan_today',
                    defaultContent: '-', 
                    orderable: false,
                    className:'kanan',
                },
                {
                    data: 'tandan',
                    name: 'tandan',
                    defaultContent: '-', 
                    orderable: false,
                    className:'kanan',
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    className : 'text-center',
                    width:'160px',
                    orderable: false
                },
            ]
        });
        $('#formAdd').on('submit', function(e){
            e.preventDefault();
            // let d = $('#formAdd').serialize();
            // var formData = new FormData($(this)[0]);
            $.ajax({
                url: "{{ route('admin.produksi.store') }}",
                type: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: true,
                processData: false,
            })
            .done(function(response) {
                if (response.status) {
                    Swal.fire("Data berhasil ditambahkan", response.message, "success");
                    $('#addData').on('hidden.bs.modal', function(e){
                        $('#formAdd')[0].reset();
                        $('.select2').val(null).trigger('change');
                    });
                    $('#addData').modal('hide');
                    setTimeout(function(){
                        table.ajax.reload()
                    }, 500)
                } else {
                    Swal.fire("Gagal", response.message, "warning");
                }
            })
            .fail(function() {
                if (jqXHR.status == 401) {
                    Swal.fire(textStatus, errorThrown, "error");
                }
            });
            return false;
        });
    });
</script>
@include('admin.shortcut_js')
@endsection