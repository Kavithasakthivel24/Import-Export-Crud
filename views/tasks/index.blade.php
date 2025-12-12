<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Import and Export</title>
  </head>
  <body>
    <div class="container">
    <div class="text-center mt-2">
    <h1>Name List</h1>
    </div>
<div class="mt-4 mb-2">
<a class="btn btn-sm bg-info text-black" href="{{ route('tasks.create') }}">Add</a>
<a class="btn btn-sm bg-info text-black" href="{{ route('tasks.trash') }}">Trash</a>
<a class="btn btn-sm bg-info text-black" href="{{ route('tasks.export') }}">Export</a>
</div>

<form action="{{ route('tasks.import') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" class="mt-2">
    <div class="d-flex justify-content-end p-0 mb-4">
    <button type="submit" class="btn btn-sm bg-success text-black">Import</button>
    </div>
</form>

<table border="1" class="table table-striped">
    <tr>
        <th>Name</th><th>Email</th><th>Password</th><th>Action</th>
    </tr>

@foreach ($tasks as $task)
<tr>
    <td>{{ $task->name }}</td>
    <td>{{ $task->email }}</td>
    <td>{{ $task->password }}</td>
    <td>
        <a class="btn btn-sm bg-warning text-black" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
            @csrf @method('DELETE')
            <button class="btn btn-sm bg-danger text-black">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </div>
  </body>
</html>
