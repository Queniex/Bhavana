<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\MasterRequest;
use App\Models\DetailRequest;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\DateTime;

class AuthorizationController extends Controller
{
    public function showLogin()
    {
        return view('Authorization.login');
    }

    public function registerStore(Request $req)
    {
        // dd($req->all());
        if($req["Peran"] === 'Pembeli') {
            $data = $req->validate([
                'Username' => 'required|max:255|unique:master_account,Username',
                'Email' => 'required|string|unique:master_account,Email',
                'Password' => 'required',
                'No_Telp' => 'required',
                'Peran' => 'required',
                'Alamat' => 'required',
                'Tanggal_Lahir' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $birthdate = new \DateTime($value);
                        $currentDate = new \DateTime();
                        $age = $currentDate->diff($birthdate)->y;
                        
                        if ($age < 17) {
                            $fail('Usia belum mencukupi.');
                        }
                    },
                ],
                'Status' => 'required'
            ]);
        } else if($req["Peran"] === 'Penjual')  {
            $data = $req->validate([
                'Username' => 'required|max:255|unique:master_account,Username',
                'Email' => 'required|unique:master_account,Email',
                'Password' => 'required',
                'No_Telp' => 'required',
                'Alamat' => 'required',
                'NIB' => 'required',
                'Nama' => 'required',
                'Peran' => 'required',
                'Status' => 'required'
            ]);
        }

        if($data['Password'] === $req['Confirm_Password']) {
            $data['Password'] = bcrypt($data['Password']);

            User::create($data);
            return redirect('/login')->with('berhasil', 'Berhasil Daftar!');
        } else {
            return back()->withErrors(['Password' => 'Password tidak sama.'])->withInput();
        }
    }

    public function loginStore(Request $req)
    {

        $data = $req->validate([
            'Username' => 'required|max:255',
            'Password' => 'required',
        ]);

        $user = User::where('Username', $data['Username'])->first();
        
        // dd($user->Status);
        // dd("Login successful for user: " . $user->Username);

        if($user && Hash::check($data['Password'], $user->Password))
        {
            $req->session()->regenerate();
            $req->session()->put('peran', $user->Peran);
            $req->session()->put('id', $user->ID_Akun);

            if($user->Peran === 'Admin'){
                return redirect('/admin')->with('berhasil', 'Berhasil Masuk!');
            } else if($user->Peran === 'Pembeli'){
                return redirect('/buyer')->with('berhasil', 'Berhasil Masuk!');;
            } else if ($user->Peran === 'Penjual' && $user->Status === 'Accept'){
                return redirect('/supplier')->with('berhasil', 'Berhasil Masuk!');;
            } else {
                return redirect('/login')->with('gagal', 'Akun tidak valid!');
            }
        } else {
            return redirect('/login')->with('gagal', 'Kesalahan username/password!');
        }
    }

    public function totalProduct()
    {
        $id = request()->session()->get('id');
        $peran = request()->session()->get('peran');

        if(isset($id)) {
            if($peran === 'Penjual') {
                $totalProducts = Product::where('ID_Akun', $id)->count();
            } else {
                $totalProducts = Product::count();
            }
        } 
        
        return response()->json(['total_products' => $totalProducts], 200);
    }

    public function totalRequest()
    {
        $id = request()->session()->get('id');
        $peran = request()->session()->get('peran');

        if(isset($id)) {
            if($peran === 'Penjual') {
                $totalRequest = Detailrequest::join('master_product', 'detail_request.ID_Product', '=', 'master_product.ID_Product')
                ->where('master_product.ID_Akun', $id)
                ->count();
                return response()->json(['total_requests' => $totalRequest], 200);
            } else {
                $totalRequestBuy = MasterRequest::count();
                $totalRequestSup = Detailrequest::where('Status_Sup', '=', 'Accept')->count();

                return response()->json([
                    'total_requests_buy' => $totalRequestBuy,
                    'total_requests_sup' => $totalRequestSup
                ], 200);
                
            }
        } 
        
        
    }

    public function showRegistration()
    {
        return view('Authorization.regist');
    }

    public function showProfile()
    {
        $userId = request()->session()->get('id');
        $user = User::find($userId); 
        // return view('Buyer.profile')->with('user', $user);
        return $user;
    }

    public function showProduct()
    {
        $id = request()->session()->get('id');
        // dd($id);

        if(isset($id)) {
            $products = Product::select(
                'master_product.*', 
                'master_jenis.Nama_Jenis', 
                'master_jenis.Kode_Jenis',
                'master_category.Foto_Kategori')
            ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
            ->join('master_category', 'master_jenis.ID_Kategori', '=', 'master_category.ID_Kategori')
            ->when($id, function ($query) use ($id) {
                return $query->where('master_product.ID_Akun', $id);
            })
            ->paginate(4);

        } 
    
        return $products;
        // return Product::all();
    }

    public function storeProduct(Request $request)
    {
        $id = request()->session()->get('id');
        $this->validate($request, [
            'ID_Jenis' => 'required|integer',
            'Stok_Barang' => 'required|integer',
            'Harpok_Barang' => 'required|integer'
        ]);

        $data = [
            'ID_Jenis' => $request->ID_Jenis,
            'Stok_Barang' => $request->Stok_Barang,
            'Harpok_Barang' => $request->Harpok_Barang,
            'Harjul_Barang' => (($request->Harpok_Barang * 0.05) + $request->Harpok_Barang),
            'ID_Akun' => $id,
            'Status' => 'Pending',
        ];

        // dd($data);
    
        $product = Product::create($data);
    
        if ($product) {
            return response()->json(['Data' => $data]);
        } else {
            return response()->json(['Data' => 'Error']);
        }
    }

    public function updateProduct(Request $request, $id)
    {    
        $id = 6;


        $data = [
            'Harpok_Barang' => $request->Harpok_Barang,
        ];
        
        $edit = Product::findOrFail($id);
        $edit->update($data);
        // dd($edit);
        
        return response()->json(['message' => 'Data updated successfully']);
    }

    public function addRequest(Request $request)
    {
        $id = request()->session()->get('id');

        $this->validate($request, [
            'Awal_Kontrak' => 'required|date|after_or_equal:today',
            'Akhir_Kontrak' => 'required|date|after_or_equal:today',
            'QTY' => 'required|integer'
        ]);

        $data = [
            'Awal_Kontrak' => $request->Awal_Kontrak,
            'Akhir_Kontrak' => $request->Akhir_Kontrak,
            'ID_Buyer' => $id,
            'Status_Req' => 'Pending',
        ];

        // dd($data);
    
        $req = MasterRequest::create($data);
        $idJenis = $request->input('ID_Jenis');

        if ($req) {
            $results = Product::where('ID_Jenis', $idJenis)
            ->where('Stok_Barang', '>=', $request->QTY)
            ->get();
            foreach ($results as $result) {
                $detailData = [
                    'No_Req' => $req->No_Req,
                    'ID_Product' => $result->ID_Product,
                    'QTY' => $request->QTY,
                    'Status_Sup' => 'Pending'
                ];
    
                DetailRequest::create($detailData);
            }
            return response()->json(['Data' => $req]);
        } else {
            return response()->json(['Data' => 'Error']);
        }
    }

    public function buyerRequest()
    {
        $id = request()->session()->get('id');

        $results = DetailRequest::select(
            'detail_request.No_Req',
            'master_jenis.Nama_Jenis',
            'master_jenis.Kode_Jenis',
            'detail_request.ID_Req',
            'detail_request.QTY',
            'detail_request.Status_Sup',
            'master_request.Awal_Kontrak',
            'master_request.Akhir_Kontrak',
            \DB::raw('detail_request.QTY * master_product.Harpok_Barang AS Pendapatan')
        )
        ->join('master_product', 'detail_request.ID_Product', '=', 'master_product.ID_Product')
        ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
        ->join('master_request', 'detail_request.No_Req', '=', 'master_request.No_Req')
        ->where('master_product.ID_Akun', '=', $id) 
        ->where('detail_request.Status_Sup', '=', 'Pending')
        ->paginate(5);
        
        return $results;

    }

    public function contractRequest()
    {
        $id = request()->session()->get('id');

        $results = DetailRequest::select(
            'detail_request.No_Req',
            'master_jenis.Nama_Jenis',
            'master_jenis.Kode_Jenis',
            'detail_request.ID_Req',
            'detail_request.QTY',
            'detail_request.Status_Sup',
            'detail_request.Contract_Sup',
            'master_request.Awal_Kontrak',
            'master_request.Akhir_Kontrak',
            \DB::raw('detail_request.QTY * master_product.Harpok_Barang AS Pendapatan')
        )
        ->join('master_product', 'detail_request.ID_Product', '=', 'master_product.ID_Product')
        ->join('master_jenis', 'master_product.ID_Jenis', '=', 'master_jenis.ID_Jenis')
        ->join('master_request', 'detail_request.No_Req', '=', 'master_request.No_Req')
        ->where('master_product.ID_Akun', '=', $id) 
        ->where('detail_request.Status_Sup', '=', 'Accept')
        ->paginate(5);
    
        return $results;

    }

    private function getMaxQty($idJenis)
    {
        $product = Product::where('ID_Jenis', $idJenis)
                    ->max('Stok_Barang');

        return response()->json(['product' => $product]);
    }

    private function getMinQty($idJenis)
    {
        $product = Product::where('ID_Jenis', $idJenis)
                    ->min('Stok_Barang');

        return response()->json(['product' => $product]);
    }

    public function showSupplierRegistration()
    {
        return view('Authorization.regist-supplier');
    }

    public function showBuyerRegistration()
    {
        return view('Authorization.regist-buyer');
    }

    public function generateContractBuy($idReq)
    {
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
            ->where('master_request.No_Req', '=', $idReq)
            ->first();
    
            if ($results && $results->Contract_Buy === 'Accept') {
                $data = [
                    'results' => $results,
                ];
        
                return view('Buyer.contract', $data);
            } else {
                // Jika status_req bukan "accept", Anda dapat mengembalikan response yang sesuai
                return response('Halaman Tidak Ditemukan, Sihlakan Kembali!', 401);
            }

    }

    public function generateContractSup($idReq)
    {
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
            ->where('detail_request.ID_Req', '=', $idReq)
            ->first();
            // dd($results);

            if ($results && $results->Contract_Sup === 'Accept') {
                $data = [
                    'results' => $results,
                ];
        
                return view('Supplier.contract', $data);
            } else {
                // Jika status_req bukan "accept", Anda dapat mengembalikan response yang sesuai
                return response('Halaman Tidak Ditemukan, Sihlakan Kembali!', 401);
            }
    }
    

    public function logout(){
        if(Session::has('peran')) {
            Session::pull('peran');
            return redirect('/login')->with('berhasil', 'Berhasil logout');
        }
    }

}
