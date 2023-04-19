<?php
include "connec.php";
session_start();
 ?>
 <?php
   // connect to the database

   if(isset($_POST['clicked']))
   {
          mysqli_query($con,"INSERT into `comments` VALUES('$_SESSION[user]','$_POST[cid]','$_POST[data]');");
          ?>

          <?php
   }
   if (isset($_POST['liked'])) {
     $postid = $_POST['postid'];
     $result = mysqli_query($con, "SELECT * FROM images WHERE id=$postid");
     $row = mysqli_fetch_array($result);
     $n = $row['likes'];

     mysqli_query($con, "INSERT INTO `like` (username, postid) VALUES ('$_SESSION[user]', $postid)");
     mysqli_query($con, "UPDATE images SET likes=$n+1 WHERE id=$postid");

     echo $n+1;
     exit();
   }
   if (isset($_POST['unliked'])) {
     $postid = $_POST['postid'];
     $result = mysqli_query($con, "SELECT * FROM images WHERE id=$postid");
     $row = mysqli_fetch_array($result);
     $n = $row['likes'];

     mysqli_query($con, "DELETE FROM `like` WHERE postid=$postid AND username= '$_SESSION[user]';");
     mysqli_query($con, "UPDATE images SET likes=$n-1 WHERE id=$postid");

     echo $n-1;
     exit();
   }

   // Retrieve posts from the database
   $posts = mysqli_query($con, "SELECT * FROM  images");
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FACEBOOK LITE </title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style media="screen">
      .image
      {
        padding-left: 35%;
      }


      .post {
      width: 45%;
      margin: 10px auto;
      border: 1px solid black;
      padding: 5px;
      }
      .like, .unlike, .likes_count {
      color: red;
      }
      .hide {
      display: none;
      }

      p
      {
        text-align: center;
      }
      body
      {
      }
      .img
      {
        width:100%;

      }
      .main
      {
          display: flex;
        width:100%;
        height:100%;

      }
      .b2 table
      {
        margin:auto;
      }
      .b2 tr,td
      {
        padding-right: 20px;
      }
      .b1
      {
        flex:5;
        height:100%;


      }
      .b2
      {
        flex:1;
      height:1500px;
      width:500px;

      }
      .cbox
      {
        display:none;
      }
      #button1
      {
        border:none;
        background-color: #e1e4ec;
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <nav>
        <div class="nav-left">
            <img src="green.jfif" class="logo">
            <ul>
                <li> <img src="notif.jfif" class="notif"> </li>
                <li> <img src="inbox.jfif" class="inbox"> </li>
                <li> <img src="video.png" class="video"> </li>

            </ul>
        </div>
        <div class="nav-right">
                <div class="search-box">
                    <img src="search.png">
                    <input type="text" placeholder="Search here">
                </div>
                <div class="nav-user-icon online">
                    <img src="user.png">
                </div>
        <div class="button">
                    <form action="end.html" method="post">
                    <button name="logout" type="submit"> logout </button>
                    </form>

        </div>

         </div>
    </nav>


        <div class="container">
        <!-----------------------left-sidebar---------------->
            <div class="left-sidebar">
                <div class="imp-links">
                    <a href="https://economictimes.indiatimes.com/topic/everyday"><img src="news.png"> Latest News  </a>
                    <a href="#"><img src="friends.jfif"> Friends  </a>
                    <a href="#"><img src="group.png"> Group </a>
                    <a href="https://www.youtube.com/hashtag/shorts"><img src="watch.png"> Watch </a>
                    <a href="image.php"><img src="i.jpg" alt="">Upload Image</a>
                    <a href="profile.php"><img src="i1.jpg" alt="">My Profile</a>
                    <a href="#"> See more </a>

                </div>
                <div class="shortcut-links">
                    <p> Your Shortcuts</p>
                    <a href="https://cordmagazine.com/living/fashion/top-ten-best-selling-clothing-fashion-brands-in-the-world/"> <img src="brands.png"> Fashion Brands</a>
                    <a href="https://startupsavant.com/best-startup-ideas"> <img src="start.png"> Startup Ideas</a>
                    <a href="https://www.shopify.com/blog/business-plan-examples"> <img src="plans.png"> Business Plans</a>
                </div>

            </div>
        <!-----------------------main-content--------------->
            <div class="main-content">
                <div class="story-gallery">

                    <div class="story story1">
                    <a href="#"><img src="plus.png"></a>
                    <p>Post Story </p>
                    </div>

                    <div class="story story2">
                        <a href="#"><img src="anushka.jfif"></a>
                        <p> Anushka </p>
                    </div>

                    <div class="story story3">
                       <a href="#"> <img src="nani.jfif"></a>
                        <p> Nani </p>
                    </div>

                    <div class="story">
                       <a href="3"> <img src="ram.jfif"></a>
                        <p> Ram </p>
                    </div>


                </div>
                <div class="feedbnack">


                  <div class="main">
                  <div class="b1">
                    <?php while ($row = mysqli_fetch_array($posts)) {
                       $x = $row[2];


                      ?>

                      <div class="post">
                        <div  style =  "padding: 2px; margin-top: 2px;">
                          <?php
                          echo "<p>";
                          echo $row[2];
                          echo "</p>";
                          ?>
                        </div>
                        <img class = "img" src="uploads/<?php echo $row[0]; ?>" width = "250px" height="250px">
                  <!--
                        <div  style =  "padding: 1px; margin-top: 1px;">
                          <?php /*
                          $q1 = mysqli_fetch_array($q);
                          echo "<p>";
                          echo $q1[0];
                          echo "</p>";
                          */?>
                        </div>
                  -->
                        <div style="padding: 2px; margin-top: 5px;">
                        <?php
                          // determine if user has already liked this post
                          $results = mysqli_query($con, "SELECT * FROM `like` WHERE username= '$_SESSION[user]' AND postid=".$row[3]."");

                          if (mysqli_num_rows($results) == 1 ): ?>
                            <!-- user already likes post -->
                            <span class="unlike bi bi-heart-fill" data-id="<?php echo $row[3]; ?>"></span>
                            <span class="like hide bi bi-heart" data-id="<?php echo $row[3]; ?>"></span>
                          <?php else: ?>
                            <!-- user has not yet liked post -->
                            <span class="like bi bi-heart" data-id="<?php echo $row[3]; ?>"></span>
                            <span class="unlike hide bi bi-heart-fill" data-id="<?php echo $row[3]; ?>"></span>
                          <?php endif ?>

                          <span class="likes_count"><?php echo $row['likes']; ?> likes</span>
                        </div>
                        <button  class = "<?php echo $row['id']; ?>" id = "button1">Comments</button>
                        <div class="cbox" style =  "padding: 1px; margin-top: 1px; " data-id = "<?php echo $row[3]; ?>"  id ="<?php  echo $row['id']; ?>" >

                         <?php $t = mysqli_query($con,"SELECT * from `comments` where postid = ".$row[3]."");
                         $i = 1;
                         ?>
                         <table>
                          <?php while ($r = mysqli_fetch_array($t)) {
                            // code...
                            ?>
                             <tr>
                               <td><?php echo $i; ?></td>
                               <td>  <?php echo $r['comment']; echo "  <b> by "; echo $r['username'];echo "</b>"; ?> </td>
                             </tr>
                            <?php
                            $i = $i + 1;
                          } ?>
                         </table>
                         <div  style =  "padding: 2px; margin-top: 2px;">
                          <form class="myForm"  method="post">
                             <label for="comment">Add Comment</label>
                             <input type="text"  class = "comment" value = " ">
                             <input type="button" class = "submitFormData" onclick="SubmitFormData()" value="submit" data-id = "<?php echo $row['id']; ?>">
                          </form>
                         </div>

                        </div>
                      </div>
                      <?php



                           ?>

                           <?php


                       ?>
                    <?php } ?>


                  <!-- Add Jquery to page -->



                  </div>

                  </div>
                  	<!-- display posts gotten from the database  -->


                </div>

            </div>
             <!-----------------------right-sidebar----------------->
             <div class="right-sidebar">
                <div class="sidebar-title">
                    <h4> Events </h4>
                    <a href="#"> See All </a>
                </div>
                <div class="event">
                    <div class="left-event">
                        <h3>3</h3>
                        <span> April </span>
                    </div>
                    <div class="right-event">
                        <h4> Social Media awareness</h4>
                        <p> location : Lawsons bay </p>
                        <a href="#"> More Info</a>
                    </div>
                </div>
                <div class="event">
                    <div class="left-event">
                        <h3>22</h3>
                        <span> November </span>
                    </div>
                    <div class="right-event">
                        <h4> Your Birthday</h4>
                        <a href="#"> More Info</a>
                    </div>
                </div>
                <div class="sidebar-title">
                    <h4> Advertisement</h4>
                    <a href="#"> Close </a>
                </div>
                <img src="adver.jfif" class="sidebar-ads">
                <div class="sidebar-title">
                    <h4> Conversation </h4>
                    <a href="#"> Hide Chat </a>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="anushka.jfif">
                    </div>
                    <p> Anushka </p>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="nani.jfif">

                    </div>
                    <p> Nani </p>
                </div>
                <div class="online-list">
                    <div class="online">
                        <img src="C:\Users\ADMIN\Desktop\ram.jfif">
                    </div>
                    <p> Ram </p>




                </div>

            </div>
            </div>
</div>
<script src = "jquery.min.js">

</script>
<script src="jquery.min.js"></script>


<script>
$(document).ready(function(){
  // when the user clicks on like
  $(".submitFormData").on('click',function(event)
{
  var n = document.querySelectorAll(".comment").length;

  for(var i = 0;i < n;i++ )
  {
      var c = document.getElementsByClassName('comment')[i].value;
      if(c !== " ")
      {
        var d = c;
      }
  }

  var b = $(this).data('id');
  $.post("index1.php", { clicked: 1, cid: b, data: d },
    function(data) {
     location.reload();
    });



});


  $("button").on('click',function(event)
{
    var a = event.target.className;

    var x = document.getElementById(a);
 if (x.style.display === "none") {
   x.style.display = "block";
 } else {
   x.style.display = "none";
 }
});
  $('.like').on('click', function(){

    var postid = $(this).data('id');
        $post = $(this);

    $.ajax({
      url: 'index1.php',
      type: 'post',
      data: {
        'liked': 1,
        'postid': postid
      },
      success: function(response){
        $post.parent().find('span.likes_count').text(response + " likes");
        $post.addClass('hide');
        $post.siblings().removeClass('hide');
      }
    });
  });

  // when the user clicks on unlike
  $('.unlike').on('click', function(){
    var postid = $(this).data('id');
      $post = $(this);

    $.ajax({
      url: 'index1.php',
      type: 'post',
      data: {
        'unliked': 1,
        'postid': postid
      },
      success: function(response){
        $post.parent().find('span.likes_count').text(response + " likes");
        $post.addClass('hide');
        $post.siblings().removeClass('hide');
      }
    });
  });
});
</script>

</body>
</html>
