<?php

namespace App\Http\Controllers\API;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peran = request('peran');
        $id = request('id');

        if(isset($peran)) {
            $users = User::when($peran, function ($query) use ($peran) {
                return $query->where('Peran', $peran);
            })->paginate(2);
        } 

        if(isset($id)) {
            $users = User::find($id);
            // return response()->json($user);
        }
    
        return $users;
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
            'name' => 'required|string',
            'level_id' => 'required|integer',
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'level_id' => $request->level_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
    
        $user = User::create($data);
    
        if ($user) {
            return response()->json(['Data' => $data]);
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
    public function showProfile()
    {
        // // $id = request('id');
        // $id = session()->get('id');
        // // $userId = session()->get('id');
        // $users = User::find($id);

        // return $users;

        $dataForVue = [
            'a' => 'b',
            'user_id' => session('peran'),
        ];
    
        return response()->json(['dataForVue' => $dataForVue]);
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
        $edit = User::findOrFail($id);

        if (isset($status)) {
            $data = [
                'Status' => $status,
            ];

            $edit->update($data);
        
        } else {
            // $this->validate($request, [
            //     'No_Telp' => 'required',
            //     'Alamat' => 'required',
            //     'NIB' => 'required',
            //     'Nama' => 'required',
            //     'Peran' => 'required',
            //     'Status' => 'required'
            // ]);

            // $data = [
            //     'Username' => $request->Username,
            //     'Email' => $request->Email,
            //     'No_Telp' => $request->No_Telp,
            //     'Alamat' => $request->Alamat,
            //     'NIB' => $request->NIB,
            //     'Nama' => $request->Nama,
            //     'Peran' => $request->Peran,
            //     'Status' => $request->Status,
            // ];
            $edit->update($request->all());

            if($request->hasFile('Foto_Profile')) {
                $request->file('Foto_Profile')->move('./images/user/', $request->file('Foto_Profile')->getClientOriginalName());
                $edit->Foto_Profile = $request->file('Foto_Profile')->getClientOriginalName();
                $edit->save();
            }
            $a = $request->Foto_Profile;
        }
        return response()->json(['message' => $a]);
    }

    public function totalUser()
    {
        $total_users = User::where('Peran', '!=', 'Admin')->count();

        return response()->json(['total_users' => $total_users], 200);
    }


    // public function updateProfile(Request $request, $id)
    // {    
    //     $id = request('id');
        
    //     $edit = User::findOrFail($id);
        
    //     if($request->hasFile('Foto_Profile')) {
    //         $request->file('Foto_Profile')->move('./images/user/', $request->file('Foto_Profile')->getClientOriginalName());
    //         $edit->Foto_Profile = $request->file('Foto_Profile')->getClientOriginalName();
    //         $edit->save();
    //     }
    //     $a = $request->Foto_Profile;
        
    //     return response()->json(['message' => $a]);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = User::findOrFail($id);
        $delete->delete();

        return response()->json(['message' => 'Data updated successfully']);
        // dd($delete);
    }
}
