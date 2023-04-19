<?php session_start();
       include "connec.php";
     ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .main
      {
        margin: auto;
        
        width:50%;
      }
    </style>
  </head>
  <body>
    <div class="main">
      <table border = 1 style = "border-collapse:collapse;">
        <tr>
          <td>Image</td>
          <td>Description</td>
          <td>Likes</td>
          <td>Comments</td>
        </tr>
<?php
       $q = mysqli_query($con,"SELECT * from images where uname = '$_SESSION[user]';");
       while($row = mysqli_fetch_row($q))
       {
         ?>
         <tr>
           <td><img src="uploads/<?php echo $row[0]; ?>" alt="" height = "200px" width = "200px">  </td>
           <td><?php echo $row[1]; ?></td>
              <td><?php echo $row[3]; ?></td>
              <td>
               <?php
              $t = mysqli_query($con,"SELECT * from comments where postid = ".$row[3].";");
              while($x = mysqli_fetch_row($t))
              {
                echo $x[2];
              }
                ?>

              </td>
         </tr>

         <?php
       }


 ?>
      </table>
      <a href = "index1.php">Go back</a>
     </div>
  </body>
</html>
