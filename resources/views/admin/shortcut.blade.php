@php
$wilayahs = App\Models\Wilayah::get();
@endphp
<div class="row">
    <div class="col-md-2">
        <label class="col-form-label">Shortcut Data :</label>
    </div>
</div>
<form id="formFilter" action="{{ route('shortcut.cari') }}" target="_blank" method="post">
    @csrf
    <div class="row mb-2">
        <div class="form-group col-md-3">
            <label>Wilayah :</label>
            <select name="wilayah_id" id="f_wilayah_id" class="form-control select2">
                <option value="">Pilih Wilayah</option>
                @foreach ($wilayahs as $wilayah)
                <option value="{{ $wilayah->id }}">{{ $wilayah->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label>Kebun :</label>
            <select name="kebun_id" id="f_kebun_id" class="form-control select2">
                <option value="">Pilih Kebun</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label>Afdeling :</label>
            <select name="afdeling_id" id="f_afdeling_id" class="form-control select2">
                <option value="">Pilih Afdeling</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label>Blok :</label>
            <select name="blok_id" id="f_blok_id" class="form-control select2">
                <option value="">Pilih Blok</option>
            </select>
        </div>
        <div class="form-group col-md-2 my-auto">
            <button class="btn btn-block btn-success"><i class="fa fa-search"></i> Cari Data</button>
        </div>
    </div>
</form>