<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Schülersprecherwahl 2021-2022</title>
    <link rel="icon" href="https://www.andreas-schule.org/wp-content/uploads/2017/02/cropped-andreas-logo-32x32.png">
</head>
<body>
    <nav>
        <span class="heading">Schülersprecherwahl des Andreas Gymnasiums</span>
    </nav>
    <section class="main">
        <h1>Bitte geben Sie Ihren 5-stelligen Code ein</h1>
        <img src="Assets/Logo.png" alt="Logo Andreas Gymnasium" class="logo">
        <div class="code">
            <input type="number" oninput="changed(1)" id="verify1" maxlength="1" class="inputNumberVerify">
            <input type="number" oninput="changed(2)" id="verify2" maxlength="1" class="inputNumberVerify">
            <input type="number" oninput="changed(3)" id="verify3" maxlength="1" class="inputNumberVerify">
            <input type="number" oninput="changed(4)" id="verify4" maxlength="1" class="inputNumberVerify">
            <input type="number" oninput="changed(5)" id="verify5" maxlength="1" class="inputNumberVerify">
            <img src="" class="verify" alt="" id="verify">
        </div>
    </section>
    <section id="openLater">

    </section>
 <script src="script.js"></script>
    <a href="links.html" class="links">Links</a><br><a href="impressum.html" class="links">Impressum</a>
</body>
</html>