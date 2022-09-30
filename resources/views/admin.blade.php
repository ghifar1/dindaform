@extends('layouts.adminapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 my-2">
                <div class="card">
                    <div class="card-header">List Akun</div>
                    <div class="col m-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah user
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$loop->index +1}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <form method="POST" action="{{url('/user/'.$user->id)}}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8 my-2">
                <div class="card">
                    <div class="card-header">Form Survey</div>
{{--                    <div class="col m-2">--}}
{{--                        <a href="{{url('/form')}}" class="btn btn-primary" type="submit">Tambah Form</a>--}}
{{--                    </div>--}}
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Project</th>
                                <th scope="col">Lokasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($forms as $form)
                                <tr>
                                    <th scope="row">{{$loop->index +1}}</th>
                                    <td>{{$form->nama_project}}</td>
                                    <td>{{$form->lokasi}}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{url('/form/'.$form->id)}}" class="btn btn-primary">lihat data</a>
                                            <form method="POST" action="{{url('/user/'.$form->id)}}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{url('/user')}}">
                    @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ulangi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
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
@endsection
