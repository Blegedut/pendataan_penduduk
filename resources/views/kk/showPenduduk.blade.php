@extends('layouts.master')

@section('master')
    {{-- MODAL ADD --}}

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ '/kk/' . $data->id . '/showPenduduk/store' }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nomor NIK</label>
                            <input type="text" class="form-control" name="nik" id="exampleInputPassword1">
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label for="">Usia</label>
                                <input class="form-control" type="text" placeholder="Usia" name="usia" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="">Tempat Lahir</label>
                                <input class="form-control" type="text" placeholder="Tempat Lahir" name="tmp_lahir"
                                    required>
                            </div>
                            <div class="col-sm-4">
                                <label for="">Tanggal Lahir</label>
                                <input class="form-control" type="date" placeholder="Tanggal Lahir" name="tgl_lahir"
                                    required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Jenis Kelamin</label>
                            <select class="form-select" type="text" placeholder="Nama Lengkap" name="gender" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Agama</label>
                            <select class="form-select" type="text" placeholder="Agama" name="agama" required>
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Konghucu">Konghucu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Hindu">Hindu</option>
                            </select>
                        </div>

                        <label for="">Alamat</label>
                        <div class="mb-3">
                            <textarea class="form-control" name="alamat" id="" cols="30" rows="3"></textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="">Status Pernikahan</label>
                                    <select class="form-select" type="text" placeholder="Nama Lengkap"
                                        name="status_pernikahan" required>
                                        <option value="">-- Pilih Status Pernikahan --</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Cerai">Cerai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="">Status Di Keluaraga</label>
                                    <select class="form-select" type="text" placeholder="Nama Lengkap"
                                        name="status_keluarga" required>
                                        <option value="">-- Pilih Status Dikeluarga --</option>
                                        <option value="Kepala Rumah Tangga">Kepala Rumah Tangga</option>
                                        <option value="Isteri">Isteri</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" id="exampleInputPassword1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL ADD --}}

    {{-- MODAL DELETE --}}

    @foreach ($penduduk as $r)
        <div class="modal fade" id="modalDelete{{ $r->id }}" tabindex="-1" aria-labelledby="modalHapusBarang"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fas fa-exclamation-circle mb-2"
                            style="color: #e74a3b; font-size:120px; justify-content:center; display:flex"></i>
                        <h5 class="text-center">Apakah anda yakin ingin menghapus Data Keluarga ini ?</h5>
                    </div>
                    <div class="modal-footer">
                        <form action={{ url('kk/' . $r->id) . '/showPenduduk/delete' }} method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Yes, Delete it</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- END MODAL DELETE --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-content">
                        <div class="card-body">
                            {{-- {{$data}} --}}
                            <h5 class="card-title">Data Kartu Keluarga</h5>
                            <div class="card-text">
                                <div class="row justify-content-start">
                                    <div class="col-2">
                                        Kepala Keluarga
                                    </div>
                                    <div class="col-4">
                                        : {{ $data->kepala_keluarga }}
                                    </div>
                                </div>

                                <div class="row justify-content-start">
                                    <div class="col-2">
                                        Nomor Kartu Keluarga
                                    </div>
                                    <div class="col-4">
                                        : {{ $data->no_kk }}
                                    </div>
                                </div>

                                <div class="row justify-content-start">
                                    <div class="col-2">
                                        RW / RT
                                    </div>
                                    <div class="col-4">
                                        : {{ $data->rw->rw }} / {{ $data->rt->rt }}
                                    </div>
                                </div>

                                <div class="row justify-content-start">
                                    <div class="col-2">
                                        Status Ekonomi
                                    </div>
                                    <div class="col-4">
                                        : {{ $data->status_ekonomi }}
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col-2">
                                        Jumlah Individu
                                    </div>
                                    <div class="col-4">
                                        : {{ \App\DataPenduduk::where('kk_id', $data->id)->count() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-3">
                <h3>Data Keluarga</h3>
            </div>
            <section class="section">
                <div class="card shadow mb-5">
                    <div class="card-body">
                        <button class="btn btn-primary rounded-pill mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fas fa-plus"></i> Tambah Data
                        </button>
                        @if (count($penduduk) > 0)
                        <a href={{ url('/penduduk/export/'. $data->id) }} class="btn btn-danger rounded-pill mb-3 mr-1">
                            <i class="fas fa-file-pdf"></i>
                            <span>Export Pdf</span>
                        </a>
                        @endif
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>No. KK</th>
                                    <th>Alamat</th>
                                    <th>RW / RT</th>
                                    <th>Agama</th>
                                    <th>Tempat & Tanggal Lahir</th>
                                    <th>Usia</th>
                                    <th>Status Keluarga</th>
                                    <th>Pekerjaan</th>
                                    <th>Status Pernikahan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penduduk as $pd)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pd->nama }}</td>
                                        <td>{{ $pd->nik }}</td>
                                        <td>{{ $pd->kk->no_kk }}</td>
                                        <td>{{ $pd->alamat }}</td>
                                        <td>{{ $pd->rw->rw }} / {{ $pd->rt->rt }}</td>
                                        <td>{{ $pd->agama }}</td>
                                        <td>{{ $pd->tmp_lahir }},
                                            {{ Carbon\Carbon::parse($pd->tgl_lahir)->format('d-m-Y') }}</td>
                                        <td>{{ $pd->usia }}</td>
                                        <td>{{ $pd->status_keluarga }}</td>
                                        <td>{{ $pd->pekerjaan }}</td>
                                        <td>{{ $pd->status_pernikahan }}</td>
                                        <td>
                                            <a class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#editData{{ $pd->id }}"><i
                                                    class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{ $pd->id }}"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('kk/editPenduduk')
            </section>
        </div>
    @endsection
