<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dennis, Axel, A Back-end temp</title>
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js" defer>


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

        
        
        <!-- Sektionen omringar artiklar (eg. blogposts)-->
        <section>

            <!-- Artiklar placerar sig snyggt nedanför varann-->
            <article>
                <h2>Bloggen - Inlägg 1 COOKIE</h2>
                <?php
                if(!empty($_COOKIE[$cookie_name])) {
                    echo "Cookie '" . $cookie_name . "' is set!<br>";
                    echo "Value is: " . $_COOKIE[$cookie_name];
                } 
                else {
                    $cookie_name = "user";
                    $cookie_value = $_SERVER['REMOTE_ADDR'] + " " + date("d.m.Y") + " " + date("H:i:s");
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
                }
                ?>
            </article>
            <div class="separator"></div>

            <article>
                <h2>Bloggen - Inlägg 2 DATA</h2>
                <p>
                    <?php
                    echo $_SERVER['SERVER_NAME'];
                    ?>
                </p>
                <p>
                    <?php
                    echo $_SERVER['REMOTE_ADDR'];
                    ?>
                </p>
                <p>
                    <?php
                    echo $_SERVER['REMOTE_PORT'];
                    ?>
                </p>
                <p>
                    <?php
                    echo $_SERVER['SERVER_PORT'];
                    ?>
                </p>
            </article>

            <article>
                <h2>Bloggen - Inlägg 3 Date+Time</h2>
                <p>
                <?php echo "Today is " . date("d.m.Y") . "<br>"; 
                ?> 
                </p>
                <p>
                <?php echo "The time is " . date("H:i:s");
                ?> 
                </p>
                <input type="date" id="dateSetter">
                <button type="button" onclick='SetDate(document.getElementById("dateSetter").valueAsNumber)'>Save</button>

                <p id="RemainClock"></p>
                <p id="currDate"></p>
            </article>

            <article>
                <h2>visitors add script</h2>

                <p>
                <?php
                $myfile = fopen("./uploads/visitfile.txt", "a") or die("Unable to open file!");
                $adress = $_SERVER['REMOTE_ADDR'];;
                $time = date("H:i:s");
                $txt = $adress + " visited at: " + $time + "\n";
                
                fwrite($myfile, $txt);
                fclose($myfile);

                ?>
                </p>
                <h3> the list</h3>
                <p>

                <?php
                $myfile = fopen("./uploads/visitile.txt", "r") or die("Unable to open file!");
                echo fread($myfile,filesize("./uploads/visitfile.txt"));
                fclose($myfile);
                ?>

                </p>

            </article>

            
        </section>

        <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
        <footer>
            Made by Dennis, axel<sup>&#169;</sup>
        </footer>

    </div>
</body>

</html>