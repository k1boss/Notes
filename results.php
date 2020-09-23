<?php
    require('config/config.php');
    require('config/db.php');

    // Create Query
    $query = "SELECT * FROM notes WHERE title LIKE '%{$_GET['search']}%' OR body LIKE '%{$_GET['search']}%'";

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
    <?php if(empty($notes)) : ?>
        <h1>No Results Found</h1>
    <?php else : ?>
    <h1>Notes</h1>
    <div class="row">
        <?php foreach($notes as $note) : ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $note['title']; ?></h5>
                    <p class="card-text"><?php echo $note['body']; ?></p>
                </div>
                <a href="<?php echo ROOT_URL; ?>note.php?id=<?php echo $note['id'];?>" class="btn btn-primary">Read More</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

</div>

<?php require('inc/footer.php'); ?>