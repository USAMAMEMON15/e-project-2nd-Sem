<div class="form-container">
    <h2>Add New Movie</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label>Duration (minutes)</label>
            <input type="number" class="form-control" name="duration" required>
        </div>
        <div class="form-group">
            <label>Genre</label>
            <input type="text" class="form-control" name="genre">
        </div>
        <div class="form-group">
            <label>Language</label>
            <input type="text" class="form-control" name="language">
        </div>
        <div class="form-group">
            <label>Release Date</label>
            <input type="date" class="form-control" name="release_date">
        </div>
        <button type="submit" class="btn-submit">Add Movie</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $genre = $_POST['genre'];
    $language = $_POST['language'];
    $release_date = $_POST['release_date'];
    
    $sql = "INSERT INTO movies (title, description, duration_min, genre, language, release_date) 
            VALUES ('$title', '$description', $duration, '$genre', '$language', '$release_date')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Movie added successfully');</script>";
    } else {
        echo "<script>alert('Error adding movie');</script>";
    }
}
?>