<?php
session_start();
include "connec.php";
$vis = true;
if(isset($_SESSION['us_email']))
{
    $vis = false;
}

?>
<?php
if(isset($_POST["submit"]))
{

$f=$_FILES["img"]["name"];
$des=$_POST["desc"];
$n  = $_SESSION['user'];
$allowed_types = array('jpg', 'jpeg', 'png', 'gif');
$file_ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
if (!in_array($file_ext, $allowed_types)) {
  echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed.')</script>;";
  echo '<script> window.location.replace("upload.php");</script>';
  exit();
}
$u=$con->query("INSERT INTO `images`( `filename`, `description`,`uname`,`id`,`likes`) VALUES ('$f','$des','$n',' ','0')");
$target_dir = "uploads/";
$file_tmp_name = $_FILES['img']['tmp_name'];
$target_file = $target_dir.basename($f);
move_uploaded_file($file_tmp_name, $target_file);

if(isset($u))
{
  echo"<script>alert(' Image uploaded !');</script>";
    echo"<script>window.location = 'index1.php';</script>";
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Upload Photos</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <style>
    .card{

      padding:15px;
      color:"green";
      margin:20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      border-radius:2px;
    }
    main{
      display:flex;
      justify-content:center;
      margin:100px;
    }
    .input{
      margin:25px;
    }
    form{
      display:flex;
      flex-direction:column;
      padding:5px;
    }
    label{
      margin:10px;
      font-size:15px;
      font-weight:bold;
    }
    #text{
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      height:130px;
      resize:None;
    }
    button[type="submit"] {
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s;
      }

    button[type="submit"]:hover {
      background-color: #3e8e41;
    }
    .photo {
            width: 100%;
            height: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .photo img {
        max-width: 50%;
        max-height: 50%;
        }

  </style>
</head>
<body>


    <?php
    if($vis == false)
    {
        echo'<a href="profile.php">profile</a>';
        echo'<a href="upload.php">upload</a>';
        echo '<a href="logout.php">logout</a>';


    }
    ?>
</nav>
</header>-->

<main>
<div class="card">
<h1> Upload an image</h1>
<form action="" method="POST" enctype="multipart/form-data">
  <label for="img"> Choose an image</label>
  <input name ="img" class="input" type="file" id="img" onchange="previewImage(event)">

  <label for="text">Caption</label>
  <textArea name ="desc" class="input"  id="text" placeholder="
  Type a caption here..."></textArea>
  <button type="submit" name="submit">Post</button>
</form>
</div>
</main>

</body>
</html>
