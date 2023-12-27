@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Pegawai <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_pegawai" value="{{ old('nama_pegawai') }}" />
            </div>
            <div class="form-group">
                <label>No Telepon <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="no_telp" value="{{ old('no_telp') }}" />
            </div>
            <div class="form-group">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="email" value="{{ old('email') }}" />
            </div>
            <div class="form-group">
                <label>NIK <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nik" value="{{ old('nik') }}" />
            </div>
            <div class="form-group">
                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tgl_lahir" value="{{ old('tgl_lahir') }}" />
            </div>
            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="alamat" value="{{ old('alamat') }}" />
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('pegawai.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection