@extends('admin.layouts.main')\

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление поста</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.store') }}" method="POST" class="col-4"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" class="form-control" id="title" placeholder="Заголовок новости"
                                    value="{{ old('title') }}" name="title">
                                @error('title')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Изображение</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите изображение</label>
                                        @error('image')
                                            <div class="text-danger">Выберите изображение</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Категория</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" data-select2-id="43">
                                <label>Тэги</label>
                                <div class="select2-primary" data-select2-id="29">
                                    <select class="select2 select2-hidden-accessible" multiple="" name="tag_ids[]"
                                        data-placeholder="Выберите тэги" data-dropdown-css-class="select2-primary"
                                        style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                                      @foreach ($tags as $tag)
                                          <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected': '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                      @endforeach
                                    </select><span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summernote">Текст</label>
                                <textarea name="content" id="summernote">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger">Это поле необходимо заполнить</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Добавить">
                            </div>
                        </form>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
