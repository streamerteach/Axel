<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dennis, Axel, A Back-end temp</title>
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js" defer>
      
      if(!localStorage.user){
        alert("please log in to upload");
        window.location.replace("login.php");
      }
      else{
        document.getElementById("user").value = localStorage.getItem(user);
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

        
        
        <!-- Sektionen omringar artiklar (eg. blogposts)-->
        <section>

            <!-- Artiklar placerar sig snyggt nedanför varann-->
            <article>

              <form action="Upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="hidden" name="user" id="user" value="">
                <input type="submit" value="Upload Image" name="submit">
              </form>

            </article>

            
        </section>

      <!-- Footern innehåller t.ex. somelänkar och kontaktuppg -->
      <footer>
          Made by Dennis, axel<sup>&#169;</sup>
      </footer>

    </div>
  </body>

</html>

<?php
$target_dir = "./uploads";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["user"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "Sorry, only JPG, JPEG & PNG files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} 

else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>