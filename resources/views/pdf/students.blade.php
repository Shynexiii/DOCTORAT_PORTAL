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
    <h1>Students list</h1>
    <table>
        <tr>
          <th>N°</th>
          <th>Secrete code</th>
          <th>Registration number</th>
          <th>Name</th>
          <th>Module 1</th>
          <th>Module 2</th>
          <th>Average</th>
        </tr>
        @foreach($students as $student)
            <tr>
              <td>{{ $student->id }}</td>
              <td>{{ $student->secrete_code }}</td>
              <td>{{ $student->register_number }}</td>
              <td>{{ $student->first_name_fr }} {{ $student->last_name_fr }}</td>
              <td>{{ $student->note_final_module_1 }}</td>
              <td>{{ $student->note_final_module_2 }}</td>
              <td>{{ $student->moyenne_doctorat }}</td>
            </tr>
            @endforeach
            {{-- {{dd($student)}} --}}
    </table>
</body>
</html>