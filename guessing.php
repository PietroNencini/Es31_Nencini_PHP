<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Es 31</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href=".styles.css">
</head>
<body>
    
    <?php
        if(!isset($_SESSION["played_games"])) {
            $_SESSION["played_games"] = 1;
        } else
            $_SESSION["played_games"]++;

        if(!isset($_SESSION["guessed_numbers"]))
            $_SESSION["guessed_numbers"] = 0;
        const RAND_MIN = 1;
        const RAND_MAX = 20;
        $generated_num = rand(RAND_MIN, RAND_MAX);
        $user_attempt = $_GET["user_num"];
        
        if($generated_num == $user_attempt)
            $_SESSION["guessed_numbers"]++;
    ?>

    <h1 class="w-100 p-2 bg-warning text-white text-center">  HAI INDOVINATO?  </h1>

    <div class="w-50 mx-auto my-3 fs-3">
        <p> Numero scelto dall'utente: <?php echo $user_attempt ?> </p>
        <hr>
        <p> Numero giusto: <?php echo $generated_num ?> </p>
        <?php 
            echo $generated_num == $user_attempt ? "<p style='color: green;'> HAI VINTO! - bravo </p>" : "<p style='color: red;'> HAI PERSO! - sei scarso </p>"; 
        ?>
    </div>
    <hr class="w-50 mx-auto">
    <div class="w-50 mx-auto my-3 fs-5">
        <p> Partite giocate: <?php echo $_SESSION["played_games"] ?> </p>
        <p> Partite vinte: <?php echo $_SESSION["guessed_numbers"] ?> </p>
    </div>
    <a href="index.html" class=""><button class="btn btn-warning d-block mx-auto"> Prova un nuovo tentativo </button> </a> 
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>