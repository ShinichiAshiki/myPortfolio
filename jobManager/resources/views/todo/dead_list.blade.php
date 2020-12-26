@extends('layouts.layout')
@section('title', '登録済み予定の一覧')

@section('content')
<div class="container">
  <h2>期限切れ予定一覧</h2>
  <table class="table">
      <thead class="table table-dark">
        <tr>
          <th>ID</th>
          <th>タイトル</th>
          <th>場所</th>
          <th>期限</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $todo)
          @if ($todo->is_complete == 0)
          <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ str_limit($todo->title, 100) }}</td>
            <td>{{ str_limit($todo->space, 250) }}</td>
            <td>{{ str_limit($todo->deadline, 100) }}</td>
            <td>
              <div>
                  <a href="{{ action('Admin\TodoController@delete', ['id' => $todo->id]) }}">削除</a>
                  <a class="mod-btn" href="{{ action('Admin\TodoController@complete', ['id' => $todo->id]) }}">完了</a>
              </div>
            </td>
          </tr>
          @endif
        @endforeach
      </tbody>
    </table>
  </div>
  @endsection