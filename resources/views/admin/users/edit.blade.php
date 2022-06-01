@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit admin</h1>
</div>

<div class="col-lg-8">
    <form class="mb-5" method="POST" action="/admin/users/{{ $user->slug }}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $user->name) }}">
            @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $user->slug) }}">
              @error('slug')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}">
              @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div>
          <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email', $user->email) }}">
              @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="phone_number" class="form-label">Phone number</label>
              <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" required value="{{ old('phone_number', $user->phone_number) }}">
              @error('phone_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
          </div>
          <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select class="form-select" name="role_id" id="role" required>
                <option value=""></option>
                @foreach ($roles as $role)
                      @if(old('role_id', $user->role_id) == $role->id)
                          <option value="{{ $role->id }}" selected>{{ $role->role_name }}</option>
                      @else
                          <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                      @endif
                  @endforeach
                </select>
          </div>
          <div class="mb-3">
              <label for="store" class="form-label">Store</label>
              <select class="form-select" name="store_id" id="store">
                <option value=""></option>
                @foreach ($stores as $store)
                      @if(old('store_id', $user->store_id) == $store->id)
                          <option value="{{ $store->id }}" selected>{{ $store->store_name }}</option>
                      @else
                          <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                      @endif
                  @endforeach
                </select>
          </div>
        <input type="hidden" name="role_name" id="hRoleName" value="{{ $roles[0]->role_name }}">
        <button type="submit" class="btn btn-primary">Edit admin</button>
      </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');
        const role = document.querySelector('#role')

        name.addEventListener('change', function() {
            fetch('/admin/users/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        if(role.options[role.selectedIndex].innerText === 'SuperAdmin') {
            $('#store').prop('disabled', true);
            $('#store').prop('required', false);
            $('#store').val('').change();
        }

        $(role).on('change', function (e) {
            let selected = this.options[this.selectedIndex].innerText;
            $('#hRoleName').val(selected);
            if(selected === 'SuperAdmin') {
                $('#store').prop('disabled', true);
                $('#store').prop('required', false);
                $('#store').val('').change();
            }
            else {
                $('#store').prop('disabled', false);
                $('#store').prop('required', true);
            }
        })
    });
</script>
@endsection

