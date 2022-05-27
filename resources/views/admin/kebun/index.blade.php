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


<style>
    .kotak_hijau {
        position: relative;
        width: 15px;
        left: 0px;
        top: 0px;

        /* Color System */

        background: #42D07D;
        border-radius: 6px 0px 0px 6px;

    }
</style>

@endsection
@section('title')
Kebun
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
                        <h4 class="modal-title" id="myModalLabel">Tambah Kebun</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="formAdd" enctype="multipart/form-data" data-parsley-validate="" novalidate="">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Wilayah</label>
                                    <input type="text" readonly parsley-trigger="change"
                                        placeholder="Masukkan Nama Wilayah" value="{{ $wilayah->nama }}"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Nama" name="nama"
                                        id="nama" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Singkatan</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Singkatan"
                                        name="singkatan" id="singkatan" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kode</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Kode" name="kode"
                                        id="kode" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Peta</label><small> (optional)</small>
                                    <input type="file" id="peta" class="form-control" accept="image/*" name="peta"
                                        placeholder="Foto Peta" />
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
        <div id="importData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Import Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.kebun.import',$wilayah->id)}}" enctype="multipart/form-data"
                            method="POST" data-parsley-validate="" novalidate="">
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
        <div id="editData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Kebun</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="formEdit" method="post" data-parsley-validate="" enctype="multipart/form-data"
                            novalidate="">
                            @csrf
                            <input type="hidden" name="edit_id" id="edit_id">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Wilayah</label>
                                    <input type="text" readonly parsley-trigger="change"
                                        placeholder="Masukkan Nama Wilayah" value="{{ $wilayah->nama }}"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Nama" name="nama"
                                        id="edit_nama" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Singkatan</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Singkatan"
                                        name="singkatan" id="edit_singkatan" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kode</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Kode" name="kode"
                                        id="edit_kode" class="form-control">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Peta</label><small> (optional)</small>
                                    <input type="file" id="edit_peta" class="form-control" accept="image/*" name="peta"
                                        placeholder="Foto Peta" />
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
        <h4 style="font-family: Roboto">Overview</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card-box py-0 px-0 ml-2">
                    <span>
                        <div class="row">
                            <div class="col-1 kotak_hijau"></div>
                            <div class="col">
                                <h3 class="">Data LM - 76</h3>
                                <p class="mb-0">Luas Areal ATP+ATTP : {{ $luas_areal_lm }} Ha</p>
                                <p class="mb-2">Jumlah Tegakan : {{ $tegakan_lm }} Pohon</p>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-box py-0 px-0 ml-2">
                    <span>
                        <div class="row">
                            <div class="col-1 kotak_hijau"></div>
                            <div class="col">
                                <h3 class="">Data Drone</h3>
                                <p class="mb-0">Luas Areal ATP+ATTP : {{ $luas_areal }} Ha</p>
                                <p class="mb-2">Jumlah Tegakan : {{ $tegakan }} Pohon</p>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </div>
        @include('admin.shortcut')
        <div class="card-box">
            <div class="row head_table">
                <div class="col-md-6">
                    <h4 class="mt-0 header-title">Aset Kebun Kelapa Sawit {{ $wilayah->nama }}</h4>
                </div>
                <div class="col-md-2 ml-auto mb-2">
                    <button class="btn btn-block btn-primary mt-0" data-toggle="modal" data-target="#addData"><i
                            class="mdi mdi-plus"></i> Kebun</button>
                </div>
                <div class="col-md-2 mb-2">
                    <button class="btn btn-block btn-success mt-0" data-toggle="modal" data-target="#importData"><i
                            class="mdi mdi-import"></i> Import</button>
                </div>
                {{-- <div class="col-md-2">
                        <button class="btn btn-block btn-success" data-toggle="modal" data-target="#importData"><i
                                class="mdi mdi-import"></i> Impor Data</button>
                    </div>
                    <div class="col-md-2">
                        <a id="exportData" target="_blank" class="btn btn-block btn-warning"><i
                                class="mdi mdi-file-excel"></i> Export
                            Data</a>
                    </div> --}}
            </div>
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="1" colspan="3">LM - 76</th>
                        <th rowspan="1" colspan="3">Drone</th>
                        <th rowspan="2">Selisih Tegakan</th>
                        <th rowspan="2">Jumlah Afdeling</th>
                        <th rowspan="2">Jumlah Blok</th>
                        <th style="min-width: 150px;" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th>Luas</th>
                        <th>Tegakan</th>
                        <th>Tegakan / Ha</th>
                        <th>Luas</th>
                        <th>Tegakan</th>
                        <th>Tegakan / Ha</th>
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
                url: "{{ route('admin.kebun.data',$wilayah->id)}}",
            },
            searching:false,
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
                    orderable:false
                },
                {
                    data: 'luas_lm',
                    name: 'luas_lm',
                    orderable: true, 
                    defaultContent: '-',
                    className: 'kanan',
                    orderable:false
                },
                {
                    data: 'tegakan_lm',
                    name: 'tegakan_lm',
                    defaultContent: '-',
                    className: 'kanan',
                    orderable:false
                },
                {
                    data: 'tegakan_lm_ha',
                    name: 'tegakan_lm_ha',
                    defaultContent: '-',
                    className: 'kanan',
                    orderable:false
                },
                {
                    data: 'luas',
                    name: 'luas',
                    defaultContent: '-',
                    className: 'kanan',
                    orderable:false
                },
                {
                    data: 'tegakan',
                    name: 'tegakan',
                    defaultContent: '-',
                    className: 'kanan',
                    orderable:false
                },
                {
                    data: 'tegakan_ha',
                    name: 'tegakan_ha',
                    defaultContent: '-',
                    className: 'kanan',
                    orderable:false
                },
                {
                    data: 'selisih_tegakan',
                    name: 'selisih_tegakan',
                    defaultContent: '-',
                    className: 'kanan',
                    orderable:false
                },
                {
                    data: 'afdeling_count',
                    name: 'afdeling_count',
                    defaultContent: '-',
                    className: 'kanan',
                    orderable:false
                },
                {
                    data: 'blok_count',
                    name: 'blok_count',
                    defaultContent: '-',
                    className: 'kanan',
                    orderable:false
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
            url: "{{ route('admin.kebun.store',$wilayah->id) }}",
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
            url: "{{ route('admin.kebun.update',$wilayah->id) }}",
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
                    url: "{{ route('admin.kebun.delete',$wilayah->id) }}",
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
            url : "{{ route('admin.kebun.index',$wilayah->id) }}/detail/"+id,
            type : "GET",
            datatype : "JSON",
            success : function(data){
                $('#edit_id').val(data.id)
                $('#edit_nama').val(data.nama)
                $('#edit_kode').val(data.kode)
                $('#edit_singkatan').val(data.singkatan)
                $('#editData').modal('show');
            }
        });
    }
</script>
@include('admin.shortcut_js')
@endsection