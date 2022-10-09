<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <script src="neilikka.js"></script>
    <script src="/js/validation.js" defer></script>
    <title>Puutarhaliike Neilikka</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div>
        <div class="header">
            <h1>Puutarhaliike Neilikka</h1>
        </div>

        <div class="topnav">
            <a href="etusivu.html">Etusivu</a>
            <div class="dropdown">
                <button class="dropbtn">
                    <a href=" ">Tuotteet</a>
                    </button>
                <div class="dropdown-content">
                    <a href="sisäkasvit.html">Sisäkasvit</a>
                    <a href="ulkokasvit.html">Ulkokasvit</a>
                    <a href="työkalut.html">Työkalut</a>
                    <a href="kasvien_hoito.html">Kasvien hoito</a>
                </div>
            </div>
            <a href="myymälät.html">Myymälät</a>
            <a href="tietoa_meistä.html">Tietoa meistä</a>
            <a href="signup.html">Ota yhteyttä</a>
        </div>

        <div class="row">
            <div class="leftcolumn">
                <div class="card">
                <h1>Home</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="rightcolumn">
            <div class="card">
                <h2>Uutisia</h2>
                <p>2.1.2016 Hyvää uutta vuotta! Uuden vuoden kunniaksi myymälöissämme upeita tarjouksia.</p>
                <p>14.12.2015 Joulukukat edullisesti meiltä. Myymälöissämme myös kattava ja edullinen valikoima joulukuusia.
                </p>
                <p>1.9.2015 Nyt on hyvä aika aloittaa puutarhan valmistelu talven lepokautta varten. Meiltä löydät kaikki työkalut ja tarvikkeet.</p>
            </div>
        </div>
    </div>
    </div>

    <footer id="footer">
        <div class="column">
            <p>Puutarhaliike Neilikka</p>
            <p>Fabianinkatu 42, 00100 Helsinki</p>
            <p>Puh. xx-xxxxxxx</p>
            <p>Sähköposti: helsinki@puutarhaliikeneilikka.fi</p>
            <p>Avoinna</p>
            <p>ma-ke 9-17</p>
            <p>la 12-18</p>
        </div>
        <div class="column">
            <p>Puutarhaliike Neilikka</p>
            <p>Kivenlahdentie 10, 01234 Espoo</p>
            <p>Puh. xx-xxxxxxx</p>
            <p>Sähköposti: espoo@puutarhaliikeneilikka.fi</p>
            <p>Avoinna</p>
            <p>ma-ke 9-17</p>
            <p>la 12-18</p>
        </div>
        <div id="map"></div>
        <script async defer src="https://maps.googleapis.com/maps/api/js? key=55fb9bb830-88819a62f1-rhu7k7&callback=initMap"></script>
    </footer>
</body>

</html>
    
    
    
    
    
    
    
    
    