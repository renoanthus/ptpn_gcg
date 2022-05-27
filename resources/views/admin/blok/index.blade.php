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
Blok
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
                        <h4 class="modal-title" id="myModalLabel">Tambah Blok</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="formAdd" enctype="multipart/form-data" data-parsley-validate="" novalidate="">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Afdeling</label>
                                    <input type="text" readonly parsley-trigger="change"
                                        placeholder="Masukkan Nama Afdeling" value="{{ $afdeling->nama }}"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Nama" name="nama"
                                        id="nama" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Luas Lahan LM</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Luas Lahan LM"
                                        name="luas_lm" id="luas_lm" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Luas Lahan Drone</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Luas Lahan Drone"
                                        name="luas" id="luas" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tegakan LM</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Tegakan LM"
                                        name="tegakan_lm" id="tegakan_lm" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tegakan Drone</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Tegakan Drone"
                                        name="tegakan" id="tegakan" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>ATP + ATTP</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan ATP + ATTP"
                                        name="attp_atp" id="attp_atp" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status Tanam</label>
                                    <select name="status_tanam" id="status_tanam" class="form-control select2">
                                        <option value="">Pilih Status</option>
                                        <option value="0">Tanaman Belum Menghasilkan</option>
                                        <option value="1">Tanaman Menghasilkan</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tahun Tanam</label>
                                    <select name="tahun_tanam" id="tahun_tanam" class="form-control select2">
                                        <option value="">Pilih Tahun</option>
                                        @for ($i = Carbon\Carbon::now()->format('Y'); $i > 1990; --$i)
                                        <option value="{{ $i }}">{{ $i }}</option>

                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
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
        <div id="editData" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Edit Blok</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="formEdit" method="post" data-parsley-validate="" enctype="multipart/form-data"
                            novalidate="">
                            @csrf
                            <input type="hidden" name="edit_id" id="edit_id">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Afdeling</label>
                                    <input type="text" readonly parsley-trigger="change"
                                        placeholder="Masukkan Nama Afdeling" value="{{ $afdeling->nama }}"
                                        class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Nama" name="nama"
                                        id="edit_nama" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Luas Lahan LM</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Luas Lahan LM"
                                        name="luas_lm" id="edit_luas_lm" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Luas Lahan Drone</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Luas Lahan Drone"
                                        name="luas" id="edit_luas" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tegakan LM</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Tegakan LM"
                                        name="tegakan_lm" id="edit_tegakan_lm" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tegakan Drone</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Tegakan Drone"
                                        name="tegakan" id="edit_tegakan" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>ATP + ATTP</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan ATP + ATTP"
                                        name="attp_atp" id="edit_attp_atp" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Status Tanam</label>
                                    <select name="status_tanam" id="edit_status_tanam" class="form-control select2">
                                        <option value="">Pilih Status</option>
                                        <option value="0">Tanaman Belum Menghasilkan</option>
                                        <option value="1">Tanaman Menghasilkan</option>

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Tahun Tanam</label>
                                    <select name="tahun_tanam" id="edit_tahun_tanam" class="form-control select2">
                                        <option value="">Pilih Tahun</option>
                                        @for ($i = Carbon\Carbon::now()->format('Y'); $i > 1990; --$i)
                                        <option value="{{ $i }}">{{ $i }}</option>

                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
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
                <div class="card-box py-0 px-0 ml-2 mb-0">
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
                <div class="card-box py-0 px-0 ml-2 mb-0">
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
                    <h4 class="mt-0 header-title">Aset Kebun Kelapa Sawit {{ $afdeling->nama }}</h4>
                </div>
                <div class="col-md-2 ml-auto mb-2">
                    <button class="btn btn-block btn-primary mt-0" data-toggle="modal" data-target="#addData"><i
                            class="mdi mdi-plus"></i> Blok</button>
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
                        <th rowspan="2">Tahun Tanam</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="1" colspan="3">LM - 76</th>
                        <th rowspan="1" colspan="3">Drone</th>
                        <th rowspan="2">Selisih Tegakan</th>
                        <th rowspan="2">ATP + ATTP</th>
                        <th rowspan="2">Status Tanam</th>
                        <th style="min-width: 120px;" rowspan="2">Aksi</th>
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
            searching:false,
            ordering:false,
            pageLength: 25,
            ajax: {
                url: "{{ route('admin.blok.data',$afdeling->id)}}",
            },
            columns: [
                {   
                    data: 'DT_RowIndex', 
                    orderable: false, 
                    width:'10px',
                },
                {
                    data: 'tahun_tanam',
                    name: 'tahun_tanam',
                    defaultContent: '-'
                },
                {
                    data: 'nama',
                    name: 'nama',
                    defaultContent: '-', 
                    orderable: false, 
                },
                {
                    data: 'luas_lm',
                    name: 'luas_lm',
                    orderable: true, 
                    defaultContent: '-', 
                    orderable: false, 
                    className:'kanan',
                },
                {
                    data: 'tegakan_lm',
                    name: 'tegakan_lm',
                    defaultContent: '-', 
                    orderable: false, 
                    className:'kanan',
                },
                {
                    data: 'tegakan_lm_ha',
                    name: 'tegakan_lm_ha',
                    defaultContent: '-', 
                    orderable: false, 
                    className:'kanan',
                },
                {
                    data: 'luas',
                    name: 'luas',
                    defaultContent: '-', 
                    orderable: false, 
                    className:'kanan',
                },
                {
                    data: 'tegakan',
                    name: 'tegakan',
                    defaultContent: '-', 
                    orderable: false, 
                    className:'kanan',
                },
                {
                    data: 'tegakan_ha',
                    name: 'tegakan_ha',
                    defaultContent: '-', 
                    orderable: false, 
                    className:'kanan',
                },
                {
                    data: 'selisih_tegakan',
                    name: 'selisih_tegakan',
                    defaultContent: '-', 
                    orderable: false, 
                    className:'kanan',
                },
                {
                    data: 'attp_atp',
                    name: 'attp_atp',
                    defaultContent: '-', 
                    orderable: false, 
                    className:'kanan',
                },
                {
                    data: 'status_tanam',
                    name: 'status_tanam',
                    defaultContent: '-', 
                    orderable: false, 
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    className : 'text-center',
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
            url: "{{ route('admin.blok.store',$afdeling->id) }}",
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
        $.ajax({
            url: "{{ route('admin.blok.update',$afdeling->id) }}",
            type: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: true,
            processData: false,
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
            // if (jqXHR.status == 401) {
                Swal.fire("Error", "Dancok", "warning");
            // }
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
                    url: "{{ route('admin.blok.delete',$afdeling->id) }}",
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
            url : "{{ route('admin.blok.index',$afdeling->id) }}/detail/"+id,
            type : "GET",
            datatype : "JSON",
            success : function(data){
                $('#edit_id').val(data.id)
                $('#edit_nama').val(data.nama)
                $('#edit_luas').val(data.luas)
                $('#edit_luas_lm').val(data.luas_lm)
                $('#edit_tegakan').val(data.tegakan)
                $('#edit_tegakan_lm').val(data.tegakan_lm)
                $('#edit_attp_atp').val(data.attp_atp)
                $('#edit_status_tanam').val(data.status_tanam).trigger('change')
                $('#edit_tahun_tanam').val(data.tahun_tanam).trigger('change')
                $('#editData').modal('show');
            }
        });
    }
</script>
@include('admin.shortcut_js')
@endsection