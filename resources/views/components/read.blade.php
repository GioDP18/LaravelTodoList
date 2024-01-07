<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>
    <div>
        <h1>Laravel Todo List</h1>
        <table id="todos" class="display" style="width:100%" style="background-color:aqua; width:100%; height:20rem;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Todo Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{ $index = 0 }}
                @foreach ($todos as $todo)
                <tr>
                    <td>{{ $index += 1 }}</td>
                    <td>{{ $todo->todoName }}</td>
                    @if ($todo->status == 1)
                    <td><input type="checkbox" name="status" id="" checked disabled ></td>
                    @else
                    <td><input type="checkbox" name="status" id="" disabled ></td>
                    @endif
                    <td><a href="{{ route('update',  $todo->id) }}">Update</a></td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#todos');
    </script>
</body>
</html>
