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
    <div class="col-md-4 text-center">
        <div class="card-box py-0 px-0 ml-2">
            <span>
                <div class="row">
                    <div class="col-1 kotak_hijau"></div>
                    <div class="col">
                        <h3 class="">{{ $luas_lm }} Ha</h3>
                        <p class="mb-2">Total Areal Tanaman ATP+ATTP (LM-76)</p>
                    </div>
                </div>
            </span>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="card-box py-0 px-0 ml-2">
            <span>
                <div class="row">
                    <div class="col-1 kotak_hijau"></div>
                    <div class="col">
                        <h3 class="">{{ $tegakan_lm }} Pohon</h3>
                        <p class="mb-2">Total Tegakan ATTP+ATP (LM-76)</p>
                    </div>
                </div>
            </span>
        </div>
    </div>
    <div class="col-md-4 text-center">
        <div class="card-box py-0 px-0 ml-2">
            <span>
                <div class="row">
                    <div class="col-1 kotak_hijau"></div>
                    <div class="col">
                        <h3 class="">{{ $tegakan_lm_ha }} Pohon</h3>
                        <p class="mb-2">Rata - rata tegakan pohon/Ha (LM-76)</p>
                    </div>
                </div>
            </span>
        </div>
    </div>
</div>
@php
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
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    $('#cari').on('click', function(e) {
        var param = $('#formFilter').serialize();
        console.log(param);
        ambilData(param)
    });
    function ambilData(param){
        $.ajax({
            type: "GET",
            url: "{{ route('dashboard.grafik') }}?"+param,
            dataType: "json",
            success: function (data) {
                grafik(data)
            }
        });
        if(param != undefined){
            $.ajax({
                type: "GET",
                url: "{{ route('dashboard.tabel') }}?"+param,
                dataType: "json",
                success: function (data) {
                    tabel(data)
                }
            });
        }
    }
    function grafik(data){
        $('#pie_chart').empty()
        var options = {
            series: [],
            chart: {
                width: 380,
                type: 'pie',
            },
            labels: ['Emas', 'Hijau', 'Kuning', 'Merah', 'Hitam'],
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }],
            colors: ['#ffe100','#00ff00','#ffff00','#ff0000','#000000']
        };
        $.each(data, function (indexInArray, valueOfElement) { 
			options.series.push(valueOfElement)
		});

        var chart = new ApexCharts(document.querySelector("#pie_chart"), options);
        chart.render();
    }
    function tabel(data){
        $('.afdeling_tabel').empty()
        $(".nama_kebun_tabel").html("Kondisi Blok Pada Kebun "+data.kebun.nama);
        $(".nama_kebun_pie").html("Kondisi Kebun "+data.kebun.nama+" Per Afdeling");
        $.each(data.afdeling, function (key, value) { 
            $(".afdeling_tabel").append(`
            <tr><th colspan="2" class="blok_tabel`+key+`">Afdeling `+value.nama+`</th></tr>`
            );
            $.each(value.blok, function (key_blok, blok) {
                if (blok.produksi > 2000000) {
                    $(".blok_tabel"+key).after(`<td class="emas">`+blok.nama+`</td>`);
                } else if (blok.produksi > 1500000) {
                    $(".blok_tabel"+key).after(`<td class="hijau">`+blok.nama+`</td>`);
                } else if (blok.produksi > 1000000) {
                    $(".blok_tabel"+key).after(`<td class="kuning">`+blok.nama+`</td>`);
                } else if (blok.produksi > 500000) {
                    $(".blok_tabel"+key).after(`<td class="merah">`+blok.nama+`</td>`);
                } else {
                    $(".blok_tabel"+key).after(`<td class="hitam">`+blok.nama+`</td>`);
                } 
            });
            
        });
    }
    ambilData()
</script>
@include('admin.shortcut_js')
@endsection