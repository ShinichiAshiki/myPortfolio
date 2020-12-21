@extends('layouts.layout')
@section('title', 'todoの新規作成')

@section('content')
    <div class="container">
        <h2>タスク新規作成</h2>
        <div class="row">
            <div class="col-md-8 mx-auto">

                <form action="{{ action('Admin\TodoController@create') }}" method="post" enctype="multipart/form-data">
                @csrf
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">タイトル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="space">場所</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="space" value="{{ old('space') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="deadline">期限</label>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="deadline" value="{{ old('deadline') }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2" for="priority">重要度</label>
                        <div class="col-md-10">
                          <select class="form-control" name="priority" min="1" max="5" value="{{ old('priority') }}">
                            <?php
                            for ($i = 1; $i <=5; $i++) {
                               print ('<option value="' . $i. '">' . $i . '</option>');
                               }
                               ?>
                            </select>
                        </div>
                    {{ csrf_field() }}
                    <div class="text-right col-sm-12 col-md-12">
                        <input type="submit" class="my-4 btn btn-secondary" value="登録">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection