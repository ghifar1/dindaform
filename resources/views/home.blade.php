@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Survey</div>
                <div class="col m-2">
                    <a href="{{url('/form')}}" class="btn btn-primary" type="submit">Tambah Form</a>
                </div>
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
                                   <div class="row">
                                       <div class="col">
                                           <a href="{{url('/form/'.$form->id)}}" class="btn btn-primary">tambah data</a>
                                       </div>
                                       <div class="col">
                                           <form method="POST" action="{{url('/form/'.$form->id)}}">
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
    </div>
</div>
@endsection
