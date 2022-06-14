<title>Dashboard</title>

@extends('layouts.master')

@section('master')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div>
                    <h1>Dashboard</h1>
                </div>
            </div>
            <div class="page-content mt-4">
                <section class="row">
                    <div class="col-12 col-lg-8">
                        <div class="row">
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card shadow">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Data RT</h6>
                                                <h6 class="font-extrabold mb-0">244</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card shadow">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Data KK</h6>
                                                <h6 class="font-extrabold mb-0">24</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-4 col-md-6">
                                <div class="card shadow">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Total Warga</h6>
                                                <h6 class="font-extrabold mb-0">24</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-4">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h4>Pertambahan warga setiap bulan</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="warga"></canvas>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                                <h6 class="font-extrabold mb-0">112</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card shadow">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold"></h5>
                                        <h6 class="text-muted mb-0"></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-12 col-lg-12">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h4>Usia</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="usia"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="col-12 col-lg-12">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h4>Gender</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="gender"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
@endsection
