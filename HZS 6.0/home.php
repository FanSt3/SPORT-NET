<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/like_post.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="icon" type="image/x-icon href=/img/favicon.ico">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>SPORT NET | Početna Stranica</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'components/user_header.php'; ?>

<section class="home-grid">

   <div class="box-container">

      <div class="box">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
               $count_user_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
               $count_user_comments->execute([$user_id]);
               $total_user_comments = $count_user_comments->rowCount();
               $count_user_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
               $count_user_likes->execute([$user_id]);
               $total_user_likes = $count_user_likes->rowCount();
         ?>
         <p> Dobrodošao/la <span><?= $fetch_profile['name']; ?></span></p>
         <p>Ukupan broj komentara : <span><?= $total_user_comments; ?></span></p>
         <p>Sviđanja na članku: <span><?= $total_user_likes; ?></span></p>
         <div class="flex-btn">
            <a href="user_likes.php" class="option-btn">Sviđanje</a>
            <a href="user_comments.php" class="option-btn">Komentari</a>
         </div>
         <?php
            }else{
         ?>
            <p class="name">Prijava ili Registracija?</p>
            <div class="flex-btn">
               <a href="login.php" class="option-btn">Prijava</a>
               <a href="register.php" class="option-btn">Registracija</a>
            </div> 
         <?php
          }
         ?>
      </div>

      <div class="box">
         <p>Kategorije</p>
         <div class="flex-box">
            <a href="category.php?category=fudbal" class="links">Fudbal</a>
            <a href="category.php?category=košarka" class="links">Košarka</a>
            <a href="category.php?category=tenis" class="links">Tenis</a>
            <a href="category.php?category=odbojka" class="links">Odbojka</a>
            <a href="category.php?category=rukomet" class="links">Rukomet</a>
            <a href="category.php?category=vaterpolo" class="links">Vaterpolo</a>
            <a href="category.php?category=auto-moto" class="links">Auto-Moto</a>
            <a href="category.php?category=zimski sportovi" class="links">Zimski sportovi</a>
            <a href="category.php?category=biciklizam" class="links">Biciklizam</a>
            <a href="category.php?category=esports" class="links">Esport</a>
         </div>
      </div>

      <div class="box">
         <p>Autori</p>
         <div class="flex-box">
         <?php
            $select_authors = $conn->prepare("SELECT DISTINCT name FROM `admin` LIMIT 10");
            $select_authors->execute();
            if($select_authors->rowCount() > 0){
               while($fetch_authors = $select_authors->fetch(PDO::FETCH_ASSOC)){ 
         ?>
            <a href="author_posts.php?author=<?= $fetch_authors['name']; ?>" class="links"><?= $fetch_authors['name']; ?></a>
            <?php
            }
         }else{
            echo '<p class="empty">Ni jedan članak nije dodat!</p>';
         }
         ?>  
         <a href="authors.php" class="btn">Pregledajte sve</a>
         </div>
      </div>

   </div>

</section>

<section class="posts-container">

   <h1 class="heading">Najnovije Vesti</h1>

   <div class="box-container">

      <?php
         $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE status = ? LIMIT 6 ");
         $select_posts->execute(['active']);
         if($select_posts->rowCount() > 0){
            while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
               
               $post_id = $fetch_posts['id'];

               $count_post_comments = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ?");
               $count_post_comments->execute([$post_id]);
               $total_post_comments = $count_post_comments->rowCount(); 

               $count_post_likes = $conn->prepare("SELECT * FROM `likes` WHERE post_id = ?");
               $count_post_likes->execute([$post_id]);
               $total_post_likes = $count_post_likes->rowCount();

               $confirm_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ? AND post_id = ?");
               $confirm_likes->execute([$user_id, $post_id]);
      ?>
      <form class="box" method="post">
         <input type="hidden" name="post_id" value="<?= $post_id; ?>">
         <input type="hidden" name="admin_id" value="<?= $fetch_posts['admin_id']; ?>">
         <div class="post-admin">
            <i class="fas fa-user"></i>
            <div>
               <a href="author_posts.php?author=<?= $fetch_posts['name']; ?>"><?= $fetch_posts['name']; ?></a>
               <div><?= $fetch_posts['date']; ?></div>
            </div>
         </div>
         
         <?php
            if($fetch_posts['image'] != ''){  
         ?>
         <img src="uploaded_img/<?= $fetch_posts['image']; ?>" class="post-image" alt="">
         <?php
         }
         ?>
         <div class="post-title"><?= $fetch_posts['title']; ?></div>
         <div class="post-content content-150"><?= $fetch_posts['content']; ?></div>
         <a href="view_post.php?post_id=<?= $post_id; ?>" class="inline-btn">Pročitajte više</a>
         <a href="category.php?category=<?= $fetch_posts['category']; ?>" class="post-cat"> <i class="fas fa-tag"></i> <span><?= $fetch_posts['category']; ?></span></a>
         <div class="icons">
            <a href="view_post.php?post_id=<?= $post_id; ?>"><i class="fas fa-comment"></i><span>(<?= $total_post_comments; ?>)</span></a>
            <button type="submit" name="like_post"><i class="fas fa-heart" style="<?php if($confirm_likes->rowCount() > 0){ echo 'color:var(--red);'; } ?>  "></i><span>(<?= $total_post_likes; ?>)</span></button>
         </div>
      
      </form>
      <?php
         }
      }else{
         echo '<p class="empty">Ni jedan članak nije objavljen!</p>';
      }
      ?>
   </div>

   <div class="more-btn" style="text-align: center; margin-top:1rem;">
      <a href="posts.php" class="inline-btn">Pregledajte sve članke</a>
   </div>

</section>



















<?php include 'components/footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>