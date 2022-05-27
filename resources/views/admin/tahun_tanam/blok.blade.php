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
Tahun Tanam - {{ $tahun_tanam }} - Kebun {{ $afdeling->kebun->nama }} - Afdeling {{ $afdeling->nama }}
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
        <h4 style="font-family: Roboto">Overview</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="card-box py-0 px-0 ml-2">
                    <span>
                        <div class="row">
                            <div class="col-1 kotak_hijau"></div>
                            <div class="col">
                                <h3 class="">Data LM - 76</h3>
                                <p class="mb-0">Luas Areal TM : {{ $luas_areal_lm }} Ha</p>
                                <p class="mb-0">Jumlah Tegakan ATP : {{ $tegakan_lm_atp }} Pohon</p>
                                <p class="mb-2">Jumlah Tegakan ATTP : {{ $tegakan_lm_attp }} Pohon</p>
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
                                <p class="mb-0">Luas Areal : {{ $luas_areal }} Ha</p>
                                <p class="mb-0">Jumlah Tegakan ATP : {{ $tegakan_atp }} Pohon</p>
                                <p class="mb-2">Jumlah Tegakan ATTP : {{ $tegakan_attp }} Pohon</p>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        </div>
        @include('admin.shortcut')
        <div class="card-box">
            <div class="row head_table">
                <div class="col-md-12">
                    <h4 class="mt-0 header-title">Aset Kelapa Sawit Berdasarkan Tahun Tanam {{ $tahun_tanam }} -
                        Kebun {{ $afdeling->kebun->nama }} -
                        Afdeling {{ $afdeling->nama }}
                    </h4>
                </div>
            </div>
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="1" colspan="3">LM - 76</th>
                        <th rowspan="1" colspan="3">Drone</th>
                        <th rowspan="2">Selisih Tegakan</th>
                        <th rowspan="2">Aksi</th>
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
    $(function() {
        window.table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ordering: false,
            searching: false,
            pageLength: 25,
            ajax: {
                url: "{{ route('admin.tahun_tanam.blok.data', [$tahun_tanam,$afdeling->id])}}",
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
                    data: 'aksi',
                    name: 'aksi',
                    className : 'text-center',
                    orderable: false
                },
            ]
        });
    });
</script>
@include('admin.shortcut_js')
@endsection