@extends('layouts.layouts')
@section('title', 'todos一覧')

@section('content')
    <div class="container">
        <h2>タスク一覧</h2>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('Admin\TodoController@add') }}" role="button" class="btn btn-primary">新規作成</a>
                <a href="todo/complete_list" role="button" class="btn btn-primary">完了タスク</a>
                <a href="todo/dead_list" role="button" class="btn btn-primary">期限切れタスク</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('Admin\TodoController@index') }}" method="get">
                    <div class="form-group row">
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" placeholder="タイトル">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                        <div class="my-4">
                            <a href="{{ action('Admin\TodoController@sort') }}" role="button" class="btn btn btn-outline-primary">重要度昇順↑</a>
                            <a href="{{ action('Admin\TodoController@index') }}" role="button" class="btn btn btn-outline-primary">重要度降順↓</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table">
            <thead class="table table-dark">
                <tr>
                <th>ID</th>
                <th>タイトル</th>
                <th>場所</th>
                <th>期限</th>
                <th>重要度</th>
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
