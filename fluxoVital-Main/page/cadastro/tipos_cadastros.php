<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Escolha seu Perfil - Fluxo Vital</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

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

    /* Navbar Styles */
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
      font-size: 3rem;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 4px rgba(157, 4, 14, 0.1);
      line-height: 1.2;
    }

    .subtitle {
      color: var(--texto-secundario);
      font-size: 1.2rem;
      font-weight: 400;
      max-width: 600px;
      margin: 0 auto;
    }

    /* Cards Section */
    .cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .profile-card {
      background: white;
      border-radius: 24px;
      padding: 3rem 2rem;
      text-align: center;
      text-decoration: none;
      color: inherit;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      box-shadow: 0 10px 40px rgba(157, 4, 14, 0.08);
      position: relative;
      overflow: hidden;
      animation: fadeInUp 0.8s ease both;
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

    .profile-card:nth-child(1) { animation-delay: 0.1s; }
    .profile-card:nth-child(2) { animation-delay: 0.2s; }
    .profile-card:nth-child(3) { animation-delay: 0.3s; }

    .profile-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(90deg, var(--vinho-primary), var(--vinho-secondary));
      transform: scaleX(0);
      transition: transform 0.4s ease;
    }

    .profile-card:hover::before {
      transform: scaleX(1);
    }

    .profile-card::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: radial-gradient(circle, rgba(157, 4, 14, 0.05), transparent);
      transform: translate(-50%, -50%);
      border-radius: 50%;
      transition: all 0.6s ease;
    }

    .profile-card:hover::after {
      width: 500px;
      height: 500px;
    }

    .profile-card:hover {
      transform: translateY(-12px);
      box-shadow: 0 20px 60px rgba(157, 4, 14, 0.15);
    }

    .card-icon-wrapper {
      width: 100px;
      height: 100px;
      margin: 0 auto 2rem;
      background: linear-gradient(135deg, var(--vinho-primary) 0%, var(--vinho-secondary) 100%);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      z-index: 1;
      transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      box-shadow: 0 8px 30px rgba(157, 4, 14, 0.25);
    }

    .profile-card:hover .card-icon-wrapper {
      transform: rotateY(360deg) scale(1.1);
      box-shadow: 0 12px 40px rgba(157, 4, 14, 0.35);
    }

    .card-icon {
      font-size: 3rem;
      color: white;
    }

    .card-title {
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--vinho-primary);
      margin-bottom: 1rem;
      position: relative;
      z-index: 1;
    }

    .card-description {
      color: var(--texto-secundario);
      font-size: 1rem;
      line-height: 1.6;
      position: relative;
      z-index: 1;
    }

    /* Info Banner */
    .info-banner {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
      backdrop-filter: blur(20px);
      border-radius: 20px;
      padding: 2rem;
      text-align: center;
      box-shadow: 0 8px 32px rgba(157, 4, 14, 0.1);
      border: 1px solid rgba(157, 4, 14, 0.1);
      animation: fadeIn 1.2s ease 0.6s both;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .info-banner-icon {
      font-size: 2rem;
      color: var(--vinho-primary);
      margin-bottom: 1rem;
    }

    .info-banner-text {
      color: var(--texto-secundario);
      font-size: 1.1rem;
      line-height: 1.6;
      margin: 0;
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
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
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

      .cards-container {
        grid-template-columns: 1fr;
        gap: 1.5rem;
      }

      .profile-card {
        padding: 2rem 1.5rem;
      }

      .card-icon-wrapper {
        width: 80px;
        height: 80px;
      }

      .card-icon {
        font-size: 2.5rem;
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
            <a class="logo" href="/fluxovital/page/home/index.php">
                <div class="logo-icon">
                    <img src="/fluxovital/assets/images/logo1.png" alt="Fluxo Vital Logo" style="width: 60px; height: 50px;">
                </div>
                <div class="logo-text">
                    <span class="logo-main">Fluxo Vital</span>
                    <span class="logo-sub">Salvando Vidas</span>
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
      <h1>Como deseja continuar?</h1>
      <p class="subtitle">Escolha a opção que melhor representa você e comece sua jornada de solidariedade</p>
    </div>

    <div class="cards-container">
      <a href="/fluxovital/page/cadastro/escolha_categoria.php" class="profile-card" aria-label="Opção para cadastro como doador">
        <div class="card-icon-wrapper">
          <i class="bi bi-droplet-fill card-icon"></i>
        </div>
        <h2 class="card-title">Sou Doador</h2>
        <p class="card-description">Quero doar sangue, medula ou leite materno e contribuir para salvar vidas na minha comunidade.</p>
      </a>

      <a href="/fluxovital/page/cadastro/instituicao/escolha_categoria.php" class="profile-card" aria-label="Opção para cadastro como instituição">
        <div class="card-icon-wrapper">
          <i class="bi bi-building card-icon"></i>
        </div>
        <h2 class="card-title">Sou Instituição</h2>
        <p class="card-description">Represento uma entidade de saúde que gerencia e coordena processos de doação.</p>
      </a>

      <a href="/fluxovital/page/cadastro/usuario/login_usuario.php" class="profile-card" aria-label="Continuar como usuário">
        <div class="card-icon-wrapper">
          <i class="bi bi-compass card-icon"></i>
        </div>
        <h2 class="card-title">Explorar Plataforma</h2>
        <p class="card-description">Quero conhecer melhor a plataforma antes de realizar meu cadastro completo.</p>
      </a>
    </div>

    <div class="info-banner">
      <i class="bi bi-info-circle-fill info-banner-icon"></i>
      <p class="info-banner-text">
        Você poderá se cadastrar como doador ou instituição a qualquer momento através do seu perfil. Todas as suas informações estarão seguras e protegidas.
      </p>
    </div>
  </main>

  <footer>
    <div class="footer-content">
      <i class="bi bi-heart-fill footer-icon"></i>
      <p>© 2025 Fluxo Vital. Todos os direitos reservados.</p>
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
