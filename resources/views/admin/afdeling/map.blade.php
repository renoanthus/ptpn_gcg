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
Afdeling
@endsection
@section('content')
<div class="row">
    <div class="col-12" style="text-align: center">
        <div class="card-box">

            @php
            if ($afdeling->peta != null) {
            if (!file_exists($afdeling->peta)) {
            $afdeling->peta = 'assets/images/peta/placeholder.jpeg';
            }
            }else{
            $afdeling->peta = 'assets/images/peta/placeholder.jpeg';
            }
            @endphp
            <img src="{{ asset($afdeling->peta) }}" alt="" style="max-width: 900px;">
        </div>
    </div>
    <div class="col-12">
        <h4 style="font-family: Roboto">
            {{ $afdeling->kebun->wilayah->nama .' - '.$afdeling->kebun->nama.' - Afdeling '.$afdeling->nama}}
        </h4>
        <div class="card-box">
            <table class="table table-striped" style="max-width: 50%">
                <thead>
                    <tr>
                        <th>Luas LM</th>
                        <th>:</th>
                        <th>{{ number_format($afdeling->blok->sum('luas_lm'),2,',','.') }} Ha</th>
                    </tr>
                    <tr>
                        <th>Luas Drone</th>
                        <th>:</th>
                        <th>{{ number_format($afdeling->blok->sum('luas'),2,',','.') }} Ha</th>
                    </tr>
                    <tr>
                        <th>Jumlah Pohon LM</th>
                        <th>:</th>
                        <th>{{ number_format($afdeling->blok->sum('tegakan_lm'),0,',','.') }} Pohon</th>
                    </tr>
                    <tr>
                        <th>Jumlah Pohon Drone</th>
                        <th>:</th>
                        <th>{{ number_format($afdeling->blok->sum('tegakan'),0,',','.') }} Pohon</th>
                    </tr>
                    <tr>
                        <th>Produksi Hari Ini</th>
                        <th>:</th>
                        <th>{{ $afdeling->attp_atp??'-' }}</th>
                    </tr>
                    <tr>
                        <th>Produksi s/d Hari Ini</th>
                        <th>:</th>
                        <th>{{ $afdeling->attp_atp??'-' }}</th>
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