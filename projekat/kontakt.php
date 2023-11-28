<?php include 'components/connect.php'; ?>
<?php include 'components/user_header.php'; ?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/kontakt.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <script src="../js/kontakt.js"></script>
    <script src="https://kit.fontawesome.com/cc3fdd91b9.js" crossorigin="anonymous"></script>
    <title>SPORT NET | Kontakt</title>
</head>
<body>
    <main>
        <form id="contact-form">
            <div class="contact-form-section">
                <div class="contact-form-inner-flex" id="contact-form-inner-flex">
                    <label for="ime">Ime</label>
                    <input type="text" id="ime" placeholder="Zoran" required>
                </div>
                <div class="contact-form-inner-flex">
                    <label for="prezime">Prezime</label>
                    <input type="text" id="prezime" placeholder="Petrović" required>
                </div>
            </div>
            <div class="contact-form-section contact-form-single-line-flex">
                <label for="ime">Imejl</label>
                <input type="text" id="imejl" placeholder="osoba@gimnazijalci.com" required style="position: relative;">
            </div>
            <div class="contact-form-single-line-flex">
                <label for="lname">Razlog kontakta</label>
                <textarea rows="4" cols="50" placeholder="Vaša poruka..."></textarea>
            </div>
            <br><br>
            <button id="button-submit"><i class="fa-solid fa-paper-plane"></i>Pošalji</button>
        </form>
    </main>

</body>
</html>
<?php include 'components/footer.php'; ?>