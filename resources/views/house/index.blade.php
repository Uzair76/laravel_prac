<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">House Details</h1>
        <a href="{{ route('houses.create') }}">
            <button class="btn btn-primary">Add House</button>
        </a>

        <table class="table table-striped table-bordered mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Area</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($houses as $house)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $house->name }}</td>
                        <td>{{ $house->address }}</td>
                        <td>{{ $house->area }}</td>
                        <td>{{ $house->created_at }}</td>
                        <td>{{ $house->updated_at }}</td>
                        <td>
                            <a href="{{ route('house.edit', $house->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('house.delete', $house->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>


                        </td>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No houses available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
