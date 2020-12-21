<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;
use Carbon\Carbon;
use DateTime;

class TodoController extends Controller
{
  public function add()
  {
    return view('todo.create');
  }

  public function create(Request $request)
  {
    // Varidationを行う
    $this->validate($request, Todo::$rules);
    $todo = new Todo;
    $form = $request->all();

    // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);
    $todo->fill($form);
    $todo->is_complete = 0;
    
    // データベースに保存する
    $todo->save();
    return redirect('todo/');
  }

  public function index(Request $request)
  {
    $cond_title = $request->cond_title;
    if ($cond_title != '') {
        // 検索されたら検索結果を取得する
        $todos = Todo::where('title', $cond_title)->get();
    } else {
        // それ以外はすべて取得する
        $todos = Todo::where('is_complete', 0)
        ->orderBy('id', 'asc')
        ->get();
    }
    $today = Carbon::today();
    return view('todo.index', ['todos' => $todos, 'cond_title' => $cond_title, 'today' => $today]);
  }

  public function edit(Request $request)
  {
      // Todo Modelからデータを取得する
      $todos = Todo::find($request->id);
      if (empty($todos)) {
        abort(404);    
      }
    return view('todo.edit', ['todo_form' => $todos]);
  }
    
  public function update(Request $request)
  {
    echo '通りました';
    // Validationをかける
    $this->validate($request, Todo::$rules);
    // Todo Modelからデータを取得する
    $todo = Todo::find($request->get('id'));
    // 送信されてきたフォームデータを格納する
    $todo_form = $request->all();
    unset($todo_form['_token']);
    unset($todo_form['remove']);
    
    // 該当するデータを上書きして保存する
    $todo->fill($todo_form)->save();
    
    return redirect('todo');
  }
    
  public function delete(Request $request)
  {
    // 該当するTodo Modelを取得
    $todos = Todo::find($request->id);
    // 削除する
    $todos->delete();
    return redirect('todo/');
  }

  public function complete(Request $request)
  {
    // 該当するTodo Modelを取得
    $todo = Todo::find($request->id);
    $todo->is_complete = 1;
    $todo->save();
    return redirect()->back();
  }

  public function complete_list()
  {
    // 完了フラグがtrueのデータのみ取得
    $posts = Todo::where('is_complete',1)->get();

    return view('todo.complete_list', ['posts' => $posts]);
  }

  public function incomplete(Request $request)
  {
    // 該当するTodo Modelを取得
    $todo = Todo::find($request->id);
    $todo->is_complete = 0;
    $todo->save();

    return redirect()->back();
  }

  public function sortPri(Request $request)
  {
    $cond_title = $request->cond_title;
    $todos = Todo::where('is_complete',0)
    ->orderBy('priority', 'asc')
    ->get();
    $today = Carbon::today();
    return view('todo.index', ['todos' => $todos, 'cond_title' => $cond_title, 'today' => $today]);
  }
  
  public function sortId(Request $request)
  {
    $cond_title = $request->cond_title;
    $todos = Todo::where('is_complete',0)
    ->orderBy('id', 'asc')
    ->get();
    $today = Carbon::today();
    return view('todo.index', ['todos' => $todos, 'cond_title' => $cond_title, 'today' => $today]);
  }

  public function sortDeadLine(Request $request)
  {
    $cond_title = $request->cond_title;
    $todos = Todo::where('is_complete',0)
    ->orderBy('deadline', 'asc')
    ->get();
    $today = Carbon::today();
    return view('todo.index', ['todos' => $todos, 'cond_title' => $cond_title, 'today' => $today]);
  }

  public function dead_list(Request $request)
  {
    // 該当するTodo Modelを取得
    $posts = Todo::where([
      ['deadline', '<', date("Y-m-d")],
    ])->get();
    return view('todo.dead_list', ['posts' => $posts]);
  }

  public function search_dead_list(Request $request)
  {
    $cond_title = $request->cond_title;
    $posts = Todo::where([
      ['deadline', '<', date("Y-m-d")],
      ['title', 'like' , '%' . $cond_title . '%']
    ])->get();
    return view('todo.dead_list', ['posts' => $posts]);
  }
}