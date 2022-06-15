@extends('crud.app')

@section('content')

<div class="container mt-5 mb-5">
    <form method="POST" action="{{route('welcome.store')}}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="Judul" class="form-label">Judul Film</label>
            <input type="text" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror" id="Judul" name="judul">
            @error('judul')
            <div class="invalid-feedback" style="width: 500px !important;" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="waktu_rilis" class="form-label">Rilis Film</label>
            <input type="date" value="{{ old('waktu_rilis') }}" class="form-control @error('waktu_rilis') is-invalid @enderror" id="waktu_rilis" name="waktu_rilis">
            @error('waktu_rilis')
            <div class="invalid-feedback" style="width: 500px !important;" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Tiket</label>
            <input type="number" min="1" value="{{ old('harga') }}" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga">
            @error('harga')
            <div class="invalid-feedback" style="width: 500px !important;" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
            <script>
                // Select your input element.
                var number = document.getElementById('harga');

                // Listen for input event on numInput.
                number.onkeydown = function(e) {
                    if (!((e.keyCode > 95 && e.keyCode < 106) ||
                            (e.keyCode > 47 && e.keyCode < 58) ||
                            e.keyCode == 8)) {
                        return false;
                    }
                }
            </script>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Poster Film</label>
            <input type="file" value="{{ old('gambar') }}" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
            @error('gambar')
            <div class="invalid-feedback" style="width: 500px !important;" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sinopsis" class="form-label">Sinopsis Film</label>
            <textarea class="form-control @error('sinopsis') is-invalid @enderror" id="sinopsis" style="height: 100px" name="sinopsis">{{ old('sinopasis') }}</textarea>
            @error('sinopsis')
            <div class="invalid-feedback" style="width: 500px !important;" role="alert">
                <strong>{{ $message }}</strong>
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@stop