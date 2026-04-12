<?php 
  include '../../include/header.php'; 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Fluxo Vital — Escolha sua Doação</title>

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
      --light-pink: #FFF5F7;
      --text-dark: #1A1A1A;
      --text-gray: #6B7280;
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(180deg, #FFFFFF 0%, var(--light-pink) 100%);
      color: var(--text-dark);
      overflow-x: hidden;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* ========== NAVBAR ========== */
    .navbar-premium {
      background: linear-gradient(135deg, #9d040e 0%, #7B1B1B 100%);
      padding: 1rem 0;
      box-shadow: 0 10px 40px rgba(157, 4, 14, 0.4);
      position: sticky;
      top: 0;
      z-index: 1000;
      border-bottom: 4px solid #9d040e;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      animation: slideDown 0.6s ease;
    }

    @keyframes slideDown {
      from { opacity: 0; transform: translateY(-100%); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .navbar-premium.scrolled {
      padding: 0.7rem 0;
      box-shadow: 0 8px 30px rgba(157, 4, 14, 0.5);
    }

    .navbar-premium .navbar-brand {
      color: white !important;
      font-weight: 900;
      font-size: 1.6rem;
      display: flex;
      align-items: center;
      gap: 12px;
      transition: all 0.3s ease;
      letter-spacing: -0.5px;
      text-decoration: none;
      animation: fadeInLeft 0.6s ease 0.2s both;
    }

    @keyframes fadeInLeft {
      from { opacity: 0; transform: translateX(-20px); }
      to   { opacity: 1; transform: translateX(0); }
    }

    .navbar-premium .navbar-brand:hover {
      transform: translateX(5px) scale(1.03);
      filter: drop-shadow(0 0 20px rgba(255,255,255,0.4));
    }

    .navbar-premium .navbar-brand img {
      height: 50px;
      width: auto;
      filter: drop-shadow(0 4px 12px rgba(0,0,0,0.3));
      transition: all 0.4s ease;
    }

    .navbar-premium .navbar-brand:hover img { transform: scale(1.08); }

    .logo-text { display: flex; flex-direction: column; line-height: 1.1; }
    .logo-main { font-size: 1.4rem; font-weight: 800; color: #fff; }
    .logo-sub  { font-size: 0.7rem; color: #ffccd0; letter-spacing: 0.08em; font-weight: 400; }

    .navbar-premium .nav-link {
      color: rgba(255,255,255,0.95) !important;
      font-weight: 600;
      font-size: 0.95rem;
      padding: 0.7rem 1.2rem !important;
      margin: 0 0.1rem;
      border-radius: 6px;
      transition: color 0.2s ease;
      position: relative;
    }

    .navbar-premium .nav-link::before { display: none; }

    .navbar-premium .nav-link::after {
      content: '';
      position: absolute;
      bottom: 4px;
      left: 1.2rem;
      right: 1.2rem;
      height: 2px;
      background: white;
      border-radius: 2px;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.25s ease;
    }

    .navbar-premium .nav-link:hover { color: white !important; }
    .navbar-premium .nav-link:hover::after { transform: scaleX(1); }

    .navbar-premium .nav-item { animation: fadeInDown 0.5s ease both; }
    .navbar-premium .nav-item:nth-child(1) { animation-delay: 0.2s; }
    .navbar-premium .nav-item:nth-child(2) { animation-delay: 0.3s; }
    .navbar-premium .nav-item:nth-child(3) { animation-delay: 0.4s; }
    .navbar-premium .nav-item:nth-child(4) { animation-delay: 0.5s; }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-10px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .btn-login-premium {
      background: white;
      color: #c90101 !important;
      padding: 0.7rem 1.8rem;
      border-radius: 50px;
      font-weight: 700;
      font-size: 0.95rem;
      border: 3px solid white;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      box-shadow: 0 5px 20px rgba(255,255,255,0.25);
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
    }

    .navbar-toggler {
      border: 2px solid rgba(255,255,255,0.8);
      padding: 0.45rem 0.7rem;
      transition: all 0.3s ease;
    }

    .navbar-toggler:focus { box-shadow: none; }
    .navbar-toggler:hover { transform: scale(1.08); border-color: white; }
    .navbar-toggler-icon { filter: brightness(0) invert(1); }

    @media (max-width: 991px) {
      .navbar-premium .navbar-collapse {
        background: #7B1B1B;
        border-radius: 16px;
        padding: 1rem;
        margin-top: 0.8rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.3);
      }
      .navbar-premium .nav-link {
        padding: 0.7rem 1rem !important;
        margin: 0.2rem 0;
        border-radius: 10px;
      }
      .btn-login-premium {
        width: 100%;
        justify-content: center;
        margin-top: 0.5rem;
      }
    }

    /* ========== BREADCRUMB ========== */
    .breadcrumb-bar {
      background: rgba(157,4,14,0.05);
      border-bottom: 1px solid rgba(157,4,14,0.1);
      padding: 0.8rem 0;
    }

    .breadcrumb-bar .container {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.88rem;
      color: var(--text-gray);
    }

    .breadcrumb-bar a {
      color: var(--primary-red);
      text-decoration: none;
      font-weight: 600;
      transition: opacity 0.2s;
    }

    .breadcrumb-bar a:hover { opacity: 0.75; }
    .breadcrumb-bar i { font-size: 0.7rem; color: var(--text-gray); }
    .breadcrumb-bar span { font-weight: 600; color: var(--text-dark); }

    /* ========== ESCOLHA DE CATEGORIA ========== */
    .category-wrapper {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 5rem 2rem;
    }

    .badge-label {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      color: white;
      padding: 0.65rem 1.6rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 700;
      letter-spacing: 1px;
      text-transform: uppercase;
      margin-bottom: 1.5rem;
      box-shadow: 0 8px 25px rgba(157,4,14,0.3);
    }

    .category-title {
      font-size: 3rem;
      font-weight: 900;
      color: var(--text-dark);
      margin-bottom: 1rem;
      line-height: 1.1;
      letter-spacing: -1px;
      text-align: center;
    }

    .category-title .gradient-text {
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .category-desc {
      font-size: 1.1rem;
      color: var(--text-gray);
      max-width: 580px;
      margin: 0 auto 4rem;
      line-height: 1.8;
      text-align: center;
    }

    .category-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2rem;
      width: 100%;
      max-width: 1000px;
    }

    /* Card base */
    .category-card {
      background: white;
      border-radius: 25px;
      padding: 2.8rem 2rem;
      text-align: center;
      border: 3px solid transparent;
      position: relative;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      box-shadow: 0 15px 50px rgba(0,0,0,0.07);
      animation: fadeInUp 0.6s ease both;
      text-decoration: none;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .category-card:nth-child(1) { animation-delay: 0.1s; }
    .category-card:nth-child(2) { animation-delay: 0.25s; }
    .category-card:nth-child(3) { animation-delay: 0.4s; }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(40px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .category-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 5px;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.4s ease;
      border-radius: 0;
    }

    /* Cores distintas por card */
    .card-blood::before   { background: linear-gradient(135deg, #c0392b, #922b21); }
    .card-marrow::before  { background: linear-gradient(135deg, #2980b9, #1a5276); }
    .card-milk::before    { background: linear-gradient(135deg, #e67e22, #b9770e); }

    .category-card:hover {
      transform: translateY(-14px);
      box-shadow: 0 30px 70px rgba(0,0,0,0.14);
    }

    .card-blood:hover  { border-color: #c0392b; }
    .card-marrow:hover { border-color: #2980b9; }
    .card-milk:hover   { border-color: #e67e22; }

    .category-card:hover::before { transform: scaleX(1); }

    /* Ícone */
    .cat-icon {
      width: 100px; height: 100px;
      margin: 0 auto 1.8rem;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.4s ease;
      position: relative;
    }

    .card-blood  .cat-icon { background: rgba(192,57,43,0.1); }
    .card-marrow .cat-icon { background: rgba(41,128,185,0.1); }
    .card-milk   .cat-icon { background: rgba(230,126,34,0.1); }

    .category-card:hover .cat-icon { transform: scale(1.1); }

    .cat-icon i { font-size: 2.8rem; }
    .card-blood  .cat-icon i { color: #c0392b; }
    .card-marrow .cat-icon i { color: #2980b9; }
    .card-milk   .cat-icon i { color: #e67e22; }

    /* Tag de requisito */
    .cat-tag {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 0.75rem;
      font-weight: 600;
      padding: 0.3rem 0.9rem;
      border-radius: 50px;
      margin-bottom: 1.2rem;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    .card-blood  .cat-tag { background: rgba(192,57,43,0.1);  color: #922b21; }
    .card-marrow .cat-tag { background: rgba(41,128,185,0.1); color: #1a5276; }
    .card-milk   .cat-tag { background: rgba(230,126,34,0.1); color: #b9770e; }

    .cat-title {
      font-size: 1.4rem;
      font-weight: 800;
      color: var(--text-dark);
      margin-bottom: 0.8rem;
    }

    .cat-desc {
      color: var(--text-gray);
      line-height: 1.7;
      font-size: 0.95rem;
      margin-bottom: 2rem;
      flex: 1;
    }

    /* Lista de requisitos */
    .cat-reqs {
      list-style: none;
      padding: 0;
      margin-bottom: 2rem;
      width: 100%;
      text-align: left;
    }

    .cat-reqs li {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.85rem;
      color: var(--text-gray);
      padding: 0.4rem 0;
      border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .cat-reqs li:last-child { border-bottom: none; }

    .cat-reqs li i { font-size: 0.75rem; min-width: 14px; }
    .card-blood  .cat-reqs li i { color: #c0392b; }
    .card-marrow .cat-reqs li i { color: #2980b9; }
    .card-milk   .cat-reqs li i { color: #e67e22; }

    /* Botão */
    .btn-cat {
      display: block;
      width: 100%;
      padding: 1rem;
      border: none;
      border-radius: 14px;
      font-weight: 700;
      font-size: 0.95rem;
      cursor: pointer;
      transition: all 0.3s ease;
      text-decoration: none;
      color: white;
      margin-top: auto;
    }

    .card-blood  .btn-cat { background: linear-gradient(135deg, #c0392b, #922b21); box-shadow: 0 8px 25px rgba(192,57,43,0.35); }
    .card-marrow .btn-cat { background: linear-gradient(135deg, #2980b9, #1a5276); box-shadow: 0 8px 25px rgba(41,128,185,0.35); }
    .card-milk   .btn-cat { background: linear-gradient(135deg, #e67e22, #b9770e); box-shadow: 0 8px 25px rgba(230,126,34,0.35); }

    .btn-cat:hover {
      color: white;
      transform: translateY(-3px);
      filter: brightness(1.08);
    }

    /* Voltar */
    .btn-back {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-top: 3rem;
      color: var(--text-gray);
      font-size: 0.9rem;
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s ease;
      border: none;
      background: none;
      cursor: pointer;
    }

    .btn-back:hover {
      color: var(--primary-red);
      transform: translateX(-4px);
    }

    @media (max-width: 900px) {
      .category-grid { grid-template-columns: 1fr; max-width: 420px; }
      .category-title { font-size: 2.2rem; }
    }

    @media (max-width: 576px) {
      .category-wrapper { padding: 3rem 1rem; }
      .category-title { font-size: 1.8rem; }
    }

    /* ========== RODAPÉ ========== */
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
      top: 0; left: 0; right: 0;
      height: 6px;
      background: var(--primary-red);
    }

    .footer-luxury::after {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 20% 50%, rgba(157,4,14,0.05) 0%, transparent 50%),
                  radial-gradient(circle at 80% 50%, rgba(157,4,14,0.03) 0%, transparent 50%);
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
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 3.5rem;
      margin-bottom: 4rem;
    }

    .footer-column h5 {
      font-size: 1.3rem;
      font-weight: 800;
      color: white;
      margin-bottom: 1.8rem;
      position: relative;
      padding-bottom: 1rem;
    }

    .footer-column h5::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0;
      width: 55px; height: 4px;
      background: var(--primary-red);
      border-radius: 2px;
    }

    .footer-text { line-height: 1.9; color: #B8B8B8; margin-bottom: 1.5rem; font-size: 0.93rem; }

    .footer-info {
      display: flex;
      align-items: flex-start;
      gap: 13px;
      margin-bottom: 1.1rem;
      color: #B8B8B8;
      transition: all 0.3s ease;
    }

    .footer-info:hover { color: var(--primary-red); transform: translateX(6px); }
    .footer-info i { width: 26px; color: var(--primary-red); font-size: 1.1rem; margin-top: 3px; }

    .footer-menu { list-style: none; padding: 0; }
    .footer-menu li { margin-bottom: 0.9rem; }

    .footer-menu a {
      color: #B8B8B8;
      text-decoration: none;
      transition: all 0.3s ease;
      display: inline-block;
      position: relative;
      font-weight: 500;
      font-size: 0.95rem;
    }

    .footer-menu a::before {
      content: '▸';
      position: absolute;
      left: -22px;
      opacity: 0;
      transition: all 0.3s ease;
      color: var(--primary-red);
    }

    .footer-menu a:hover { color: var(--primary-red); padding-left: 22px; }
    .footer-menu a:hover::before { opacity: 1; left: 0; }

    .contact-form-box {
      background: rgba(255,255,255,0.05);
      padding: 2rem;
      border-radius: 18px;
      border: 2px solid rgba(255,255,255,0.1);
      backdrop-filter: blur(15px);
    }

    .form-group { margin-bottom: 1.3rem; }

    .form-label {
      color: white;
      font-weight: 600;
      margin-bottom: 0.5rem;
      display: block;
      font-size: 0.9rem;
    }

    .form-input {
      width: 100%;
      padding: 0.9rem 1rem;
      background: rgba(255,255,255,0.08);
      border: 2px solid rgba(255,255,255,0.15);
      border-radius: 10px;
      color: white;
      transition: all 0.3s ease;
      font-size: 0.93rem;
      font-family: 'Inter', sans-serif;
    }

    .form-input:focus {
      outline: none;
      background: rgba(255,255,255,0.12);
      border-color: var(--primary-red);
      box-shadow: 0 0 0 3px rgba(157,4,14,0.2);
    }

    .form-input::placeholder { color: rgba(255,255,255,0.38); }

    .btn-submit {
      width: 100%;
      padding: 1.1rem;
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      color: white;
      border: none;
      border-radius: 10px;
      font-weight: 700;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 8px 25px rgba(157,4,14,0.38);
      font-family: 'Inter', sans-serif;
    }

    .btn-submit:hover { transform: translateY(-3px); box-shadow: 0 12px 35px rgba(157,4,14,0.5); }

    .footer-end {
      text-align: center;
      padding-top: 2.5rem;
      border-top: 1px solid rgba(255,255,255,0.1);
      color: #909090;
      font-size: 0.92rem;
    }

    .footer-end strong { color: var(--primary-red); font-weight: 700; }
  </style>
</head>

<body>

  <!-- ========== NAVBAR ========== -->
  <nav class="navbar navbar-expand-lg navbar-premium">
    <div class="container">

      <a class="navbar-brand" href="/fluxovital/page/home/index.php">
        <img src="/fluxovital/assets/images/logo1.png" alt="Logo Fluxo Vital" onerror="this.style.display='none'" />
        <div class="logo-text">
          <span class="logo-main">Fluxo Vital</span>
          <span class="logo-sub">Salvando Vidas</span>
        </div>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Abrir menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">

          <li class="nav-item">
            <a class="nav-link" href="/fluxovital/page/home/index.php">
              <i class="bi bi-house me-1"></i>Início
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/fluxovital/page/home/categoria/campanhas.php">
              <i class="bi bi-megaphone me-1"></i>Sobre
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/fluxovital/page/home/categoria/relatorio.php">
              <i class="bi bi-envelope me-1"></i>Contato
            </a>
          </li>

          <li class="nav-item ms-lg-2">
            <a href="/fluxovital/page/cadastro/tipos_cadastros.php" class="btn-login-premium mt-2 mt-lg-0">
              <i class="bi bi-box-arrow-in-right"></i>
              <span>Entrar</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- ========== BREADCRUMB ========== -->
  <div class="breadcrumb-bar">
    <div class="container">
      <a href="/fluxovital/page/home/index.php"><i class="bi bi-house-fill"></i> Início</a>
      <i class="bi bi-chevron-right"></i>
      <span>Escolha sua doação</span>
    </div>
  </div>

  <!-- ========== ESCOLHA DE CATEGORIA ========== -->
  <div class="category-wrapper">

    <div class="badge-label">
      <i class="fa-solid fa-droplet"></i>
      <span>Seja um doador</span>
    </div>

    <h1 class="category-title">
      Qual tipo de doação <span class="gradient-text">deseja fazer?</span>
    </h1>

    <p class="category-desc">
      Cada tipo de doação salva vidas de formas diferentes. Escolha a categoria que melhor se encaixa no seu perfil e dê o próximo passo.
    </p>

    <div class="category-grid">

      <!-- SANGUE -->
      <div class="category-card card-blood">
        <div class="cat-icon">
          <i class="fa-solid fa-droplet"></i>
        </div>
        <span class="cat-tag"><i class="fa-solid fa-circle-check"></i> Mais comum</span>
        <h3 class="cat-title">Doação de Sangue</h3>
        <p class="cat-desc">
          Uma doação pode salvar até quatro vidas. O processo é simples, rápido e seguro.
        </p>
        <ul class="cat-reqs">
          <li><i class="fa-solid fa-check"></i> Entre 16 e 69 anos</li>
          <li><i class="fa-solid fa-check"></i> Peso acima de 50 kg</li>
          <li><i class="fa-solid fa-check"></i> Boa saúde geral</li>
          <li><i class="fa-solid fa-check"></i> Documento com foto</li>
        </ul>
        <a href="/fluxovital/page/cadastro/doador/cadastro/cadastro_doador.php" class="btn-cat">
          Quero doar sangue
        </a>
      </div>

      <!-- MÉDULA ÓSSEA -->
      <div class="category-card card-marrow">
        <div class="cat-icon">
          <i class="fa-solid fa-bone"></i>
        </div>
        <span class="cat-tag"><i class="fa-solid fa-star"></i> Alta demanda</span>
        <h3 class="cat-title">Doação de Médula Óssea</h3>
        <p class="cat-desc">
          Cadastre-se como doador e ofereça esperança a pacientes com leucemia e outras doenças graves.
        </p>
        <ul class="cat-reqs">
          <li><i class="fa-solid fa-check"></i> Entre 18 e 55 anos</li>
          <li><i class="fa-solid fa-check"></i> Boa saúde geral</li>
          <li><i class="fa-solid fa-check"></i> Coleta simples de sangue</li>
          <li><i class="fa-solid fa-check"></i> Cadastro no REDOME</li>
        </ul>
        <a href="/fluxovital/page/cadastro/doador/cadastro/cadastro_doador.php" class="btn-cat">
          Quero me cadastrar
        </a>
      </div>

      <!-- LEITE MATERNO -->
      <div class="category-card card-milk">
        <div class="cat-icon">
          <i class="fa-solid fa-baby"></i>
        </div>
        <span class="cat-tag"><i class="fa-solid fa-heart"></i> Para bebês</span>
        <h3 class="cat-title">Doação de Leite Materno</h3>
        <p class="cat-desc">
          Ajude bebês prematuros e recém-nascidos em situação de risco com uma doação preciosa.
        </p>
        <ul class="cat-reqs">
          <li><i class="fa-solid fa-check"></i> Estar amamentando</li>
          <li><i class="fa-solid fa-check"></i> Boa saúde geral</li>
          <li><i class="fa-solid fa-check"></i> Não fumar ou beber</li>
          <li><i class="fa-solid fa-check"></i> Triagem prévia</li>
        </ul>
        <a href="/fluxovital/page/cadastro/doador/cadastro/cadastro_doador.php" class="btn-cat">
          Quero doar leite
        </a>
      </div>

    </div>

    <a href="/fluxovital/page/home/index.php" class="btn-back">
      <i class="bi bi-arrow-left"></i> Voltar à página inicial
    </a>

  </div>

  <!-- ========== RODAPÉ ========== -->
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
            <li><a href="/fluxovital/page/home/categoria/campanhas.php">Campanhas</a></li>
            <li><a href="#">Requisitos</a></li>
            <li><a href="#">Ouvidoria</a></li>
          </ul>
        </div>

        <div class="footer-column">
          <h5>Entre em Contato</h5>
          <div class="contact-form-box">
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
            <button type="button" class="btn-submit">Enviar Mensagem</button>
          </div>
        </div>

      </div>

      <div class="footer-end">
        © 2025 <strong>Fluxo Vital</strong> — Todos os direitos reservados | P.I - GPECOV
      </div>
    </div>
  </footer>

  <script>
    window.addEventListener('scroll', function () {
      document.querySelector('.navbar-premium').classList.toggle('scrolled', window.scrollY > 50);
    });
  </script>

</body>
</html>