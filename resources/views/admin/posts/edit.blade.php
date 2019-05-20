@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <!-- ============================================================== -->
        <!-- validation form -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">{{ trans('edit_post.header') }}</h5>
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('admin.posts.update', $post->id) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom01">{{ trans('edit_post.user') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       value="{{ old('name', $post->getUserName() ) }}" disabled>
                                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
                                <label for="validationCustom02">{{ trans('edit_post.category') }}</label>
                                <select class="form-control col-md-6" name="category_id">
                                    @foreach($categories as $category)
                                        <option
                                            value="{{ isset($category->id) ? $category->id : ''}}" {{ ($category->id == $post->category_id) ? 'selected' : '' }}>{{ isset($category->name) ? $category->name : ''}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('category_id') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">{{ trans('edit_post.title') }}</label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ old('description', isset($post->title) ? $post->title : '') }}">
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">{{ trans('edit_post.content') }}</label>
                                <input type="text" class="form-control" id="content" name="content"
                                       value="{{ old('price', isset($post->content) ? $post->content : '') }}">
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label for="validationCustom02">{{ trans('edit_post.view_number') }}</label>
                                <input type="text" class="form-control" id="view_number" name="view_number"
                                       value="{{ old('price', isset($post->view_number) ? $post->view_number : '') }}" disabled>
                                <span class="text-danger">{{ $errors->first('view_number') }}</span>
                            </div>
                        <div class="form-row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <button class="btn btn-primary mt-3"
                                        type="submit">Sửa</button>
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
