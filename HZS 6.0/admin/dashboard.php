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
   <title>SPORT NET | Admin Panel Dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- admin dashboard section pocetak  -->
    <section class="dashboard">

    <h1 class="heading">Dashboard</h1>

    <div class="box-container">

        <div class="box">
            <h3>Dobrodošao/la</h3>
            <p><?= $fetch_profile['name']; ?></p>
            <a href="update_profile.php" class="btn">Ažurirajte nalog</a>
        </div>

        <div class="box">
            <?php 
                $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE admin_id = ?");
                $select_posts->execute([$admin_id]);
                $number_of_posts = $select_posts->rowCount();
            ?>
            <h3>Ukupno dodatih članaka</h3>
            <p><?= $number_of_posts; ?></p>
            <a href="add_posts.php" class="btn">Dodajte novi članak</a>
        </div>

        <div class="box">
            <?php 
                $select_active_posts = $conn->prepare("SELECT * FROM `posts` WHERE admin_id = ? AND status =  ?");
                $select_active_posts->execute([$admin_id, 'active']);
                $number_of_active_posts = $select_active_posts->rowCount();
            ?>
            <h3>Aktivni članci</h3>
            <p><?= $number_of_active_posts; ?></p>
            <a href="view_posts.php" class="btn">Pregledajte članke</a>
        </div>

        <div class="box">
            <?php 
                $select_deactive_posts = $conn->prepare("SELECT * FROM `posts` WHERE admin_id = ? AND status = ?");
                $select_deactive_posts->execute([$admin_id, 'deactive']);
                $numbers_of_deactive_posts = $select_deactive_posts->rowCount();
            ?>
            <h3>Neaktivni članci</h3>
            <p><?= $numbers_of_deactive_posts; ?></p>
            <a href="view_posts.php" class="btn">Pregledajte članke</a>
        </div>

        <div class="box">
            <?php 
                $select_users = $conn->prepare("SELECT * FROM `users`");
                $select_users->execute();
                $number_of_users = $select_users->rowCount();
            ?>
            <h3>Ukupno korisnika</h3>
            <p><?= $number_of_users; ?></p>
            <a href="users_accounts.php" class="btn">Pregledajte korisnike</a>
        </div>

        <div class="box">
            <?php 
                $select_admins = $conn->prepare("SELECT * FROM `admin`");
                $select_admins->execute();
                $number_of_admins = $select_admins->rowCount();
            ?>
            <h3>Ukupno autora</h3>
            <p><?= $number_of_admins; ?></p>
            <a href="admin_accounts.php" class="btn">Pregledajte Autore</a>
        </div>

        <div class="box">
            <?php 
                $select_comments = $conn->prepare("SELECT * FROM `comments` WHERE admin_id = ?");
                $select_comments->execute([$admin_id]);
                $select_comments->execute();
                $number_of_comments =  $select_comments->rowCount();
            ?>
            <h3>Ukupno komentara</h3>
            <p><?= $number_of_comments; ?></p>
            <a href="comments.php" class="btn">Pregledajte komentare</a>
        </div>

        <div class="box">
            <?php 
                $select_likes = $conn->prepare("SELECT * FROM `likes` WHERE admin_id = ?");
                $select_likes->execute([$admin_id]);
                $select_likes->execute();
                $number_of_likes = $select_likes->rowCount();
            ?>
            <h3>Broj Sviđanja</h3>
            <p><?= $number_of_likes; ?></p>
            <a href="view_posts.php" class="btn">Pregledajte članke</a>
        </div>


    </div>

    </section>
<!-- admin dashboard kraj -->
</body>
</html>