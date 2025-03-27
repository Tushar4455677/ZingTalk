<?php
include 'db_config.php'; 

$delete_query = "DELETE FROM stories WHERE created_at < NOW() - INTERVAL 1 DAY";
mysqli_query($conn, $delete_query);

/* echo "Old stories deleted successfully!"; */
?>
