<?php 
  include '../../include/header.php'; 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Fluxo Vital</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="shortcut icon" href="/fluxovital/assets/images/logo_fluxovital.png" type="image/x-icon" />
  <link rel="stylesheet" href="/fluxovital/assets/css/style.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

    :root {
      --primary-red: #9d040e;
      --dark-red: #7B1B1B;
      --deep-red: #6B0000;
      --light-pink: #FFF5F7;
      --cream: #FFFBF7;
      --text-dark: #1A1A1A;
      --text-gray: #6B7280;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(180deg, #FFFFFF 0%, var(--light-pink) 100%);
      color: var(--text-dark);
      overflow-x: hidden;
    }

    .navbar-premium {
      background: linear-gradient(135deg, #9d040e 0%, #7B1B1B 100%);
      padding: 1rem 0;
      box-shadow: 0 10px 40px rgba(157, 4, 14, 0.4);
      position: sticky;
      top: 0;
      z-index: 1000;
      border-bottom: 4px solid #9d040e;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .navbar-premium.scrolled {
      padding: 0.7rem 0;
      box-shadow: 0 8px 30px rgba(157, 4, 14, 0.5);
    }

    .navbar-premium .container {
      position: relative;
    }

    .navbar-premium .navbar-brand {
      color: white !important;
      font-weight: 900;
      font-size: 1.8rem;
      display: flex;
      align-items: center;
      gap: 15px;
      transition: all 0.3s ease;
      letter-spacing: -0.5px;
    }

    .navbar-premium .navbar-brand:hover {
      transform: translateX(5px) scale(1.05);
      filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.5));
    }

    .navbar-premium .navbar-brand img {
      height: 50px;
      filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.3));
      transition: all 0.4s ease;
    }

    .navbar-premium .navbar-brand:hover img {
      transform: scale(1.08);
    }


    .navbar-premium .nav-link {
      color: rgba(255, 255, 255, 0.95) !important;
      font-weight: 600;
      font-size: 1rem;
      padding: 0.8rem 1.5rem !important;
      margin: 0 0.2rem;
      border-radius: 50px;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
    }

    .navbar-premium .nav-link::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 0;
      height: 100%;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50px;
      transition: width 0.3s ease;
      z-index: -1;
    }

    .navbar-premium .nav-link:hover::before {
      width: 100%;
    }

    .navbar-premium .nav-link:hover {
      color: white !important;
      transform: translateY(-2px);
    }

    /* Dropdown Menu */
    .navbar-premium .dropdown-menu {
      background: linear-gradient(135deg, #7B1B1B 0%, #6B0000 100%);
      border: none;
      border-radius: 20px;
      padding: 1.2rem;
      margin-top: 1rem;
      box-shadow: 0 15px 50px rgba(0, 0, 0, 0.5);
      animation: fadeInDown 0.3s ease;
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .navbar-premium .dropdown-item {
      color: white;
      padding: 1rem 1.5rem;
      border-radius: 15px;
      font-weight: 500;
      transition: all 0.3s ease;
      margin-bottom: 0.5rem;
    }

    .navbar-premium .dropdown-item:last-child {
      margin-bottom: 0;
    }

    .navbar-premium .dropdown-item:hover {
      background: rgba(255, 255, 255, 0.2);
      color: white;
      transform: translateX(10px);
      padding-left: 2rem;
    }

    .navbar-premium .dropdown-item i {
      margin-right: 10px;
      font-size: 1.1rem;
    }

    /* Botão de Login */
    .btn-login-premium {
      background: white;
      color: #9d040e !important;
      padding: 0.8rem 2rem;
      border-radius: 50px;
      font-weight: 700;
      font-size: 1rem;
      border: 3px solid white;
      transition: all 0.3s ease;
      box-shadow: 0 5px 20px rgba(255, 255, 255, 0.3);
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .btn-login-premium:hover {
      background: transparent;
      color: white !important;
      border-color: white;
      transform: translateY(-3px);
      box-shadow: 0 8px 30px rgba(255, 255, 255, 0.5);
    }

    .navbar-toggler {
      border: 2px solid white;
      padding: 0.5rem 0.8rem;
      transition: all 0.3s ease;
    }

    .navbar-toggler:hover {
      transform: scale(1.1);
      box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
    }

    .navbar-toggler-icon {
      filter: brightness(0) invert(1);
    }

    .hero-banner-full {
      width: 100%;
      height: 600px;
      position: relative;
      overflow: hidden;
      margin: 0;
    }

    .hero-banner-full::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(135deg, rgba(157, 4, 14, 0.2) 0%, rgba(123, 27, 27, 0.3) 100%);
      z-index: 1;
      pointer-events: none;
    }

    .carousel-item {
      height: 600px;
    }

    .carousel-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(0.85);
    }

    .carousel-control-prev,
    .carousel-control-next {
      width: 70px;
      height: 70px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 50%;
      top: 50%;
      transform: translateY(-50%);
      opacity: 0;
      transition: all 0.4s ease;
      z-index: 2;
    }

    .hero-banner-full:hover .carousel-control-prev,
    .hero-banner-full:hover .carousel-control-next {
      opacity: 1;
    }

    .carousel-control-prev {
      left: 30px;
    }

    .carousel-control-next {
      right: 30px;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
      transform: translateY(-50%) scale(1.1);
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      filter: invert(1);
      width: 30px;
      height: 30px;
    }

    .carousel-indicators {
      bottom: 30px;
      z-index: 2;
    }

    .carousel-indicators button {
      width: 15px;
      height: 15px;
      border-radius: 50%;
      border: 3px solid white;
      background: transparent;
      margin: 0 8px;
      transition: all 0.3s ease;
    }

    .carousel-indicators button.active {
      background: white;
      width: 50px;
      border-radius: 10px;
    }


    .main-wrapper {
      max-width: 1400px;
      margin: 0 auto;
      padding: 5rem 2rem;
    }

    .section-intro {
      text-align: center;
      margin-bottom: 5rem;
    }

    .badge-label {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      color: white;
      padding: 0.7rem 1.8rem;
      border-radius: 50px;
      font-size: 0.9rem;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 1.5rem;
      box-shadow: 0 8px 25px rgba(157, 4, 14, 0.3);
    }

    .main-title {
      font-size: 3.5rem;
      font-weight: 900;
      color: var(--text-dark);
      margin-bottom: 1.5rem;
      line-height: 1.1;
      letter-spacing: -1px;
    }

    .main-title .gradient-text {
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .main-description {
      font-size: 1.25rem;
      color: var(--text-gray);
      max-width: 800px;
      margin: 0 auto;
      line-height: 1.8;
    }

    .cards-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
      gap: 2.5rem;
      margin-bottom: 6rem;
    }

    .card-donation {
      background: white;
      border-radius: 30px;
      padding: 3rem;
      position: relative;
      overflow: hidden;
      transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      box-shadow: 0 15px 50px rgba(0, 0, 0, 0.08);
      border: 3px solid transparent;
    }

    .card-donation::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 8px;
      background: var(--primary-red);
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.5s ease;
    }

    .card-donation:hover {
      transform: translateY(-20px);
      box-shadow: 0 30px 70px rgba(157, 4, 14, 0.25);
      border-color: var(--primary-red);
    }

    .card-donation:hover::before {
      transform: scaleX(1);
    }

    .icon-circle {
      width: 120px;
      height: 120px;
      margin: 0 auto 2rem;
      background: linear-gradient(135deg, rgba(157, 4, 14, 0.1), rgba(157, 4, 14, 0.05));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      transition: all 0.5s ease;
    }

    .icon-circle::after {
      content: '';
      position: absolute;
      inset: -5px;
      background: var(--primary-red);
      border-radius: 50%;
      z-index: -1;
      opacity: 0;
      transition: opacity 0.5s ease;
    }

    .card-donation:hover .icon-circle {
      transform: scale(1.15);
    }

    .card-donation:hover .icon-circle::after {
      opacity: 0.3;
    }

    .icon-circle i {
      font-size: 3.5rem;
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      transition: transform 0.3s ease;
    }

    .card-donation:hover .icon-circle i {
      transform: scale(1.1);
    }

    .card-title-main {
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--text-dark);
      margin-bottom: 1.2rem;
      text-align: center;
    }

    .card-description {
      color: var(--text-gray);
      line-height: 1.8;
      text-align: center;
      margin-bottom: 2.5rem;
      font-size: 1.05rem;
    }

    .btn-card-action {
      display: block;
      width: 100%;
      padding: 1.2rem;
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      color: white;
      border: none;
      border-radius: 20px;
      font-weight: 700;
      font-size: 1.1rem;
      cursor: pointer;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(157, 4, 14, 0.3);
      text-decoration: none;
      text-align: center;
    }

    .btn-card-action::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.3);
      transform: translate(-50%, -50%);
      transition: width 0.6s ease, height 0.6s ease;
    }

    .btn-card-action:hover::before {
      width: 400px;
      height: 400px;
    }

    .btn-card-action:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 40px rgba(157, 4, 14, 0.5);
      color: white;
    }

    .btn-card-action span {
      position: relative;
      z-index: 1;
    }

    .elegant-divider {
      margin: 6rem auto;
      text-align: center;
      position: relative;
      max-width: 800px;
    }

    .divider-line {
      height: 3px;
      background: linear-gradient(90deg, transparent, var(--primary-red) 30%, var(--primary-red) 70%, transparent);
      position: relative;
    }

    .divider-heart {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 80px;
      height: 80px;
      background: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 40px rgba(157, 4, 14, 0.3);
      border: 4px solid var(--primary-red);
    }

    .divider-heart i {
      font-size: 2rem;
      color: var(--primary-red);
      animation: pulse-heart 1.5s infinite;
    }

    @keyframes pulse-heart {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.2); }
    }

    .resources-section {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 2.5rem;
    }

    .resource-card {
      background: linear-gradient(135deg, white 0%, var(--light-pink) 100%);
      padding: 2.5rem;
      border-radius: 25px;
      text-align: center;
      transition: all 0.4s ease;
      border: 3px solid transparent;
      position: relative;
      overflow: hidden;
    }

    .resource-card::after {
      content: '';
      position: absolute;
      top: -100%;
      left: -100%;
      width: 300%;
      height: 300%;
      background: radial-gradient(circle, rgba(157, 4, 14, 0.15) 0%, transparent 60%);
      transition: all 0.6s ease;
    }

    .resource-card:hover::after {
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .resource-card:hover {
      transform: translateY(-15px) scale(1.02);
      border-color: var(--primary-red);
      box-shadow: 0 25px 60px rgba(157, 4, 14, 0.2);
    }

    .resource-icon-box {
      width: 100px;
      height: 100px;
      margin: 0 auto 1.5rem;
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      border-radius: 25px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.5s ease;
      position: relative;
      z-index: 1;
      box-shadow: 0 10px 30px rgba(157, 4, 14, 0.3);
    }

    .resource-card:hover .resource-icon-box {
      transform: scale(1.1);
    }

    .resource-icon-box i {
      color: white;
      font-size: 2.5rem;
    }

    .resource-title {
      font-size: 1.6rem;
      font-weight: 800;
      color: var(--text-dark);
      margin-bottom: 1rem;
      position: relative;
      z-index: 1;
    }

    .resource-description {
      color: var(--text-gray);
      line-height: 1.7;
      margin-bottom: 2rem;
      position: relative;
      z-index: 1;
      font-size: 1.05rem;
    }

    .btn-resource-action {
      display: inline-block;
      padding: 1rem 2.5rem;
      background: var(--primary-red);
      color: white;
      border-radius: 50px;
      font-weight: 700;
      text-decoration: none;
      transition: all 0.3s ease;
      position: relative;
      z-index: 1;
      box-shadow: 0 8px 25px rgba(157, 4, 14, 0.3);
    }

    .btn-resource-action:hover {
      background: var(--dark-red);
      color: white;
      transform: scale(1.08);
      box-shadow: 0 12px 35px rgba(157, 4, 14, 0.4);
    }

    .footer-luxury {
      background: linear-gradient(135deg, #0D0D0D 0%, #1A1A1A 50%, #0D0D0D 100%);
      color: #E0E0E0;
      padding: 5rem 0 2rem;
      position: relative;
      overflow: hidden;
    }

    .footer-luxury::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 6px;
      background: var(--primary-red);
    }

    .footer-luxury::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: radial-gradient(circle at 20% 50%, rgba(157, 4, 14, 0.05) 0%, transparent 50%),
                  radial-gradient(circle at 80% 50%, rgba(157, 4, 14, 0.03) 0%, transparent 50%);
      pointer-events: none;
    }

    .footer-container {
      max-width: 1400px;
      margin: 0 auto;
      padding: 0 2rem;
      position: relative;
      z-index: 1;
    }

    .footer-columns {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 4rem;
      margin-bottom: 4rem;
    }

    .footer-column h5 {
      font-size: 1.4rem;
      font-weight: 800;
      color: white;
      margin-bottom: 2rem;
      position: relative;
      padding-bottom: 1rem;
    }

    .footer-column h5::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 60px;
      height: 4px;
      background: var(--primary-red);
      border-radius: 2px;
    }

    .footer-text {
      line-height: 1.9;
      color: #B8B8B8;
      margin-bottom: 2rem;
      font-size: 0.95rem;
    }

    .footer-info {
      display: flex;
      align-items: flex-start;
      gap: 15px;
      margin-bottom: 1.2rem;
      color: #B8B8B8;
      transition: all 0.3s ease;
    }

    .footer-info:hover {
      color: var(--primary-red);
      transform: translateX(8px);
    }

    .footer-info i {
      width: 28px;
      color: var(--primary-red);
      font-size: 1.2rem;
      margin-top: 3px;
    }

    .footer-menu {
      list-style: none;
      padding: 0;
    }

    .footer-menu li {
      margin-bottom: 1rem;
    }

    .footer-menu a {
      color: #B8B8B8;
      text-decoration: none;
      transition: all 0.3s ease;
      display: inline-block;
      position: relative;
      font-weight: 500;
    }

    .footer-menu a::before {
      content: '▸';
      position: absolute;
      left: -25px;
      opacity: 0;
      transition: all 0.3s ease;
      color: var(--primary-red);
      font-size: 1.2rem;
    }

    .footer-menu a:hover {
      color: var(--primary-red);
      padding-left: 25px;
    }

    .footer-menu a:hover::before {
      opacity: 1;
      left: 0;
    }

    .contact-form-box {
      background: rgba(255, 255, 255, 0.05);
      padding: 2.5rem;
      border-radius: 20px;
      border: 2px solid rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(15px);
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    .form-label {
      color: white;
      font-weight: 600;
      margin-bottom: 0.7rem;
      display: block;
      font-size: 0.95rem;
    }

    .form-input {
      width: 100%;
      padding: 1rem;
      background: rgba(255, 255, 255, 0.08);
      border: 2px solid rgba(255, 255, 255, 0.15);
      border-radius: 12px;
      color: white;
      transition: all 0.3s ease;
      font-size: 0.95rem;
    }

    .form-input:focus {
      outline: none;
      background: rgba(255, 255, 255, 0.12);
      border-color: var(--primary-red);
      box-shadow: 0 0 0 4px rgba(157, 4, 14, 0.2);
    }

    .form-input::placeholder {
      color: rgba(255, 255, 255, 0.4);
    }

    .btn-submit {
      width: 100%;
      padding: 1.2rem;
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      color: white;
      border: none;
      border-radius: 12px;
      font-weight: 700;
      font-size: 1.05rem;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 8px 25px rgba(157, 4, 14, 0.4);
    }

    .btn-submit:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(157, 4, 14, 0.5);
    }

    .footer-end {
      text-align: center;
      padding-top: 3rem;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      color: #909090;
      font-size: 0.95rem;
    }

    .footer-end strong {
      color: var(--primary-red);
      font-weight: 700;
    }

    @media (max-width: 992px) {
      .main-title {
        font-size: 2.5rem;
      }

      .cards-grid,
      .resources-section {
        grid-template-columns: 1fr;
      }

      .hero-banner-full,
      .carousel-item {
        height: 400px;
      }

      .navbar-premium .nav-link {
        padding: 0.7rem 1rem !important;
        margin: 0.3rem 0;
      }

      .navbar-premium .dropdown-menu {
        background: rgba(123, 27, 27, 0.98);
        border-radius: 15px;
        margin-top: 0.5rem;
      }

      .btn-login-premium {
        width: 100%;
        justify-content: center;
        margin-top: 1rem;
      }
    }

    @media (max-width: 768px) {
      .main-wrapper {
        padding: 3rem 1rem;
      }

      .main-title {
        font-size: 2rem;
      }

      .hero-banner-full,
      .carousel-item {
        height: 300px;
      }

      .navbar-premium .navbar-brand {
        font-size: 1.5rem;
      }

      .navbar-premium .navbar-brand img {
        height: 40px;
      }

      .navbar-premium .nav-link {
        font-size: 0.95rem;
      }
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-premium">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="/fluxovital/assets/images/logo1.png" alt="Logo" />
        <strong>Fluxo Vital</strong>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
              <i class="bi bi-heart-pulse me-2"></i>Doações
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/fluxovital/page/home/sangue.php"><i class="fa-solid fa-droplet"></i>Doação de Sangue</a></li>
              <li><a class="dropdown-item" href="/fluxovital/page/home/medula.php"><i class="fa-solid fa-bone"></i>Doação de Médula Óssea</a></li>
              <li><a class="dropdown-item" href="/fluxovital/page/home/materno.php"><i class="fa-solid fa-baby"></i>Doação de Leite Materno</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-megaphone me-2"></i>Campanhas</a></li>
          <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-file-earmark-bar-graph me-2"></i>Relatórios</a></li>
          <li class="nav-item">
            <a href="/fluxovital/page/cadastro/tipos_cadastros.php" class="btn-login-premium ms-lg-3 mt-2 mt-lg-0">
              <i class="bi bi-box-arrow-in-right"></i>
              <span>Entrar</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="hero-banner-full">
    <div id="carouselBanners" class="carousel slide carousel-fade h-100" data-bs-ride="carousel" data-bs-interval="5000">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselBanners" data-bs-slide-to="2"></button>
      </div>
      <div class="carousel-inner h-100">
        <div class="carousel-item active">
          <img src="/fluxovital/assets/images/1.png" alt="Banner 1">
        </div>
        <div class="carousel-item">
          <img src="/fluxovital/assets/images/2.png" alt="Banner 2">
        </div>
        <div class="carousel-item">
          <img src="/fluxovital/assets/images/3.png" alt="Banner 3">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselBanners" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselBanners" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>

  <main class="main-wrapper">

    <section class="section-intro">
      <div class="badge-label">
        <i class="fa-solid fa-heart"></i>
        <span>Transforme Vidas</span>
      </div>
      <h1 class="main-title">
        Escolha Como <span class="gradient-text">Salvar Vidas</span>
      </h1>
      <p class="main-description">
        Conecte-se com instituições confiáveis e contribua para transformar histórias através da doação. 
        Cada gota de sangue, cada registro de médula, cada doação de leite materno pode salvar uma vida.
      </p>
    </section>

  
    <div class="cards-grid">
      <div class="card-donation">
        <div class="icon-circle">
          <i class="fa-solid fa-droplet"></i>
        </div>
        <h3 class="card-title-main">Doação de Sangue</h3>
        <p class="card-description">
          Conecte doadores e instituições para salvar vidas com segurança, agilidade e responsabilidade social.
        </p>
        <a href="/fluxovital/page/home/sangue.php" class="btn-card-action">
          <span>Acessar Agora</span>
        </a>
      </div>

      <div class="card-donation">
        <div class="icon-circle">
         <i class="fa-solid fa-bone"></i>
        </div>
        <h3 class="card-title-main">Doação de Médula Óssea</h3>
        <p class="card-description">
          Cadastre-se como doador e ofereça esperança para pacientes que aguardam por um transplante compatível.
        </p>
        <a href="/fluxovital/page/home/medula.php" class="btn-card-action">
          <span>Acessar Agora</span>
        </a>
      </div>

      <div class="card-donation">
        <div class="icon-circle">
          <i class="fa-solid fa-baby"></i>
        </div>
        <h3 class="card-title-main">Doação de Leite Materno</h3>
        <p class="card-description">
          Ajude bebês prematuros e suas famílias doando leite materno com segurança e cuidado especializado.
        </p>
        <a href="/fluxovital/page/home/materno.php" class="btn-card-action">
          <span>Acessar Agora</span>
        </a>
      </div>
    </div>

    <div class="elegant-divider">
      <div class="divider-line"></div>
      <div class="divider-heart">
        <i class="fa-solid fa-heart"></i>
      </div>
    </div>

    <section class="section-intro">
      <div class="badge-label">
        <i class="fa-solid fa-stars"></i>
        <span>Explore Mais</span>
      </div>
      <h2 class="main-title">
        Outros <span class="gradient-text">Recursos</span>
      </h2>
      <p class="main-description">
        Descubra todas as funcionalidades da plataforma e faça parte dessa corrente do bem.
      </p>
    </section>

    <div class="resources-section">
      <div class="resource-card">
        <div class="resource-icon-box">
          <i class="fa-solid fa-bullhorn"></i>
        </div>
        <h3 class="resource-title">Campanhas</h3>
        <p class="resource-description">
          Fique por dentro das campanhas de incentivo à doação e participe ativamente de eventos que salvam vidas.
        </p>
        <a href="/fluxovital/page/home/categoria/campanhas.php" class="btn-resource-action">Acessar</a>
      </div>

      <div class="resource-card">
        <div class="resource-icon-box">
          <i class="fa-solid fa-chart-line"></i>
        </div>
        <h3 class="resource-title">Relatórios</h3>
        <p class="resource-description">
          Acesse relatórios detalhados, gráficos e estatísticas sobre as doações e o impacto no sistema de saúde.
        </p>
        <a href="/fluxovital/page/home/categoria/relatorio.php" class="btn-resource-action">Acessar</a>
      </div>

      <div class="resource-card">
        <div class="resource-icon-box">
          <i class="fa-solid fa-heart"></i>
        </div>
        <h3 class="resource-title">Vidas Salvas</h3>
        <p class="resource-description">
          Conheça histórias inspiradoras de pessoas que tiveram suas vidas transformadas através das doações.
        </p>
        <a href="/fluxovital/page/home/categoria/vidasalvas.php" class="btn-resource-action">Saiba Mais</a>
      </div>
    </div>

    <div class="elegant-divider" style="margin: 5rem auto;">
      <div class="divider-line"></div>
      <div class="divider-heart">
         <i class="fa-solid fa-heart"></i>
      </div>
    </div>

    <section class="section-intro">
      <div class="badge-label">
        <i class="fa-solid fa-question-circle"></i>
        <span>Informações Essenciais</span>
      </div>
      <h2 class="main-title">
        Por Que <span class="gradient-text">Doar?</span>
      </h2>
    </section>

    <div class="resources-section" style="margin-bottom: 3rem;">
      <div class="resource-card">
        <div class="resource-icon-box">
          <i class="fa-solid fa-baby"></i>
        </div>
        <h3 class="resource-title">Por que doar?</h3>
        <p class="resource-description">
          A doação é separada em tipo sanguíneo (ABO) e em fator Rh. Uma única doação pode salvar até quatro pessoas, já que o sangue é separado em componentes como hemácias, plaquetas, plasma e crioprecipitado.
        </p>
      </div>

      <div class="resource-card">
        <div class="resource-icon-box">
          <i class="fa-solid fa-procedures"></i>
        </div>
        <h3 class="resource-title">Quem pode receber?</h3>
        <p class="resource-description">
          Qualquer pessoa que precise de transfusão: vítimas de acidentes, pacientes com anemia severa, doenças crônicas, recém-nascidos, entre outros. O tipo sanguíneo precisa ser compatível com o doador.
        </p>
      </div>

      <div class="resource-card">
        <div class="resource-icon-box">
          <i class="fa-solid fa-hand-holding-heart"></i>
        </div>
        <h3 class="resource-title">Como se tornar doador?</h3>
        <p class="resource-description">
          Basta estar saudável, ter entre 16 e 69 anos, levar um documento com foto a um hemocentro. Depois você passa por uma triagem para garantir sua segurança e a de quem vai receber.
        </p>
      </div>
    </div>

  </main>

  <footer class="footer-luxury">
    <div class="footer-container">
      <div class="footer-columns">
        
  
        <div class="footer-column">
          <h5>Sistema Fluxo Vital</h5>
          <p class="footer-text">
            Um sistema de integrações entre usuários, doadores e instituições que auxilia no agendamento e 
            arquivação de doações, tornando o processo mais eficiente e acessível para todos.
          </p>
          <p class="footer-text">
            Expandindo gradativamente através da integração com instituições na capital do Maranhão, 
            contemplando toda a população e potencializando o fluxo de doações.
          </p>
          
          <div class="footer-info">
            <i class="bi bi-geo-alt-fill"></i>
            <span>Universidade CEUMA - Campus Renascença - São Luís - MA</span>
          </div>
          <div class="footer-info">
            <i class="bi bi-telephone-fill"></i>
            <span>(98) 98467-4013</span>
          </div>
          <div class="footer-info">
            <i class="bi bi-envelope-fill"></i>
            <span>contato@fluxovital.com.org</span>
          </div>
        </div>


        <div class="footer-column">
          <h5>Navegação</h5>
          <ul class="footer-menu">
            <li><a href="#">Institucional</a></li>
            <li><a href="#">Legislação</a></li>
            <li><a href="#">Unidades</a></li>
            <li><a href="#">Campanhas</a></li>
            <li><a href="#">Requisitos</a></li>
            <li><a href="#">Ouvidoria</a></li>
          </ul>
        </div>


        <div class="footer-column">
          <h5>Entre em Contato</h5>
          <div class="contact-form-box">
            <form>
              <div class="form-group">
                <label class="form-label">Nome</label>
                <input type="text" class="form-input" placeholder="Seu nome completo">
              </div>
              <div class="form-group">
                <label class="form-label">E-mail</label>
                <input type="email" class="form-input" placeholder="seu@email.com">
              </div>
              <div class="form-group">
                <label class="form-label">Telefone</label>
                <input type="tel" class="form-input" placeholder="(98) 98765-4321">
              </div>
              <div class="form-group">
                <label class="form-label">Mensagem</label>
                <textarea class="form-input" rows="3" placeholder="Escreva sua mensagem aqui..."></textarea>
              </div>
              <button type="submit" class="btn-submit">Enviar Mensagem</button>
            </form>
          </div>
        </div>

      </div>

      <div class="footer-end">
        2025 <strong>Fluxo Vital</strong> - Todos os direitos reservados | P.I - GPECOV
      </div>
    </div>
  </footer>

  <script>
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar-premium');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>

</body>
</html>
