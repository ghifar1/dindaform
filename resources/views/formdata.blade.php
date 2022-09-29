@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah data form {{$form->nama_project}}</div>
                    @if($errs = \Illuminate\Support\Facades\Session::get('error'))
                            <div class="alert alert-danger" role="alert">

                                <ul>
                                    @foreach($errs as $key =>$err)
                                        <li>
                                            {{$key}}: {{$err[0]}}
                                        </li>
                                    @endforeach
                                </ul>

                            </div>

                    @endif
                    <div class="col m-2">
                        <button  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary" type="submit">Tambah Data</button>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jenis</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Tipe/Merek</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Ukur</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($form->formdata as $data)
                                <tr>
                                    <th scope="row">{{$loop->index +1}}</th>
                                    <td>{{$data->jenis_barang}}</td>
                                    <td>{{$data->nama_barang}}</td>
                                    <td>{{$data->type_merek}}</td>
                                    <td>{{$data->qty}}</td>
                                    <td>{{$data->ukur}}</td>
                                    <td>{{$data->keterangan}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('formdata')}}" method="post" class="mx-5 my-2">
                        @csrf
                        <input type="hidden" name="form_survey_id" value="{{$form->id}}">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jenis Barang</label>
                            <select name="jenis_barang" class="form-select" aria-label="Default select example">
                                <option value="DATA UNIT">DATA UNIT</option>
                                <option value="NETWORK DEVICE / PERALATAN JARINGAN">NETWORK DEVICE / PERALATAN JARINGAN</option>
                                <option value="MATERIAL FIBER OPTIC">MATERIAL FIBER OPTIC</option>
                                <option value="SUPPORTING MATERIAL / MATERIAL PENDUKUNG">SUPPORTING MATERIAL / MATERIAL PENDUKUNG</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tipe / Merek</label>
                            <input type="text" name="type_merek" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                            <input type="text" name="qty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Ukur</label>
                            <input type="text" name="ukur" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
