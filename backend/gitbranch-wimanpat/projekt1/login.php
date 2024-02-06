<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dennis, Axel, A Back-end temp</title>
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js" defer></script>
    <script defer>
    function setuser(){
        var name = document.getElementById("uname").value;
        localStorage.setItem("user", name);
        window.location.replace("./index.php")
    }
    </script>
</head>

<body>

    <div id="container">
        <!-- Max 800px bred container-->

        <header>
            <!-- Logo och meny i headern -->
            <img src="../media/logo.svg" alt="Website logo" />
            <div id="logo">DenApp</div>

            <nav>
                <!-- Huvudmenyn -->
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login.php">login</a></li>
                    <li><a href="../projekt2/">Projekt B</a></li>
                    <li><a href="../rapport/">Rapport</a></li>
                    <li><a href="reg.php">Register</a></li>
                    <li id="ProfName"></li>
                    <li id="ProfPic"></li>
                </ul>
            </nav>
        </header>

        <section>

            <!-- Artiklar placerar sig snyggt nedanför varann-->
            <article>
            <p>for now, this isnt really implemented, just put in a name</p>

            <input type="text" name="uname" id="uname" value="">
            <input type="button" value="Login" onclick="setuser()">



            </article>

            <article>
            <p id="RemainClock"></p>
                <p id="currDate"></p>
            </article>

            
        </section>

        <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
        <footer>
            Made by Dennis, axel<sup>&#169;</sup>
        </footer>

    </div>
</body>

</html>