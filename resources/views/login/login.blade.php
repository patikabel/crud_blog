<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  </head>
  <body style="background-color: #E96479">
    <div class="container">
        <div class="row justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="card position-absolute top-50 start-50 translate-middle" style="width: 20rem;">
                    <div class="card-body">
                        <form action="/logindata" method="POST">
                            @csrf
                            @if (session()->has('error'))
                                <div class="d-flex justify-content-center">
                                    <div class="alert alert-danger alert-dismissible fade show" style="width: 18rem;" role="alert">
                                        {{session('error')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            @if (session()->has('success'))
                                <div class="d-flex justify-content-center">
                                    <div class="alert alert-success alert-dismissible fade show mb-3" style="width: 18rem;" role="alert">
                                        {{session('success')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                </div>
                            @endif
                            <h3 class="text-center"autocomplete="off"> <b>Log-In</b></h3><hr>
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email :</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"autocomplete="off">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password :</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            </div>
                            <button type="submit" class="submit btn btn-outline-dark" style="width: 18rem">Submit</button>
                            <h6 class="text-center">atau</h6>
                            <a class="btn btn-outline-dark justfy-content-center" href="{{'/auth/redirect'}}" style="width: 18rem"><i class="bi bi-google"></i> Login With Google</a>

                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>


</html>
