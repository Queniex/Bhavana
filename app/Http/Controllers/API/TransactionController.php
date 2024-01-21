<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use App\Models\Product;
use App\Models\Jenis;
use App\Models\Kategori;
use App\Models\MasterRequest;
use App\Models\DetailRequest;
use App\Models\DetailTransaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = request('id');
        $idBuy = request("idBuy");
        $idSup = request("idSup");
    
        if (isset($id)) {
            $transaction = DetailRequest::select(
                'detail_request.QTY',
                'detail_request.No_Req',
                'detail_request.Status_Sup',
                'detail_request.Contract_Sup',
                'master_jenis.Nama_Jenis',
                'master_jenis.Kode_Jenis',
                'master_product.Harpok_Barang',
                \DB::raw('master_product.Harpok_Barang * detail_request.QTY AS Pendapatan')
            )
                ->join('master_product', 'detail_request.ID_Product', '=', 'master_product.ID_Product')
                ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
                ->where('detail_request.ID_Req', '=', $id)
                ->first();
    
            return response()->json($transaction);
        } else if(isset($idBuy)) {
            $results = MasterRequest::select(
                'master_request.No_Req',
                'master_request.Status_Req',
                'master_request.Contract_Buy',
                'master_request.Awal_Kontrak',
                'master_request.Akhir_Kontrak',
                'master_account.Username',
                'master_account.Alamat',
                'master_account.No_Telp',
                'master_account.Email',
                'master_product.Harpok_Barang',
                'master_product.Harjul_Barang',
                'master_jenis.Nama_Jenis',
                'master_jenis.Kode_Jenis',
                'master_category.Nama_Kategori',
                'detail_request.QTY',
                'detail_request.ID_Req'
            )
            ->join('detail_request', 'master_request.No_Req', '=', 'detail_request.No_Req')
            ->join('master_product', 'detail_request.ID_Product', '=', 'master_product.ID_Product')
            ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
            ->join('master_category', 'master_jenis.ID_Kategori', '=', 'master_category.ID_Kategori')
            ->join('master_account', 'master_request.ID_Buyer', '=', 'master_account.ID_Akun')
            ->where('detail_request.Status_Sup', '=', 'Accept')
            ->where('master_request.No_Req', '=', $idBuy)
            ->first();

            return response()->json($results);
            
        } else if(isset($idSup)) {
            $results = DetaiLRequest::select(
                'detail_request.No_Req',
                'detail_request.ID_Req',
                'detail_request.Status_Sup',
                'detail_request.Contract_Sup',
                'master_account.Nama',
                'master_account.Alamat',
                'master_account.No_Telp',
                'master_account.Email',
                'master_product.Harpok_Barang',
                'master_product.Harjul_Barang',
                'master_jenis.Nama_Jenis',
                'master_jenis.Kode_Jenis',
                'master_category.Nama_Kategori',
                'detail_request.QTY'
            )
            ->join('master_product', 'detail_request.ID_Product', '=', 'master_product.ID_Product')
            ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
            ->join('master_category', 'master_jenis.ID_Kategori', '=', 'master_category.ID_Kategori')
            ->join('master_account', 'master_product.ID_Akun', '=', 'master_account.ID_Akun')
            ->where('detail_request.Status_Sup', '=', 'Accept')
            ->where('detail_request.ID_Req', '=', $idSup)
            ->first();
    
            return $results;  
        } else {
            $results = MasterRequest::select(
                'master_request.No_Req',
                'master_request.Status_Req',
                'master_request.Contract_Buy',
                'master_request.created_at',
                'master_request.Awal_Kontrak',
                'master_request.Akhir_Kontrak',
                'master_jenis.Nama_Jenis',
                'master_jenis.Kode_Jenis',
                'detail_request.QTY',
                'master_product.Harjul_Barang',
                \DB::raw('MIN(master_product.Harpok_Barang) as Min_Harga'),
                \DB::raw('MAX(master_product.Harpok_Barang) as Max_Harga')
            )
            ->join('detail_request', function($join) {
                $join->on('master_request.No_Req', '=', 'detail_request.No_Req');
                $join->where('detail_request.ID_Req', '=', \DB::raw('(SELECT MIN(ID_Req) FROM detail_request WHERE No_Req = master_request.No_Req)'));
            })
            ->join('master_product', 'detail_request.ID_Product', '=', 'master_product.ID_Product')
            ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
            ->groupBy(
                'master_request.No_Req',
                'master_request.Status_Req',
                'master_request.Contract_Buy',
                'master_request.created_at',
                'master_request.Awal_Kontrak',
                'master_request.Akhir_Kontrak',
                'master_jenis.Nama_Jenis',
                'master_jenis.Kode_Jenis',
                'detail_request.QTY',
                'master_product.Harjul_Barang',
            )
            ->paginate(5);
            
            return $results;
        }
        return response()->json(['message' => 'Invalid ID'], 400);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {
       
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
        $status = $request->input('status');
        $edit = DetailRequest::findOrFail($id);

        // Pastikan nilai awal Status_Sup adalah 'Pending'
        if ($edit->Status_Sup !== 'Pending') {
            return response()->json(['message' => 'Gagal: Nilai awal Status_Sup bukan "Pending"']);
        }

        if (isset($status)) {
            $data = [
                'Status_Sup' => $status,
                // 'Contract_Sup' => 'Pending',
            ];

            if ($status === 'Accept') {
                $idProduct = $edit->ID_Product;
                $qty = $edit->QTY;                               

                $product = Product::findOrFail($idProduct);

                $product->update([
                    'Stok_Barang' => $product->Stok_Barang - $qty,
                ]);

                // Ubah nilai Status_Sup pada request_detail menjadi "Decline"
                DetailRequest::where('No_Req', $edit->No_Req)
                    ->where('ID_Req', '!=', $edit->ID_Req)
                    ->update([
                        'Status_Sup' => 'Decline',
                        'Contract_Sup' => 'Decline',
                    ]);

                MasterRequest::where('No_Req', $edit->No_Req)
                    ->update([
                        'Status_Req' => 'Accept',
                        // 'Contract_Buy' => 'Pending',
                    ]);
            }

            $edit->update($data);
        } else {
            $edit->update($request->all());
        }

        return response()->json(['message' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateContract()
    {
        // $status = $request->input('status');
        $idSup = request('idSup');
        $idBuy = request('idBuy');
        $status = request('status');

        if(isset($idSup)) {
            $edit = DetailRequest::findOrFail($idSup);
            $data = [
                'Contract_Sup' => $status,
            ];

            if ($status === 'Decline') {
                $masterRequestId = $edit->No_Req; 
                MasterRequest::where('No_Req', $masterRequestId)->update(['Contract_Buy' => 'Decline']);
            }

            $edit->update($data);
        } elseif (isset($idBuy)) {
            $edit = MasterRequest::findOrFail($idBuy);
            $data = [
                'Contract_Buy' => $status,
            ];

            if ($status === 'Decline') {
                DetailRequest::where('No_Req', $idBuy)->update(['Contract_Sup' => 'Decline']);
            }

            $edit->update($data);
        }

        return response()->json(['message' => $edit]);
    }

    public function contractBuyer() 
    {
        $results = MasterRequest::select(
            'master_request.No_Req',
            'master_request.Status_Req',
            'master_request.Contract_Buy',
            'master_account.No_Telp',
            'master_account.Email',
            'master_request.Awal_Kontrak',
            'master_request.Akhir_Kontrak',
            'master_request.created_at',
        )
            ->join('detail_request', 'master_request.No_Req', '=', 'detail_request.No_Req')
            ->join('master_product', 'detail_request.ID_Product', '=', 'master_product.ID_Product')
            ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
            ->join('master_category', 'master_jenis.ID_Kategori', '=', 'master_category.ID_Kategori')
            ->join('master_account', 'master_request.ID_Buyer', '=', 'master_account.ID_Akun')
            ->where('detail_request.Status_Sup', '=', 'Accept')
            ->groupBy(
                'master_request.No_Req',
                'master_request.Status_Req',
                'master_request.Contract_Buy',
                'master_account.No_Telp',
                'master_account.Email',
                'master_request.Awal_Kontrak',
                'master_request.Akhir_Kontrak',
                'master_request.created_at',
            )
            ->orderBy('master_request.Awal_Kontrak', 'asc') 
            ->paginate(5);
        
        return $results;        
    }

    public function contractSupplier() 
    {
        $results = DetailRequest::select(
            'detail_request.No_Req',
            'detail_request.ID_Req',
            'detail_request.Status_Sup',
            'detail_request.Contract_Sup',
            'master_account.No_Telp',
            'master_account.Email',
            'master_request.Awal_Kontrak',
            'master_request.Akhir_Kontrak',
        )
            ->join('master_product', 'detail_request.ID_Product', '=', 'master_product.ID_Product')
            ->join('master_request', 'detail_request.No_Req', '=', 'master_request.No_Req')
            ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
            ->join('master_category', 'master_jenis.ID_Kategori', '=', 'master_category.ID_Kategori')
            ->join('master_account', 'master_product.ID_Akun', '=', 'master_account.ID_Akun')
            ->where('detail_request.Status_Sup', '=', 'Accept')
            ->orderBy('master_request.Awal_Kontrak', 'asc') 
            ->paginate(5); 
        
        return $results;
        
    }

    public function totalUser()
    {
        $total_users = User::where('Peran', '!=', 'Admin')->count();

        return response()->json(['total_users' => $total_users], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = MasterRequest::findOrFail($id);
        $delete->delete();

        return response()->json(['message' => 'Data updated successfully']);
        // dd($delete);
    }
}
