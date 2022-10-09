<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
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
                <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button>Log in</button>
    </form>
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