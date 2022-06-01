<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aspek;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AspekController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.aspek.index');
    }

    public function data(Request $request)
    {
        $model = Aspek::query();
        return datatables()->of($model)
            ->addColumn('aksi', function ($data) {
                return '
                    <button type="button" class="btn btn-info btn-icon btn-xs"
                        onclick="editData(' . $data->id . ')"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Edit Data">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-icon btn-xs"
                        onclick="deleteData(' . $data->id . ')"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Hapus Data">
                        <i class="fa fa-trash"></i>
                    </button>
                    <a href="'. route('admin.sub.index',$data->id) .'" class="btn btn-success btn-icon btn-xs"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Detail Data">
                        <i class="fa fa-eye"></i>
                    </a>
                ';
            })
            ->rawColumns(['aksi'])->addIndexColumn()->make(true);
    }

    public function detail($id)
    {
        return Aspek::find($id);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->id == '' && $request->id == null) {
            Aspek::create($data);
            return [
                'status'   => true,
                'message' => 'Data Berhasil Disimpan'
            ];
        }
        Aspek::find($request->id)->update($data);
        return [
            'status'   => true,
            'message' => 'Data Berhasil Diperbaharui'
        ];
    }

    public function delete($id)
    {
        Aspek::find($id)->delete();
        return [
            'status'   => true,
            'message' => 'Data Berhasil Dihapus'
        ];
    }
    public function indexSub($parent_id)
    {
        $data['parent_id'] = $parent_id;
        return view('admin.kriteria.index',$data);
    }

    public function dataSub(Request $request,$parent_id)
    {
        $model = Kriteria::where('parent');
        return datatables()->of($model)
            ->addColumn('aksi', function ($data) {
                return '
                    <button type="button" class="btn btn-info btn-icon btn-xs"
                        onclick="editData(' . $data->id . ')"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Edit Data">
                        <i class="fa fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-icon btn-xs"
                        onclick="deleteData(' . $data->id . ')"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Hapus Data">
                        <i class="fa fa-trash"></i>
                    </button>
                    <a href="" class="btn btn-success btn-icon btn-xs"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Detail Data">
                        <i class="fa fa-eye"></i>
                    </a>
                ';
            })
            ->rawColumns(['aksi'])->addIndexColumn()->make(true);
    }

    public function detailSub($parent_id,$id)
    {
        return Kriteria::find($id);
    }

    public function storeSub(Request $request,$parent_id)
    {
        $data = $request->all();
        if ($request->id == '' && $request->id == null) {
            Kriteria::create($data);
            return [
                'status'   => true,
                'message' => 'Data Berhasil Disimpan'
            ];
        }
        Kriteria::find($request->id)->update($data);
        return [
            'status'   => true,
            'message' => 'Data Berhasil Diperbaharui'
        ];
    }

    public function deleteSub($parent_id,$id)
    {
        Kriteria::find($id)->delete();
        return [
            'status'   => true,
            'message' => 'Data Berhasil Dihapus'
        ];
    }
    
}
