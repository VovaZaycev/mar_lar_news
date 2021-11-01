@extends('layouts.app')

@section('content')
    <h2>Изменить статью</h2>
    <!-- Bootstrap шаблон... -->
    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
        <form action="{{ route('articles.update', $article->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        {{method_field('PUT')}}

        <!-- Имя задачи -->
            <div class="form-group">
                <label for="article" class="col-sm-3 control-label">Статья</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="article" class="form-control" value="{{old('name') ?? $article->name}}">
                </div>
            </div>

            <div class="form-group">
                <label for="article" class="col-sm-3 control-label">Текст статьи</label>
                <div class="col-sm-6">
                    <input type="text" name="text" id="article" class="form-control" value="{{old('text') ?? $article->text}}">
                </div>
            </div>
            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-save"></i> Сохранить статью
                    </button>
                </div>
            </div>
        </form>
    </div>
    <a href="{{route('articles.create')}}" class="btn btn-success"><i class="fa fa-save"></i>Сохранить статью</a>
@endsection