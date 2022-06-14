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
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  
<div class="container-fluid">
    <div class="row">
        <div class="py-3">
            <h3>Data Penduduk</h3>
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
                                <th>Nama</th>
                                <th>Nik</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3123</td>
                                <td>Delep</td>
                                <td>123</td>
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