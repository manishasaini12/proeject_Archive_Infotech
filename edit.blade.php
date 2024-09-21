
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <label>Mobile:</label>
        <input type="text" name="mobile" value="{{ $user->mobile }}" required>
        <label>Address:</label>
        <textarea name="address">{{ $user->address }}</textarea>
        <label>Profile Image:</label>
        <input type="file" name="profile_image" accept="image/*">
        <button type="submit">Update User</button>
    </form>
</body>
</html>
