@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- validation form -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Thêm Danh Mục</h5>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">Tên Danh Mục</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        <div class="form-row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <button class="btn btn-primary mt-3"
                                        type="submit">{{ trans('add_course.button') }}</button>
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
