<?php
session_start();

include 'connect.php';

if (!isset($_SESSION['logged']) || $_SESSION['logged'] != "logged") {
  header("Location: login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pinoy Olympians</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" href="assets/Icon.png" type="image/x-icon">
  <style>
    :root {
      --olympic-blue: #5eb7e7;
      --olympic-orange: #e9a67f;
      --olympic-black: #000000;
      --olympic-green: #5ddf9c;
      --olympic-yellow: #d9db6e;
      --olympic-gray: #747272;
    }

    .hero-section {
      background-image: url('assets/bg.png');
      color: white;
      padding: 150px 0;
      text-align: center;
    }

    .navbar {
      background-color: var(--olympic-gray) !important;
    }

    .navbar-brand,
    .nav-link {
      color: white !important;
    }

    .nav-link:hover {
      color: var(--olympic-yellow) !important;
    }


    /* Timeline Section */
    .timeline-section {
      padding: 80px 0;
    }

    .timeline {
      position: relative;
      max-width: 800px;
      margin: 0 auto;
    }

    .timeline::before {
      content: '';
      position: absolute;
      top: 0;
      bottom: 0;
      width: 4px;
      background-color: var(--olympic-blue);
      left: 50%;
      margin-left: -2px;
    }

    .timeline-item {
      padding: 20px 40px;
      position: relative;
      width: 50%;
    }

    .timeline-item.left {
      left: 0;
    }

    .timeline-item.right {
      left: 50%;
    }

    .timeline-item::after {
      content: '';
      position: absolute;
      width: 20px;
      height: 20px;
      background-color: var(--olympic-orange);
      border: 4px solid var(--olympic-yellow);
      top: 20px;
      border-radius: 50%;
      z-index: 1;
    }

    .timeline-item.left::after {
      right: -10px;
    }

    .timeline-item.right::after {
      left: -10px;
    }

    .timeline-content {
      background-color: #f8f9fa;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .timeline-content h3 {
      color: var(--olympic-blue);
    }

    @media (max-width: 768px) {
      .timeline::before {
        left: 20px;
      }

      .timeline-item {
        width: 100%;
        padding-left: 70px;
        padding-right: 20px;
      }

      .timeline-item.left,
      .timeline-item.right {
        left: 0;
      }

      .timeline-item::after {
        left: 10px;
      }
    }

    /* Featured Olympians Section */
    .featured-olympians {
      padding: 80px 0;
      background-color: #f8f9fa;
    }

    .featured-olympians .card {
      border: none;
      transition: transform 0.3s;
    }

    .featured-olympians .card:hover {
      transform: translateY(-10px);
    }

    .featured-olympians .card-title {
      color: black;
    }

    .featured-olympians .btn-primary {
      background-color: var(--olympic-orange);
      border: none;
    }

    .featured-olympians .btn-primary:hover {
      background-color: var(--olympic-blue);
    }

    /* Olympic Games History Section */
    .games-history {
      padding: 80px 0;
    }

    .games-history h2 {
      color: var(--olympic-black);
    }

    /* Gallery Section */
    .gallery-section {
      padding: 80px 0;
      background-color: #f8f9fa;
    }

    .gallery-section img {
      border-radius: 10px;
      transition: transform 0.3s;
    }

    .gallery-section img:hover {
      transform: scale(1.05);
    }

    /* Contact Section */
    .contact-section {
      padding: 80px 0;
    }

    .contact-section .btn-primary {
      background-color: var(--olympic-orange);
      border: none;
    }

    .contact-section .btn-primary:hover {
      background-color: var(--olympic-green);
    }

    /* Footer */
    footer {
      color: black;
      padding: 20px 0;
      text-align: center;
    }
  </style>
</head>

<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Tatak Pilipino</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#timeline">Timeline</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#featured">Featured</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#history">History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery">Gallery</a>
          </li>
          <li class="nav-item">
            <form action="logout.php" method="post" onsubmit="return confirm('Are you sure you want to log out?');">
              <button type="submit" class="btn">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="container">
      <h1 class="display-4">Pilipinong Olympian</h1>
      <p class="lead">Explore the journey of legendary Olympians through history.</p>
    </div>
  </section>

  <!-- Timeline Section -->
  <section id="timeline" class="timeline-section">
    <div class="container">
      <h2 class="text-center mb-5">Pilipino Olympics Timeline</h2>
      <div class="timeline">
        <div class="timeline-item left">
          <div class="timeline-content">
            <h3>1996: Mansueto "Onyok" Velasco</h3>
            <p>Nagwagi ng silver medal sa men’s light flyweight boxing sa Atlanta Olympics.</p>
          </div>
        </div>
        <div class="timeline-item right">
          <div class="timeline-content">
            <h3>2016: Hidilyn Diaz</h3>
            <p>Nakapag-uwi ng silver medal sa women's 53kg weightlifting sa Rio de Janeiro Olympics,
              ang unang Olympic medalya ng Pilipinas sa weightlifting.</p>
          </div>
        </div>
        <div class="timeline-item left">
          <div class="timeline-content">
            <h3>2021: Hidilyn Diaz</h3>
            <p>Naging kauna-unahang Pilipinong nagwagi ng gold medal sa Tokyo Olympics sa women's 55kg weightlifting,
              nagtala ng makasaysayang tagumpay para sa bansa.</p>
          </div>
        </div>
        <div class="timeline-item right">
          <div class="timeline-content">
            <h3>2024: Carlos Yulo</h3>
            <p>Naging kauna-unahang Pilipinong nagkamit ng dalawang gold medals sa isang Olympics,
              nanalo sa men's floor exercise at vault sa Paris Olympics. </p>
          </div>
        </div>
        <div class="timeline-item left">
          <div class="timeline-content">
            <h3>2024: Mga Medalya sa Boxing</h3>
            <p> Aira Villegas ang nakakuha ng bronze medal sa women's flyweight boxing sa Paris Olympics at si
              Nesthy Petacio naman ay muling nagwagi ng bronze medal sa women's featherweight boxing sa parehong
              Olympics.
            </p>
          </div>
        </div>
        <div class="timeline-item right">
          <div class="timeline-content">
            <h3>2025: Pagkilala kay Carlos Yulo</h3>
            <p>Pinarangalan bilang Athlete of the Year ng Philippine Sportswriters Association para sa kanyang dalawang
              gintong medalya sa 2024 Paris Olympics at iba pang tagumpay sa gymnastics.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Olympians Section -->
  <section id="featured" class="featured-olympians">
    <div class="container">
      <h2 class="text-center mb-5">Featured Olympians</h2>
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <img src="assets/Mansueto.png" class="card-img-top" alt="Mansueto">
            <div class="card-body">
              <h5 class="card-title">Mansueto "Onyok" Velasco</h5>
              <p class="card-text">Nagwagi ng silver medal sa men’s light flyweight boxing sa Atlanta Olympics.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="assets/Villegas.png" class="card-img-top" alt="Villegas">
            <div class="card-body">
              <h5 class="card-title">Aira Villegas</h5>
              <p class="card-text"> Ang nakakuha ng bronze medal sa women's flyweight boxing sa Paris Olympics </p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="assets/Diaz.png" class="card-img-top" alt="Diaz">
            <div class="card-body">
              <h5 class="card-title">Hidilyn Diaz</h5>
              <p class="card-text">Naging kauna-unahang Pilipinong nagwagi ng gold medal sa Tokyo Olympics.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Olympic Games History Section -->
  <section id="history" class="games-history">
    <div class="container">
      <h2 class="text-center mb-5">Olympic Games History</h2>
      <div class="row">
        <div class="col-md-6">
          <p>The Olympics have become a platform for inspiring stories of perseverance, determination, and breaking
            barriers, as athletes from diverse backgrounds strive to achieve greatness. They highlight the importance of
            sportsmanship and mutual respect, transcending political, cultural, and social differences. Over the years,
            the Games have
            introduced new sports, embraced gender equality, and utilized advanced technology to enhance the experience
            for both athletes and spectators. Beyond the competition, the Olympics leave a lasting legacy in host cities
            through infrastructure development and cultural impact, cementing their role as a celebration of human
            achievement and unity.</p>
        </div>
        <div class="col-md-6">
          <img src="assets/histo.jpg" class="img-fluid" alt="Olympic Games History">
        </div>
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  <section id="gallery" class="gallery-section">
    <div class="container">
      <h2 class="text-center mb-5">Iconic Olympic Moments</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <img src="assets/Diaz.png" class="img-fluid" alt="Diaz">
        </div>
        <div class="col-md-4 mb-4">
          <img src="assets/Yulo.png" class="img-fluid" alt="Yulo">
        </div>
        <div class="col-md-4 mb-4">
          <img src="assets/Petacio.png" class="img-fluid" alt="Petacio">
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="contact-section">
    <div class="container">
      <h2 class="text-center mb-5">Contact Us</h2>
      <form>
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">Message</label>
          <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <p>&copy; Pinoy Olympian 2025. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>