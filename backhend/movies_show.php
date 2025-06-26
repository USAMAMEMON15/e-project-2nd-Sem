<div class="card">
    <div class="card-header">
        <h2>All Movies</h2>
        <a href="?page=movies_add" class="btn-add"><i class="fa fa-plus"></i> Add Movie</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Duration</th>
                        <th>Genre</th>
                        <th>Language</th>
                        <th>Release Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM movies";
                    $result = mysqli_query($conn, $sql);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['movie_id']}</td>
                                <td>{$row['title']}</td>
                                <td>{$row['duration_min']} min</td>
                                <td>{$row['genre']}</td>
                                <td>{$row['language']}</td>
                                <td>{$row['release_date']}</td>
                                <td class='action-buttons'>
                                    <a href='?page=movies_edit&id={$row['movie_id']}' class='btn btn-edit'><i class='fa fa-edit'></i></a>
                                    <button class='btn btn-delete' onclick=\"confirmDelete('movie', {$row['movie_id']})\"><i class='fa fa-trash'></i></button>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>