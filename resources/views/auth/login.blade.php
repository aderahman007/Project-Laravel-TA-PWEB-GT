<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login | SI Parawisata</title>
    @include('layout.css')
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <div class="flash-error" data-flashdata="{{Session::has('error')}}"></div>
                                    <div class="flash-success" data-flashdata="{{Session::has('success')}}"></div>
                                    <form action="{{route('login')}}" method="post">
                                        {{@csrf_field()}}
                                        <div class="form-group">
                                            <label class="small mb-1" for="email">Email</label>
                                            <input class="form-control py-4" name="email" id="email" type="email" placeholder="Enter email address" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Password</label>
                                            <input class="form-control py-4" name="password" id="password" type="password" placeholder="Enter password" />
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-end mt-4 mb-0">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{route('UserIndex')}}">Anda bukan admin? Beranda!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SI Parawisata 2020 <?= date("Y") ?></div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('layout.js')
    <script>
        const flashDataError = $('.flash-error').data('flashdata');
        const flashDataSuccess = $('.flash-success').data('flashdata');

        if (flashDataError) {
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{Session::get('error')}}",
                showConfirmButton: false,
                timer: 3500
            });
        }

        if (flashDataSuccess) {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{Session::get('success')}}",
                showConfirmButton: false,
                timer: 3500
            });
        }
    </script>
</body>

</html>