<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('user.index');
    // }

    public function index()
    {
        $produk = DB::table('produk')->orderBy('nama_produk', 'ASC')->get();
        return view('user.index',['produk' => $produk]);

    }
    public function selesai()
    {
        $produk = DB::table('produk')->orderBy('nama_produk', 'ASC')->get();
        return view('user.konfirmasi',['produk' => $produk]);

    }
    public function nolog()
    {
        $produk = DB::table('produk')->orderBy('nama_produk', 'ASC')->get();
        return view('user.indexnolog',['produk' => $produk]);

    }
    public function keranjang($id_users)
    {
        $produk = DB::table('produk')->orderBy('nama_produk', 'ASC')->get();
        $keranjang = DB::table('produk')
                     ->join('keranjang', 'produk.id_produk', '=', 'keranjang.id_produk')
                     ->join('users', 'keranjang.id_users', '=', 'users.id')
                     ->where('users.id', $id_users)
                    ->get();
        $total_semua = DB::table('produk')
                    ->join('keranjang', 'produk.id_produk', '=', 'keranjang.id_produk')
                    ->join('users', 'keranjang.id_users', '=', 'users.id')
                    ->where('users.id', $id_users)
                    ->sum(DB::raw('keranjang.jumlah * produk.harga'));
        return view('user.keranjang',['produk' => $produk,'keranjang' => $keranjang,'total_semua' => $total_semua]);

    }
    public function prosescheckout(Request $request)
	{
		// insert data ke table penjualan
        $keranjang = DB::table('produk')
                     ->join('keranjang', 'produk.id_produk', '=', 'keranjang.id_produk')
                     ->join('users', 'keranjang.id_users', '=', 'users.id')
                     ->where('users.id', Auth::user()->id)
                     //->where('users.id', '15')
                    ->get();
        foreach ($keranjang as $p) {
		DB::table('penjualan')->insert([
			'id_produk' => $p->id_produk,
			'jumlah' => $p->jumlah,
            'nomer_penjualan' => $request->nomer_penjualan,
			'nama_pembeli' => $request->nama_pembeli,
			'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
    }
        DB::table('keranjang')->where('id_users', Auth::user()->id)->delete();
        Alert::success('Pesanan DiProses!', 'Sedang Menunggu Pembayaran');
        return redirect('/konfirmasi');
	}
    public function checkout($id_users)
    {
        $produk = DB::table('produk')->orderBy('nama_produk', 'ASC')->get();
        $keranjang = DB::table('produk')
                     ->join('keranjang', 'produk.id_produk', '=', 'keranjang.id_produk')
                     ->join('users', 'keranjang.id_users', '=', 'users.id')
                     ->where('users.id', $id_users)
                    ->get();
        $total_semua = DB::table('produk')
                    ->join('keranjang', 'produk.id_produk', '=', 'keranjang.id_produk')
                    ->join('users', 'keranjang.id_users', '=', 'users.id')
                    ->where('users.id', $id_users)
                    ->sum(DB::raw('keranjang.jumlah * produk.harga'));
        return view('user.checkout',['produk' => $produk,'keranjang' => $keranjang,'total_semua' => $total_semua]);

    }
    public function detail($id_produk)
    {
        $produk = DB::table('produk')->where('id_produk',$id_produk)->first();
        return view('user.detailproduk',['produk' => $produk]);

    }
    public function store(Request $request)
	{
		// insert data ke table keranjang
		DB::table('keranjang')->insert([
            'id_users' => $request->id_users,
			'id_produk' => $request->id_produk,
			'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at
		]);
        Alert::success('Hore!', 'Produk Masuk Keranjang');
        return redirect()->back();
		//return redirect()->back()->with('success', 'Data Telah Diubah');
	}
    public function hapus($id_keranjang)
	{
		DB::table('keranjang')->where('id_keranjang',$id_keranjang)->delete();

		return redirect()->back();
	}
}
