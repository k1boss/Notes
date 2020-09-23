<?php
    require('config/config.php');
    require('config/db.php');

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $body = $_POST['body'];
        
        $query = "INSERT INTO notes(title, body) VALUES('$title', '$body')";
        
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL);
        }else{
            echo 'ERROR: '. mysqli_error($conn);
        }
    }
?>

<?php require('inc/header.php'); ?>

<div class="container">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Body</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>

<?php require('inc/footer.php'); ?>
