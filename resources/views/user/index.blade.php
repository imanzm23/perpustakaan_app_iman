@extends('app')
@section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
    <div class="card card-default">
        <div class="card-header">
            <form class="form-inline">
                <div class="form-group mr-1">
                    <input class="form-control" type="text" name="q" value="{{ $q}}" placeholder="Pencarian..." />
                </div>
    <div class="form-group mr-1">
        <button class="btn btn-success">Cari</button>
    </div>
    <div class="form-group mr-1">
        <a class="btn btn-primary" href="{{ route('book.create') }}">Create</a>
    </div>
            </form>
        </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            @foreach($rows as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->username }}</td>
                <td>{{ $row->email }}</td>

                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('book.edit', $row) }}">Edit</a>
                    <form method="POST" action="{{ route('book.destroy', $row) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <p>
            <div class="card-body text-light bg-light">
              <a class="btn btn-primary" href="/dashboard">Kembali</a>
          </div>
          </p>
    </div>
</div>
@endsection