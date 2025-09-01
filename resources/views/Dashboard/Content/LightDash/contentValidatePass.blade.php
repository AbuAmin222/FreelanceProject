@extends('Dashboard.Pages.masterLightDash')
@section('content')
    <!--start content-->

    <main class="page-content d-flex justify-content-center align-items-center" style="min-height: 90vh;">

        <div class="row">
            <div class="col-xl-8 col-lg-10 col-md-11">

                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <h6 class="mb-0 text-uppercase">Enter email and password to reset password</h6>
                            <hr />
                            {{-- Error Alert --}}
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                                        <div>
                                            <strong>Oops! Something went wrong:</strong>
                                            <ul class="mb-0 ps-3">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <form class="row g-3" method="post" action="{{ route($guard . '.validateData') }}">
                                @csrf
                                <div class="col-12">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route($guard . '.forgetPass') }}">Forgot Password?</a>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Validate</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--end page main-->
@endsection
