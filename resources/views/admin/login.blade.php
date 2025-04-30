<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        /* Mengatur tinggi halaman dan memastikan tidak ada scroll */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        /* Menjaga form tetap berada di tengah halaman tanpa scroll */
        .vh-100 {
            height: 100%;
        }

        /* Agar container form tidak scroll */
        .container {
            max-height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Memberikan jarak di sekitar form */
        .card {
            width: 100%;
            max-width: 400px;
            /* Membatasi ukuran form */
        }
    </style>
</head>

<body style="background-color: #9A616D;">

    <section class="vh-50">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <!-- Form kanan -->
                            <div class="col-md-12 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form>

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Logo</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your
                                            account</h5>



                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example17" class="form-control form-control-lg"
                                                placeholder="Email address" />
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27"
                                                class="form-control form-control-lg" placeholder="Password" />

                                            <button data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn btn-block mt-4" type="button"
                                                style="background-color: #2F59D6; color: white; padding: 0.3rem 1rem; font-size: 1rem;">
                                                Login
                                            </button>
                                        </div>
                                        <a class="small text-muted" href="#!">Forgot password?</a>
                                        <p class="mb-5 pb-lg-2" style="color: #393f81;">
                                            Don't have an account? <a href="#!" style="color: #393f81;">Register
                                                here</a>
                                        </p>
                                        <a href="#!" class="small text-muted">Terms of use.</a>
                                        <a href="#!" class="small text-muted">Privacy policy</a>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>