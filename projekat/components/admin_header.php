<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>';
      }
   }
?>

<header class="header">

   <a href="dashboard.php" class="logo">Admin<span>Panel</span></a>

   <div class="profile">
      <?php
         $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id = ?");
         $select_profile->execute([$admin_id]);
         $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>
      <p><?= $fetch_profile['name']; ?></p>
      <a href="update_profile.php" class="btn">Ažurirajte nalog</a>
    </div>

    <nav class="navbar">
        <a href="dashboard.php"><i class="fa fa-home"></i><span>Početna</span></a>
        <a href="add_posts.php"><i class="fa fa-pen"></i><span>Novi članak</span></a>
        <a href="view_posts.php"><i class="fa fa-eye"></i><span>Pregledajte članke</span></a>
        <a href="admin_accounts.php"><i class="fa fa-user"></i><span>Nalozi</span></a>
        <a href="../components/admin_logout.php" onclick="return confirm('Da li želite da se odjavite sa panela?')"><i class="fas fa-right-from-backet"></i><span style="color:var(--red);">Odjavite se</span></a>
    </nav>

    <div  class="flex-btn">
        <a href="admin_login.php" class="option-btn">Prijava</a>
        <a href="register_admin.php" class="option-btn">Registracija</a> 
    </div>
</header>

















