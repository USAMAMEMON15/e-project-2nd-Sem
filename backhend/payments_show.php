<div class="card">
    <div class="card-header">
        <h2>All Payments</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Booking ID</th>
                        <th>Amount</th>
                        <th>Payment Time</th>
                        <th>Method</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT p.*, b.booking_id
                            FROM payments p
                            JOIN bookings b ON p.booking_id = b.booking_id";
                    $result = mysqli_query($conn, $sql);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        $payment_time = date('d M Y H:i', strtotime($row['payment_time']));
                        echo "<tr>
                                <td>{$row['payment_id']}</td>
                                <td>{$row['booking_id']}</td>
                                <td>$ {$row['amount']}</td>
                                <td>{$payment_time}</td>
                                <td>{$row['payment_method']}</td>
                                <td>{$row['status']}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>