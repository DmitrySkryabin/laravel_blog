@extends('admin.layouts.main')\

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование категории</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Категории</a></li>
                            <li class="breadcrumb-item active">Изменить категорию катеогорию</li>
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
                        <form action="{{ route('admin.category.update', $category->id) }}" method="POST" class="col-4">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" class="form-control" id="title" placeholder="Название категории"
                                    name="title" value="{{ $category->title }}">
                                    @error('title')
                                        <div class="text-danger">Это поле необходимо заполнить</div>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-block" value="Обновить">
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
