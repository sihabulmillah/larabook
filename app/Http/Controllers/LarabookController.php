<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class LarabookController extends Controller
{
    public $new_book;
    public function __construct()
    {
        $this->new_book = new Book();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $data = Book::count();
        $data2 = Category::count();

        return view('dashboard', ["data" => $data, 'data2' => $data2]);
    }


    public function index(Request $request)
    {
        //menggunakan cara aloquent
        // $data = category::all();
        //menggunakan cara query builder
        // $data = DB::table('categories')->get();

        //paginate
        $batas = 3;
        //simplePaginate unutk membuat batasan data yang muncul pada 1 halaman tampilannya akan next dan previous
        //paginate sama kaya simple paginate tapi tampilnya berupa angka 

        //jika 1 table memiliki relasi lebih dari 1 maka gunakan with dengan parameternya nama fungsi yang ada di modelnya
        // $data = Book::with('category','penulis')->simplePaginate($batas);
        $data = Book::simplePaginate($batas);
        $judul = $request->judul;
        // $cari = DB::select("select * from books where judul = $judul");
        $no = $batas * ($data->currentPage() - 1);
        if (!$request->judul) {
            $jumlah = Book::count();
        } else {
            $data = Book::where('judul', 'LIKE', '%' . $judul . '%')->simplePaginate($batas);
            $jumlah = $data->count();
        }
        return view('book.index', [
            'data' => $data,
            'jumlah' => $jumlah,
            'no' => $no

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('book.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // die and dump : fungsinya hampir sama dengan var_dupm()
        // dd($request->all());
        // melakukan validasi sebelum di simpan ke db
        //opasi 1 
        // $validate = Validator::make(
        //     $request->all(),
        //     [ //required = tidak boleh kosong
        //         'judul' => 'required|min:3|max:50',
        //         'penulis' => 'required',
        //         'penerbit' => 'required',
        //         'harga' => 'required|numeric',
        //         'image' => 'required|mimes:jpg,jpeg,png'
        //     ]
        // )->validate();
        // opsi 2
        // $request->validate([
        //     'judul' => 'required',
        //     'penerbit' => 'required',
        //     'penulis' => 'required',
        //     'harga' => 'required',
        //     'image' => 'required|mimes:jpg,jpeg.png'
        // ]);


        // opsi 3
        $rules = [
            'judul' => 'required|min:3|max:50|unique:books,',
            'penerbit' => 'required|min:3|max:50',
            'penulis' => 'required|min:3|max:50',
            'harga' => 'required|digits_between:4,6',
            'image' => 'required|max:500|mimes:jpg,jpeg,png'
        ];

        $message = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute terlalu pendek",
            'max' => ":attribute terlalu panjang",
            'digits_between' => ":attribute min 4 digit max 6 digit",
            'unique' => ":attribute sudah ada , masukkan :attribute yang lain",
            'mimes' => ":attribute ekstensi error, gunakan : .png, .jpg, .jpeg"
        ];

        $this->validate($request, $rules, $message);




        $this->new_book->judul = $request->judul;
        $this->new_book->slug = Str::slug($request->judul);
        $this->new_book->penerbit = $request->penerbit;
        $this->new_book->penulis = $request->penulis;
        $this->new_book->harga = $request->harga;
        $this->new_book->category_id = $request->kategori;

        $nm = $request->image;
        $nama_file = time() . rand(100, 999) . "." . $nm->getClientOriginalExtension();
        $this->new_book->image = $nama_file;
        $nm->move(public_path() . "/upload", $nama_file);
        $this->new_book->save();
        return redirect()->route('book')->with('status', 'Data buku berhasil di tambahkan');


        // $data = Book::create($request->all());
        // if ($request->hasFile('image')) {
        //     $request->file('image')->move('upload/', $request->file('image')->getClientOriginalName());
        //     $data->image = $request->file('image')->getClientOriginalName();
        //     $data->save();
        // }
        // return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_book = Book::find($id);

        return view('book.show', ['category' => $show_book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find hanya mendetek fild id tidk bisa id_mahasantri
        $edit_book = Book::find($id);
        $data = Category::all();
        return view('book.edit', ['category' => $edit_book, 'data' => $data]);
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
            'judul' => 'required|min:3|max:50|unique:books,',
            'penerbit' => 'required|min:3|max:50',
            'penulis' => 'required|min:3|max:50',
            'harga' => 'required|digits_between:4,6',
            'image' => 'required|max:500|mimes:jpg,jpeg,png'
        ];

        $message = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ":attribute terlalu pendek",
            'max' => ":attribute terlalu panjang",
            'digits_between' => ":attribute min 4 digit max 6 digit",
            'unique' => ":attribute sudah ada , masukkan :attribute yang lain",
            'mimes' => ":attribute ekstensi error, gunakan : .png, .jpg, .jpeg"
        ];

        $this->validate($request, $rules, $message);
        // Mendcari ID nya
        $update_book = Book::find($id);

        // Menangkap Perubahannya
        $update_book->judul = $request->judul;
        $update_book->slug = Str::slug($request->judul);
        $update_book->penerbit = $request->penerbit;
        $update_book->penulis = $request->penulis;
        $update_book->harga = $request->harga;
        $update_book->category_id = $request->kategori;

        $gbrlama = $update_book->image;

        if (!$request->image) {

            $update_book->image = $gbrlama;
        } else {
            if ($request->image != $gbrlama) {
                $gbrBaru = $request->image;
                $namafile = time() . rand(100, 999) . "." . $gbrBaru->getClientOriginalExtension();
                $update_book->image = $namafile;
                $gbrBaru->move(public_path() . "/upload", $namafile);
                $path = "upload/" . $gbrlama;
                if (File::exists($path)) {
                    File::delete($path);
                }
            } else {
                $request->image->move(public_path() . "/upload" . $gbrlama);
            }
        }
        $update_book->update();
        return redirect()->route('book')->with('status', 'Data category berhasil di update');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $hapus = category::find($id);

        //mencari id jika tidak ada maka akan di arahkan ke halaman 404
        $hapus =
            Book::findOrFail($id);
        //menghapus data gambar yang ada di folder public 
        $path = "upload/" . $hapus->image;
        if (File::exists($path)) {
            FIle::delete($path);
        }
        $hapus->delete();
        return redirect()->route('book')->with('status', 'Data category berhasil di hapus');
    }
}
