<?php

namespace App\Http\Controllers\API;
use App\Models\Jenis;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idKategori = request('id');
        $idJenis = request('idJenis');
        $idProduk = request('idProduk');
        $idReq = request('idReq');
        $page = request('page');
        
        if(isset($idKategori)) {
            $jenis = Jenis::when($idKategori, function ($query) use ($idKategori) {
                return $query->where('ID_Kategori', $idKategori);
            })->get();

            return response()->json($jenis, 200);
        } else if(isset($idJenis)) {
            $jenis = Jenis::find($idJenis);

            return response()->json($jenis, 200);
        } else if(isset($idProduk)) {
            $products = Jenis::select(
                'master_jenis.ID_Jenis', 
                'master_jenis.Nama_Jenis', 
                'master_jenis.Kode_Jenis', 
                'master_category.Nama_Kategori', 
                'master_category.Foto_Kategori', 
                'master_category.Keterangan',
                \DB::raw('MAX(master_product.Stok_Barang) as Stok_Barang'),
                \DB::raw('MAX(master_product.Harjul_Barang) as max_price'),
                \DB::raw('MIN(master_product.Harjul_Barang) as min_price')
            )
            ->join('master_category', 'master_jenis.ID_Kategori', '=', 'master_category.ID_Kategori')
            ->join('master_product', 'master_jenis.ID_Jenis', '=', 'master_product.ID_Jenis')
            ->where('master_jenis.ID_Kategori', $idProduk)
            ->where('master_product.Stok_Barang', '>', 0)
            ->groupBy('master_jenis.ID_Jenis', 'master_jenis.Nama_Jenis', 'master_jenis.Kode_Jenis', 'master_category.Nama_Kategori', 'master_category.Foto_Kategori', 'master_category.Keterangan')
            ->get();
        
            return response()->json($products, 200);  
        } elseif (isset($page)) {
            $jenis = Jenis::paginate(4);

            return response()->json($jenis, 200);
        } else if(isset($idReq)) {
            $products = Jenis::select(
                'master_jenis.ID_Jenis', 
                'master_jenis.Nama_Jenis', 
                'master_jenis.Kode_Jenis', 
                'master_category.Nama_Kategori', 
                'master_category.Foto_Kategori', 
                'master_category.Keterangan',
                \DB::raw('MAX(master_product.Stok_Barang) as Stok_Barang'),
            )
            ->join('master_category', 'master_jenis.ID_Kategori', '=', 'master_category.ID_Kategori')
            ->join('master_product', 'master_jenis.ID_Jenis', '=', 'master_product.ID_Jenis')
            ->where('master_jenis.ID_Jenis', $idReq)
            ->groupBy('master_jenis.ID_Jenis', 'master_jenis.Nama_Jenis', 'master_jenis.Kode_Jenis', 'master_category.Nama_Kategori', 'master_category.Foto_Kategori', 'master_category.Keterangan')
            ->get();
        
            return response()->json($products, 200);
        } else {
            $jenis = Jenis::all();

            return response()->json($jenis, 200);
        }
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
        // $name = $request->name;
        // return response()->json(['message' => $name]);

        // $requestData = $request->all();
        // return response()->json(['Data' => $requestData]);

        $this->validate($request, [
            'Nama_Jenis' => 'required|string|unique:master_Jenis,Nama_Jenis',
            'ID_Kategori' => 'required',
            'Kode_Jenis' => 'required|unique:master_Jenis,Kode_Jenis'
        ]);
    
        $Jenis = Jenis::create($request->all());
    
        if ($Jenis) {
            return response()->json(['Data' => $Jenis]);
        } else {
            return response()->json(['Data' => 'Error']);
        }
        
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
        $this->validate($request, [
            'Nama_Jenis' => 'required|string',
            'ID_Kategori' => 'required',
            'Kode_Jenis' => 'required'
        ]);
        
        $edit = Jenis::findOrFail($id);
        
        // $data = [
        //     'Nama_Kategori' => $request->Nama_Kategori,
        //     // 'Jenis_Satuan' => $request->Jenis_Satuan,
        // ];

        $data = $request->all();
        
        $edit->update($data);
        
        return response()->json(['message' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Jenis::findOrFail($id);
        $delete->delete();

        return response()->json(['message' => 'Data updated successfully']);
        // dd($delete);
    }
}
