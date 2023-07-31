<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index');
    }

    public function data()
    {
        // disini yang ditampilkan bukan admin. misalkan kasir
        $user = User::isNotAdmin()->orderBy('id', 'desc')->get();

        return datatables()
            ->of($user)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('user.update', $user->id) .'`)" 
                    class="btn btn-xs btn-warning btn-flat">
                    <i class="fa fa-pencil"></i>
                    <i>Ubah</i>
                    </button>
                    <button type="button" onclick="deleteData(`'. route('user.destroy', $user->id) .'`)" 
                    class="btn btn-xs btn-danger btn-flat">
                    <i class="fa fa-trash"></i>
                    <i>Hapus</i>
                    </button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = 2;//! level 2 level default yg bukan level admin
        $user->foto = '/img/user.png';
        $user->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    // edit user
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password') && $request->password != "") 
            $user->password = bcrypt($request->password);
        $user->update();

        return response()->json('Data berhasil disimpan', 200);
    }

    // delete user
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return response(null, 204);
    }

    public function profile()
    {
        // user ini berdasarkan dari user yg login
        $profile = auth()->user();
        return view('user.profile', compact('profile'));
    }

    // ! fungsi ini untuk update profile 
    public function updateProfile(Request $request)
    {
        // * mengupdate profile berdasarkan user yang login
        $user = auth()->user();
        
        $user->name = $request->name;
        if ($request->has('password') && $request->password != "") {
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->password == $request->password_confirmation) {
                    $user->password = bcrypt($request->password);
                } else {
                    return response()->json('Konfirmasi password tidak sesuai', 422);
                }
            } else {
                return response()->json('Password lama tidak sesuai', 422);
            }
        }

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama = 'logo-' . date('YmdHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/img'), $nama);

            $user->foto = "/img/$nama";
        }

        $user->update();

        return response()->json($user, 200);
    }
}
