<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create House</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Create New House</h1>
        <form action="{{ route('houses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">House Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter house name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" required>
            </div>
            <div class="mb-3">
                <label for="area" class="form-label">Area</label>
                <input type="text" name="area" id="area" class="form-control" placeholder="Enter area" required>
            </div>
            <button type="submit" class="btn btn-success">Create House</button>
            <a href="{{ route('houses.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>
