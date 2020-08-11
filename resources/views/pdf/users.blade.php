<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 20px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
</head>
<body>
    <table>
        <tr>
          <th>Name</th>
          <th>Username</th>
          <th>Password</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->plain_text}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>