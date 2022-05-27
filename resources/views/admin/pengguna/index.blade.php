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
Pengguna
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
        <div id="addData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah Pengguna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="formAdd" enctype="multipart/form-data" data-parsley-validate="" novalidate="">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Nama" name="name"
                                        id="name" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" parsley-trigger="change" placeholder="Masukkan Email"
                                        name="email" id="email" class="form-control">
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
        <div id="editData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Pengguna</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="formEdit" method="post" data-parsley-validate="" enctype="multipart/form-data"
                            novalidate="">
                            @csrf
                            <input type="hidden" name="edit_id" id="edit_id">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Nama" name="name"
                                        id="edit_name" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" parsley-trigger="change" placeholder="Masukkan Email"
                                        name="email" id="edit_email" class="form-control">
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
                    <h4 class="mt-0 header-title">Pengguna</h4>

                </div>
                <div class="col-md-2 ml-auto mb-2">
                    <button class="btn btn-block btn-primary mt-0" data-toggle="modal" data-target="#addData"><i
                            class="mdi mdi-plus"></i> Pengguna</button>
                </div>
            </div>
            <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
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

    

    $(function() {
        window.table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            oredering: false,
            searching:false,
            pageLength: 25,
            ajax: {
                url: "{{ route('admin.pengguna.data')}}",
            },
            columns: [
                {   
                    data: 'DT_RowIndex', 
                    width:'10px',
                    orderable: false, 
                },
                {
                    data: 'name',
                    name: 'name',
                    defaultContent: '-', 
                    orderable: false, 
                },
                {
                    data: 'email',
                    name: 'email',
                    orderable: true, 
                    defaultContent: '-',
                    className: 'kanan', 
                    orderable: false, 
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

    });
    

    $('#formAdd').on('submit', function(e){
        e.preventDefault();
        // let d = $('#formAdd').serialize();
        // var formData = new FormData($(this)[0]);
        $.ajax({
            url: "{{ route('admin.pengguna.store') }}",
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

    $('body').on('submit', '#formEdit', function(){
        let d = $('#formEdit').serialize();
        $.ajax({
            url: "{{ route('admin.pengguna.update') }}",
            type: "POST",
            data: d,
            dataType: 'JSON'
        })
        .done(function(response) {
            if (response.status) {
                Swal.fire("Data berhasil diperbaharui", response.message, "success");
                $('#editData').modal('hide');
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

    function deleteData(id){
        Swal.fire({
            title: 'Anda Yakin?',
            text: 'Data Akan Dihapus Secara Permanen',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus'
        }).then(result =>{
            if(result.value){
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.pengguna.delete') }}",
                    data: {
                        "id": id,
                        "_token": "{{ csrf_token() }}",
                    },
                    dataType: "JSON",
                })
                .done(function(response){
                    if (response.status) {
                        Swal.fire("Sukses", response.message, "success");
                        setTimeout(function(){
                            table.ajax.reload()
                        }, 500)
                    } else {
                        Swal.fire("Gagal", response.message, "warning");
                    }
                })
                .fail(function(jqXHR, textStatus, errorThrown){
                    if (jqXHR.status == 401) {
                        Swal.fire(textStatus, errorThrown, "error");
                    }
                });
            }
        });
    }

    function editData(id){
        $.ajax({
            url : "{{ route('admin.pengguna.index') }}/detail/"+id,
            type : "GET",
            datatype : "JSON",
            success : function(data){
                $('#edit_id').val(data.id)
                $('#edit_name').val(data.name)
                $('#edit_email').val(data.email)
                $('#editData').modal('show');
            }
        });
    }
</script>
@include('admin.shortcut_js')
@endsection