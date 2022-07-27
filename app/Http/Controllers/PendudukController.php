<?php

namespace App\Http\Controllers;

use App\DataKk;
use App\DataPenduduk;
use App\DataRt;
use App\DataRw;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  Auth::user();
        // dd($user->Rw[0]);

        if ($user->hasRole('rw') == true) {
            $data = DataPenduduk::where('rw_id', '=', $user->Rw[0]->id)->get();
        } elseif ($user->hasRole('rt') == true) {
            $data = DataPenduduk::where('rt_id', $user->Rt[0]->id)->get();
        } else {
            $data = DataPenduduk::all();
        }

        $selectRt = DataRt::get();
        $selectRw = DataRw::get();
        $kk = DataKk::get();
        return view('penduduk.index', compact('data', 'selectRt', 'selectRw', 'kk'));
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
    public function store(Request $request, $id)
    {
        $dataKk = DataKk::where('id', $id)->firstOrFail();
        // dd($data);

        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required',
            'gender' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'status_pernikahan' => 'required',
            'status_keluarga' => 'required',
            'pekerjaan' => 'required',
        ]);

        $data = new DataPenduduk();
        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->kk_id = $dataKk->id;
        $data->rw_id = $dataKk->rw_id;
        $data->rt_id = $dataKk->rt_id;
        $data->gender = $request->gender;
        $data->usia = $request->usia;
        $data->tmp_lahir = $request->tmp_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->agama = $request->agama;
        $data->alamat = $request->alamat;
        $data->status_pernikahan = $request->status_pernikahan;
        $data->status_keluarga = $request->status_keluarga;
        $data->pekerjaan = $request->pekerjaan;
        // dd($data);
        $data->save();

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
        $data = DataPenduduk::where('id', $id)->firstOrFail();

        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'gender' => 'required',
            'usia' => 'required',
            'alamat' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'status_pernikahan' => 'required',
            'status_keluarga' => 'required',
            'pekerjaan' => 'required',
        ]);

        $data->nama = $request->nama;
        $data->nik = $request->nik;
        $data->gender = $request->gender;
        $data->usia = $request->usia;
        $data->tmp_lahir = $request->tmp_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->agama = $request->agama;
        $data->alamat = $request->alamat;
        $data->status_pernikahan = $request->status_pernikahan;
        $data->status_keluarga = $request->status_keluarga;
        $data->pekerjaan = $request->pekerjaan;
        // dd($data);
        $data->update();

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
        $data = DataPenduduk::find($id);
        $data->delete();

        Alert::Success('Sukses!', 'Berhasil menghapus kartu keluarga');

        return redirect()->back();
    }

    public function export($id)
    {
        $data = DataKk::where('id', $id)->firstOrFail();
        $penduduk = DataPenduduk::where('kk_id', $data->id)->get();
        // dd($penduduk);
        // PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
        $pdf = PDF::loadview('penduduk.export', ['kk' => $penduduk], compact('penduduk'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->download('kk.pdf');
    }

    public function exportRt($id)
    {
        $data = DataRt::where('id', $id)->firstOrFail();
        // dd($data);
        $penduduk = DataPenduduk::where('rt_id', $data->id)->get();
        // dd($penduduk);
        // PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
        $pdf = PDF::loadview('penduduk.exportRt', ['kk' => $penduduk], compact('penduduk'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->download('rt.pdf');
    }

    public function exportRw($id)
    {
        $data = DataRw::where('id', $id)->firstOrFail();
        // dd($data);
        $penduduk = DataPenduduk::where('rw_id', $data->id)->get();
        // dd($penduduk);
        // PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
        $pdf = PDF::loadview('penduduk.exportRw', ['kk' => $penduduk], compact('penduduk'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->download('rw.pdf');
    }

    public function exportAll($id)
    {
        // $data = DataRt::where('id', $id)->firstOrFail();
        // dd($data);
        $penduduk = DataPenduduk::all();
        // dd($penduduk);
        // PDF::loadHTML($html)->setPaper('a4', 'landscape')->setWarnings(false)->save('myfile.pdf')
        $pdf = PDF::loadview('penduduk.exportAll', ['kk' => $penduduk], compact('penduduk'))->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->download('All.pdf');
    }

    public function filter(Request $request)
    {
        $selectRt = DataRt::get();
        $selectRw = DataRw::get();

        if ($request) {
            $data = DataPenduduk::where('rw_id', $request->rw_id)->where('rt_id', $request->rt_id)->get();
        } else {
            $data = DataPenduduk::all();
        }
        return view('penduduk.index', compact(['data', 'selectRw', 'selectRt']));
    }

    // public function expot()
    // {
    //     return (new PendudukExport)->download('invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    // }
}
