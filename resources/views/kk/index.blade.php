@extends('layouts.master')

@section('master')
    {{-- MODAL ADD --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('kk/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" name="kepala_keluarga" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nama Kepala Keluarga" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" placeholder="Nomor Kartu Keluarga" name="no_kk"
                                id="exampleInputPassword1" maxlength="16" minlength="16" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">RW</label>
                                    <select class="form-select" name="rw_id" id="rt_id">
                                        <option value="">-- Pilih RW --</option>
                                        @foreach ($selectRw as $d)
                                            <option value="{{ $d->id }}">{{ $d->rw }} | {{ $d->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">RT</label>
                                    <select class="form-select" name="rt_id" id="rw_id">
                                        <option value="">-- Pilih RT --</option>
                                        @foreach ($selectRt as $d)
                                            <option value="{{ $d->id }}">{{ $d->rt }} | {{ $d->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Status Ekonomi</label>
                            <select class="form-select" name="status_ekonomi" id="rw_id">
                                <option value="">-- Pilih Status Ekonomi --</option>
                                <option value="Mampu">Mampu</option>
                                <option value="Tidak Mampu">Tidak Mampu</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Foto Rumah</label>
                            <input type="file" class="form-control" name="image" id="exampleInputPassword1" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL DELETE --}}


    @foreach ($data as $r)
        <div class="modal fade" id="modalDelete{{ $r->id }}" tabindex="-1" aria-labelledby="modalHapusBarang"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <i class="fas fa-exclamation-circle mb-2"
                            style="color: #e74a3b; font-size:120px; justify-content:center; display:flex"></i>
                        <h5 class="text-center">Apakah anda yakin ingin menghapus KK{{ $r->no_kk }} ?</h5>
                    </div>
                    <div class="modal-footer">
                        <form action={{ url('kk/delete/' . $r->id) }} method="POST">
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
            <div class="py-3">
                <h3>Data Kartu Keluarga</h3>
            </div>
            <section class="section">
                <div class="card shadow mb-5">
                    <div class="card-body">
                        @hasrole('superadmin|rw|rt')
                            <button class="btn btn-primary rounded-pill mb-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="fas fa-plus"></i> Tambah Data
                            </button>
                        @endhasrole
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Foto Rumah</th>
                                    <th>Nama Kepala Keluarga</th>
                                    <th>No. KK</th>
                                    <th>RW / RT</th>
                                    <th>Status Ekonomi</th>
                                    <th>Jumlah Individu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src={{ asset('storage/foto_rumah/' . $d->image) }} width="200px;"
                                                height="150px;" alt="{{ $d->image }}"></td>
                                        <td>{{ $d->kepala_keluarga }}</td>
                                        <td>{{ $d->no_kk }}</td>
                                        <td>{{ $d->Rw->rw }} / {{ $d->Rt->rt }}</td>
                                        <td>{{ $d->status_ekonomi }}</td>
                                        <td>{{ \App\DataPenduduk::where('kk_id', $d->id)->count() }}</td>
                                        <td>
                                            <a href='{{ url('/kk/' . $d->id . '/showPenduduk') }}' class="btn btn-info"><i
                                                    class="fas fa-eye"></i></a>
                                            <a class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#editData{{ $d->id }}"><i
                                                    class="fas fa-edit"></i></a>
                                            <a class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{ $d->id }}"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
        @include('kk/formEdit')
        </section>
    </div>
@endsection
