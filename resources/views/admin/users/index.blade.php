@extends('layout.admin')

@section('container')

<h1 class="h2">Data User</h1>

@if (session()->has('success'))
        <div class="alert alert-success col-lg-12" role="alert">
            {{ session('success') }}
        </div>
    @endif

<div class="table-responsive col-lg-12">
    <table class="table table-sm table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Akun</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>
                    @switch($user->role)
                        @case('hotel_guest')
                            Hotel Guest
                            @break
                        @case('administrator')
                            Administrator
                            @break
                        @case('receptionist')
                            Receptionist
                            @break
                        @default
                            Hotel Guest
                    @endswitch    
                </td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="badge bg-warning" onclick="return confirm('Apakah Anda Yakin?')">
                        <span>Edit</span></a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="post" class="d-inline">
                            
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
        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Create User</a>
    </div>

</div>

@endsection