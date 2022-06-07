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
Aspek - {{ App\Models\Bantuan::wordCutString($parent->nama, 0 , 10) }}
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form id="formAdd" enctype="multipart/form-data" data-parsley-validate="" novalidate="">
                            @csrf
                            <div class="form-row">
                                <input type="hidden" name="id" id="id">
                                <div class="form-group col-md-12">
                                    <label>Nama</label>
                                    <input type="text" parsley-trigger="change" placeholder="Masukkan Nama" name="nama"
                                        id="nama" class="form-control">
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
            <div class="col-md-12">
                <div class="card-box py-0 px-0 ml-2">
                    <span>
                        <div class="row">
                            <div class="col-1 kotak_hijau"></div>
                            <div class="col">
                                <h3 class="">Coming Soong</h3>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </div>
        <div class="card-box">
            <div class="row head_table">
                <div class="col-md-2 mr-auto mb-2">
                    <a href="{{ route('admin.aspek.index3',$parent->id) }}" class="btn btn-block btn-warning mt-0"><i class="mdi mdi-arrow-left"></i> Kembali</a>
                </div>
                <div class="col-md-2 ml-auto mb-2">
                    <button class="btn btn-block btn-primary mt-0" onclick="addData()"><i class="mdi mdi-plus"></i> Tambah Data</button>
                </div>
            </div>
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Aksi</th>
                        <th>Nama</th>
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
    // $("#menu_master").toggle();
    $(document).ready(function () {
        $("#menu_master > a").addClass('mm-active');
        $("#menu_master > a").attr('aria-expanded', true);
        $("#menu_aspek").addClass('mm-active');
    });
    $(function() {
        window.table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 25,
            ajax: {
                url: "{{ route('admin.aspek.data4',$parent->id)}}",
            },
            columns: [
                {   
                    data: 'DT_RowIndex', 
                    orderable: false, 
                    width:'10px',
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    className : 'text-center',
                    width:'160px',
                    orderable: false
                },
                {
                    data: 'nama',
                    name: 'nama',
                    defaultContent: '-', 
                    orderable: false, 
                },
            ]
        });
        $('#formAdd').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('admin.aspek.store4',$parent->id) }}",
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
                    url: "{{ route('admin.aspek.index4',$parent->id) }}/delete/"+id,
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

    function addData(){
        $('#id').val('')
        $('#nama').val('')
        $('#myModalLabel').html('Tambah Data')
        $('#addData').modal('show');
    }
    function editData(id){
        $.ajax({
            url : "{{ route('admin.aspek.index4',$parent->id) }}/detail/"+id,
            type : "GET",
            datatype : "JSON",
            success : function(data){
                $('#id').val(data.id)
                $('#nama').val(data.nama)
                $('#myModalLabel').html('Ubah Data')
                $('#addData').modal('show');
            }
        });
    }
</script>
@endsection