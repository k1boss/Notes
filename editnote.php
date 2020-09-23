<?php
    require('config/config.php');
    require('config/db.php');

    if(isset($_POST['submit'])){
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        
        $query = "UPDATE notes SET
                title = '$title',
                body = '$body'
                WHERE id = {$update_id}";
            
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL);
        }else{
            echo 'ERROR: '. mysqli_error($conn);
        }
    }

    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = 'SELECT * FROM notes WHERE id = '. $id;

    $result = mysqli_query($conn, $query);

    $note = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($conn);

    

    

?>

<?php require('inc/header.php'); ?>

<div class="container">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo $note['title']; ?>">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control" value=""><?php echo $note['body']; ?></textarea>
        </div>
        <input type="hidden" name="update_id" value="<?php echo $note['id']; ?>">
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>


<?php require('inc/footer.php'); ?>