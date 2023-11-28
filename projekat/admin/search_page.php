<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Stranica za pretragu Clanaka</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

section class="show-posts">

<h1 class="heading">Vasi Clanci</h1>

<form action="search_page.php" method="POST"; class="search-form">
   <input type="text" placeholder="Pretrazite clanke..." required maxlenght="100" name="search_box">
   <button class="fas fa-search" name="search_btn"></button>
</form>

<div class="box-container">

   <?php
      $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE admin_id = ?");
      $select_posts->execute([$admin_id]);
      if($select_posts->rowCount() > 0){
         while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
            $post_id = $fetch_posts['id'];

            $count_post_comments = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ?");
            $count_post_comments->execute([$post_id]);
            $total_post_comments = $count_post_comments->rowCount();

            $count_post_likes = $conn->prepare("SELECT * FROM `likes` WHERE post_id = ?");
            $count_post_likes->execute([$post_id]);
            $total_post_likes = $count_post_likes->rowCount();

   ?>
   <form method="post" class="box">
      <input type="hidden" name="post_id" value="<?= $post_id; ?>">
      <?php if($fetch_posts['image'] != ''){ ?>
         <img src="../uploaded_img/<?= $fetch_posts['image']; ?>" class="image" alt="">
      <?php } ?>
      <div class="status" style="background-color:<?php if($fetch_posts['status'] == 'active'){echo 'limegreen'; }else{echo 'coral';}; ?>;"><?= $fetch_posts['status']; ?></div>
         <div class="title"><?= $fetch_posts['title']; ?></div>
      <div class="posts-content"><?= $fetch_posts['content']; ?></div>
      <div class="icons">
         <div class="likes"><i class="fas fa-heart"></i><span><?= $total_post_likes; ?></span></div>
         <div class="comments"><i class="fas fa-comment"></i><span><?= $total_post_comments; ?></span></div>
      </div>
      <div class="flex-btn">
         <a href="edit_post.php?id=<?= $post_id; ?>" class="option-btn">Izmeni</a>
         <button type="submit" name="delete" class="delete-btn" onclick="return confirm('delete this post?');">Obrisi</button>
      </div>
      <a href="read_post.php?post_id=<?= $post_id; ?>" class="btn">Pregledajte clanke</a>
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">Ni jedan clanak nije dodat! <a href="add_posts.php" class="btn" style="margin-top:1.5rem;">Dodajte clanak</a></p>';
      }
   ?>

</div>


</section>

