<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $new_category;
    public function __construct()
    {
        $this->new_category = new Category();
    }

    public function index()
    {

        $data = Category::all();
        return view('kategori.index', ['kategori' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
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
            'kategori' => 'required|min:3|max:50'
        ];

        $message = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute terlalu pendek",
            'max' => ":attribute terlalu panjang",
        ];

        $this->validate($request, $rules, $message);

        $this->new_category->kategori = $request->kategori;
        $this->new_category->save();
        return redirect()->route('category')->with('status', 'Data kategori berhasil di tambahkan');
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
        $edit_category = Category::find($id);

        return view('kategori.edit', ['edit' => $edit_category]);
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
            'kategori' => 'required|min:3|max:50'
        ];

        $message = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute terlalu pendek",
            'max' => ":attribute terlalu panjang",
        ];

        $this->validate($request, $rules, $message);

        $update_kategori = Category::find($id);

        $update_kategori->kategori = $request->kategori;
        $update_kategori->update();

        return redirect()->route('category')->with('status', 'Data kategori berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Category::find($id);
        $hapus->delete();
        return redirect()->route('category')->with('status', 'Data kategori berhasil di hapus');
    }
}
