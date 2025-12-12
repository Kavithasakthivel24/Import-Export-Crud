<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Laravel Crud</title>
  </head>
  <body>
    <div class="bg-primary text-center text-white py-2">
    <h1>Laravel Crud</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-end p-0 mt-1">
                <a href="{{ route('tasks.index') }}" class="btn btn-primary">Back</a>
            </div>
            <div class="card p-0 mt-3">
                <div class="card-header bg-primary text-white">
                    <h4>Edit Details</h4>
                </div>
                <div class="card-body shadow-lg">

                 <form method="POST" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Product Name"
                      value="{{ old('name',$task->name) }}">
                      @error('name')
                      <p class="invalid-feedback">{{ $message }}</p>                          
                      @enderror
                    </div>

                    {{-- <div class="mb-3">
                       <label class="form-label">Image</label>
                       <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
                       value="{{ old('image') }}">
                      @error('image',$product->image)
                      <p class="invalid-feedback">{{ $message }}</p>                          
                      @enderror
                      @if (!empty($product->image))
                                        <img class="rounded" src="{{ asset('upload/products/'.$product->image) }}"
                                         alt="{{ $product->name }}" width="50" height="50">
                                    @else
                                        <img class="rounded" src="https://placehold.co/600x400"
                                     alt="No Image" width="50" height="50">
                      @endif
                    </div> --}}

                    <div class="mb-3">
                       <label class="form-label">Email</label>
                       <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
                       name="email" placeholder="Enter Email"
                       value="{{ old('email',$task->email) }}">
                       @error('email')
                           <p class="invalid-feedback">{{ $message }}</p>
                       @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" 
                        name="password" placeholder="Enter Password"
                        value="{{ old('password',$task->password) }}">
                         @error('password')
                      <p class="invalid-feedback">{{ $message }}</p>                          
                      @enderror
                    </div>

                    {{-- <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                            <option {{ ($product->status == "Active") ? "selected" : "" }} value="Active">Active</option>
                            <option {{ ($product->status == "Inactive") ? "selected" : "" }} value="Inactive">Inactive</option>
                        </select>
                         @error('status')
                      <p class="invalid-feedback">{{ $message }}</p>                          
                      @enderror
                    </div> --}}
                    <button type="submit" class="btn btn-primary">Update</button>
                 </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>