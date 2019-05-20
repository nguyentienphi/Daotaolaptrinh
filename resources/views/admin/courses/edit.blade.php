@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- validation form -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">{{ trans('add_course.title') }}</h5>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('admin.users.update', $course->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">{{ trans('add_course.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', isset($course->name) ? $course->name : '') }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">{{ trans('add_course.title_course') }}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('title', isset($course->title) ? $course->title : '') }}">
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">{{ trans('add_course.description') }}</label>
                                <input type="text" class="form-control" id="description" name="description"
                                       value="{{ old('description', isset($course->description) ? $course->description : '') }}">
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">{{ trans('add_course.price') }}</label>
                                <input type="text" class="form-control" id="price" name="price"
                                       value="{{ old('price', isset($course->price) ? $course->price : '') }}">
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                <label for="validationCustom02">{{ trans('add_course.category') }}</label>
                                <select class="form-control col-md-6" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ isset($category->id) ? $category->id : ''}}" {{ ($category->id == $course->category_id) ? 'selected' : '' }}>{{ isset($category->name) ? $category->name : ''}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                <label for="validationCustom02">{{ trans('add_course.user') }}</label>
                                <select class="form-control col-md-6" name="user_id">
                                    @foreach($users as $user)
                                        <option
                                            value="{{ $user->id }}" {{ ($courseUser->user_id == $user->id) ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                <label for="validationCustom02">Hinh Anh</label>
                                <input type="file"
                                       value="{{ old('picture', isset($course->picture) ? $course->picture : '') }}"
                                       name="picture"/>
                                <span class="text-danger">{{ $errors->first('picture') }}</span>
                            </div>
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
