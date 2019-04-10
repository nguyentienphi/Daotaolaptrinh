@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- validation form -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">{{ trans('edit_user.title') }}</h5>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('admin.users.update', $user->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">{{ trans('add_user.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', isset($user->name) ? $user->name : '') }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">{{ trans('add_user.email') }}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                       value="{{ old('email', isset($user->email) ? $user->email : '') }}">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">{{ trans('add_user.role') }}</label>
                                <select class="form-control col-md-6" name="role">
                                    @foreach($roles as $role)
                                        <option value="{{ $role }}" {{ ($role == $user->role) ? 'selected' : '' }}>{{ trans('add_user.roles.'.$role) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end validation form -->
        <!-- ============================================================== -->
    </div>
@endsection
