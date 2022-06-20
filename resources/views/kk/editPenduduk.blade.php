@foreach ($penduduk as $d)
    <div class="modal fade text-left" id="editData{{ $d->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Edit RT</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ url('kk/' . $d->id . '/showPenduduk/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{$d->nama}}" name="nama" id="exampleInputEmail1"
                                aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nomor NIK</label>
                            <input type="text" class="form-control" value="{{$d->nik}}" name="nik" id="exampleInputPassword1" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <label for="">Usia</label>
                                <input class="form-control" type="text" placeholder="Usia" value="{{$d->usia}}" name="usia" required>
                            </div>
                            <div class="col-sm-4">
                                <label for="">Tempat Lahir</label>
                                <input class="form-control" type="text" placeholder="Tempat Lahir" value="{{$d->tmp_lahir}}" name="tmp_lahir"
                                    required>
                            </div>
                            <div class="col-sm-4">
                                <label for="">Tanggal Lahir</label>
                                <input class="form-control" type="date" placeholder="Tanggal Lahir" value={{ old('tgl_lahir', $d->tgl_lahir) }} name="tgl_lahir"
                                    required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="">Jenis Kelamin</label>
                                <select class="form-select" type="text" placeholder="Nama Lengkap" name="gender"
                                    required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki" {{$d->gender === 'Laki-laki' ? 'selected' : ''}}>Laki-Laki</option>
                                    <option value="Perempuan" {{$d->gender === 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Agama</label>
                            <select class="form-select" type="text" placeholder="Agama" name="agama" required>
                                <option value="">-- Pilih Agama --</option>
                                <option value="Islam" {{ $d->agama === 'Islam' ? 'selected' : '' }}>Islam
                                </option>
                                <option value="Katolik" {{ $d->agama === 'Katolik' ? 'selected' : '' }}>Katolik
                                </option>
                                <option value="Protestan" {{ $d->agama === 'Protestas' ? 'selected' : '' }}>
                                    Protestan
                                </option>
                                <option value="Konghucu" {{ $d->agama === 'Konghucu' ? 'selected' : '' }}>
                                    Konghucu
                                </option>
                                <option value="Buddha" {{ $d->agama === 'Buddha' ? 'selected' : '' }}>Buddha
                                </option>
                                <option value="Hindu" {{ $d->agama === 'Hindu' ? 'selected' : '' }}>Hindu
                                </option>
                            </select>
                        </div>

                        <label for="">Alamat</label>
                        <div class="mb-3">
                            <textarea class="form-control" name="alamat" id="" cols="30" rows="3">{{$d->alamat}}</textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="">Status Pernikahan</label>
                                    <select class="form-select" type="text" placeholder="Nama Lengkap"
                                        name="status_pernikahan" required>
                                        <option value="">-- Pilih Status Pernikahan --</option>
                                        <option value="Kawin" {{$d->status_pernikahan === 'Kawin' ? 'selected' : ''}}>Kawin</option>
                                        <option value="Belum Kawin" {{$d->status_pernikahan === 'Belum Kawin' ? 'selected' : ''}}>Belum Kawin</option>
                                        <option value="Cerai" {{$d->status_pernikahan === 'Cerai' ? 'selected' : ''}}>Cerai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="">Status Di Keluaraga</label>
                                    <select class="form-select" type="text" placeholder="Nama Lengkap" name="status_keluarga"
                                        required>
                                        <option value="">-- Pilih Status Dikeluarga --</option>
                                        <option value="Kepala Rumah Tangga" {{$d->keluarga === 'Kepala Rumah Tangga' ? 'selected' : ''}}>Kepala Rumah Tangga</option>
                                        <option value="Isteri" {{$d->status_keluarga === 'Isteri' ? 'selected' : ''}}>Isteri</option>
                                        <option value="Anak" {{$d->status_keluarga === 'Anak' ? 'selected' : ''}}>Anak</option>
                                        <option value="Lainnya" {{$d->status_keluarga === 'Lainnya' ? 'selected' : ''}}>Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" value="{{$d->pekerjaan}}" id="exampleInputPassword1" required>
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
@endforeach
