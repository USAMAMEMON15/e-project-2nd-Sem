<div class="form-container">
    <h2>Add New Show</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Movie</label>
            <select class="form-control" name="movie_id" required>
                <option value="">Select Movie</option>
                <?php
                $sql = "SELECT * FROM movies";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['movie_id']}'>{$row['title']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Screen</label>
            <select class="form-control" name="screen_id" required>
                <option value="">Select Screen</option>
                <?php
                $sql = "SELECT s.screen_id, s.name, t.name AS theater_name 
                        FROM screens s
                        JOIN theaters t ON s.theater_id = t.theater_id";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['screen_id']}'>{$row['theater_name']} - {$row['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Show Time</label>
            <input type="datetime-local" class="form-control" name="show_time" required>
        </div>
        <div class="form-group">
            <label>Ticket Price</label>
            <input type="number" step="0.01" class="form-control" name="ticket_price" required>
        </div>
        <button type="submit" class="btn-submit">Add Show</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movie_id = $_POST['movie_id'];
    $screen_id = $_POST['screen_id'];
    $show_time = $_POST['show_time'];
    $ticket_price = $_POST['ticket_price'];
    
    $sql = "INSERT INTO shows (movie_id, screen_id, show_time, ticket_price) 
            VALUES ($movie_id, $screen_id, '$show_time', $ticket_price)";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Show added successfully');</script>";
    } else {
        echo "<script>alert('Error adding show');</script>";
    }
}
?>