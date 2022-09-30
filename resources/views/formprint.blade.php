<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        #customers td.last {
            width: 1px;
            white-space: nowrap;
        }
    </style>
</head>
<body>
<h1>Form Survey</h1>
<table id="customers">
    <tbody>
    <tr>
        <th>
            Nama Proyek
        </th>
        <td>
            {{$form->nama_project}}
        </td>
        <th>
            Nama PIC
        </th>
        <td>
            {{$form->nama_pic}}
        </td>
    </tr>
    <tr>
        <th>
            Nama Surveyor
        </th>
        <td>
            {{$form->nama_surveyor}}
        </td>
        <th>
            Nama Sales
        </th>
        <td>
            {{$form->nama_sales}}
        </td>
    </tr>
    <tr>
        <th>
            Tanggal Survey
        </th>
        <td>
            {{$form->tgl_survey}}
        </td>
        <th>
            No Survey
        </th>
        <td>
            {{$form->no_survey}}
        </td>
    </tr>
    </tbody>
</table>
<table id="customers">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Barang</th>
        <th scope="col">Tipe/Merek</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Ukur</th>
        <th scope="col">Keterangan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($form->formdata->groupBy('jenis_barang') as $key =>$jenis)
        <tr>
            <th colspan="6">
                {{$key}}
            </th>
        </tr>
        @foreach($jenis as $data)
            <tr>
                <th scope="row">{{$loop->index +1}}</th>
                <td>{{$data->nama_barang}}</td>
                <td>{{$data->type_merek}}</td>
                <td>{{$data->qty}}</td>
                <td>{{$data->ukur}}</td>
                <td>{{$data->keterangan ?? "-"}}</td>

            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>
</body>
</html>
