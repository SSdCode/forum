<!-- INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES (NULL, 'why you not able to install pyaudio\r\nWhich type of error you are getting?', '1', '0', current_timestamp()); -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 433px;
    }
    </style>
    <title>Welcome to Coding-Discuss</title>
</head>

<body>
<?php
require("partials/dbconnect.php");
include("partials/header.php");
?>


    <?php
        $id=$_GET['threadid'];
        $qry="SELECT * FROM `thread` where thread_id=$id";
        $result=mysqli_query($conn,$qry);
        $row=mysqli_fetch_assoc($result);
        $title= $row['thread_title'];
        $desc= $row['thread_desc'];
        $userid=$row['thread_user_id'];

        $qry="SELECT * FROM `userdetails` where user_id=$userid";
        $result=mysqli_query($conn,$qry);
        $row=mysqli_fetch_assoc($result);
        $fname= $row['fname'];
        $lname= $row['lname'];
    ?>


    <?php
         $id=$_GET['threadid'];
         $method = $_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $comment=$_POST['comment'];
            // $comment=$_POST['comment'];


            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment); 
            


            $qry="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '0', current_timestamp());
            ";
            $ans=mysqli_query($conn,$qry);
            if($ans){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your comment has been added.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
        }
    
    ?>
    <div class="container my-4" id="ques">

        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title ?></h1>
            <p class="lead"><?php echo $desc ?></p>
            <hr class="my-4">
            <p>This forum is a pear to pear forum.
                No Spam / Advertising / Self-promote in the forums.
                Do not post copyright-infringing material.
                Do not post “offensive” posts, links or images.
                Do not cross post questions.
                Remain respectful of other members at all time.</p>
            <p class="text-left"><b>Posted by <?php echo $fname." ".$lname ?></b></p>
        </div>
    </div>
<?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo '<div class="container">
            <h1 class="py-2">Start a Discussion</h1> 
            <form action="'. $_SERVER["REQUEST_URI"] . '" method="post">
                <div class="form-group">
                    <label for="comment">Type your comment hear</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Post a comment</button>
            </form>
        </div>';
    }
    else{
        echo '
        <div class="container">
        <h1 class="py-2">Post a comment</h1> 
           <p class="lead">You are not logged in. Please login to be able to Post a comment</p>
        </div>
        ';
    }
    ?>

 
    <div class="container mb-5" id="ques">

        <h1 class="py-2">Discussion</h1>
        <?php
        $id=$_GET['threadid'];
        $qry="SELECT * FROM `comments` where thread_id=$id";
        $result=mysqli_query($conn,$qry);
        
        
        $no=mysqli_num_rows($result);
        $noResult=false;
        if($no == 0){
            $noResult=false;
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No comments found</p1>
            </div>
          </div>';
        }

    
        while($row=mysqli_fetch_array($result)){
            $content=$row['comment_content'];
            $comment_time=$row['comment_time'];


            $comment_by = $row['comment_by']; 
            $sql2 = "SELECT email FROM `userdetails` WHERE user_id='$comment_by'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $email=$row2['email'];

            echo '<div class="media my-3">
            <img src="images/userdefault.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-0">'.$email.' at  '.$comment_time.'</p>
                '.$content.'
            </div>
        </div>';
        }

    ?>
    </div>




<?php
  include("partials/footer.php");
?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>