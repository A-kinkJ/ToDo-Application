<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TODOリスト</title>
  <style>
    body {
      margin: 0;
      background-color: #2d197c;
      height: 100vh;
      width: 100vw;
      position: relative;
      text-align: center;
    }

    .to-do-list {

      background-color: #fff;
      width: 85vw;
      margin: auto;
      margin-top: 50px;
      padding: 30px 0;
      border-radius: 10px;
    }

    .to-do-list h1 {
      font-size: 25px;
      margin-bottom: 10px;
    }


    .to-do-list-main {
      width: 95%;
    }

    .to-do-list-txt p {
      color: red;
    }

    .to-do-txt-content {
      width: 95%;
      border-radius: 3px;
      border: 1px solid #ccc;
      font-size: 18px;
      margin-left: 10%;
    }

    .create-button {
      text-align: left;
      border: 2px solid #dc70fa;
      font-size: 12px;
      color: #dc70fa;
      background-color: #fff;
      font-weight: bold;
      padding: 6px 14px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .add-button:hover {
      background-color: #dc70fa;
      border-color: #dc70fa;
      color: #fff;
    }

    th {
      padding-top: 15px;
      padding-bottom: 15px;
    }

    table {
      text-align: center;
      width: 100%;
      justify-content: space-between;
    }

    tr {
      height: 10px;
    }

    .add-txt {
      width: 90%;
      border-radius: 3px;
      border: 1px solid #ccc;
      padding: 3px;
      font-size: 14px;
    }

    .update-button {
      text-align: left;
      border: 2px solid #fa9770;
      font-size: 12px;
      color: #fa9770;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .update-button:hover {
      background-color: #fa9770;
      border-color: #fa9770;
      color: #fff;
    }

    .delete-button {
      text-align: left;
      border: 2px solid #71fadc;
      font-size: 12px;
      color: #71fadc;
      background-color: #fff;
      font-weight: bold;
      padding: 8px 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: 0.4s;
      outline: none;
    }

    .delete-button:hover {
      background-color: #71fadc;
      border-color: #71fadc;
      color: #fff;
    }

    @media screen and (max-width: 480px) {
      .to-do-list h1 {
        font-size: 18px;
        margin-bottom: 10px;
      }

      .to-do-txt-content {
        width: 85%;
        border-radius: 3px;
        border: 1px solid #ccc;
        font-size: 18px;
        margin-left: 10%;
      }

      .create-button {
        text-align: left;
        border: 2px solid #dc70fa;
        font-size: 10px;
        color: #dc70fa;
        background-color: #fff;
        font-weight: bold;
        padding: 5px 12px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.4s;
        outline: none;
      }

      .add-button:hover {
        background-color: #dc70fa;
        border-color: #dc70fa;
        color: #fff;
      }

      th {
        padding-top: 15px;
        padding-bottom: 15px;
        font-size: 14px;
      }

      table {
        text-align: center;
        width: 100%;
        justify-content: space-between;
      }

      tr {
        height: 10px;
      }

      td{
        font-size: 10px;
      }

      .add-txt {
        width: 90%;
        border-radius: 3px;
        border: 1px solid #ccc;
        padding: 3px;
        font-size: 14px;
      }

      .update-button {
        text-align: left;
        border: 2px solid #fa9770;
        font-size: 9px;
        color: #fa9770;
        background-color: #fff;
        font-weight: bold;
        padding: 3px 11px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.4s;
        outline: none;
      }

      .update-button:hover {
        background-color: #fa9770;
        border-color: #fa9770;
        color: #fff;
      }

      .delete-button {
        text-align: left;
        border: 2px solid #71fadc;
        font-size: 9px;
        color: #71fadc;
        background-color: #fff;
        font-weight: bold;
        padding: 3px 11px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.4s;
        outline: none;
      }

      .delete-button:hover {
        background-color: #71fadc;
        border-color: #71fadc;
        color: #fff;
      }
    }
  </style>
</head>

<body>
  <div class="to-do-list">
    <div class="to-do-list-ttl">
      <h1>Todo List</h1>
    </div>

    <div class="to-do-list-main">
      <table>
        <tr>
          <div class="to-do-list-txt">
            <form action="/todo/create" method="POST">
              @csrf
              <td>
                <input class="to-do-txt-content" type="text" name="content">
              </td>
              <td>
                <input class="create-button" type="submit" value="追加">
              </td>
              @if (count($errors) > 0)
              <p>1文字以上20文字以下で入力してください</p>
              @endif
            </form>
          </div>
        </tr>
      </table>
      <table>
        <div class="table-ttl">
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
        </div>
        @foreach($todos as $todo)
        <tr>
          <td>{{$todo->updated_at}}</td>
          <td>
            <form action="/todo/update" method="POST">
              @csrf
              <input class="add-txt" type="text" class="input-update" name="content" value="{{$todo->content}}">
          </td>
          <td>
            <input type="hidden" value="{{$todo->id}}" name="id">
            <input class="update-button" type="submit" value="更新">
            </form>
          </td>
          <td>
            <form action="/todo/delete" method="POST">
              @csrf
              <input type="hidden" value="{{$todo->id}}" name="id">
              <input class="delete-button" type="submit" value="削除">
            </form>
          </td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</body>

</html>