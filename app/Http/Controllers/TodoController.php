<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function check(Request $request)
    {
    $text = ['text' => 'ログインして下さい。'];
    return view('auth', $text);
    }

    public function checkUser(Request $request)
    {
    $email = $request->email;
    $password = $request->password;
    if (Auth::attempt(['email' => $email,
            'password' => $password])) {
            $items=Todo::all();
            return redirect('/');
        
    } else {
        $text = 'ログインに失敗しました';
        return view('auth', ['text'=>$text]);
    }
    
    
    }

    public function logout()
    {
        Auth::logout();
        $items=Todo::all();
        return view('index',['items' =>$items]);
    }


    public function index ()
    {
        $user = Auth::user();
        $param = [ 'user' =>$user];
        
        $items=Todo::all();
        
        return view('index',['items' =>$items, 'user' =>$user]);
    }

    public function post(ClientRequest $request)
    {
        return view('index',['items' =>$items]);
    }


    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $query=Todo::query();

        if(!empty($keyword)) {
            $query->where('content','LIKE',"%{$keyword}%");
        }
        $posts=$query->get();

        $user = Auth::user();
        $param = [ 'user' =>$user];
        

        return view('search', ['user' =>$user],compact('posts','keyword'));
    }
    
    

    public function create (Request $request)
    {
        $this->validate($request, Todo::$rules);
        $item =$request->all();
        Todo::create($item);
        return redirect('/');
    }


    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $item=Todo::find($request->id);
        $item->update([
            "content"=>$request->content,
        ]);
        return redirect('/');
    }


    public function delete(Request $request)
    {
        $item=Todo::find($request->id);
        $item->delete();
        return redirect('/');
    }
    


}
