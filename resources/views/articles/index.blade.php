@extends('layouts.app')

@section('content')
    <h2>Articles</h2>
    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
        @include('common.errors')

    </div>
    <a href="{{route('tasks.create')}}" class="btn btn-success"><i class="fa fa-plus"></i>Create new task</a>
    <!-- Текущие задачи -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                All tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <td>
                                <form method="post" action="{{ route('tasks.delete', $task->id)}}">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                                <form method="post" action="{{ route('tasks.edit', $task->id)}}">
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