<?php

namespace App\Http\Controllers;

use App\DataKk;
use App\DataPenduduk;
use App\DataRt;
use App\DataRw;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class KkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user =  Auth::user();
        // dd($user);

        if ($user->hasRole('rw') == true) {
            $data = DataKk::where('rw_id', '=', $user->Rw[0]->id)->get();
        } elseif ($user->hasRole('rt') == true) {
            $data = DataKk::where('rt_id', $user->Rt[0]->id)->get();
        } elseif ($user->hasRole('warga') == true) {
            $data = DataKk::where('user_id', $user->Kk[0]->user_id)->get();
        } else {
            $data = DataKk::all();
        }
        // $data = DataKk::all();

        $selectRt = DataRt::get();
        $selectRw = DataRw::get();
        return view('kk.index', compact(['selectRt', 'selectRw', 'data']));
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
            'kepala_keluarga' => 'required',
            'no_kk' => 'required',
            'image' => 'required|file|max:3072',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'status_ekonomi' => 'required',
        ]);

        $kk  = User::create([
            'name' => $request->kepala_keluarga,
            'email' => $request->no_kk,
            'password' =>  bcrypt('password'),
        ]);

        // dd($kk);

        $data = new DataKk();
        $data->kepala_keluarga = $request->kepala_keluarga;
        $data->no_kk = $request->no_kk;
        $data->rt_id = $request->rt_id;
        $data->rw_id = $request->rw_id;
        $data->user_id = $kk->id;
        $data->status_ekonomi = $request->status_ekonomi;

        $img = $request->file('image');
        $filename = $img->getClientOriginalName();

        $data->image = $request->file('image')->getClientOriginalName();
        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('/foto_rumah', $filename);

        }
        // dd($data);
        $data->save();

        $kk->assignRole('warga');

        Alert::success('Sukses!', 'Berhasil menambah kartu keluarga');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DataKk::all();
        $data = DataKk::where('id', $id)->firstOrFail();

        $penduduk = DataPenduduk::where('kk_id', $data->id)->get();
        return view('kk.showPenduduk', compact(['data', 'penduduk']));
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
        $data = DataKk::where('id', $id)->firstOrFail();

        $request->validate([
            'kepala_keluarga' => 'required',
            'no_kk' => 'required',
            'image' => 'required|file|max:3072',
            'rt_id' => 'required',
            'rw_id' => 'required',
            'status_ekonomi' => 'required',
        ]);

        $img = $request->file('image');
        $filename = $img->getClientOriginalName();

        $data->image = $request->file('image')->getClientOriginalName();
        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete('/foto_rumah/' . $request->oldImage);
            }
            $request->file('image')->storeAs('/foto_rumah', $filename);
        }

        $data->kepala_keluarga = $request->kepala_keluarga;
        $data->no_kk = $request->no_kk;
        $data->rt_id = $request->rt_id;
        $data->rw_id = $request->rw_id;
        $data->status_ekonomi = $request->status_ekonomi;
        $data->update();

        $kk = User::where('id', $data->user_id)->update([
            'name' => $request->kepala_keluarga,
            'email' => $request->no_kk,
        ]);
        // dd($kk);

        Alert::success('Sukses!', 'Berhasil mengedit kartu keluarga');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataKk::find($id);
        if ($data->image) {
            Storage::delete('/foto_rumah/' . $data->image);
        }

        User::where('id', '=', $data->user_id)->delete();

        $data->delete();

        Alert::Success('Sukses!', 'Berhasil menghapus kartu keluarga');

        return redirect()->back();
    }
}
