<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a class="logo d-flex align-items-center w-auto" href="{{ route('home') }}">
                                    <img src="https://tataruang.atrbpn.go.id/Content/frontend/image/apple-touch-icon-57x57.png"
                                        alt="">
                                    <span class="d-none d-lg-block">Sim-PTSL</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form class="row g-3 needs-validation" method="POST"
                                        action="{{ route('register') }}" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label class="form-label" for="name">Your Name</label>
                                            <input class="form-control" id="name" name="name" type="text"
                                                value="{{ old('name') }}" required autocomplete="name">
                                            <div class="invalid-feedback">Please, enter your name!</div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label" for="email">Your Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror"" id="email" name="email" type="email"
                                                value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label" for="password">Password</label>
                                            <input class="form-control  @error('password') is-invalid @enderror"
                                                id="password" name="password" type="password" required
                                                autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label" for="password-confirm">Confirm Password</label>
                                            <input class="form-control" id="password-confirm"
                                                name="password_confirmation" type="password" required
                                                autocomplete="new-password">
                                            <div class="invalid-feedback">Please enter your confirm password!</div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    @include('partials.footer-scripts')

</body>

</html>
