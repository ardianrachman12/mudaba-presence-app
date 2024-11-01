@extends('layouts.app')

@push('style')
@endpush

@section('buttons')
<div class="btn-toolbar mb-2 mb-md-0">
    <div>
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-light">
            <span data-feather="arrow-left-circle" class="align-text-center"></span>
            Kembali
        </a>
    </div>
</div>
@endsection

@section('content')
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
        <form action="{{ route('users.update', $i->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <div class="w-100">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$i->name}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{$i->username}}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-auto mb-3">
                        <label class="form-label" for="specificSizeSelect">Kelas</label>
                        <select style="font-size: 13px" class="form-select" name="class_id" id="class_id">
                            <option selected disabled>Pilih Kelas</option>
                            <option selected value="{{$i->class_id}}">{{$i->classroom->name}}</option>
                            @foreach($classroom as $class)
                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-sm-auto mb-3">
                        <label class="form-label" for="specificSizeSelect">Role</label>
                        <select style="font-size: 13px" class="form-select" name="role_id" id="role_id">
                            <option selected disabled>pilih role</option>
                            <option selected value="{{$i->role_id}}">{{$i->role->name}}</option>
                            @foreach($role as $role)
                                @if($role->id === 3)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div> --}}
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-5">
                <button class="btn btn-warning">
                    Update
                </button>
            </div> 
        </form>
@endsection
