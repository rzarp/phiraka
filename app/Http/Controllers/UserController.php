<?php

namespace App\Http\Controllers;
use App\User;
Use DB;
use Auth;
use DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index() {
        return view('admin.setting.setting', [
            'user' => User::findOrFail(auth()->user()->id)
        ]);
    }

    public function insert() {

        $data['is_admin'] = [0,1];
        return view('admin.setting.insert-user',$data);
    }


    public function show(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('id', '!=', Auth::id())->get();
            return Datatables::of($data)
                ->editColumn('created_at', function ($user) {
                    return [
                    'display' => e($user->created_at->format('d/m/Y H:i:s')),
                    'timestamp' => $user->created_at->timestamp
                    ];
                })
                ->editColumn('updated_at', function ($user) {
                    return [
                    'display' => ($user->updated_at->format('d/m/Y H:i:s')),
                    'timestamp' => $user->updated_at->timestamp
                    ];
                })
                    ->addIndexColumn()
                    ->addColumn('action', function($row)
                    {
   
                        $btn = 

                       '
                       <a href="'.route('edit.user',['id' => $row->id]).'" class="btn btn-primary btn-action mr-1 edit-confirm" data-toggle="tooltip" title="" data-original-title="Edit" ><i class="fas fa-pencil-alt"></i></a>
                        <a href="'.route('delete.user',['id' => $row->id]).'" class="btn btn-danger btn-action trigger--fire-modal-2 delete-confirm" data-toggle="tooltip" title=""data-original-title="Delete"><i class="fas fa-trash"></i></a>
                       ';
     
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.setting.show-user');
    }



    public function edit($id) {
        $data['is_admin'] = [0,1];  
        $data['user'] = User::find($id);
        return view('admin.setting.edit-user',$data);
    }

    public function update(Request $request, $id)
    {

        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_admin' => 'required',
        ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect(route('edit.user',$id))->with('pesan','Data Berhasil Disimpan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_admin' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect(route('insert-user'))->with('pesan','Data Berhasil Ditambahkan');
    }

    public function updateProfile(Request $request)
    {
        $id = auth()->user()->id;
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email')
        ];
        if($request->password) 
        {
            $data['password'] = Hash::make($request->password);
        }
        User::where('id', $id)->update($data);
        return redirect(route('setting'))->with('pesan','Data Berhasil diupdate');
    }

    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect(route('show-user'))->with('pesan','Data Berhasil dihapus!');
    }

}
