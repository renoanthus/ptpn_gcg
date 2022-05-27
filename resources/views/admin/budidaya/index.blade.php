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

    <style>
        .kotak_hijau{
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
    Budidaya
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
                            <h4 class="modal-title" id="myModalLabel">Tambah Kedatangan Loading</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="formAdd" enctype="multipart/form-data" data-parsley-validate="" novalidate="">
                                @csrf
                                <div class="form-row">
                                    
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Tonase</label>
                                        <input type="text" readonly="" parsley-trigger="change"
                                            placeholder="Masukkan Tonase" id="tonase" class="form-control">
                                        <small class="muted">Satuan Tonase (TON)</small>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Shift</label>
                                        <select class="form-control select2" name="shift" required="">
                                            <option value="">Pilih Shift</option>
                                            <option value="D">Day</option>
                                            <option value="N">Night</option>
                                        </select>
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
                            <h4 class="modal-title" id="myModalLabel">Edit Kedatangan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="formEdit" method="post" data-parsley-validate="" enctype="multipart/form-data"
                                novalidate="">
                                @csrf
                                <input type="hidden" name="edit_id" id="edit_id">
                                
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label>Tonase</label>
                                        <input type="number" readonly="" parsley-trigger="change" step="0.01"
                                            placeholder="Masukkan Tonase" id="edit_tonase" class="form-control">
                                        <small class="muted">Satuan Tonase (TON)</small>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Shift</label>
                                        <select class="form-control select2" name="shift" id="edit_shift" required="">
                                            <option value="">Pilih Shift</option>
                                            <option value="D">Day</option>
                                            <option value="N">Night</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Tanggal</label>
                                        <input type="text" class="form-control datepicker" placeholder="mm/dd/yyyy"
                                            name="tanggal" id="edit_tanggal">
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
                <div class="col-6">
                    <div class="card-box py-0 px-0 ml-2">
                        <span> 
                            <div class="row">
                                <div class="col-1 kotak_hijau"></div>
                                <div class="col">
                                    <h3 class="">Data LM - 76</h3>
                                    <p class="mb-0">Luas Areal ATP+ATTP : 47.216,10 Ha</p>
                                    <p class="mb-2">Jumlah Tegakan : 5.740.041,00 Pohon</p>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card-box py-0 px-0 ml-2">
                        <span> 
                            <div class="row">
                                <div class="col-1 kotak_hijau"></div>
                                <div class="col">
                                    <h3 class="">Data LM - 76</h3>
                                    <p class="mb-0">Luas Areal ATP+ATTP : 47.216,10 Ha</p>
                                    <p class="mb-2">Jumlah Tegakan : 5.740.041,00 Pohon</p>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label class="col-form-label">Shortcut Data :</label>
                </div>
            </div>
            <form id="formFilter">
                <div class="row mb-2">
                    <div class="form-group col-md-2" style="margin-right: auto;">
                        <label>Shift :</label>
                        <select name="shift_filter" id="shift_filter" class="form-control select2">
                            <option value="">Semua Shift</option>
                            <option value="D">Day</option>
                            <option value="N">Night</option>
                        </select>
                    </div>
                </div>
            </form>
            <div class="card-box">

                <div class="row head_table">
                    <div class="col-md-6">
                        <h4 class="mt-0 header-title">List Data Budidaya</h4>

                    </div>
                    <div class="col-md-2 ml-auto">
                        <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#addData"><i
                                class="mdi mdi-plus"></i> Budidaya</button>
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
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th style="min-width: 80px;">Aksi</th>
                                <th>Truk</th>
                                {{-- <th style="min-width: 150px;">Nama Supir</th> --}}
                                {{-- <th style="min-width: 150px;">Nama Rute</th> --}}
                                {{-- <th>KM Meter Truk Kedatangan</th> --}}
                                <th>Nama Bucket</th>
                                {{-- <th>HM Meter</th> --}}
                                <th>Kapasitas Truk</th>
                                <th style="min-width: 180px;">Jam Kedatangan</th>
                                <th>Shift</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
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
    <script src="{{asset('adminto/dist/')}}/assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="{{asset('adminto/dist/')}}/assets/libs/pdfmake/vfs_fonts.js"></script>
@endsection