<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aspek1;
use App\Models\Aspek2;
use App\Models\Aspek3;
use App\Models\Aspek4;
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
    public function index1()
    {
        return view('admin.aspek.1');
    }

    public function data1(Request $request)
    {
        $model = Aspek1::query();
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
                    <a href="'. route('admin.aspek.index2',$data->id) .'" class="btn btn-success btn-icon btn-xs"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Detail Data">
                        <i class="fa fa-eye"></i>
                    </a>
                ';
            })
            ->rawColumns(['aksi'])->addIndexColumn()->make(true);
    }

    public function detail1($id)
    {
        return Aspek1::find($id);
    }

    public function store1(Request $request)
    {
        $data = $request->all();
        if ($request->id == '' && $request->id == null) {
            Aspek1::create($data);
            return [
                'status'   => true,
                'message' => 'Data Berhasil Disimpan'
            ];
        }
        Aspek1::find($request->id)->update($data);
        return [
            'status'   => true,
            'message' => 'Data Berhasil Diperbaharui'
        ];
    }

    public function delete1($id)
    {
        Aspek1::find($id)->delete();
        return [
            'status'   => true,
            'message' => 'Data Berhasil Dihapus'
        ];
    }

    public function index2($parent_id)
    {
        $data['parent'] = Aspek1::find($parent_id);
        return view('admin.aspek.2',$data);
    }

    public function data2(Request $request,$parent_id)
    {
        $model = Aspek2::where('aspek_1_id',$parent_id);
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
                    <a href="'. route('admin.aspek.index3',$data->id) .'" class="btn btn-success btn-icon btn-xs"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Detail Data">
                        <i class="fa fa-eye"></i>
                    </a>
                ';
            })
            ->rawColumns(['aksi'])->addIndexColumn()->make(true);
    }

    public function detail2($parent_id,$id)
    {
        return Aspek2::find($id);
    }

    public function store2(Request $request,$parent_id)
    {
        $data = $request->all();
        $data['aspek_1_id'] = $parent_id;
        if ($request->id == '' && $request->id == null) {
            Aspek2::create($data);
            return [
                'status'   => true,
                'message' => 'Data Berhasil Disimpan'
            ];
        }
        Aspek2::find($request->id)->update($data);
        return [
            'status'   => true,
            'message' => 'Data Berhasil Diperbaharui'
        ];
    }

    public function delete2($parent_id,$id)
    {
        Aspek2::find($id)->delete();
        return [
            'status'   => true,
            'message' => 'Data Berhasil Dihapus'
        ];
    }

    public function index3($parent_id)
    {
        $data['parent'] = Aspek2::find($parent_id);
        return view('admin.aspek.3',$data);
    }

    public function data3(Request $request,$parent_id)
    {
        $model = Aspek3::where('aspek_2_id',$parent_id);
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
                    <a href="'. route('admin.aspek.index4',$data->id) .'" class="btn btn-success btn-icon btn-xs"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Detail Data">
                        <i class="fa fa-eye"></i>
                    </a>
                ';
            })
            ->rawColumns(['aksi'])->addIndexColumn()->make(true);
    }

    public function detail3($parent_id,$id)
    {
        return Aspek3::find($id);
    }

    public function store3(Request $request,$parent_id)
    {
        $data = $request->all();
        $data['aspek_2_id'] = $parent_id;
        if ($request->id == '' && $request->id == null) {
            Aspek3::create($data);
            return [
                'status'   => true,
                'message' => 'Data Berhasil Disimpan'
            ];
        }
        Aspek3::find($request->id)->update($data);
        return [
            'status'   => true,
            'message' => 'Data Berhasil Diperbaharui'
        ];
    }

    public function delete3($parent_id,$id)
    {
        Aspek3::find($id)->delete();
        return [
            'status'   => true,
            'message' => 'Data Berhasil Dihapus'
        ];
    }

    public function index4($parent_id)
    {
        $data['parent'] = Aspek3::find($parent_id);
        return view('admin.aspek.4',$data);
    }

    public function data4(Request $request,$parent_id)
    {
        $model = Aspek4::where('aspek_3_id',$parent_id);
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
                    <a href="'. route('admin.aspek.index4',$data->id) .'" class="btn btn-success btn-icon btn-xs"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Detail Data">
                        <i class="fa fa-eye"></i>
                    </a>
                ';
            })
            ->rawColumns(['aksi'])->addIndexColumn()->make(true);
    }

    public function detail4($parent_id,$id)
    {
        return Aspek4::find($id);
    }

    public function store4(Request $request,$parent_id)
    {
        $data = $request->all();
        $data['aspek_3_id'] = $parent_id;
        if ($request->id == '' && $request->id == null) {
            Aspek4::create($data);
            return [
                'status'   => true,
                'message' => 'Data Berhasil Disimpan'
            ];
        }
        Aspek4::find($request->id)->update($data);
        return [
            'status'   => true,
            'message' => 'Data Berhasil Diperbaharui'
        ];
    }

    public function delete4($parent_id,$id)
    {
        Aspek4::find($id)->delete();
        return [
            'status'   => true,
            'message' => 'Data Berhasil Dihapus'
        ];
    }
    
}
