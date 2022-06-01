@extends('admin.layouts.app')
@section('css')
<style>
    .kotak_hijau {
        position: relative;
        width: 15px;
        left: 0px;
        top: 0px;

        background: #42D07D;
        border-radius: 6px 0px 0px 6px;

    }

    .emas {
        background-color: rgb(255, 225, 2);
        color: white;
    }

    .hijau {
        background-color: rgb(111, 255, 111);
        color: white;
    }

    .kuning {
        background-color: rgb(237, 254, 127);
        color: white;
    }

    .merah {
        background-color: rgb(254, 131, 131);
        color: white;
    }

    .hitam {
        background-color: rgb(60, 60, 60);
        color: white;

    }

    .afdeling_tabel {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
</style>
@endsection
@section('title')
Dashboard
@endsection
@section('content')
<h4 style="font-family: Roboto">Overview</h4>
<div class="row">
    <div class="col-md-12 text-center">
        <div class="card-box py-0 px-0 ml-2">
            <span>
                <div class="row">
                    <div class="col-1 kotak_hijau"></div>
                    <div class="col">
                        <h1 class="mb-2">Coming Soon</h1>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>
{{-- @php
$wilayahs = App\Models\Wilayah::get();
@endphp
<div class="row">
    <div class="col-md-2">
        <label class="col-form-label">Filter Data :</label>
    </div>
</div>
<form id="formFilter">
    <div class="row mb-2">
        <div class="form-group col-md-5">
            <label>Wilayah :</label>
            <select name="wilayah_id" id="f_wilayah_id" class="form-control select2">
                <option value="">Pilih Wilayah</option>
                @foreach ($wilayahs as $wilayah)
                <option value="{{ $wilayah->id }}">{{ $wilayah->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-5">
            <label>Kebun :</label>
            <select name="kebun_id" id="f_kebun_id" class="form-control select2">
                <option value="">Pilih Kebun</option>
            </select>
        </div>
        <div class="form-group col-md-2 my-auto">
            <button type="button" class="btn btn-block btn-success" id="cari"><i class="fa fa-search"></i> Cari
                Data</button>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3 nama_kebun_pie">Kondisi Blok Semua Kebun</h4>
            <div>
                <div id="pie_chart" class="flot-chart" style="height: 260px;">
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3 nama_kebun_tabel">Kondisi Semua Kebun Per afdeling</h4>
            <table class="table table-bordered table-striped afdeling_tabel">


            </table>
        </div>
    </div>
</div> --}}
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
</script>
@include('admin.shortcut_js')
@endsection