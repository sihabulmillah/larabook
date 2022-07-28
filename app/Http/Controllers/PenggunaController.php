<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $pengguna;
    public function __construct()
    {
        $this->pengguna = new Pengguna();
    }


    public function index()
    {
        $pengguna = Pengguna::all();
        return view(
            'pengguna.index',
            ['pengguna' => $pengguna]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'nama' => 'required|min:3|max:50|',
            'username' => 'required|min:3|max:50|unique:pengguna,username',
            'password' => 'required|min:3|max:50',
            'konfirmasi' => 'required|min:3|max:50|same:password',
            'level' => 'required'
        ];

        $message = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute terlalu pendek",
            'max' => ":attribute terlalu panjang",
            'unique' => ":attribute sudah ada , masukkan :attribute yang lain",
            'same' => ":attribute password tidak sesuai"
        ];

        $this->validate($request, $rules, $message);




        $this->pengguna->nama = $request->nama;
        $this->pengguna->username = $request->username;
        $this->pengguna->password = Hash::make($request->password);
        $this->pengguna->level = $request->level;
        $this->pengguna->save();

        return redirect()->route('pengguna')->with('status', 'Data user berhasil di tambahkan');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengguna::find($id);
        return view('pengguna.edit', ['data' => $data]);
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
        $rules = [
            'nama' => 'required|min:3|max:50|',
            'username' => 'required|min:3|max:50|',
            'password' => 'required|min:3|max:50',
            'konfirmasi' => 'required|min:3|max:50|same:password',
            'level' => 'required'
        ];

        $message = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute terlalu pendek",
            'max' => ":attribute terlalu panjang",
            'unique' => ":attribute sudah ada , masukkan :attribute yang lain",
            'same' => ":attribute password tidak sesuai"
        ];

        $this->validate($request, $rules, $message);

        $update_pengguna = Pengguna::find($id);

        $update_pengguna->nama = $request->nama;
        $update_pengguna->username = $request->username;
        $update_pengguna->password = Hash::make($request->password);
        $update_pengguna->level = $request->level;

        $update_pengguna->save();
        return redirect()->route('pengguna')->with('status', 'Data user berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengguna = Pengguna::find($id);
        $pengguna->delete();
        return redirect()->route('pengguna')->with('status', 'Data user berhasil di hapus');
    }
}
