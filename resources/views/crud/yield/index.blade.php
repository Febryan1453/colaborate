@extends('crud.app')

@section('content')

<div class="container mt-5 text-end">
    <a href="{{route('welcome.tambah')}}" class="mt-4 btn btn-primary">+ Data</a>
</div>

<div class="container mt-4">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Gambar</th>
                <th scope="col">Judul Film</th>
                <th scope="col">Rilis</th>
                <th scope="col">Sinopsis</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            @forelse($movies as $row)
            <tr>
                <th scope="row">{{$i++}}</th>
                <td>
                    <img src="{{ url('storage/'. $row->gambar) }}" alt="Poster Film" class="img-fluid">
                </td>
                <td>{{$row->judul}}</td>
                <td>{{$row->waktu_rilis}}</td>
                <td>{{$row->sinopsis}}</td>
                <td class="text-center">
                    <a href="#" class="btn btn-success" title="Detail {{$row->judul}}"><i class="fa-solid fa-eye"></i></a>
                    <a href="#" class="btn btn-primary" title="Edit {{$row->judul}}"><i class="fa-solid fa-pencil"></i></a>
                    <form action="{{route('welcome.hapus', $row->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Delete" class="btn btn-danger" data-original-title="Remove" onclick="return confirm('Hapus Data {{$row->judul}} ?')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>
                    <!-- <a href="{{route('welcome.hapus', $row->id)}}" class="btn btn-danger" title="Delete {{$row->judul}}"><i class="fa-solid fa-trash-can"></i></a> -->
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Data Movie Belum Ada</td>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>

@stop