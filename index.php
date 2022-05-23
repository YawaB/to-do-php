<?php
include "config.php";
if (isset($_POST["new-todo-submit"])) {
    $title = mysqli_real_escape_string($cnx, $_POST['new-todo']);
    mysqli_query($cnx, "insert into todo(id,title,done) values (0, '$title', 0)");
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
    <title>My To Do</title>
</head>

<body class="font-serif">
    <div class="h-screen">
        <h1 class="text-pink-600 text-center font-bold text-4xl relative top-2 mb-9">MY TO DO</h1>
        <div class="flex flex-col-reverse sm:flex-row w-7xl h-4/5 mx-auto gap-3 sm:gap-0 ">
            <div class="flex  flex-col border-r sm:w-1/2 overflow-auto h-full gap-3 ">
                <?php
                $result = mysqli_query($cnx, "select * from todo order by  done asc, id desc");
                if (mysqli_num_rows($result) > 0) {
                    while ($todo = mysqli_fetch_assoc($result)) {
                        date_default_timezone_set('Africa/Casablanca');
                        $done = $todo['done'] == true ? 'fa-solid fa-square-check text-pink-600' : 'fa-regular fa-square text-pink-600';
                        $line = $todo['done'] == true ? 'line-through' : '';
                        $page = $todo['done'] == true ? 'unmake' : 'make';
                        $date = $todo['date_sys'];
                echo ' <div class="border rounded bg-pink-50/[0.9] shadow mx-auto p-4 flex w-4/5 justify-evenly items-center">
                 <div class="flex flex-col w-2/3"> 
                     <p class=" ' . $line . '">' . $todo['title'] . '</p>
                     <code class=" italic text-sm text-gray-400">Created:'.$date.'</code>
                     </div>
                    <a href="' . $page . '-done.php?id=' . $todo['id'] . '"><i class="'. $done .'"></i></a>
                    <a href="modify.php"><i class="fa-solid fa-pen text-pink-600"></i></a>
                    <a href="delete.php?id=' . $todo['id'] . '"><i class="fa-solid fa-trash-can text-pink-600"></i></a>
                    
                </div>';
                    }
                } else {
                    echo '<div class="flex flex-col justify-center items-center h-full">
                    <img class="w-1/2" src="images/no-todo.svg" alt="no-todo">
                    <p>No to do for the moment</p>
                </div>';
                }

                ?>
            </div>
            <div class="flex sm:w-1/2 h-7xl items-center">
                <div class="flex flex-col border rounded shadow p-5 w-4/5 mx-auto gap-9">
                    <h1 class="text-pink-600 text-center font-bold text-xl">NEW TO DO</h1>
                    <form method="post">
                        <div class="flex px-auto gap-2">
                            <input class="w-3/4 border rounded p-1" type="text" name="new-todo" placeholder="Something to do" required>
                            <input class="w-1/4 text-pink-100 bg-pink-600 border rounded p-1" type="submit" name="new-todo-submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <footer class="w-full h-20 sm:h-10 bg-pink-100 flex flex-col justify-center relative bottom-0">
            <p class="text-pink-600 text-center">© 2022 Brinda_vi - All Rights are Reserved.</p>

    </div>
    </div>
    </footer>
    </div>
</body>

</html>