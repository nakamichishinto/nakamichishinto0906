
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
</head>

<style>
  body {
    background-color:rgba(25,25,112);
  }

  h1 {
    font-size:25px;
  }

  .contents {
    background-color:white;
    width:60vw;
    height:300px;
    left:0;
    top:0;
    padding:50px;
    margin: 200px auto;
    border-radius:10px;
  }

  .add {
    display: flex;
    justify-content: space-between;
  }

  .form {
    border-radius:5px;
    border-color:rgb(220,220,220);
    border-collapse:collapse;
  }

  .add-text {
    width:80%;
    height:30px;
  }



  .name-text {
    width:24vw;
    height:20px;
  }

  .button-add {
    display: flex;
    justify-content: center;
    margin: 0 auto;
    padding: 9px 13px;
    width: 60px;
    border: 2px solid rgba(186,85,211);
    font-size: 12px;
    font-weight: 700;
    border-radius:7px;
    text-decoration:none;
    background-color:white;
    color:rgba(186,85,211);
  }

  .button-add:hover {
    color:white;
    background-color:rgba(186,85,211);
  }

  .button-update {
    display: flex;
    justify-content: center;
    margin: 0 auto;
    padding: 9px 13px;
    width: 60px;
    border: 2px solid rgba(255,140,0);
    font-size: 12px;
    font-weight: 700;
    border-radius:7px;
    text-decoration:none;
    background-color:white;
    color:rgba(255,140,0);
  }

  .button-update:hover {
    color:white;
    background-color:rgba(255,140,0);
  }

  .button-delete {
    display: flex;
    justify-content: center;
    margin: 0 auto;
    padding: 9px 13px;
    width: 60px;
    border: 2px solid rgba(0,255,255);
    font-size: 12px;
    font-weight: 700;
    border-radius:7px;
    text-decoration:none;
    background-color:white;
    color:rgba(0,255,255);
  }

  .button-delete:hover {
    color:white;
    background-color:rgba(0,255,255);
  }

  table {
    width:100%;
    justify-content:space-around;
    margin:10px 30px;
  }

  th {
    width:25%;
  }

  td {
    width:40%;
  }





</style>
<body>
  
  <div class="contents">
    <h1>Todo List</h1>
    <a href="/">??????????????????</a>
    
    <form action="/todo/search" method="get">
      <input type="text" name="keyword" value="">
      <input type="submit" value="??????">
    </form>
    

    @if (Auth::check())
    <p>???????????????????????????: {{$user->name }}</p>
    <form action="/logout">
      <input type='submit' value='???????????????'></input>
    </form>
    @else
    <p>?????????????????????????????????<a href="/auth">????????????</a>
    <a href="/register">??????</a>???</p>
    @endif

    <form action="/todo/create" method="POST">
      @csrf
      <div class="add">
        <input type="text" name="content" class="form add-text">
        <button class="button-add">??????</button>
      </div>

      @error('content')
      <p>{{ $message }}</p>
      @enderror

    </form>

    <div class="task-list">
      <table>
        <tr>
          <th class="time">?????????</th>
          <th>????????????</th>
          <th>??????</th>
          <th>??????</th>
        </tr>
      

        @foreach ($posts as $post)
        <form action="/todo/update" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$post->id}}">
        <tr>
          <td class=""> {{$post->created_at}}  </td>
            <td>
              <input type="text"  name="content" class="form name-text" value="{{$post->content}}">
            </td>
            <td>
              <div >
                <button class="button-update">??????</button>
              </div>
            </td>
          </form>

          <form action="/todo/delete" method="POST">
          @csrf
            <input type="hidden" name="id" value="{{$post->id}}">
            <td>
              <div >
                <button class="button-delete">??????</button>
              </div>
            </td>
          </form>
        </tr>
        @endforeach
      
      </table>
      
    </div>


    

  </div>
</body>