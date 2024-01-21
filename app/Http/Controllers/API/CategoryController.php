<?php

namespace App\Http\Controllers\API;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = request('id');
        $page = request('page');

        if(isset($id)) {
            $category = Category::find($id);

            return response()->json($category, 200);
        } else if(isset($page)) {
            $category = Category::paginate(4);
            return response()->json($category, 200);
        } else {
            $category = Category::all();
            return response()->json($category, 200);
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
        $this->validate($request, [
            'Nama_Kategori' => 'required|string|unique:master_Category,Nama_Kategori',
            'Foto_Kategori' => 'required',
            'Keterangan' => 'required',
        ]);
    
        $category = Category::create($request->all());

        if($request->hasFile('Foto_Kategori')) {
            $request->file('Foto_Kategori')->move('./images/user/', $request->file('Foto_Kategori')->getClientOriginalName());
            $category->Foto_Kategori = $request->file('Foto_Kategori')->getClientOriginalName();
            $category->save();
        }
    
        if ($category) {
            return response()->json(['Data' => $category]);
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
            'Nama_Kategori' => 'required|string',
            // 'Jenis_Satuan' => 'required|',
        ]);
        
        $edit = Category::findOrFail($id);
        
        $data = [
            'Nama_Kategori' => $request->Nama_Kategori,
            // 'Jenis_Satuan' => $request->Jenis_Satuan,
        ];
        
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
        $delete = Category::findOrFail($id);
        $delete->delete();

        return response()->json(['message' => 'Data updated successfully']);
        // dd($delete);
    }
}
