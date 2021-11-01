@extends('layouts.app')

@section('content')
    <h2>Создать статью</h2>
    <!-- Bootstrap шаблон... -->
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
        <form action="{{ route('articles.store')}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Имя задачи -->
            <div class="form-group">
                <label for="article" class="col-sm-3 control-label">Статья</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="article-name" class="form-control" value="{{old('name')}}">
                </div>
            </div>

            <div class="form-group">
            <label for="article" class="col-sm-3 control-label">Текст статьи</label>
            <div class="col-sm-6">
                <input type="text" name="text" id="article-text" class="form-control" value="{{old('text')}}">
            </div>
            </div>

            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-save"></i> Добавить статью
                    </button>
                </div>
            </div>
        </form>
    </div>
    <a href="{{route('articles.create')}}" class="btn btn-success"><i class="fa fa-save"></i>Создать статью</a>
@endsection