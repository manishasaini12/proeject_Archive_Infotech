
<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <h1>Add User</h1>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Mobile:</label>
        <input type="text" name="mobile" required>
        <label>Address:</label>
        <textarea name="address"></textarea>
        <label>Profile Image:</label>
        <input type="file" name="profile_image" accept="image/*" required>
        <button type="submit">Create User</button>
    </form>
</body>
</html>
