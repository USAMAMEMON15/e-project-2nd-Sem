<div class="card">
    <div class="card-header">
        <h2>All Shows</h2>
        <a href="?page=shows_add" class="btn-add"><i class="fa fa-plus"></i> Add Show</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Movie</th>
                        <th>Theater & Screen</th>
                        <th>Show Time</th>
                        <th>Ticket Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT s.show_id, m.title AS movie_title, t.name AS theater_name, sc.name AS screen_name, 
                            s.show_time, s.ticket_price
                            FROM shows s
                            JOIN movies m ON s.movie_id = m.movie_id
                            JOIN screens sc ON s.screen_id = sc.screen_id
                            JOIN theaters t ON sc.theater_id = t.theater_id";
                    $result = mysqli_query($conn, $sql);
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        $show_time = date('d M Y H:i', strtotime($row['show_time']));
                        echo "<tr>
                                <td>{$row['show_id']}</td>
                                <td>{$row['movie_title']}</td>
                                <td>{$row['theater_name']} - {$row['screen_name']}</td>
                                <td>{$show_time}</td>
                                <td>$ {$row['ticket_price']}</td>
                                <td class='action-buttons'>
                                    <a href='?page=shows_edit&id={$row['show_id']}' class='btn btn-edit'><i class='fa fa-edit'></i></a>
                                    <button class='btn btn-delete' onclick=\"confirmDelete('show', {$row['show_id']})\"><i class='fa fa-trash'></i></button>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>