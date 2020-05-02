@extends('layouts.app')
@section('content')
<div class="sidenav bg-primary">
    <a href="{{route('students.index')}}">List All Students</a>
    <a href="{{route('users.index')}}">List All User</a>

</div>
<div class="main">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header"><h4>Edit User</h4></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('users.update', $user->id) }}">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('FirstName') }}</label>

                                <div class="col-md-6">
                                    <input id="firstName" value="{{$user->firstName}}" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" required autocomplete="firstName">

                                    @error('firstName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('LastName') }}</label>

                                <div class="col-md-6">
                                    <input id="lastName" value="{{$user->lastName}}" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" required autocomplete="lastName">

                                    @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" value="{{$user->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('role') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="role">
                                        <option  <?php if ($user['role_id']== 1){?> selected="selected" <?php } ?> value="1">Admin</option>
                                        <option <?php if ($user['role_id']== 2){?> selected="selected" <?php } ?> value="2">Tutor</option>
                                    </select>

                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="position">
                                        <option <?php if ($user['position']== "SNA Coordinator"){?> selected="selected" <?php } ?> value="SNA Coordinator">SNA Coordinator</option>
                                        <option <?php if ($user['position']== "WEB Coordinatorr"){?> selected="selected" <?php } ?> value="WEB Coordinator">WEB Coordinator</option>
                                        <option <?php if ($user['position']== "WEB Trainer"){?> selected="selected" <?php } ?> value="WEB Trainer">WEB Trainer</option>
                                        <option <?php if ($user['position']== "SNA Trainer"){?> selected="selected" <?php } ?> value="SNA Trainer">SNA Trainer</option>
                                        <option <?php if ($user['position']== "HR"){?> selected="selected" <?php } ?> value="HR">HR</option>
                                        <option <?php if ($user['position']== "Educator"){?> selected="selected" <?php } ?> value="Educator">Educator</option>
                                    </select>
                                    @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
