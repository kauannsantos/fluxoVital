<?php 
  include '../../include/header.php'; 
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Fluxo Vital — Salvando Vidas</title>

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
      filter: drop-shadow(0 0 20px rgba(255, 255, 255, 0.4));
    }

    .navbar-premium .navbar-brand img {
      height: 50px;
      width: auto;
      filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.3));
      transition: all 0.4s ease;
    }

    .navbar-premium .navbar-brand:hover img { transform: scale(1.08); }

    .logo-text { display: flex; flex-direction: column; line-height: 1.1; }
    .logo-main { font-size: 1.4rem; font-weight: 800; color: #fff; }
    .logo-sub  { font-size: 0.7rem; color: #ffccd0; letter-spacing: 0.08em; font-weight: 400; }

    .navbar-premium .nav-link {
      color: rgba(255, 255, 255, 0.95) !important;
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

    .navbar-premium .dropdown-menu {
      background: linear-gradient(135deg, #7B1B1B 0%, #6B0000 100%);
      border: none;
      border-radius: 20px;
      padding: 1rem;
      margin-top: 0.8rem;
      box-shadow: 0 15px 50px rgba(0, 0, 0, 0.5);
      animation: fadeInDown 0.25s ease;
      min-width: 240px;
    }

    @keyframes fadeInDown {
      from { opacity: 0; transform: translateY(-10px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .navbar-premium .dropdown-item {
      color: white;
      padding: 0.9rem 1.3rem;
      border-radius: 12px;
      font-weight: 500;
      font-size: 0.95rem;
      transition: all 0.3s ease;
      margin-bottom: 0.3rem;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .navbar-premium .dropdown-item:last-child { margin-bottom: 0; }

    .navbar-premium .dropdown-item:hover {
      background: rgba(255, 255, 255, 0.18);
      color: white;
      transform: translateX(8px);
      padding-left: 1.6rem;
    }

    .navbar-premium .dropdown-item i { font-size: 1rem; min-width: 18px; }

    .btn-login-premium {
      background: white;
      color: #c90101 !important;
      padding: 0.7rem 1.8rem;
      border-radius: 50px;
      font-weight: 700;
      font-size: 0.95rem;
      border: 3px solid white;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      box-shadow: 0 5px 20px rgba(255, 255, 255, 0.25);
      display: inline-flex;
      align-items: center;
      gap: 8px;
      text-decoration: none;
    }

    .navbar-toggler {
      border: 2px solid rgba(255, 255, 255, 0.8);
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
      .navbar-premium .dropdown-menu {
        background: rgba(107, 0, 0, 0.6);
        border-radius: 12px;
        margin-top: 0.3rem;
        box-shadow: none;
        padding: 0.5rem;
      }
      .btn-login-premium {
        width: 100%;
        justify-content: center;
        margin-top: 0.5rem;
      }
    }

    /* ========== ONBOARDING ========== */
    .onboarding-wrapper {
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

    .onboarding-title {
      font-size: 3rem;
      font-weight: 900;
      color: var(--text-dark);
      margin-bottom: 1rem;
      line-height: 1.1;
      letter-spacing: -1px;
      text-align: center;
    }

    .onboarding-title .gradient-text {
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .onboarding-desc {
      font-size: 1.1rem;
      color: var(--text-gray);
      max-width: 560px;
      margin: 0 auto 4rem;
      line-height: 1.8;
      text-align: center;
    }

    .onboarding-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2rem;
      width: 100%;
      max-width: 1000px;
    }

    .onboarding-card {
      background: white;
      border-radius: 25px;
      padding: 2.5rem 2rem;
      text-align: center;
      border: 3px solid transparent;
      position: relative;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      box-shadow: 0 15px 50px rgba(0,0,0,0.07);
      animation: fadeInUp 0.6s ease both;
    }

    .onboarding-card:nth-child(1) { animation-delay: 0.1s; }
    .onboarding-card:nth-child(2) { animation-delay: 0.25s; }
    .onboarding-card:nth-child(3) { animation-delay: 0.4s; }

    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(40px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .onboarding-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 5px;
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.4s ease;
    }

    .onboarding-card:hover {
      transform: translateY(-12px);
      border-color: var(--primary-red);
      box-shadow: 0 30px 70px rgba(157,4,14,0.2);
    }

    .onboarding-card:hover::before { transform: scaleX(1); }

    .card-icon {
      width: 90px; height: 90px;
      margin: 0 auto 1.5rem;
      background: linear-gradient(135deg, rgba(157,4,14,0.1), rgba(157,4,14,0.04));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.4s ease;
    }

    .onboarding-card:hover .card-icon { transform: scale(1.1); }

    .card-icon i {
      font-size: 2.5rem;
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .card-title {
      font-size: 1.3rem;
      font-weight: 800;
      color: var(--text-dark);
      margin-bottom: 0.8rem;
    }

    .card-desc {
      color: var(--text-gray);
      line-height: 1.7;
      margin-bottom: 2rem;
      font-size: 0.95rem;
    }

    .btn-action {
      display: block;
      width: 100%;
      padding: 1rem;
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      color: white;
      border: none;
      border-radius: 14px;
      font-weight: 700;
      font-size: 0.95rem;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 8px 25px rgba(157,4,14,0.28);
      text-decoration: none;
    }

    .btn-action:hover {
      transform: translateY(-3px);
      box-shadow: 0 14px 35px rgba(157,4,14,0.42);
      color: white;
    }

    .btn-action.outline {
      background: transparent;
      color: var(--primary-red);
      border: 2px solid var(--primary-red);
      box-shadow: none;
    }

    .btn-action.outline:hover {
      background: linear-gradient(135deg, var(--primary-red), var(--dark-red));
      color: white;
      box-shadow: 0 8px 25px rgba(157,4,14,0.28);
    }

    @media (max-width: 900px) {
      .onboarding-grid { grid-template-columns: 1fr; max-width: 420px; }
      .onboarding-title { font-size: 2.2rem; }
    }

    @media (max-width: 576px) {
      .onboarding-wrapper { padding: 3rem 1rem; }
      .onboarding-title { font-size: 1.8rem; }
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
          <i class="bi bi-heart-pulse me-1"></i>Início
        </a>
      </li>

          <li class="nav-item">
            <a class="nav-link" href="/fluxovital/page/home/categoria/campanhas.php">
              <i class="bi bi-megaphone me-1"></i>Sobre
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/fluxovital/page/home/categoria/relatorio.php">
              <i class="bi bi-file-earmark-bar-graph me-1"></i>Contato
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

  <!-- ========== ONBOARDING ========== -->
  <div class="onboarding-wrapper">

    <div class="badge-label">
      <i class="fa-solid fa-circle-user"></i>
      <span>Faça Parte</span>
    </div>

    <h1 class="onboarding-title">
      Como você quer <span class="gradient-text">Começar?</span>
    </h1>

    <p class="onboarding-desc">
      Escolha o perfil que melhor representa você e dê o primeiro passo para salvar vidas.
    </p>

    <div class="onboarding-grid">

      <div class="onboarding-card">
        <div class="card-icon">
          <i class="fa-solid fa-heart"></i>
        </div>
        <h3 class="card-title">Sou doador</h3>
        <p class="card-desc">
          Cadastre-se como doador de sangue, medula óssea ou leite materno e conecte-se com quem precisa de você.
        </p>
        <a href="/fluxovital/page/cadastro/escolha_categoria.php" class="btn-action">
          Cadastrar como doador
        </a>
      </div>

      <div class="onboarding-card">
        <div class="card-icon">
          <i class="fa-solid fa-hospital"></i>
        </div>
        <h3 class="card-title">Sou uma instituição</h3>
        <p class="card-desc">
          Gerencie agendamentos, estoque de doações e conecte sua instituição a uma rede de doadores qualificados.
        </p>
        <a href="/fluxovital/page/cadastro/instituicao/escolha_categoria.php" class="btn-action">
          Cadastrar instituição
        </a>
      </div>

      <div class="onboarding-card">
        <div class="card-icon">
          <i class="fa-solid fa-eye"></i>
        </div>
        <h3 class="card-title">Explorar a plataforma</h3>
        <p class="card-desc">
          Veja como funciona o Fluxo Vital antes de se cadastrar: campanhas, relatórios e histórias de vidas salvas.
        </p>
        <a href="/fluxovital/page/home/categoria/campanhas.php" class="btn-action outline">
          Explorar sem cadastro
        </a>
      </div>

    </div>

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