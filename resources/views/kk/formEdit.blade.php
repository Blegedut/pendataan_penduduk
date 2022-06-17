@foreach ($data as $d)
    <div class="modal fade text-left" id="editData{{ $d->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Edit RT</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="{{ url('kk/update/' . $d->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kepala Keluarga</label>
                            <input type="text" class="form-control" value="{{ $d->kepala_keluarga }}"
                                name="kepala_keluarga" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control" value="{{ $d->no_kk }}" name="no_kk"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Jumlah Individu</label>
                            <input type="text" class="form-control" value="{{ $d->jumlah_individu }}"
                                name="jumlah_individu" id="exampleInputPassword1">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">RW</label>
                                    <select class="form-select" name="rw_id" id="rt_id">
                                        <option value="">-- Pilih RW --</option>
                                        @foreach ($selectRw as $rw)
                                            <option value="{{ $rw->id }}" selected>{{ $rw->rw }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">RT</label>
                                    <select class="form-select" name="rt_id" id="rw_id">
                                        <option value="">-- Pilih RT --</option>
                                        @foreach ($selectRt as $rt)
                                            <option value="{{ $rt->id }}" selected>{{ $rt->rt }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Status Ekonomi</label>
                            <select class="form-select" name="status_ekonomi" >
                                <option value="">-- Pilih Status Ekonomi --</option>
                                <option value="Mampu" {{ $d->status_ekonomi === 'Mampu' ? 'selected' : '' }}> Mampu
                                </option>
                                <option value="Tidak Mampu" {{ $d->status_ekonomi === 'Tidak Mampu' ? 'selected' : '' }}> Tidak Mampu
                                </option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Foto Rumah</label>
                            <input type="file" class="form-control" name="image" id="exampleInputPassword1" value="{{$d->image}}">
                        </div>
                        <input type="hidden" name= "oldImage" value="{{$d->image}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
