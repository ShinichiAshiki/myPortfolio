@extends('layouts.layout')
@section('title', 'todos一覧')

@section('content')
    <div class="container">
        <h2>タスク一覧</h2>
        <div class="row">
            <form action="{{ action('Admin\TodoController@index') }}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" placeholder="タイトル">
                    {{ csrf_field() }}
                    <input type="submit" class="add-on" value="検索">
                </div>
                <div class="my-4">
                    <a href="{{ action('Admin\TodoController@add') }}" role="button" class="btn btn-primary mx-2">新規作成</a>
                    <a href="todo/complete_list" role="button" class="btn btn-primary mx-2">完了タスク</a>
                    <a href="todo/dead_list" role="button" class="btn btn-primary mx-2">期限切れタスク</a>
                </div>
            </form>
        </div>
        <div class="row">
            <table class="table">
                <thead class="table table-dark">
                    <tr>
                    <th><a href="{{ action('Admin\TodoController@sortId') }}" class="text-white">ID▼</a></th>
                    <th>タイトル</th>
                    <th>場所</th>
                    <th><a href="{{ action('Admin\TodoController@sortDeadLine') }}" class="text-white">期限▼</a></th>
                    <th><a href="{{ action('Admin\TodoController@sortPri') }}" class="text-white">重要度▼</a></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($todos as $todo)
                    @if (new DateTime($todo->deadline) >= $today)
                    <tr>
                    @else
                    <tr class="bg-danger" >
                    @endif
                        <td>{{ $todo->id }}</td>
                        <td>{{ str_limit($todo->title, 100) }}</td>
                        <td>{{ str_limit($todo->space, 100) }}</td>
                        <td>{{ str_limit($todo->deadline, 100) }}</td>
                        <td>{{ str_limit($todo->priority, 100) }}</td>
                        <td>
                            <a href="{{ action('Admin\TodoController@edit', ['id' => $todo->id]) }}">編集</a>
                            <a href="{{ action('Admin\TodoController@delete', ['id' => $todo->id]) }}">削除</a>
                            <a href="{{ action('Admin\TodoController@complete', ['id' => $todo->id]) }}">完了</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
