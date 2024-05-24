<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h1 class="mb-3">Add Product</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="price" class="form-label">Price:</label>
                            <input type="text" id="price" name="price" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="stock" class="form-label">Stock:</label>
                            <input type="text" id="stock" name="stock" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="weight" class="form-label">Weight:</label>
                            <input type="text" id="weight" name="weight" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label for="condition" class="form-label">Condition:</label>
                            <select name="condition" id="condition" class="form-select" required>
                                <option value="New">New</option>
                                <option value="Second">Second</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                         <label for="image" class="form-label">Image:</label>
                         <input type="file" id="image" name="image" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Description:</label>
                            <textarea id="description" name="description" class="form-control"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
