<?php
    require('config/config.php');
    require('config/db.php');
    
    // Create Query
    $query = 'SELECT * FROM notes ORDER BY id ASC';

    // Get Result
    $result = mysqli_query($conn, $query);

    // Fetch Data
    $notes = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free Result
    mysqli_free_result($result);

    // Close Connection
    mysqli_close($conn);
?>


<?php require('inc/header.php'); ?>
<div class="container">
    <h1>Notes</h1>
    <div class="row">
        <?php foreach($notes as $note) : ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $note['title']; ?></h5>
                    <p class="card-text"><?php echo $note['body']; ?></p>
                    <a href="<?php echo ROOT_URL; ?>note.php?id=<?php echo $note['id'];?>" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>

<?php require('inc/footer.php'); ?>
