<div class="form-container">
    <h2>Add New Screen</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Theater</label>
            <select class="form-control" name="theater_id" required>
                <option value="">Select Theater</option>
                <?php
                $sql = "SELECT * FROM theaters";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['theater_id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Screen Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="form-group">
            <label>Total Seats</label>
            <input type="number" class="form-control" name="total_seats" required>
        </div>
        <button type="submit" class="btn-submit">Add Screen</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $theater_id = $_POST['theater_id'];
    $name = $_POST['name'];
    $total_seats = $_POST['total_seats'];
    
    $sql = "INSERT INTO screens (theater_id, name, total_seats) 
            VALUES ($theater_id, '$name', $total_seats)";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Screen added successfully');</script>";
    } else {
        echo "<script>alert('Error adding screen');</script>";
    }
}
?>