<?php

namespace App\Http\Controllers;

use App\DataRt;
use App\DataRw;
use App\User;
use Illuminate\Http\Request;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataRt::all();

        $select = DataRw::get();
        return view('rt.index',compact(['data','select']));
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
        $dataRt = DataRw::where('id',$request->rw_id)->get();
        // dd($dataRt[0]->rw);
        $this->validate($request,[
            'nama'=> 'required',
            'rt'=> 'required',
            'rw_id'=> 'required',
            'periode_awal'=> 'required',
            'periode_akhir'=> 'required'
        ]);

        $rt = User::create([
            'name' => $request->nama,
            'email' => 'rt' . $request->rt . $dataRt[0]->rw. '@gmail.com',
            'password' =>  bcrypt('password'),
        ]);
        // dd($rt);


        $data = new DataRt();
        $data->nama = $request->nama;
        $data->rt = $request->rt;
        $data->rw_id = $request->rw_id;
        $data->periode_awal = $request->periode_awal;
        $data->periode_akhir = $request->periode_akhir;
        $data->user_id = $rt->id;
        $data->save();

        $rt->assignRole('rt');

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
        $data = DataRt::where('id', $id)->first();

        $request->validate([
            'nama' => 'required',
            'rt' => 'required',
            'periode_awal' => 'required',
            'periode_akhir' => 'required',
            'rw_id'=> 'required',
        ]);

        $data->nama = $request->nama;
        $data->rt = $request->rt;
        $data->rw_id = $request->rw_id;
        $data->periode_awal = $request->periode_awal;
        $data->periode_akhir = $request->periode_akhir;
        $data->update();
        // dd($data);

        // User::where('id',$data->id)->update([
        //     'name' => $request->name,
        //     'email' => 'rt' . $request->rt . '@gmail.com'
        // ]);

        return redirect()->route('rt.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DataRt::find($id);
        // dd($data);
        $data->delete();

        return redirect()->route('rt.index');
    }
}
