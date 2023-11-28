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
   <title>dashboard</title>

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
            <h3>Dobrodosao/la</h3>
            <p><?= $fetch_profile['name']; ?></p>
            <a href="update_profile.php" class="btn">Azurirajte nalog</a>
        </div>

        <div class="box">
            <?php 
                $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE admin_id = ?");
                $select_posts->execute([$admin_id]);
                $number_of_posts = $select_posts->rowCount();
            ?>
            <h3><?= $number_of_posts; ?></h3>
            <p>Ukupno dodatih clanaka</p>
            <a href="add_posts.php" class="btn">Dodajte novi clanak</a>
        </div>

        <div class="box">
            <?php 
                $select_active_posts = $conn->prepare("SELECT * FROM `posts` WHERE admin_id = ? AND status =  ?");
                $select_active_posts->execute([$admin_id, 'aktivan']);
                $number_of_active_posts = $select_active_posts->rowCount();
            ?>
            <h3><?= $number_of_active_posts; ?></h3>
            <p>Aktivni clanci</p>
            <a href="view_posts.php" class="btn">Preglejdate clanke</a>
        </div>

        <div class="box">
            <?php 
                $select_active_posts = $conn->prepare("SELECT * FROM `posts` WHERE admin_id = ? AND status =  ?");
                $select_active_posts->execute([$admin_id, 'aktivan']);
                $number_of_active_posts = $select_active_posts->rowCount();
            ?>
            <h3><?= $number_of_active_posts; ?></h3>
            <p>Neaktivni clanci</p>
            <a href="view_posts.php" class="btn">Preglejdate clanke</a>
        </div>

        <div class="box">
            <?php 
                $select_users = $conn->prepare("SELECT * FROM `users`");
                $select_users->execute();
                $number_of_users = $select_active_posts->rowCount();
            ?>
            <h3><?= $number_of_posts; ?></h3>
            <p>Ukupno korisnika</p>
            <a href="user_accounts.php" class="btn">Pregledajte korisnike</a>
        </div>

        <div class="box">
            <?php 
                $select_admins = $conn->prepare("SELECT * FROM `admin`");
                $select_admins->execute();
                $number_of_admins = $select_active_posts->rowCount();
            ?>
            <h3><?= $number_of_posts; ?></h3>
            <p>Ukupno korisnika</p>
            <a href="admin_account.php" class="btn">Pregledajte administratore</a>
        </div>

        <div class="box">
            <?php 
                $select_comments = $conn->prepare("SELECT * FROM `comments` WHERE admin_id = ?");
                $select_comments->execute([$admin_id]);
                $number_of_comments = $select_active_posts->rowCount();
            ?>
            <h3><?= $number_of_comments; ?></h3>
            <p>Ukupno komentara</p>
            <a href="comments.php" class="btn">Pregledajte komentare</a>
        </div>

        <div class="box">
            <?php 
                $select_likes = $conn->prepare("SELECT * FROM `likes`");
                $select_likes->execute();
                $number_of_likes = $select_active_posts->rowCount();
            ?>
            <h3><?= $number_of_likes; ?></h3>
            <p>Broj Svidjanja</p>
            <a href="admin_account.php" class="btn">Pregledajte clanke</a>
        </div>


    </div>

    </section>
<!-- admin dashboard kraj -->
</body>
</html>