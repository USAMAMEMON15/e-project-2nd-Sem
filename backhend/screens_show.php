<div class="card">
    <div class="card-header">
        <h2>All Screens</h2>
        <a href="?page=screens_add" class="btn-add"><i class="fa fa-plus"></i> Add Screen</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Theater</th>
                        <th>Screen Name</th>
                        <th>Total Seats</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT s.*, t.name AS theater_name 
                            FROM screens s
                            JOIN theaters t ON s.theater_id = t.theater_id";
                    $result = mysqli_query($conn, $sql);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['screen_id']}</td>
                                <td>{$row['theater_name']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['total_seats']}</td>
                                <td class='action-buttons'>
                                    <a href='?page=screens_edit&id={$row['screen_id']}' class='btn btn-edit'><i class='fa fa-edit'></i></a>
                                    <button class='btn btn-delete' onclick=\"confirmDelete('screen', {$row['screen_id']})\"><i class='fa fa-trash'></i></button>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>