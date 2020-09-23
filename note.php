<?php
    require('config/config.php');
    require('config/db.php');

    if(isset($_POST['delete'])){
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
        
        $query = "DELETE FROM notes WHERE id = {$delete_id}";
        
        if(mysqli_query($conn, $query)){
            header('Location: '. ROOT_URL);
        }else{
            echo 'ERROR: '.mysqli_error($conn);
        }
    }

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = 'SELECT * FROM notes WHERE id= '.$id;

    $result = mysqli_query($conn, $query);

    $note = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($conn);
?>

<?php require('inc/header.php'); ?>
<div class="container">
    <h1><?php echo $note['title']?></h1>
    <p><?php echo $note['body'] ?></p>
    <a href="<?php echo ROOT_URL ?>" class="btn btn-primary">Back</a>
    <a href="<?php echo ROOT_URL; ?>editnote.php?id=<?php echo $note['id'];?>" class="btn btn-primary">Edit</a>
    <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#deleteModal">Delete</button>
</div>

<!-- Modal -->
<div class="modal fade in" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this note?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="delete_id" value="<?php echo $note['id']; ?>">
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>
