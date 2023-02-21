<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <p>
                            <h4>Login aktif : <b>{{Auth::user()->name}}</b>, sebagai <b>{{Auth::user()->role}}</b>.</h4>
                        </p>
                    </div>
                </div>
                <br>
                   <!-- Notifikasi menggunakan flash session data -->
                   @if (session('success'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                       {{ session('success')}}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   @endif

                   @if (session('error'))
                   <div class="alert alert-warning alert-dismissible fade show" role="alert">
                       {{ session('error')}}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <h1>Data Post</h1>
                        <a href="{{ route('post.create') }}" class="btn btn-md btn-success mb-3 float-right">New
                        Post</a>
                        <table class="table table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Create At</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->status == 0 ? 'Draft':'Publish' }}</td>
                                    <td>{{ $post->created_at->format('d-m-Y') }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            <a href="{{ route('post.edit', $post->id) }}"
                                                class="btn btn-sm btn-primary">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            @can('isAdministrator')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModal">
                            Log-Out
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Yakin Log-Out</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
              <a class="btn btn-outline-success" href="/logout" role="button">Log-Out</a>
            </div>
          </div>
        </div>
      </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
