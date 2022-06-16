@extends('layouts.base')

@section('title')
Data Film
@stop

@section('content')

<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
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
    </div>
</div>
<!-- Recent Sales End -->

@stop