
<div class="card">
    <div class="card-header">
        <h2>All Users</h2>
        <a href="?page=users_add" class="btn-add"><i class="fa fa-plus"></i> Add User</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from users";
                    $result = mysqli_query($conn, $sql);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['user_id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['phone_number']}</td>
                                <td>{$row['created_at']}</td>
                                <td class='action-buttons'>
                                    <a href='?page=users_edit&id={$row['user_id']}' class='btn btn-edit'><i class='fa fa-edit'></i></a>
                                    <button class='btn btn-delete' onclick=\"confirmDelete('user', {$row['user_id']})\"><i class='fa fa-trash'></i></button>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
