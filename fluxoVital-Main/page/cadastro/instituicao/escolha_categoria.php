<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Escolher Categoria - Instituição | Fluxo Vital</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    :root {
      --vinho-primary: #9d040e;
      --vinho-secondary: #7B1B1B;
      --accent-light: #ffccd0;
      --bg-gradient-start: #fff5f7;
      --bg-gradient-end: #ffe9ec;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, var(--bg-gradient-start) 0%, var(--bg-gradient-end) 100%);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
    main {
      flex: 1;
      max-width: 900px;
      margin: 3rem auto;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      padding: 3rem 2rem;
      border-radius: 24px;
      box-shadow: 0 8px 32px rgba(123, 27, 27, 0.15);
      position: relative;
      z-index: 1;
      animation: fadeIn 0.8s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h2 {
      color: var(--vinho-primary);
      font-weight: 800;
      font-size: 2.2rem;
      margin-bottom: 2.5rem;
      text-align: center;
      user-select: none;
      text-shadow: 2px 2px 4px rgba(157, 4, 14, 0.1);
    }

    form {
      margin-top: 1rem;
    }

    .card-categoria {
      background: white;
      border: 2px solid transparent;
      border-radius: 20px;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 2rem 1.5rem;
      transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
      user-select: none;
      color: #6a0207;
      font-weight: 600;
      box-shadow: 0 6px 20px rgba(123, 27, 27, 0.15);
      height: 100%;
      width: 100%;
      position: relative;
      overflow: hidden;
    }

    .card-categoria::before {
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

    .card-categoria:hover::before,
    .card-categoria:focus-visible::before {
      opacity: 1;
    }

    .card-categoria::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: radial-gradient(circle, rgba(157, 4, 14, 0.1), transparent 70%);
      transform: translate(-50%, -50%);
      border-radius: 50%;
      transition: all 0.6s ease;
      z-index: 0;
    }

    .card-categoria:hover::after,
    .card-categoria:focus-visible::after {
      width: 500px;
      height: 500px;
    }

    .card-categoria:hover,
    .card-categoria:focus-visible {
      background: linear-gradient(135deg, var(--vinho-primary) 0%, var(--vinho-secondary) 100%);
      color: white;
      border-color: var(--vinho-secondary);
      transform: translateY(-8px) scale(1.02);
      outline: none;
      box-shadow: 0 12px 40px rgba(90, 19, 19, 0.35);
    }

    .icon-categoria {
      font-size: 4rem;
      margin-bottom: 1.2rem;
      pointer-events: none;
      position: relative;
      z-index: 1;
      transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .card-categoria:hover .icon-categoria,
    .card-categoria:focus-visible .icon-categoria {
      transform: scale(1.15) rotate(5deg);
    }

    .titulo-categoria {
      font-size: 1.3rem;
      margin-bottom: auto;
      text-align: center;
      pointer-events: none;
      position: relative;
      z-index: 1;
      min-height: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .btn-categoria {
      margin-top: 1.5rem;
      background-color: var(--vinho-secondary);
      color: white;
      padding: 0.6rem 1.5rem;
      border-radius: 50px;
      font-size: 1rem;
      pointer-events: none;
      user-select: none;
      box-shadow: 0 4px 12px rgba(90, 19, 19, 0.3);
      transition: all 0.3s ease;
      position: relative;
      z-index: 1;
    }

    .card-categoria:hover .btn-categoria,
    .card-categoria:focus-visible .btn-categoria {
      background-color: white;
      color: var(--vinho-primary);
      transform: scale(1.05);
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
      gap: 0.5rem;
    }

    .footer-icon {
      font-size: 1.5rem;
      animation: pulse 2s ease-in-out infinite;
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

      main {
        margin: 2rem 1rem;
        padding: 2rem 1.5rem;
      }

      h2 {
        font-size: 1.8rem;
      }

      .icon-categoria {
        font-size: 3.5rem;
      }

      .titulo-categoria {
        font-size: 1.1rem;
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

  <!-- Navbar -->
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

  <!-- Main Content -->
  <main>
    <h2>Escolha a Categoria da Instituição</h2>
    <form action="/fluxovital/page/cadastro/instituicao/login_instituicao.php" method="post" class="row row-cols-1 row-cols-md-2 g-4 justify-content-center" aria-label="Escolha a categoria da instituição">
      
      <div class="col">
        <button type="submit" name="categoria" value="Bancos de Doação" class="card-categoria" aria-describedby="desc-banco">
          <i class="bi bi-droplet icon-categoria" aria-hidden="true"></i>
          <div class="titulo-categoria" id="desc-banco">Bancos de Doação</div>
          <div class="btn-categoria">Selecionar</div>
        </button>
      </div>

      <div class="col">
        <button type="submit" name="categoria" value="Hospitais" class="card-categoria" aria-describedby="desc-hospital">
          <i class="bi bi-hospital icon-categoria" aria-hidden="true"></i>
          <div class="titulo-categoria" id="desc-hospital">Hospitais</div>
          <div class="btn-categoria">Selecionar</div>
        </button>
      </div>

      <div class="col">
        <button type="submit" name="categoria" value="ONGs" class="card-categoria" aria-describedby="desc-ongs">
          <i class="bi bi-people icon-categoria" aria-hidden="true"></i>
          <div class="titulo-categoria" id="desc-ongs">ONGs Parceiras</div>
          <div class="btn-categoria">Selecionar</div>
        </button>
      </div>

      <div class="col">
        <button type="submit" name="categoria" value="Outros" class="card-categoria" aria-describedby="desc-outros">
          <i class="bi bi-building icon-categoria" aria-hidden="true"></i>
          <div class="titulo-categoria" id="desc-outros">Outros (UBS, Clínicas etc.)</div>
          <div class="btn-categoria">Selecionar</div>
        </button>
      </div>

    </form>
  </main>

  

  <!-- Footer -->
  <footer>
    <div class="footer-content">
      <i class="bi bi-heart-fill footer-icon"></i>
      <p>&copy; 2025 Fluxo Vital - Todos os direitos reservados.</p>
      <p style="font-size: 0.9rem; opacity: 0.9;">Conectando doadores e instituições para salvar vidas</p>
    </div>
  </footer>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Navbar scroll effect
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    // Mobile menu toggle
    const mobileToggle = document.getElementById('mobileToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    
    if (mobileToggle && mobileMenu) {
      mobileToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        const icon = mobileToggle.querySelector('i');
        icon.classList.toggle('bi-list');
        icon.classList.toggle('bi-x');
      });
    }
  </script>
</body>
</html>