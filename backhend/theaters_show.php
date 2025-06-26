<div class="card">
    <div class="card-header">
        <h2>All Theaters</h2>
        <a href="?page=theaters_add" class="btn-add"><i class="fa fa-plus"></i> Add Theater</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM theaters";
                    $result = mysqli_query($conn, $sql);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['theater_id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['city']}</td>
                                <td>{$row['address']}</td>
                                <td class='action-buttons'>
                                    <a href='?page=theaters_edit&id={$row['theater_id']}' class='btn btn-edit'><i class='fa fa-edit'></i></a>
                                    <button class='btn btn-delete' onclick=\"confirmDelete('theater', {$row['theater_id']})\"><i class='fa fa-trash'></i></button>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>