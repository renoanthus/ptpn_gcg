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

@endsection
@section('title')
Wilayah
@endsection
@section('content')
<div class="row">
    <div class="col-12" style="text-align: center">
        <div class="card-box">

            @php
            if ($wilayah->peta != null) {
            if (!file_exists($wilayah->peta)) {
            $wilayah->peta = 'assets/images/peta/placeholder.jpeg';
            }
            }else{
            $wilayah->peta = 'assets/images/peta/placeholder.jpeg';
            }
            @endphp
            <img src="{{ asset($wilayah->peta) }}" alt="" style="max-width: 900px;">
        </div>
    </div>
    <div class="col-12">
        <h4 style="font-family: Roboto">
            {{ $wilayah->nama}}
        </h4>
        <div class="card-box">
            <table class="table table-striped" style="max-width: 50%">
                <thead>
                    <tr>
                        <th>Luas LM</th>
                        <th>:</th>
                        <th>{{ number_format($wilayah->luas_lm,2,',','.') }} Ha</th>
                    </tr>
                    <tr>
                        <th>Luas Drone</th>
                        <th>:</th>
                        <th>{{ number_format($wilayah->luas,2,',','.') }} Ha</th>
                    </tr>
                    <tr>
                        <th>Jumlah Pohon LM</th>
                        <th>:</th>
                        <th>{{ number_format($wilayah->tegakan_lm,0,',','.') }} Pohon</th>
                    </tr>
                    <tr>
                        <th>Jumlah Pohon Drone</th>
                        <th>:</th>
                        <th>{{ number_format($wilayah->tegakan,0,',','.') }} Pohon</th>
                    </tr>
                    <tr>
                        <th>Produksi Hari Ini</th>
                        <th>:</th>
                        <th>{{ $wilayah->attp_atp??'-' }}</th>
                    </tr>
                    <tr>
                        <th>Produksi s/d Hari Ini</th>
                        <th>:</th>
                        <th>{{ $wilayah->attp_atp??'-' }}</th>
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
<script>
    $("#menu_aset").addClass('active');
        $("#menu_aset > a").addClass('active');
        $("#menu_aset > ul").addClass('active mm-show');
        $("#menu_aset_kelapa").addClass('mm-active');
</script>
@endsection