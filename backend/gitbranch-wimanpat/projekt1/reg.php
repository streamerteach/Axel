<!DOCTYPE html>

<?php

if($_POST["email"]){
$msg = "hello" + htmlspecialchars($_POST["uname"]) + "your new password is:" + htmlspecialchars($_POST["pass"]);

mail($_POST["email"],"reg confirmation", $msg);

echo $_POST["email"];
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dennis, Axel, A Back-end temp</title>
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js" defer></script>
    <script defer>
    let GenPass;
    for(let i=0; i<10 ; i++ ){
        GenPass += Math.round(Math.random() * 9);
    }
    document.getElementById("pass").value = GenPass;
    </script>
</head>

<body>

    <div id="container">
        <header>
            <!-- Logo och meny i headern -->
            <img src="../media/logo.svg" alt="Website logo" />
            <div id="logo">DenApp</div>

            <nav>
                <!-- Huvudmenyn -->
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="../projekt1/">Projekt A</a></li>
                    <li><a href="../projekt2/">Projekt B</a></li>
                    <li><a href="../rapport/">Rapport</a></li>
                    <li><a href="reg.php">Register</a></li>
                </ul>
            </nav>
        </header>

        <section>

            <!-- Artiklar placerar sig snyggt nedanför varann-->
            <article>
            <h2>REGISTER, not really "working", but the parts are here.</h2>

            <form method="POST" action="#">
            <label for="email">email:</label>
            <input type="text" name="email" id="email">
            <p></p>
            <label for="uname">username</label>
            <input type="text" name="uname" id="uname">
            <p></p>
            <input type="submit" value="register"></button>
            <input type="hidden" value="" id="pass" name="pass">

            </form>

            </article>
        </section>

        <footer>
            Made by Dennis, axel<sup>&#169;</sup><br>
            <p id="RemainClock"></p>
            <p id="currDate"></p>
        </footer>

    </div>
</body>

</html>   