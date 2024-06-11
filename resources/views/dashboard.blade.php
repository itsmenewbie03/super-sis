@extends('layouts.app')
@section('pageTitle', 'Dashboard')

@section('content')
    <div class="pagetitle">
        <h1>Hello, {{ Auth::user()->name }}!</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">@yield('pageTitle')</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    {{-- Dashboard Stats --}}
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Users</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            000
                                        </h6>
                                        <span class="text-muted small pt-2 ps-1">total</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Students</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            000
                                        </h6>
                                        <span class="text-muted small pt-2 ps-1">total</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Subjects</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            000
                                        </h6>
                                        <span class="text-muted small pt-2 ps-1">total</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                {{-- @include('components.stats.recentactivity') --}}




            </div><!-- End Right side columns -->

        </div>
    </section>

@endsection
