<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COACHTECH</title>
</head>

<style>
  th {
      background-color: #289ADC;
      color: white;
      padding: 5px 40px;
    }
    tr:nth-child(odd) td{
      background-color: #FFFFFF;
    }
    td {
      padding: 25px 40px;
      background-color: #EEEEEE;
      text-align: center;
    }
</style>

<p>{{$text}}</p>
<form action="/" method="post">
  <table>
    @csrf
    <tr><th>メール: </th><td><input type="text" 
          name="email"></td></tr>
    <tr><th>パスワード: </th><td><input type="password" 
          name="password"></td></tr>
    <tr><th></th><td><input type="submit" 
          value="送信"></td></tr>
  </table>
</form>

</html>