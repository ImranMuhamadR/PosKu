<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Katagori;

class KatagoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('katagori.index');
    }
    public function data(){
        $katagori = Katagori::orderBy('id_katagori', 'desc')->get();
        
            return datatables()
            ->of($katagori)
            ->addIndexColumn()
            ->addColumn('aksi', function ($katagori) {
                return '
                <div class="btn-group">
                    <button onclick="editForm(`'. route('katagori.update', $katagori->id_katagori) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button onclick="deleteData(`'. route('katagori.destroy', $katagori->id_katagori) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $katagori = new Katagori();
        $katagori->nama_katagori = $request->nama_katagori;
        $katagori->save();

        return response()->json('Data Berhasil Disimpan', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $katagori = Katagori::find($id);

        return response()->json($katagori);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $katagori = Katagori::find($id);
        $katagori->nama_katagori = $request->nama_katagori;
        $katagori->update();

        return response()->json('Data Berhasil Disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $katagori = Katagori::find($id);
        $katagori->delete();

        return response(null, 204);
    }
}
