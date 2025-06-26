<div class="card">
    <div class="card-header">
        <h2>All Bookings</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Movie</th>
                        <th>Show Time</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT b.booking_id, u.name AS user_name, m.title AS movie_title, 
                            sh.show_time, b.total_amount, b.status
                            FROM bookings b
                            JOIN users u ON b.user_id = u.user_id
                            JOIN shows sh ON b.show_id = sh.show_id
                            JOIN movies m ON sh.movie_id = m.movie_id";
                    $result = mysqli_query($conn, $sql);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        $show_time = date('d M Y H:i', strtotime($row['show_time']));
                        echo "<tr>
                                <td>{$row['booking_id']}</td>
                                <td>{$row['user_name']}</td>
                                <td>{$row['movie_title']}</td>
                                <td>{$show_time}</td>
                                <td>$ {$row['total_amount']}</td>
                                <td>{$row['status']}</td>
                                <td>
                                    <a href='?page=booking_details&id={$row['booking_id']}' class='btn btn-primary'><i class='fa fa-eye'></i> View</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>