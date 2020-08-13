<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
          padding: 8px;
        }
        
        tr:nth-child(even) {
          background-color: #dddddd;
        }
    </style>
</head>
<body>
    <h1>Students list of code</h1>
    <table>
        <tr>
            <th>Secrete code</th>
            <th>Registration number</th>
            <th>First name</th>
            <th>Last name</th>
        </tr>
        @foreach($students as $student)
            <tr>
                <td>{{$student->secrete_code}}</td>
                <td>{{$student->register_number}}</td>
                <td>{{$student->first_name_fr}}</td>
                <td>{{$student->last_name_fr}}</td>
            </tr>
            @endforeach
            {{-- {{dd($student)}} --}}
    </table>
</body>
</html>