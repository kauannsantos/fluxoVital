<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Escolha de Categoria de Doação - Fluxo Vital</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    :root {
      --vinho-primary: #9d040e;
      --vinho-secondary: #7B1B1B;
      --accent-light: #ffccd0;
      --bg-gradient-start: #fff5f7;
      --bg-gradient-end: #ffe9ec;
      --texto-secundario: #6c757d;
      --font-family-base: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, var(--bg-gradient-start) 0%, var(--bg-gradient-end) 100%);
      font-family: var(--font-family-base);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      position: relative;
      overflow-x: hidden;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: 
        radial-gradient(circle at 20% 50%, rgba(157, 4, 14, 0.03) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(123, 27, 27, 0.03) 0%, transparent 50%);
      z-index: 0;
      pointer-events: none;
    }

    .navbar {
      background: linear-gradient(135deg, #9d040e 0%, #7B1B1B 100%);
      padding: 1rem 0;
      box-shadow: 0 4px 12px rgba(123, 27, 27, 0.3);
      position: sticky;
      top: 0;
      z-index: 1000;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .navbar.scrolled {
      padding: 0.7rem 0;
      box-shadow: 0 8px 30px rgba(123, 27, 27, 0.4);
    }

    .nav-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      display: flex;
      align-items: center;
      margin-right: 5rem;
      gap: 1rem;
      text-decoration: none;
      color: white;
      position: relative;
      z-index: 1001;
      transition: all 0.3s ease;
    }

    .logo:hover {
      transform: translateX(5px);
    }

    .logo img {
      height: 50px;
      width: auto;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .logo:hover img {
      transform: scale(1.08);
      filter: drop-shadow(0 4px 8px rgba(255, 255, 255, 0.3));
    }

    .logo-text {
      display: flex;
      flex-direction: column;
    }

    .logo-main {
      font-size: 1.5rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      color: #fff;
    }

    .logo-sub {
      font-size: 0.75rem;
      color: #ffccd0;
      letter-spacing: 0.1em;
    }

    .nav-links {
      display: flex;
      list-style: none;
      gap: 2rem;
      align-items: center;
      margin: 0;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      position: relative;
    }

    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      width: 0;
      height: 2px;
      background: white;
      transform: translateX(-50%);
      transition: width 0.3s ease;
    }

    .nav-links a:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateY(-2px);
    }

    .nav-links a:hover::after {
      width: 80%;
    }

    .nav-btn {
      background: white !important;
      color: #9d040e !important;
      padding: 0.5rem 1.5rem !important;
      border-radius: 2rem !important;
      font-weight: 600 !important;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
    }

    .nav-btn:hover {
      background: #ffe9ec !important;
      transform: translateY(-2px) scale(1.05) !important;
      box-shadow: 0 6px 20px rgba(255, 255, 255, 0.4);
    }

    .nav-btn::after {
      display: none;
    }

    .mobile-toggle {
      display: none;
      background: none;
      border: none;
      color: white;
      font-size: 1.5rem;
      cursor: pointer;
      position: relative;
      z-index: 1001;
      transition: all 0.3s ease;
    }

    .mobile-toggle:hover {
      transform: scale(1.1);
    }

    .mobile-menu {
      display: none;
      flex-direction: column;
      background: #7B1B1B;
      padding: 1rem 2rem;
      gap: 1rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .mobile-menu a {
      color: white;
      text-decoration: none;
      padding: 0.75rem;
      border-radius: 0.5rem;
      transition: background 0.3s ease;
      font-weight: 500;
    }

    .mobile-menu a:hover {
      background: rgba(255, 255, 255, 0.1);
    }

    .mobile-menu.active {
      display: flex;
    }

    /* Main Content */
    main.container {
      max-width: 1200px;
      width: 100%;
      padding: 4rem 1.5rem;
      flex-grow: 1;
      position: relative;
      z-index: 1;
    }

    .hero-section {
      text-align: center;
      margin-bottom: 4rem;
      animation: fadeInDown 0.8s ease;
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h1 {
      color: var(--vinho-primary);
      font-weight: 800;
      font-size: 2.8rem;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(157, 4, 14, 0.1);
      line-height: 1.2;
    }

    .subtitle {
      color: var(--texto-secundario);
      font-size: 1.2rem;
      font-weight: 400;
      max-width: 700px;
      margin: 0 auto;
    }

    .cards-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .donation-card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 28px;
      padding: 3rem 2rem;
      text-align: center;
      position: relative;
      overflow: hidden;
      box-shadow: 0 8px 32px rgba(157, 4, 14, 0.12);
      transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
      animation: fadeInUp 0.8s ease both;
      border: 1px solid rgba(157, 4, 14, 0.08);
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .donation-card:nth-child(1) { animation-delay: 0.1s; }
    .donation-card:nth-child(2) { animation-delay: 0.2s; }
    .donation-card:nth-child(3) { animation-delay: 0.3s; }

    .donation-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, var(--vinho-primary), var(--vinho-secondary), var(--vinho-primary));
      background-size: 200% 100%;
      animation: shimmer 3s linear infinite;
      opacity: 0;
      transition: opacity 0.4s ease;
    }

    @keyframes shimmer {
      0% { background-position: -200% 0; }
      100% { background-position: 200% 0; }
    }

    .donation-card:hover::before {
      opacity: 1;
    }

    .donation-card::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: radial-gradient(circle, rgba(157, 4, 14, 0.04), transparent 70%);
      transform: translate(-50%, -50%);
      border-radius: 50%;
      transition: all 0.7s cubic-bezier(0.34, 1.56, 0.64, 1);
      z-index: 0;
    }

    .donation-card:hover::after {
      width: 500px;
      height: 500px;
    }

    .donation-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 24px 60px rgba(157, 4, 14, 0.2);
      border-color: rgba(157, 4, 14, 0.2);
    }

    .icon-container {
      width: 100px;
      height: 100px;
      margin: 0 auto 1.8rem;
      background: linear-gradient(135deg, var(--vinho-primary) 0%, var(--vinho-secondary) 100%);
      border-radius: 24px;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      z-index: 1;
      transition: all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
      box-shadow: 0 10px 30px rgba(157, 4, 14, 0.25);
    }

    .donation-card:hover .icon-container {
      transform: translateY(-8px) scale(1.1) rotate(5deg);
      box-shadow: 0 20px 40px rgba(157, 4, 14, 0.35);
      border-radius: 28px;
    }

    .icon-container::before {
      content: '';
      position: absolute;
      inset: -3px;
      background: linear-gradient(135deg, var(--vinho-primary), var(--vinho-secondary), var(--vinho-primary));
      background-size: 200% 200%;
      border-radius: inherit;
      z-index: -1;
      opacity: 0;
      transition: opacity 0.6s ease;
      animation: gradientRotate 4s linear infinite;
    }

    @keyframes gradientRotate {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .donation-card:hover .icon-container::before {
      opacity: 1;
    }

    .icon-container i {
      font-size: 3.2rem;
      color: white;
      position: relative;
      z-index: 1;
      transition: transform 0.6s ease;
    }

    .donation-card:hover .icon-container i {
      transform: scale(1.1);
    }

    .card-title {
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--vinho-primary);
      margin-bottom: 1rem;
      position: relative;
      z-index: 1;
      transition: color 0.3s ease;
    }

    .donation-card:hover .card-title {
      color: var(--vinho-secondary);
    }

    .card-description {
      color: var(--texto-secundario);
      font-size: 1.05rem;
      line-height: 1.7;
      margin-bottom: 2rem;
      position: relative;
      z-index: 1;
      min-height: 60px;
    }

    .btn-selecionar {
      background: linear-gradient(135deg, var(--vinho-primary) 0%, var(--vinho-secondary) 100%);
      color: white;
      border: none;
      padding: 0.9rem 2.5rem;
      border-radius: 50px;
      font-weight: 600;
      font-size: 1.05rem;
      cursor: pointer;
      transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
      position: relative;
      z-index: 1;
      overflow: hidden;
      box-shadow: 0 8px 24px rgba(157, 4, 14, 0.3);
    }

    .btn-selecionar::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      transform: translate(-50%, -50%);
      transition: width 0.6s ease, height 0.6s ease;
    }

    .btn-selecionar:hover::before {
      width: 300px;
      height: 300px;
    }

    .btn-selecionar:hover {
      transform: translateY(-2px) scale(1.05);
      box-shadow: 0 12px 35px rgba(157, 4, 14, 0.4);
    }

    .btn-selecionar:active {
      transform: translateY(0) scale(1.02);
    }

    .btn-selecionar i {
      transition: transform 0.3s ease;
    }

    .btn-selecionar:hover i {
      transform: translateX(5px);
    }

    /* Info Banner */
    .info-banner {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(20px);
      border-radius: 24px;
      padding: 2rem;
      text-align: center;
      box-shadow: 0 8px 32px rgba(157, 4, 14, 0.1);
      border: 1px solid rgba(157, 4, 14, 0.1);
      animation: fadeIn 1.2s ease 0.6s both;
      margin-top: 3rem;
      position: relative;
      overflow: hidden;
    }

    .info-banner::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(157, 4, 14, 0.03), transparent);
      animation: bannerSlide 3s ease-in-out infinite;
    }

    @keyframes bannerSlide {
      0% { left: -100%; }
      100% { left: 100%; }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .info-banner-content {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 1rem;
      flex-wrap: wrap;
      position: relative;
      z-index: 1;
    }

    .info-banner-icon {
      font-size: 2rem;
      color: var(--vinho-primary);
      animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    .info-banner-text {
      color: var(--texto-secundario);
      font-size: 1.05rem;
      line-height: 1.6;
      margin: 0;
      max-width: 700px;
    }

    /* Footer */
    footer {
      background: linear-gradient(135deg, var(--vinho-secondary) 0%, var(--vinho-primary) 100%);
      color: white;
      padding: 2rem 0;
      text-align: center;
      box-shadow: 0 -4px 20px rgba(123, 27, 27, 0.2);
      position: relative;
      z-index: 10;
    }

    .footer-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 1rem;
    }

    .footer-icon {
      font-size: 1.5rem;
      animation: heartBeat 1.5s ease-in-out infinite;
    }

    @keyframes heartBeat {
      0%, 100% { transform: scale(1); }
      10%, 30% { transform: scale(1.1); }
      20%, 40% { transform: scale(0.95); }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .nav-links {
        display: none;
      }

      .mobile-toggle {
        display: block;
      }

      h1 {
        font-size: 2.2rem;
      }

      .subtitle {
        font-size: 1rem;
      }

      .cards-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
      }

      .donation-card {
        padding: 2.5rem 1.5rem;
      }

      .icon-container {
        width: 90px;
        height: 90px;
      }

      .icon-container i {
        font-size: 3rem;
      }

      .card-title {
        font-size: 1.4rem;
      }

      main.container {
        padding: 3rem 1.5rem;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      *,
      *::before,
      *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }
  </style>
</head>
<body>

  <nav class="navbar" id="navbar">
    <div class="nav-container">
      <a href="/fluxovital/" class="logo">
        <img src="/fluxovital/assets/images/logo1.png" alt="Fluxo Vital Logo">
        <div class="logo-text">
          <span class="logo-main">FLUXO VITAL</span>
          <span class="logo-sub">DOAÇÃO QUE SALVA</span>
        </div>
      </a>
      
      <ul class="nav-links">
        <li><a href="/fluxovital/">Início</a></li>
        <li><a href="/fluxovital/sobre.php">Sobre</a></li>
        <li><a href="/fluxovital/contato.php">Contato</a></li>
        <li><a href="/fluxovital/page/cadastro/usuario/login_usuario.php" class="nav-btn">
          <i class="bi bi-person-circle"></i>
          Entrar
        </a></li>
      </ul>
      
      <button class="mobile-toggle" id="mobileToggle" aria-label="Menu">
        <i class="bi bi-list"></i>
      </button>
    </div>
    
    <div class="mobile-menu" id="mobileMenu">
      <a href="/fluxovital/">Início</a>
      <a href="/fluxovital/sobre.php">Sobre</a>
      <a href="/fluxovital/contato.php">Contato</a>
      <a href="/fluxovital/page/cadastro/usuario/login_usuario.php">
        <i class="bi bi-person-circle"></i> Entrar
      </a>
    </div>
  </nav>

  <main class="container">
    <div class="hero-section">
      <h1>Escolha sua Categoria de Doação</h1>
      <p class="subtitle">Cada tipo de doação pode salvar vidas de maneiras únicas. Selecione a categoria que você deseja doar e faça parte desta corrente do bem.</p>
    </div>

    <form method="POST" action="selecionar_tipo.php">
      <div class="cards-grid">
        
        <div class="donation-card">
          <div class="icon-container">
            <i class="fa-solid fa-droplet"></i>
          </div>
          <h2 class="card-title">Doação de Sangue</h2>
          <p class="card-description">Uma única doação pode salvar até 4 vidas. O sangue é essencial para cirurgias, tratamentos de câncer e emergências médicas.</p>
          <button type="submit" name="tipo_doacao" value="sangue" class="btn-selecionar">
            Quero Doar Sangue
            <i class="bi bi-arrow-right ms-2"></i>
          </button>
        </div>

        <div class="donation-card">
          <div class="icon-container">
            <i class="fa-solid fa-heart-pulse"></i>
          </div>
          <h2 class="card-title">Doação de Médula Óssea</h2>
          <p class="card-description">Seja um potencial doador e ajude pessoas com leucemia e outras doenças do sangue a encontrar uma nova chance de vida.</p>
          <button type="submit" name="tipo_doacao" value="medula" class="btn-selecionar">
            Quero Doar Médula
            <i class="bi bi-arrow-right ms-2"></i>
          </button>
        </div>

        <div class="donation-card">
          <div class="icon-container">
            <i class="fa-solid fa-person-breastfeeding"></i>
          </div>
          <h2 class="card-title">Leite Materno</h2>
          <p class="card-description">Doe leite materno e ajude bebês prematuros ou em situação de vulnerabilidade a terem um desenvolvimento mais saudável.</p>
          <button type="submit" name="tipo_doacao" value="leite" class="btn-selecionar">
            Quero Doar Leite
            <i class="bi bi-arrow-right ms-2"></i>
          </button>
        </div>

      </div>
    </form>

    <div class="info-banner">
      <div class="info-banner-content">
        <i class="bi bi-shield-check info-banner-icon"></i>
        <p class="info-banner-text">
          <strong>Sua segurança em primeiro lugar:</strong> Todos os processos de doação seguem rigorosos protocolos de segurança e são realizados por profissionais qualificados. Você receberá orientações completas durante todo o processo.
        </p>
      </div>
    </div>
  </main>

  <footer>
    <div class="footer-content">
      <i class="bi bi-heart-fill footer-icon"></i>
      <p>&copy; 2025 Fluxo Vital. Todos os direitos reservados.</p>
      <p style="font-size: 0.9rem; opacity: 0.9;">Conectando doadores e instituições para salvar vidas</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>

    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    const mobileToggle = document.getElementById('mobileToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    
    mobileToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('active');
      const icon = mobileToggle.querySelector('i');
      icon.classList.toggle('bi-list');
      icon.classList.toggle('bi-x');
    });
  </script>
</body>
</html>
