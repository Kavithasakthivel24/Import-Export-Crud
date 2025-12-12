








<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Import and Export</title>
  </head>

  <body>
    <div class="container mt-4">
     <div class="d-flex justify-content-end p-0 mt-1">
                <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back</a>
            </div>
      <h2 class="mb-3">Deleted Tasks</h2>

      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($tasks as $task)
          <tr>
              <td>{{ $task->name }}</td>
              <td>{{ $task->email }}</td>
              <td>{{ $task->password }}</td>

              <td>
                  <a href="{{ route('tasks.restore', $task->id) }}" class="btn btn-success btn-sm">
                      Restore
                  </a>

                  <a href="{{ route('tasks.forceDelete', $task->id) }}"
                     class="btn btn-danger btn-sm"
                     onclick="return confirm('Are you sure? This will delete permanently!')">
                      Delete Permanently
                  </a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html> 
