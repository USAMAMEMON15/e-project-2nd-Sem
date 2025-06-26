<div class="form-container">
    <h2>Add New Theater</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Theater Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" class="form-control" name="city" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <textarea class="form-control" name="address" rows="3"></textarea>
        </div>
        <button type="submit" class="btn-submit">Add Theater</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    
    $sql = "INSERT INTO theaters (name, city, address) 
            VALUES ('$name', '$city', '$address')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Theater added successfully');</script>";
    } else {
        echo "<script>alert('Error adding theater');</script>";
    }
}
?>