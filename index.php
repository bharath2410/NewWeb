<?php 
session_start();

  include("connection.php");
  include("functions.php");

  $user_data = check_login($con);  
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Ballet' rel='stylesheet'>
<title>Earth-Our Home Planet</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

body 
{
  font-family: Garamond, serif;
  transition: background-color .5s;
  padding: 10px;
   background-image: url('wall.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  font-size: 1.2em;
}

/* Header/Blog Title */
.header 
{
  padding: 70px;
   text-shadow: 2px 2px 4px #000000;
  text-align: center;
  font-size: 3em;
            font-family: serif;
            color: transparent;
            animation: effect 3s linear infinite;
            \
    }
@keyframes effect {
            0% {
                color: blue;
            }
 
            10% {
                color: #8e44ad;
            }
            20% {
        
        color: #1abc9c;
      }
      
      30% {
        
        color: #d35400;
      }
      
      40% {
        
        color: blue;
      }
      
      50% {
        
        color: #34495e;
      }
      
      60% {
        
        color: blue;
      }
      
      70% {
        
        color: #2980b9;
      }
      80% {
     
        color: #f1c40f;
      }
      
      90% {
     
        color: #2980b9;
      }
      
      100% {
        
        color: pink;
      }
        
}

.header h1
{
   text-shadow: 2px 2px 4px #000000;
  font-size: 50px;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
 background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #98FB98;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  color: red;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  color: white;
  padding: 16px;
  
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn 
{   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn 
{
  float: left;
  width: 25%;
   background-image: url('wall.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  padding-left: 20px;
}

/* Add a card effect for articles */
.card 
{
  background-image: url('wall.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  padding: 20px;
  color: white;
  margin-top: 20px;
  
}

.title 
{
  color: grey;
  font-size: 25px;
  
}

button 
{
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  position: relative;
  text-align: center;
  cursor: pointer;
  width: 80px;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover 
{
  opacity: 0.7;
}

/* Clear floats after the columns */
.row::after 
{
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer 
{
  padding: 5px;
  text-align: center;
  color:white;
  font-size: 10px;
  margin-top: 18px;
    background-image: url('wall.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) 
{
  .leftcolumn, .rightcolumn 
  {   
    width: 100%;
    padding: 0;
  }
}

{
  box-sizing: border-box;
}

.zoom 
{
  transition: transform .2s;
  margin: 0 auto;
}

.zoom:hover 
{
  -ms-transform: scale(1.5); /* IE 9 */
  -webkit-transform: scale(1.5); /* Safari 3-8 */
  transform: scale(1.5); 
}
button 
{
  cursor: pointer;
  outline: 0;
  color: black;
  border-radius: 50px;
  background-color: white;
}

.btn:focus 
{
  outline: none;
}

.green 
{
  color: green;
}

.red
{
  color: red;
}
a.one:link {color:#ff0000;}
a.one:visited {color:#0000ff;}
a.one:hover {color:#ffcc00;}

@media only screen and (max-width: 620px) {
  /* For mobile phones: */
  .header, .dropdown, .dropdown-content, .dropbtn, .card, .row, .leftcolumn, .rightcolumn, .zoom, .title, .one, .btn, .footer {
    width: 100%;
  }
}
.buttonClass 
{
color: white;
}

.fa {
  padding: 5px;
  font-size: 20px;
  width: 65px;
  text-align: centre;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
  width:150px;
}

#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}

.collapsible {
  background-color: #FAFAD2;
  font-family: Garamond, serif;
  font-size: 1.2em;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 37%;
  border: none;
  text-align: left;
  outline: none;
  
}

.active, .collapsible:hover {
  background-color: #FAFAD2;
}

.collapsible:after {
  content: '\002B';
  color: black;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.content {
  font-family: Garamond, serif;
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
    background-image: url('wall.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
img{
row-gap: 25px;}
</style>
</head>


<body>
<button onclick="topFunction()" id="myBtn" title="Go to top" style="border-radius: 50px 20px; font-family: Garmound, serif;">Back To Top</button>
<script>
// Get the button
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a style="font-size: 24px;color: red" style="font-family: 'Ballet';">Hi, <?php echo $user_data['fname'];?></a>
  <a href="index.php"><i style="font-size:24px" class="fa">&#xf015;</i> Home</a>
  <a href="profile.php" target="_blank"><i style="font-size:24px" class="fa">&#xf0c0;</i> Profile</a>
  <a href="https://www.insidescience.org/space?gclid=CjwKCAjw6vyiBhB_EiwAQJRopiJzpL-1HpcdyqQPLHaEjzrzypH0kqYs4tJ9vV-JP1jZUEBXIknqThoC6F4QAvD_BwE" target="_blank"><i style="font-size:24px" class="fa">&#xf1ea;</i> News</a>
  <a href="contactUs.html" target="_blank"><i style="font-size:24px" class="fa">&#xf2b7;</i> Contact Us</a>
  <a href="logout.php"><i style="font-size:24px" class="fa">&#xf08b;</i> Log Out</a>
</div>
<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776</span>
<div class="header">

<img
      align="right"
      src="earth7.gif"
      height="250px"
      width="430px" 
      style="border-radius: 50px 50px;">
  <h1 style="font-family: Garamond, serif;">Earth: Our Home Planet</h1>
</div>




<div class="card">
<h2>About Earth</h2>
      

<p>Earth, also known as the Blue Planet, is our home. It is the third planet from the Sun and the only known celestial body to support life as we know it. Our planet is a unique oasis of life, characterized by diverse ecosystems, breathtaking landscapes, and a delicate balance that sustains a wide array of species. Earth showcases incredible natural beauty from towering mountains to vast oceans, from lush rainforests to arid deserts. Not only does Earth provide us with habitat, but it also offers essential resources for our survival. The air we breathe, the water we drink, and the fertile soil that nourishes our crops all originate from this extraordinary planet. However, the impact of human activities on Earth cannot be ignored. Pollution, deforestation, climate change, and the depletion of natural resources pose significant threats to the health and well-being of our planet. Amidst all this, the question arises: Is Earth the only place we can call home? Let's explore this intriguing topic.</p>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <button class="collapsible">The Search for Extraterrestrial Life</button>
      <div class="content"><br>
      
      <img
      align="right"
      src="search.png"
      height="300px"
      width="500px"
      style="border-radius: 50px 50px">

       <p>Scientists have been searching for signs of life beyond Earth for decades. The discovery of exoplanets (planets outside our solar system) has fueled our curiosity about the possibility of extraterrestrial life. Some of these exoplanets fall within the habitable zone, where conditions may be suitable for liquid water and life.</p>

  <p >One of the first actual life-searching projects took place in August 1924, when a team of scientists led by astronomer David Peck Todd used an airship to loft a radio receiver several miles above the ground — a good spot, it was thought, to listen for messages from creatures on Mars,(opens in new tab) which was making a particularly close approach to Earth at the time.

But the concerted search for extraterrestrial intelligence(opens in new tab) (SETI) didn't really kick off until 1960. That year, Cornell University astronomer Frank Drake used a radio telescope in West Virginia to listen for signals from the stars Tau Ceti and Epsilon Eridani. Project Ozma incorporated ideas from a seminal 1959 paper(opens in new tab) by Giuseppe Cocconi and Philip Morrison.

Scientists have been scanning the heavens for "technosignatures(opens in new tab)" ever since then. Initially, they focused almost exclusively on radio signals, but flashes of light are in play now as well; these are the targets of increasingly common "optical SETI" efforts.</p>
    </div>
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = -1; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
    <div class="card">
      <button class="collapsible">Mars: A Potential Second Home?</button>
      <div class="content"><br>

      <img
      align="right"
      src="mars.jpg"
      height="500px"
      width="500px"
      style="border-radius: 40px 40px">
      <p >Evidence for life on Mars has been claimed for more than a century.The seasonal changes on Mars have been reliably observed, not only visually but also photometrically. There is a conspicuous springtime increase in the contrast between the bright and dark areas of Mars. Colour changes with season have also been reported. Space probes have found no vegetation on Mars, but seasonally variable dust storms provide a convincing explanation of the colour changes.</p>

  <p >Historically, life on Mars was argued for on the basis of the “canals.” This apparent set of thin straight lines across the Martian bright areas extends for hundreds, even thousands, of kilometres and changes seasonally. First systematically observed in 1887 by Italian astronomer Giovanni V. Schiaparelli, the lines were further catalogued and popularized about the turn of the 20th century by American astronomer Percival Lowell. From the unerring straightness of the lines, Lowell argued they could not be natural in origin. Instead he interpreted them as artificial constructs built by intelligent Martians. Lowell suggested they might be channels that carry water from the melting polar caps to the parched equatorial cities. However, many other astronomers were not able to see the canals, and the canals are now believed to be an optical illusion. Approximately rectilinear features do exist on the Martian surface, but these are natural features such as crater chains, terrain contour boundaries, faults, mountain chains, and ridges analogous to the suboceanic ridge features of Earth.</p>

<p >In July and August 1976 two U.S. probes, Viking 1 and 2, successfully landed on Mars with equipment designed to detect the presence or remains of organic material. Analyses of atmospheric and soil samples yielded conclusive results; the data were interpreted as negative. At least in the vicinity of these probes, no evidence for life exists. In 1996 analysis of the Allan Hills Martian meteorite (ALH84001) yielded structures and sedimentary magnetite that some have interpreted as direct evidence for extremely small microbial life on Mars. However, most scientists are very skeptical that the Allan Hills meteorite actually contains traces of past Martian life. The culprits are more likely to be tiny carbonate crystals and abiogenic magnetite. The search for past and current life on Mars continues.</p>
   </div>
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = -1; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>


<div class="card">
      <button class="collapsible">Beyond Mars: Other Celestial Bodies</button>
      <div class="content"><br>

      <img
      align="right"
      src="beyond.jpg"
      height="400px"
      width="600px"
      style="border-radius: 30px 30px">
      <p >Aside from Mars, other celestial bodies within our solar system have also been explored as potential future homes. For instance, the moons of Jupiter and Saturn, such as Europa and Enceladus, have subsurface oceans that could harbor life. Additionally, the dwarf planet Ceres in the asteroid belt is rich in water ice.</p>

<p>Europa, the fourth largest satellite of Jupiter, may be the best candidate for extraterrestrial life in the solar system. The Galileo orbiter revealed a crust of water ice and a complex surface on this moon. Optical imaging, thermographic temperature probes, and magnetic field measurements support the strong inference that a liquid saltwater ocean surges beneath the frozen crust. A wisp of an oxygen atmosphere has also been detected by spectrographic techniques. Furthermore, since organic molecules including methane and nitrogen-rich gases such as ammonia abound on Jupiter and some of its other moons, such “prebiotic chemicals” are highly likely to be present on Europa. The Galileo flyby also detected abundant sulfuric acid, a potential chemical power source, on the surface of Europa.</p>

<p>Tens of thousands of comets, as well as some thousands of asteroids and asteroidal fragments revolving about the Sun between the orbits of Mars and Jupiter, contain organic molecules. The asteroids are the presumed sources of the carbonaceous chondrites’ organic matter. Pluto has a predominantly nitrogen atmosphere covering a surface of frozen nitrogen, carbon dioxide, and methane. The intense cold and paucity of solar radiation on Pluto and the lack of atmosphere and liquid waters on the asteroids argue against the likelihood of finding life on these bodies.</p>
  </div>
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = -1; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>


  <div class="card">
      <button class="collapsible">Interstellar Travel and Colonization</button>
      <div class="content"><br>

      <img
      align="right"
      src="inter.jpg"
      height="300px"
      width="500px"
      style="border-radius: 50px 50px">
      <p >While the search for habitable worlds within our solar system continues, some scientists and visionaries are considering the possibilities of interstellar travel and colonization. Concepts like generation ships and terraforming have been proposed as potential ways to make other star systems habitable for humans.</p>
<p >For thousands of years humans have wondered whether they were alone in the universe or whether other worlds populated by more or less humanlike creatures might exist. In ancient times and throughout the Middle Ages, the common view was that Earth was the only “world” in the universe. Many mythologies populated the sky with divine beings, certainly a kind of extraterrestrial life.Since the Renaissance, fashionable belief has fluctuated. Practically all informed opinion in the late 18th century held that each planet was populated by intelligent beings. However, except for those who followed Percival Lowell, the prevailing informed opinion in the early 20th century held that chances for extraterrestrial intelligent life were insignificant. The subject of extraterrestrial intelligent life is for many people a touchstone of their beliefs and desires. Some urgently desire evidence for extraterrestrial intelligence, and others equally fervently deny the possibility of its existence. The subject should be approached in as unbiased a frame of mind as possible. The probability of advanced technical civilizations in the Milky Way Galaxy depends on many controversial issues.</p>
</div>
</div>
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
 
  </div>

  <div class="rightcolumn">
    <div class="card">
   
  <h2>Key Qutcomes Of this research:</h2>
<p>1) Learning how Earth as a resource has to be utilised effectively<br></br>2) Information about how different countries are trying to find other habitable planets<br></br>3) Learning about the essential resources required to form life</p>

  
</div>

     <div class="card">
      <h3>Webites Used</h3>
      <p><b><a class="one" href="https://www.britannica.com/science/extraterrestrial-life/The-search-for-extraterrestrial-life" target="_blank">www.britannica.com</a></b></p>
    
    </div>
<div class="card">
      <h3>Popular posts</h3>
    <p><b><a class="one" href=https://www.nasa.gov/news/releases/latest/index.html" target="_blank">Latest NASA News</a></b></p>
<p><b><a class="one" href=https://www.nature.com/news" target="_blank">Latest Nature News</a></b></p>
 <p><b><a class="one" href=https://www.downtoearth.org.in/" target="_blank">Latest Weather News</a></b></p>
  </div>
<div class="card">
      <p>If you like what you see, please click on the like button</p>
    
 <button class="btn" id="green"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></button>
  <button class="btn" id="red"><i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i></button>
  </div>
<script src="hello.js"></script>
<div class="card">
<img
      align="right"
      src="solar.gif"
      height="300px"
      width="310px">
</div>
<div class="card">
<div class="card">
.
</div>
<img
      align="right"
      src="mars.gif"
      height="550px"
      width="310px">
</div>
</div>
</div>
<div class="card">
      <h2>Appreciating Our Home Planet</h2>
       <p >Regardless of the possibilities of finding another habitable world, Earth remains our only home. It is crucial that we recognize our responsibility to protect and preserve Earth for future generations. Through sustainable practices, conservation efforts, and a shift towards renewable energy sources, we can work towards ensuring a brighter future for our only planet. Appreciating and protecting the delicate balance of ecosystems that make our planet livable is essential. Preserving the environment, combating climate change, and promoting sustainable practices are crucial for the well-being of future generations.</p>

  <p >In conclusion, while the search for another home beyond Earth is ongoing, our planet is currently the only known place in the vastness of the universe where life thrives. Let us cherish and safeguard our unique home, as we continue to explore the mysteries of the cosmos.</p>
  </div>
<div class="footer">
  <h2>&copy; 2023 Earth-Our Home Planet. All rights reserved.</h2>
</div>

</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
document.body.style.backgroundColor = "white";
}
</script>

</body>
</html>