@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">All admin</h1>
</div>

@if(session()->has('success'))
    <div class="alert alert-dismissible alert-success col-lg-8 fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endif

<div class="table-responsive col-lg-8">
    <a href="/admin/users/create" class="btn btn-primary mb-3">Create new admin</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Role</th>
          <th scope="col">Email</th>
          <th scope="col">Phone number</th>
          <th scope="col">Store</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->role->role_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->store == null ? '-' : $user->store->store_name }}</td>

            <td>
                <a href="/admin/users/{{ $user->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/admin/users/{{ $user->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/admin/users/{{ $user->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
                </form>
            </td>
          </tr>
          @endforeach

      </tbody>
    </table>
  </div>
@endsection
