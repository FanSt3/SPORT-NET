<?php include 'components/connect.php';

session_start();
if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

 include 'components/user_header.php'; 
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/o-nama.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <script src="https://kit.fontawesome.com/cc3fdd91b9.js" crossorigin="anonymous"></script>
    <title>SPORT NET | O nama</title>
</head>
<body>
    <main>
        <div id="container">
            <div class="card">
                <img src="img/Bogdan.png" width="150">
                <section>
                    <h2>Bogdan</h2>
                    <p><b>Bogdan Golubović</b> je učenik treće godine <a href="https://gimnazijatvrdjava.edu.rs/" target="_blank">Privatne gimnazije Tvrđava<i class="fa-solid fa-up-right-from-square"></i></a>. Iskazuje veliku želju da bude najbolji u svojoj profesiji - front end programiranju. Smatra sebe <b>iskrenim</b>, <b>komunikativnim</b> i <b>spreman je da stiče nova znanja i veštine</b>.</b> Njegov 🥶 CV 🥶 možete pronaći na stranici figma putem <a href="https://www.figma.com/file/Pgl77iyzGmUDSHhGiKPnB8/CV---Bogdan-Golubovi%C4%87?type=design&node-id=0-1&mode=design" target="_blank">ovog linka</a>.
                    </p>
                </section>
            </div>
            <div class="card">
                <img src="img/Stefan.png" width="150">
                <section>
                    <h2>Stefan</h2>
                    <p><b>Stefan Jovišić</b> je takođe učenik treće godine <a href="https://gimnazijatvrdjava.edu.rs/" target="_blank">Privatne gimnazije Tvrđava<i class="fa-solid fa-up-right-from-square"></i></a>. <b>Poseduje veliku motivaciju</b> i <b>istrajanost ka sajber bezbednosti</b>, <b>bug bounty hunting-u </b>🦟🔫 i <b>back end-u kao opštem pojmu</b>. Voli da sluša muziku i ne odustaje lako od izazova. Možete pratiti Stefanov napredak putem <a href="https://app.hackthebox.com/users/384066" target="_blank">ovog HackTheBox linka<i class="fa-solid fa-up-right-from-square"></i></a>.
                </section>
            </div>
            <div class="card">
                <img src="img/Mateja.png" width="150">
                <section>
                    <h2>Mateja</h2>
                    <p><b>Mateja Milivojev</b> je učenik druge godine <a href="https://gimnazijatvrdjava.edu.rs/" target="_blank">Privatne gimnazije Tvrđava<i class="fa-solid fa-up-right-from-square"></i></a>. <b>Fasciniran je etičkim hakovanjem i svetom programiranja</b>. Profesionalno koristi Discord soundboard (pitajte ostatak kolega iz tima). Ne prati sport! 😅</p>
                </section>
            </div>
            <div class="card">
                <img src="img/Roman.png" width="150">
                <section>
                    <h2>Roman</h2>
                    <p><b>Roman Herceg Terzić</b> je takođe učenik druge godine <a href="https://gimnazijatvrdjava.edu.rs/" target="_blank">Privatne gimnazije Tvrđava<i class="fa-solid fa-up-right-from-square"></i></a>. <b>Veliki je (2m 😎) ljubitelj mehatronike  (posebno robotike) i ponosan član e-sports tima "Jorgovan"</b>. Odličan je igrač i uživa u igranju košarke.</p>
                </section>
            </div>
        </div>
    </main>

    <script src="js/script.js"></script>
</body>
</html>
<?php include 'components/footer.php'; ?>