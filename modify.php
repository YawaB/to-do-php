<?php
include "config.php";
if (isset($_GET['id'])) {
    include "config.php";
    $id = mysqli_real_escape_string($cnx, $_GET['id']);
    if (isset($_POST["modify-todo-submit"])) {
        $titre = mysqli_real_escape_string($cnx, $_POST['modify-todo']);
        mysqli_query($cnx, "update todo set title='$titre' where id='$id'");
        header('location:index.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- ICONES -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <title>Update</title>
</head>

<body>
    <?PHP 
      $result= mysqli_query($cnx, "select * FROM todo where id='$id'");
     $row= mysqli_fetch_assoc($result);
      
    ?>
    <div class="flex mt-8 h-7xl items-center">
        <div class="flex flex-col border rounded shadow p-5 w-4/5 mx-auto gap-9">
            <h1 class="text-pink-600 text-center font-bold text-xl">UPDATE YOUR TO DO</h1>
            <form method="post">
                <div class="flex px-auto gap-2">
                    <input class="w-3/4 border rounded p-1" type="text" name="modify-todo" value = "<?php echo $row['title'];?>" placeholder="Something to update" required>
                    <input class="w-1/4 text-pink-100 bg-pink-600 border rounded p-1" type="submit" name="modify-todo-submit" value="Update">
                </div>
            </form>
        </div>
    </div>
</body> 

</html>