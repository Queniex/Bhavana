<?php

namespace App\Http\Controllers\API;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Jenis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = request('id');
        $Status = request('Status');

        if(isset($id)) {
            $products = Product::select('master_product.*', 'master_jenis.Nama_Jenis', 'master_jenis.Kode_Jenis')
            ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
            ->where('master_product.ID_Product', $id)
            ->first();
        } else if ($Status) {
            $products = Product::select('master_product.*', 'master_jenis.Nama_Jenis', 'master_jenis.Kode_Jenis')
            ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
            ->when($Status, function ($query) use ($Status) {
                return $query->where('master_product.Status', $Status);
            })->paginate(2);
        }
        else {
            $products = Product::select('master_product.*', 'master_jenis.Nama_Jenis', 'master_jenis.Kode_Jenis')
            ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
            ->paginate(2);
        }
    
        return $products;
    }

    public function getProduct()
    {
        $categoryId = request('category');
        $products = Product::when($categoryId, function ($query) use ($categoryId) {
            return $query->where('ID_Kategori', $categoryId)
                         ->where('Status', 'Accept');
        })->get();
        // dd($products);
        return $products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

        $edit = Product::findOrFail($id);
        $status = $request->input('status');

        if (isset($status)) {
            $data = [
                'Status' => $status,
            ];

            $edit->update($data);
        } else {
            $this->validate($request, [
                'Stok_Barang' => 'required|integer',
                'Harpok_Barang' => 'required|integer'
            ]);

            $data = [
                'Stok_Barang' => $request->Stok_Barang,
                'Harpok_Barang' => $request->Harpok_Barang,
                'Harjul_Barang' => (($request->Harpok_Barang * 0.05) + $request->Harpok_Barang),
            ];

            $data = $request->all();

            // if ($request->hasFile('Foto')) {
            //     $request->file('Foto')->move('./images/user/', $request->file('Foto')->getClientOriginalName());
            //     $edit->Foto = $request->file('Foto')->getClientOriginalName();
            //     $edit->save();
            // }else{
            //     unset($data['Foto']);
            // }
        
            $edit->update($data);
        }

        // if ($request->hasFile('Foto')) {
        //     $request->file('Foto')->move('./images/user/', $request->file('Foto')->getClientOriginalName());
        //     $edit->update(['Foto' => $request->file('Foto')->getClientOriginalName()]);
        // }
        
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
        $delete = Product::findOrFail($id);
        $delete->delete();

        return response()->json(['message' => 'Data updated successfully']);
        // dd($delete);
    }
}
