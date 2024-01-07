<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="p-4">
        <div class="d-flex justify-content-between">
            <h1>Laravel Todo List</h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Launch demo modal
            </button>
        </div>

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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <form method="post" action="{{route('todos.store')}}">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="text" class="form-label">Todo Name</label>
                            <input type="text" class="form-control" name="todoName">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name = "status" type="checkbox" value="1" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                              Done
                            </label>
                          </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>



                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#todos');
    </script>
</body>
</html>
