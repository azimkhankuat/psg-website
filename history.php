<?php
require_once "db_connection/link.php";
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}
?>

<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
<title>PSG | History</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/javascript.js"></script>
</head>
<body>

<!-- Header START-->
<div class="header">
    <a id="logo" class="logo" href="index.php"><img src='img/logo.png' width="85px" height="85px"></a>
    <div class="topnav" id="myTopnav">
        <a href="index.php">Home</a>
        <a class="active" href="history.php">History</a>
        <a href="players-page.php">Players</a>
        <a href="tickets.php">Buy tickets</a>
        <a href="about-us.php">About us</a>
        <?php
        if($_SESSION["user"] == "admin") {
            ?>
            <a href="admin-page.php">Admin page</a>
        <?php } ?>
        <?php
        if(empty($_SESSION["user"])) {
            ?>
            <form action="login.php"><a href="login.php">Login</a></form>
            <form action="signup.php"><a href="signup.php">Sign up</a></form>
        <?php }else { ?>
            <form action="cartshow.php"><a href="cartshow.php">Cart</a></form>
            <form action="exit.php"><a href="exit.php">Logout<?php echo " (". $_SESSION["user"] . ")" ?></a></form>
        <?php  } ?>
        <a href="javascript:void(0);" class="icon" onclick="responsive()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <span class="quote">ICI C'EST PARIS</span>
</div>
<!-- Header END-->


<!-- Main content START-->
<div class="row">
    <div class="left-history">
        <div class="card">
            <h2>HISTORY</h2>
            <p>For the longest time, Paris did not have a football club that truly belonged to the elite. That finally changed in 1970, when a group of businessmen went through with the plan of merging Paris FC and Stade Saint-Germain into a single club named Paris Saint-Germain. (The year of establishment are somewhat debated though, since the club was affiliated with the Fédération française de football already in December 1969.)</p>
            <p>Not surprisingly, PSG immediately drew sympathies of the Parisian crowd, which was exalted to finally have a club that could contend for domestic trophies. Shortly after earning promotion to Ligue 1 in 1972, the club moved into the legendary Parc des Princes, which would serve as their home to this day.</p>
            <hr>
            <h3>Winning the first major trophies</h3>
            <p>The early 80s saw PSG win their first major trophies by claiming back-to-back French Cups in 1982 and 1983. This naturally led to the club winning their first Ligue 1 title in 1986 and consequently trying their luck in European competitions, where they played a number of memorable matches but ultimately failed to advance past the quarter-final. It was during this period that PSG developed a penchant for attacking-minded football, which would play a large part in the club becoming fan favorites, both in France and abroad.</p>
            <img src="img/history2.jpg" width="100%" style="border: 1px solid #ef3a40;">
            <h3>Larger investments leading to international success</h3>
            <p>Following the takeover by Canal+ in 1991, the club's future was destined for greatness. With the new owners investing large sums of money into big-name signings such as George Weah and Raí, PSG quickly developed into one of the most dominant clubs in the country. In addition to claiming their second Ligue 1 trophy (1994), three French Cups (1993, 1995, 1998) and two League Cups (1995, 1998), PSG became the second French club to win a European trophy by defeating Rapid Wien in the 1996 Cup Winners' Cup final.</p>
            <hr>
            <h3>PSG forms:</h3>
            <button class="showbutton" onclick="redshirt();">Red Shirt</button>
            <button class="showbutton" onclick="hechtershirt();">Hechter Shirt</button>
            <button class="showbutton" onclick="blackshirt();">Black Shirt</button>
            <button class="showbutton" onclick="orangeshirt();">Orange Shirt</button>
            <button class="showbutton" onclick="whiteshirt();">White Shirt</button><br><br>
            <img src="img/red_shirt.jpg" style="display: none;" id="red-shirt" width="100%" class="w3-padding-16">
        </div>
    </div>

    <div class="right-history">
        <div class="card">
            <img src="img/history1.jpg" width="100%" alt="PSG Team" style="border: 1px solid #ef3a40;"><br><br>
            <table class="table">
                <thead>
                <th>#</th>
                <th>Team</th>
                <th>Matches</th>
                <th>Win%</th>
                <th>GF</th>
                <th>GA</th>
                <th>GD</th>
                <th>Pts</th>
                </thead>
                <tbody>
                <tr>
                    <td data-label="#">1</td>
                    <td data-label="Team">PSG</td>
                    <td data-label="Matches">27</td>
                    <td data-label="Win%">81%</td>
                    <td data-label="GF">75</td>
                    <td data-label="GA">24</td>
                    <td data-label="GD">51</td>
                    <td data-label="Pts">68</td>
                </tr>

                <tr>
                    <td data-label="#">2</td>
                    <td data-label="Team">Olympique Marseille</td>
                    <td data-label="Matches">28</td>
                    <td data-label="Win%">57%</td>
                    <td data-label="GF">41</td>
                    <td data-label="GA">29</td>
                    <td data-label="GD">12</td>
                    <td data-label="Pts">56</td>
                </tr>

                <tr>
                    <td data-label="#">3</td>
                    <td data-label="Team">Rennes</td>
                    <td data-label="Matches">28</td>
                    <td data-label="Win%">54%</td>
                    <td data-label="GF">38</td>
                    <td data-label="GA">24</td>
                    <td data-label="GD">14</td>
                    <td data-label="Pts">50</td>
                </tr>

                <tr>
                    <td data-label="#">4</td>
                    <td data-label="Team">Lille</td>
                    <td data-label="Matches">28</td>
                    <td data-label="Win%">54%</td>
                    <td data-label="GF">35</td>
                    <td data-label="GA">27</td>
                    <td data-label="GD">8</td>
                    <td data-label="Pts">49</td>
                </tr>

                <tr>
                    <td data-label="#">5</td>
                    <td data-label="Team">Reims</td>
                    <td data-label="Matches">28</td>
                    <td data-label="Win%">36%</td>
                    <td data-label="GF">26</td>
                    <td data-label="GA">21</td>
                    <td data-label="GD">5</td>
                    <td data-label="Pts">41</td>
                </tr>

                <tr>
                    <td data-label="#">6</td>
                    <td data-label="Team">Nice</td>
                    <td data-label="Matches">28</td>
                    <td data-label="Win%">39%</td>
                    <td data-label="GF">41</td>
                    <td data-label="GA">38</td>
                    <td data-label="GD">3</td>
                    <td data-label="Pts">41</td>
                </tr>

                <tr>
                    <td data-label="#">7</td>
                    <td data-label="Team">Olympique Lyonnais</td>
                    <td data-label="Matches">28</td>
                    <td data-label="Win%">39%</td>
                    <td data-label="GF">42</td>
                    <td data-label="GA">27</td>
                    <td data-label="GD">15</td>
                    <td data-label="Pts">40</td>
                </tr>

                <tr>
                    <td data-label="#">8</td>
                    <td data-label="Team">Montpellier</td>
                    <td data-label="Matches">28</td>
                    <td data-label="Win%">39%</td>
                    <td data-label="GF">35</td>
                    <td data-label="GA">34</td>
                    <td data-label="GD">1</td>
                    <td data-label="Pts">40</td>
                </tr>

                <tr>
                    <td data-label="#">9</td>
                    <td data-label="Team">Monaco</td>
                    <td data-label="Matches">28</td>
                    <td data-label="Win%">39%</td>
                    <td data-label="GF">44</td>
                    <td data-label="GA">44</td>
                    <td data-label="GD">0</td>
                    <td data-label="Pts">40</td>
                </tr>

                <tr>
                    <td data-label="#">10</td>
                    <td data-label="Team">Angers SCO</td>
                    <td data-label="Matches">28</td>
                    <td data-label="Win%">39%</td>
                    <td data-label="GF">28</td>
                    <td data-label="GA">33</td>
                    <td data-label="GD">-5</td>
                    <td data-label="Pts">39</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Main content END-->

<!--Footer START-->
<div class="footer">
    <div class="footerimg">
        <img src="https://billetterie.psg.fr/sites/psg7.ap2s.fr/themes/psg7/images/logo-footer.png" style="text-align:center;">
    </div>
    <div class="footertext">
        <p>Author: Azimkhan Kuat &copy;</p>
        <p>Group: IT-1901</p>
    </div>
</div>
<!--Footer END-->
</body>
</html>
