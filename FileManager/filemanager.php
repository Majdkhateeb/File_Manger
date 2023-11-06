<?php
require("./filemanager-bloc.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="filemanager.css">
    <!DOCTYPE html>
    <html>

    <head>
        <title>Page Title</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href='https://unpkg.com/css.gg@2.0.0/icons/css/eye.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    </html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <header>
        <form action="../Login/login.php">
            <h3 class="navtitle">File Management system </h3>
            <button class="button3" name="logout"> Log out</button>
        </form>
    </header>
    <nav>
        <h2 class="title">File Manager Welcome <?php echo $_SESSION['user']; ?></h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div class="button1">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Upload Files
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload File</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ...
                            </div>
                            <div class="modal-footer">
                                <label for="file" class="button2">To choose</label>
                                <input type="file" name="file" id="file" style="display:none">
                                <input type="submit" value="Upload" name="submit" class="button2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="button1a">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create Folder
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Create Folder</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                    <input type="text" name="foldername" required>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create Folder</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </nav>
</head>

<body>
    <div class="body">
        <form id="uploadForm" action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="post" enctype="multipart/form-data" autocomplete="off">
            <table class="tablecustom" id="myTable">
                <tbody>
                    <?php
                    foreach ($files as $file) {
                        echo '<tr>';
                        echo '<td>' . $file . '</td>';
                        echo '<td>' . mime_content_type($dir . $file) . '</td>';
                        echo '<td>' . date("F d Y H:i:s.", filemtime($dir . $file)) . '</td>';
                        echo '<td><a href="?delete=' . $file . '"><i class="fa-solid fa-trash"></i></a></td>';
                        echo '<td><a href="?show=' . $file . '"><i class="fa-solid fa-eye"></i></a></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>

        </form>
    </div>

</body>

</html>