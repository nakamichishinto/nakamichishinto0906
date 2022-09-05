
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
</head>

<style>
  body {
    background-color:purple;
  }

  h1 {
    font-size:25px;
  }

  .contents {
    background-color:white;
    width:55vw;
    height:300px;
    
    left:0;
    top:0;
    padding:20px;
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
    width:20vw;
    height:20px;
  }

  .button a {
    display: flex;
    justify-content: center;
    margin: 0 auto;
    padding: 9px 13px;
    width: 30px;
    color: #2285b1;
    font-size: 12px;
    font-weight: 700;
    border: 2px solid #2285b1;
    border-radius:7px;
    text-decoration:none;
  }

  .button a:hover {
    color: #333333;
    text-decoration: none;
    background-color: #a0c4d3;
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
    width:20%;

  }





</style>
<body>
  <div class="contents">
    <h1>Todo List</h1>
    
    <form action="/todo/create" method="post">
      @csrf
      <div class="add">
        <input type="text" class="form add-text" name="content">
    
        <div class="button add">
          <button>追加</button>
        </div>
      </div>
    </form>
    
    <div class="task-list">
      <table>
        <tr>
          <th>作成日</th>
          <th>タスク名</th>
          <th>更新</th>
          <th>削除</th>
        </tr>

        <form action="/todo/update" method="POST" >
              @csrf
        @foreach ($items as $item)
        <tr>
          <td> {{$item->created_at}}  </td>
          
            
            <td>
              <input type="text"  name="content" class="form name-text" value="{{$item->content}}">
            </td>
            <td>
              <div class="button update">
                <input type="submit"  >
              </div>
        </form>
            </td>

            <td>
              <div class="button delete">
                
                <button>削除</button>
              </div>
            </td>
        </tr>
        @endforeach
        
      </table>
      
    </div>


    

  </div>
</body>