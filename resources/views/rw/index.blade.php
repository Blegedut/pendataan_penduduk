@extends('layouts.master')

@section('master')
{{-- MODAL ADD --}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{url('rw/store')}}" method="POST">
            @csrf
        <div class="modal-body">
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nama Ketua Rw</label>
                  <input type="text" class="form-control" name="nama" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">RW</label>
                  <input type="text" class="form-control" name="rw" id="exampleInputPassword1">
                </div>
                <div class="row">
                    <label for="exampleInputPassword1" class="form-label">Periode</label>

                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="periode_awal" id="exampleInputPassword1">
                          </div>
                    </div>
                    &mdash;
                    <div class="col">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="periode_akhir" id="exampleInputPassword1">
                          </div>
                    </div>
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

  {{-- END MODAL ADD --}}
<div class="container-fluid">
    <div class="row">
        <div class="py-3">
            <h3>Data RW</h3>
        </div>
        <section class="section">
            <div class="card shadow mb-5">
                <div class="card-body">
                    <button class="btn btn-primary rounded-pill mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Ketua RW</th>
                                <th>RW</th>
                                <th>Periode</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <a href='#' class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editData"><i
                                            class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    {{-- @include('rt/edit') --}}
    </section>
</div>
@endsection