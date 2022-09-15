<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Room - Create</title>
</head>
<body>
    <form action="{{ url('admin/room/create') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" />

        <label for="location">Location</label>
        <input type="text" name="location">

        <label for="image">Image</label>
        <input type="file" name="image" />

        <button type="submit">Add Room</button>
    </form>
</body>
</html>