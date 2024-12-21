<?php
include("connect.php");
include("classes.php");

$islandsQuery = "
    SELECT 
        ip.islandOfPersonalityID, 
        ip.name, 
        ip.shortDescription, 
        ip.longDescription, 
        ip.image, 
        ip.color 
    FROM islandsofpersonality ip
    WHERE ip.status = 'active'
";
$islandsResult = executeQuery($islandsQuery);

$islands = [];
while ($row = mysqli_fetch_assoc($islandsResult)) {
    $island = new Island(
        $row['name'],
        $row['shortDescription'],
        $row['longDescription'],
        $row['image'],
        $row['color']
    );

    // Fetch island contents
    $contentsQuery = "
        SELECT 
            ic.image, 
            ic.content AS description 
        FROM islandcontents ic
        WHERE ic.islandOfPersonalityID = " . intval($row['islandOfPersonalityID']);
    $contentsResult = executeQuery($contentsQuery);

    while ($content = mysqli_fetch_assoc($contentsResult)) {
        $island->addContent($content);
    }

    $islands[] = $island;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Thea's Inside Out!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="icon" href="assets/icon.png" type="image">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Raleway", sans-serif
        }

        body,
        html {
            height: 100%;
            line-height: 1.8;
        }

        /* Full height image header */
        .bgimg-1 {
            background-position: center;
            background-size: cover;
            background-image: url("assets/bgimg.png");
            min-height: 100%;
        }

        .w3-bar .w3-button {
            padding: 16px;
        }

        .gallery {
            padding: 50px 20px;
            text-align: center;

        }

        .gallery h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 40px;
        }

        .cards {
            margin: 20px;
            text-align: center;
            position: relative;
        }

        .cards img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 4px solid #ff6600;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .cards h5 {
            font-size: 1.2rem;
            font-weight: bold;
            color: #ff6600;
        }

        .cards p {
            font-size: 1rem;
            color: dark;
            margin-top: 10px;
            text-align: left;
        }

        .cards img:hover {
            transform: scale(1.1);
            box-shadow: 0px 4px 15px 0px rgba(255, 255, 255, 0.5);
        }

        .cards img[style*="border-color: yellow;"]:hover {
            box-shadow: 0px 4px 15px 0px rgba(255, 255, 0, 0.8);
        }

        .cards img[style*="border-color: purple;"]:hover {
            box-shadow: 0px 4px 15px 0px rgba(128, 0, 128, 0.8);
        }

        .cards img[style*="border-color: blue;"]:hover {
            box-shadow: 0px 4px 15px 0px rgba(0, 0, 255, 0.8);
        }

        .cards img[style*="border-color: red;"]:hover {
            box-shadow: 0px 4px 15px 0px rgba(255, 0, 0, 0.8);
        }

        .cards img[style*="border-color: green;"]:hover {
            box-shadow: 0px 4px 15px 0px rgba(0, 128, 0, 0.8);
        }

        .cards img[style*="border-color: orange;"]:hover {
            box-shadow: 0px 4px 15px 0px rgba(255, 165, 0, 0.8);
        }

        .cards img[style*="border-color: teal;"]:hover {
            box-shadow: 0px 4px 15px 0px rgba(0, 128, 128, 0.8);
        }

        .cards img[style*="border-color: pink;"]:hover {
            box-shadow: 0px 4px 15px 0px rgba(255, 105, 180, 0.8);
        }

        .cards img[style*="border-color: gray;"]:hover {
            box-shadow: 0px 4px 15px 0px rgba(169, 169, 169, 0.8);
        }
    </style>
</head>

<body>
    <!-- Header with full-height image -->
    <header class="bgimg-1 w3-display-container" id="home">
        <div class="w3-display-bottomleft w3-text- w3-large" style="padding:24px 48px">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
    </header>

    <!-- Team Section -->
    <div class="w3-container" style="padding:128px 16px" id="team">
        <h3 class="w3-center">Core Memories</h3>
        <p class="w3-center w3-large">Memories brings back</p>
        <div class="w3-row-padding" style="margin-top:64px">
            <?php
            foreach ($islands as $island) {
                echo $island->generateCard();
            }
            ?>
            <!-- <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="/w3images/team2.jpg" alt="John" style="width:100%">
        <div class="w3-container">
          <h3>John Doe</h3>
          <p class="w3-opacity">CEO & Founder</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="/w3images/team1.jpg" alt="Jane" style="width:100%">
        <div class="w3-container">
          <h3>Anja Doe</h3>
          <p class="w3-opacity">Art Director</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="/w3images/team3.jpg" alt="Mike" style="width:100%">
        <div class="w3-container">
          <h3>Mike Ross</h3>
          <p class="w3-opacity">Web Designer</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div>
    </div>
    <div class="w3-col l3 m6 w3-margin-bottom">
      <div class="w3-card">
        <img src="/w3images/team4.jpg" alt="Dan" style="width:100%">
        <div class="w3-container">
          <h3>Dan Star</h3>
          <p class="w3-opacity">Designer</p>
          <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
          <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
        </div>
      </div> -->
        </div>
    </div>
    </div>

    <!-- Modal for full size images on click-->
    <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
        <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright"
            title="Close Modal Image">×</span>
        <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
            <img id="img01" class="w3-image">
            <p id="caption" class="w3-opacity w3-large"></p>
        </div>
    </div>

    <section class="gallery">
        <h2>Thea's Mood</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="cards">
                        <img src="assets/joy.png" alt="Joy" style="border-color: yellow;">
                        <h5 style="color: yellow;">Joy</h5>
                        <p>The enthusiastic and optimistic leader, focused on keeping Riley happy and upbeat.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cards">
                        <img src="assets/fear.png" alt="Fear" style="border-color: purple;">
                        <h5 style="color: purple;">Fear</h5>
                        <p>Cautious and anxious, protecting Riley by being aware of potential risks and dangers.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cards">
                        <img src="assets/sadness.png" alt="Sadness" style="border-color: blue;">
                        <h5 style="color: blue;">Sadness</h5>
                        <p>A thoughtful and empathetic emotion that helps Riley process and cope with sadness.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cards">
                        <img src="assets/anger.png" alt="Anger" style="border-color: red;">
                        <h5 style="color: red;">Anger</h5>
                        <p>A fiery and easily frustrated emotion, ensuring Riley stands up for herself and reacts to injustice.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cards">
                        <img src="assets/disgust.png" alt="Disgust" style="border-color: green;">
                        <h5 style="color: green;">Disgust</h5>
                        <p>Sharp, witty, and protective, helping Riley avoid things that are unpleasant or harmful.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cards">
                        <img src="assets/anxiety.png" alt="Anxiety" style="border-color: orange;">
                        <h5 style="color: orange;">Anxiety</h5>
                        <p>A worried emotion that always feels uneasy and tries to anticipate potential problems or threats.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cards">
                        <img src="assets/envy.png" alt="Envy" style="border-color: teal;">
                        <h5 style="color: teal;">Envy</h5>
                        <p>A jealous emotion that makes Riley compare herself to others, wanting what others have.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cards">
                        <img src="assets/embarassment.png" alt="Embarassment" style="border-color: pink;">
                        <h5 style="color: pink;">Embarassment</h5>
                        <p>A self-conscious emotion that makes Riley feel awkward or ashamed in social situations.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cards">
                        <img src="assets/boredom.png" alt="Boredom" style="border-color: gray;">
                        <h5 style="color: gray;">Boredom</h5>
                        <p>A disengaged emotion that arises when Riley feels unstimulated or uninterested in her surroundings.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="w3-center w3-black w3-padding-64">
        <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
        <div class="w3-xlarge w3-section">
            <i class="fa fa-facebook-official w3-hover-opacity"></i>
            <i class="fa fa-instagram w3-hover-opacity"></i>
            <i class="fa fa-snapchat w3-hover-opacity"></i>
            <i class="fa fa-pinterest-p w3-hover-opacity"></i>
            <i class="fa fa-twitter w3-hover-opacity"></i>
            <i class="fa fa-linkedin w3-hover-opacity"></i>
        </div>
        <p>All Right Reserved 2024<a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank"
                class="#"></a></p>
    </footer>

    <script>
        // Modal Image Gallery
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
            var captionText = document.getElementById("caption");
            captionText.innerHTML = element.alt;
        }


        // Toggle between showing and hiding the sidebar when clicking the menu icon
        var mySidebar = document.getElementById("mySidebar");

        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
            } else {
                mySidebar.style.display = 'block';
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>