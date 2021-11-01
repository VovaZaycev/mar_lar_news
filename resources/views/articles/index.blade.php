@extends('layouts.app')

@section('content')
    <h2>Статьи</h2>
    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
        @include('common.errors')

    </div>
    <a href="{{route('articles.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Create new article</a>
    <!-- Текущие задачи -->
    @if (count($articles) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Все статьи
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Название Статьи</th>
                    <th>Текст</th>
                    <th>&nbsp;</th>
                    </thead>


                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $article->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $article->text }}</div>
                            </td>

                            <td>
                                <form method="post" action="{{ route('articles.delete', $article->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                                <form method="post" action="{{ route('articles.edit', $article->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('GET')}}
                                    <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection