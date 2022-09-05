<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;



class TodoController extends Controller
{
    public function index ()
    {
        $items=Todo::all();
        return view('index',['items' =>$items]);
    }
    public function post(Request $request)
    {
        $content = $request->content;
        $items=Todo::all();
        return view('index',['items' =>$items]);
    }
    


    public function add ()
    {
        $items=Todo::all();
        return view('/todo/create',['items' =>$items]);
    }
    public function create (Request $request)
    {
        $this->validate($request, Todo::$rules);
        $form =$request->all();
        Todo::create($form);
        return redirect('/todo/create');
    }


    public function edit(Request $request)
    {
        $items=Todo::all();
        return view('/todo/update',['items' =>$items]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Todo::$rules);
        $item=Todo::find($request->content);
        $item->update();
        
        return redirect('/todo/update');
    }




    public function remove()
    {
        $items=Todo::all();
        return view('/todo/delete',['items' =>$items]);
    }
    public function delete(Request $request)
    {
        $item=Todo::find($request->id);
        $item->delete();
        return redirect('/todo/delete');
    }
    


}
