@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('book.update', $row) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Buku <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_book" value="{{ old('nama_book', $row->nama_book) }}" />
            </div>
            <div class="form-group">
                <label>Pengarang <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_author" value="{{ old('nama_author',$row->nama_author) }}" />
            </div>
            <div class="form-group">
                <label>No ISBN <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="no_isbn" value="{{ old('no_isbn',$row->no_isbn) }}" />
            </div>
            <div class="form-group">
                <label>Tahun Terbit <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="tahun_terbit" value="{{ old('tahun_terbit',$row->tahun_terbit) }}" />
            </div>

            <div class="form-group">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('book.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection