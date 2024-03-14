@extends('layout.admin')

@section('container')

<h1 class="h2">Data Fasilitas Hotel</h1>

@if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif

<div class="table-responsive col-lg-12">
    <table class="table table-sm table-bordered table-hover border-dark text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Fasilitas</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotel_facilities as $hotel_facility)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $hotel_facility->facility_name }}</td>
                <td>{{ $hotel_facility->description }}</td>
                <td><img src="{{ asset('storage/' . $hotel_facility->image) }}" alt="Gambar {{ $hotel_facility->facility_name }}" width="50" class="img-fluid"></td>
                <td>
                    <a href="{{ route('hotel-facilities.edit', $hotel_facility->id) }}" class="badge bg-warning" onclick="return confirm('Apakah Anda Yakin?')">
                        <span>Edit</span></a>

                        <form action="{{ route('hotel-facilities.destroy', $hotel_facility->id) }}" method="post" class="d-inline">
                            
                            @method('delete')
                            @csrf

                            <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus?')"><span>Delete</span></button>

                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-end">
        <a href="{{ route('hotel-facilities.create') }}" class="btn btn-primary mb-3">Create Fasilitas Hotel</a>
    </div>

    {{ $hotel_facilities->links() }}
</div>

@endsection