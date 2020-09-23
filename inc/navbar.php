<?php

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">Notes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo ROOT_URL; ?>">Your Notes<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ROOT_URL; ?>addnotes.php">Add Note<span class="sr-only"></span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="<?php echo ROOT_URL?>results.php?search=<?php echo isset($_GET['search']) ? strtolower($_GET['search']) : ''; ?>">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search" >
    </form>
  </div>
</nav>