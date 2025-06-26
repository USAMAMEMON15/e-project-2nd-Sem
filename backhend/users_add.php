
<div class="form-container">
    <h2>Add New User</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <button type="submit" class="btn-submit">Add User</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    
    $sql = "insert into users (name, email, password_hash, phone_number) 
            values ('$name', '$email', '$password', '$phone')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('User added successfully');</script>";
    } else {
        echo "<script>alert('Error adding user');</script>";
    }
}
?>
