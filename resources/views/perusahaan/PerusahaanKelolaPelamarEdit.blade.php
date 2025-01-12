@extends('layouts.perusahaan')

@section('content')
    <div class="container">
        <h1>Edit Status Lamaran</h1>

        <form action="{{ route('lamar.updateStatus', $lamaran->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status Lamaran</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="Menunggu" {{ $lamaran->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Diterima" {{ $lamaran->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="Ditolak" {{ $lamaran->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Status</button>
        </form>
    </div>
@endsection
