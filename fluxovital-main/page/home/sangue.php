<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Fluxo Vital - Doação de Sangue</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #fcf8f8ff 0%, #f1f5f9 100%);
      color: #cd0505ff;
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
      margin-right: 8rem;
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
    .carousel-item img {
      height: 500px;
      object-fit: cover;
    }
    .section-title {
      font-weight: 800;
      font-size: 3rem;
      color: #1e293b;
      text-align: center;
      margin: 4rem 0 2rem;
      position: relative;
    }
    .section-title::after {
      content: '';
      position: absolute;
      bottom: -15px;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 5px;
      background: linear-gradient(135deg, #8B0000, #dc2626);
      border-radius: 3px;
    }
    .blood-stock-section {
      max-width: 1000px;
      margin: 0 auto 4rem;
      padding: 2rem;
      background: white;
      border-radius: 24px;
      box-shadow: 0 15px 50px rgba(0,0,0,0.1);
    }
    .blood-stock-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1.5rem;
    }
    .blood-bag-card {
      background: #f8fafc;
      border-radius: 16px;
      padding: 1.5rem;
      text-align: center;
      transition: all 0.3s ease;
    }
    .blood-bag-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    .status-cheio {
      background: #dcfce7 !important;
      color: #16a34a !important;
    }
    .status-estavel {
      background: #dbeafe !important;
      color: #2563eb !important;
    }
    .status-alerta {
      background: #fecaca !important;
      color: #dc2626 !important;
    }
    .status-reduzido {
      background: #fed7aa !important;
      color: #ea580c !important;
    }
    .blood-icon-cheio { color: #16a34a !important; }
    .blood-icon-estavel { color: #2563eb !important; }
    .blood-icon-alerta { color: #dc2626 !important; }
    .blood-icon-reduzido { color: #ea580c !important; }
    .blood-bag-title {
      font-size: 1.3rem;
      font-weight: 700;
      margin: 1rem 0 0.5rem;
    }
    .blood-bag-status {
      padding: 0.4rem 1rem;
      border-radius: 20px;
      font-weight: 600;
      font-size: 0.9rem;
      display: inline-block;
      margin-bottom: 1rem;
    }
    .blood-bag-level {
      width: 100%;
      height: 8px;
      background: #e5e7eb;
      border-radius: 4px;
      overflow: hidden;
      margin-top: 0.5rem;
    }
    .level-cheio {
      width: 90%;
      height: 100%;
      background: linear-gradient(135deg, #22c55e, #16a34a);
    }
    .level-estavel {
      width: 65%;
      height: 100%;
      background: linear-gradient(135deg, #3b82f6, #2563eb);
    }
    .level-reduzido {
      width: 40%;
      height: 100%;
      background: linear-gradient(135deg, #f59e0b, #ea580c);
    }
    .level-alerta {
      width: 20%;
      height: 100%;
      background: linear-gradient(135deg, #ef4444, #dc2626);
    }
    .donation-card {
      background: white;
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 8px 30px rgba(0,0,0,0.08);
      transition: all 0.3s ease;
      height: 100%;
    }
    .donation-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 60px rgba(0,0,0,0.15);
    }
    .donation-icon {
      color: #dc2626;
      font-size: 3rem;
      margin-bottom: 1rem;
    }

    /* FAQ Section - NOVO ESTILO */
    .faq-container {
      max-width: 900px;
      margin: 0 auto;
      padding: 0 1rem;
    }

    .faq-item {
      background: white;
      margin-bottom: 1.5rem;
      border-radius: 16px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.08);
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .faq-item:hover {
      box-shadow: 0 8px 30px rgba(139, 0, 0, 0.12);
    }

    .faq-question {
      width: 100%;
      padding: 1.8rem 2rem;
      background: none;
      border: none;
      text-align: left;
      font-weight: 700;
      font-size: 1.05rem;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: #1e293b;
      transition: all 0.3s ease;
      font-family: 'Inter', sans-serif;
    }

    .faq-question:hover {
      background: #fef2f2;
      color: #991b1b;
    }

    .faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
      background: #fef2f2;
    }

    .faq-answer p {
      padding: 1.5rem 2rem;
      color: #64748b;
      line-height: 1.7;
      margin: 0;
    }

    .faq-item.active .faq-answer {
      max-height: 300px;
    }

    .faq-icon {
      width: 30px;
      height: 30px;
      background: #fef2f2;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      color: #991b1b;
      flex-shrink: 0;
    }

    .faq-item.active .faq-icon {
      transform: rotate(45deg);
      background: #991b1b;
      color: white;
    }
    
    .hospitals {
      background: linear-gradient(135deg, #8B0000, #dc2626);
      color: white;
      padding: 5rem 2rem;
      margin: 3rem 0;
    }

    .hospitals-container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .hospitals h2 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      font-weight: 800;
      text-align: center;
    }

    .hospitals-subtitle {
      text-align: center;
      margin-bottom: 3rem;
      opacity: 0.95;
      font-size: 1.15rem;
    }

    .search-box {
      display: flex;
      gap: 1rem;
      margin-bottom: 3rem;
      flex-wrap: wrap;
      justify-content: center;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }

    .search-input {
      flex: 1;
      min-width: 300px;
      padding: 1rem 1.5rem;
      border-radius: 50px;
      border: none;
      font-size: 1rem;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      font-family: 'Inter', sans-serif;
    }

    .search-btn {
      background: white;
      color: #8B0000;
      padding: 1rem 2rem;
      white-space: nowrap;
      border: none;
      border-radius: 50px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .search-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(255,255,255,0.3);
    }

    .location-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 1.5rem;
    }

    .location-card {
      background: white;
      padding: 2rem;
      border-radius: 15px;
      text-align: left;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }

    .location-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 30px rgba(0,0,0,0.2);
    }

    .location-card h3 {
      color: #1e293b;
      margin-bottom: 1rem;
      font-size: 1.3rem;
    }

    .location-info {
      color: #64748b;
      margin-bottom: 0.7rem;
      display: flex;
      align-items: flex-start;
      gap: 0.7rem;
    }

    .location-info i {
      color: #dc2626;
      margin-top: 0.2rem;
      min-width: 20px;
    }

    .location-badge {
      display: inline-block;
      padding: 0.3rem 0.8rem;
      border-radius: 20px;
      font-size: 0.85rem;
      font-weight: 600;
      margin-top: 0.5rem;
    }

    .badge-hemocentro {
      background: #dcfce7;
      color: #16a34a;
    }

    .badge-hospital {
      background: #dbeafe;
      color: #2563eb;
    }

    .badge-laboratorio {
      background: #fef3c7;
      color: #d97706;
    }

    .no-results {
      text-align: center;
      padding: 3rem;
      color: white;
      font-size: 1.2rem;
      display: none;
    }
    
    .footer {
      background: linear-gradient(135deg, #9d040eff 0%, #bb0303ff 100%);
      margin-top: 5rem;
    }
    .btn-danger {
      background: linear-gradient(135deg, #8B0000, #dc2626);
      border: none;
      border-radius: 12px;
      font-weight: 700;
      padding: 1rem 2rem;
    }
    .btn-outline-danger {
      border: 2px solid #dc2626;
      color: #dc2626;
      border-radius: 12px;
      font-weight: 700;
      padding: 1rem 2rem;
    }
    @media (max-width: 768px) {
      .section-title {
        font-size: 2rem;
      }
      .nav-links {
        display: none;
      }
      .mobile-toggle {
        display: block;
      }
      .blood-stock-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
      }
      .location-grid {
        grid-template-columns: 1fr;
      }
      .search-input {
        min-width: 100%;
      }
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="nav-container">
        <a href="/fluxovital/page/home/index.php" class="logo">
          <img src="/fluxovital/assets/images/logo1.png" alt="Logo" onerror="this.style.display='none'">
          <div class="logo-text">
            <span class="logo-main">Fluxo Vital</span>
            <span class="logo-sub">Salvando Vidas</span>
          </div>
        </a>
        <ul class="nav-links">
          <li><a href="#home">Início</a></li>
          <li><a href="#doacoes">Doações</a></li>
          <li><a href="#estoque">Estoque</a></li>
          <li><a href="#locais">Locais</a></li>
          <li><a href="#faq">FAQ</a></li>
          <li><a href="/fluxovital/page/cadastro/escolha_categoria.php" class="nav-btn"><i class="fas fa-heart"></i> Quero Doar</a></li>
        </ul>
        <button class="mobile-toggle" id="menuToggle">
          <i class="fas fa-bars"></i>
        </button>
      </div>
      <div class="mobile-menu" id="mobileMenu">
        <a href="#home">Início</a>
        <a href="#doacoes">Doações</a>
        <a href="#estoque">Estoque</a>
        <a href="#locais">Locais</a>
        <a href="#faq">FAQ</a>
        <a href="/fluxovital/page/cadastro/escolha_categoria.php" class="nav-btn"><i class="fas fa-heart"></i> Quero Doar</a>
      </div>
    </nav>
  </header>

  <div class="container-fluid px-0" id="home">
    <div id="carouselBanners" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/fluxovital/assets/images/bannerblood.png" class="d-block w-100" alt="Banner 1">
        </div>
        <div class="carousel-item">
          <img src="/fluxovital/assets/images/bannerblood2.png" class="d-block w-100" alt="Banner 2">
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

  <section id="estoque">
    <h2 class="section-title">Estoque de Sangue</h2>
    <div class="blood-stock-section">
      <div class="blood-stock-grid">
        <div class="blood-bag-card status-reduzido">
          <i class="bi bi-droplet-fill blood-icon-reduzido" style="font-size: 3rem;"></i>
          <div class="blood-bag-title">Tipo A+</div>
          <div class="blood-bag-status status-reduzido">Reduzido</div>
          <div class="blood-bag-level"><div class="level-reduzido"></div></div>
        </div>
        <div class="blood-bag-card status-reduzido">
          <i class="bi bi-droplet-fill blood-icon-reduzido" style="font-size: 3rem;"></i>
          <div class="blood-bag-title">Tipo A-</div>
          <div class="blood-bag-status status-reduzido">Reduzido</div>
          <div class="blood-bag-level"><div class="level-reduzido"></div></div>
        </div>
        <div class="blood-bag-card status-cheio">
          <i class="bi bi-droplet-fill blood-icon-cheio" style="font-size: 3rem;"></i>
          <div class="blood-bag-title">Tipo B+</div>
          <div class="blood-bag-status status-cheio">Cheio</div>
          <div class="blood-bag-level"><div class="level-cheio"></div></div>
        </div>
        <div class="blood-bag-card status-alerta">
          <i class="bi bi-droplet-fill blood-icon-alerta" style="font-size: 3rem;"></i>
          <div class="blood-bag-title">Tipo B-</div>
          <div class="blood-bag-status status-alerta">Alerta</div>
          <div class="blood-bag-level"><div class="level-alerta"></div></div>
        </div>
        <div class="blood-bag-card status-estavel">
          <i class="bi bi-droplet-fill blood-icon-estavel" style="font-size: 3rem;"></i>
          <div class="blood-bag-title">Tipo AB+</div>
          <div class="blood-bag-status status-estavel">Estável</div>
          <div class="blood-bag-level"><div class="level-estavel"></div></div>
        </div>
        <div class="blood-bag-card status-reduzido">
          <i class="bi bi-droplet-fill blood-icon-reduzido" style="font-size: 3rem;"></i>
          <div class="blood-bag-title">Tipo AB-</div>
          <div class="blood-bag-status status-reduzido">Reduzido</div>
          <div class="blood-bag-level"><div class="level-reduzido"></div></div>
        </div>
        <div class="blood-bag-card status-alerta">
          <i class="bi bi-droplet-fill blood-icon-alerta" style="font-size: 3rem;"></i>
          <div class="blood-bag-title">Tipo O+</div>
          <div class="blood-bag-status status-alerta">Alerta</div>
          <div class="blood-bag-level"><div class="level-alerta"></div></div>
        </div>
        <div class="blood-bag-card status-alerta">
          <i class="bi bi-droplet-fill blood-icon-alerta" style="font-size: 3rem;"></i>
          <div class="blood-bag-title">Tipo O-</div>
          <div class="blood-bag-status status-alerta">Alerta</div>
          <div class="blood-bag-level"><div class="level-alerta"></div></div>
        </div>
      </div>
    </div>
  </section>

  <section id="doacoes">
    <h2 class="section-title">Doação de Sangue</h2>
    <div class="container" style="max-width: 1200px;">
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="donation-card text-center">
            <div class="donation-icon"><i class="fas fa-heart-pulse"></i></div>
            <h4>Por que doar?</h4>
            <p>Uma única doação pode salvar até quatro pessoas. O sangue é separado em componentes como hemácias, plaquetas, plasma e crioprecipitado.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="donation-card text-center">
            <div class="donation-icon"><i class="fas fa-procedures"></i></div>
            <h4>Quem pode receber?</h4>
            <p>Vítimas de acidentes, pacientes com anemia severa, doenças crônicas, recém-nascidos e outros. O tipo sanguíneo deve ser compatível.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="donation-card text-center">
            <div class="donation-icon"><i class="fas fa-hand-holding-heart"></i></div>
            <h4>Como doar?</h4>
            <p>Tenha entre 16 e 69 anos, esteja saudável e leve documento com foto a um hemocentro. Você passará por triagem.</p>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-md-6 mb-4">
          <div class="donation-card">
            <h4><i class="fas fa-check-circle text-success me-2"></i>Passo a passo</h4>
            <ol>
              <li>Verifique se atende aos requisitos básicos</li>
              <li>Encontre um hemocentro próximo</li>
              <li>Agende sua doação</li>
              <li>Compareça bem alimentado e hidratado</li>
              <li>Passe pela triagem clínica</li>
              <li>Realize a coleta (10-15 minutos)</li>
              <li>Descanse e faça um lanche</li>
            </ol>
            <a href="https://www.gov.br/saude/pt-br/composicao/saes/sangue" target="_blank" class="btn btn-danger mt-2">Encontrar Hemocentro</a>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="donation-card">
            <h4><i class="fas fa-info-circle text-primary me-2"></i>Informações importantes</h4>
            <ul>
              <li>Todo sangue doado é testado para segurança</li>
              <li>O processo é seguro, todo material é descartável</li>
              <li>Doar regularmente mantém estoques estáveis</li>
              <li>Seu corpo repõe o sangue em poucas horas</li>
              <li>A doação funciona como check-up de saúde</li>
              <li>Uma doação beneficia várias pessoas</li>
            </ul>
            <a href="https://www.gov.br/saude/pt-br/composicao/saes/sangue/doacao-de-sangue" target="_blank" class="btn btn-outline-danger mt-2">Saiba mais</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="hospitals" id="locais">
    <div class="hospitals-container">
      <h2>Encontre Locais de Doação</h2>
      <p class="hospitals-subtitle">Localize hemocentros, hospitais e laboratórios em São Luís para realizar sua doação de sangue</p>
      
      <div class="search-box">
        <input 
          type="text" 
          id="searchLocation" 
          class="search-input"
          placeholder="Digite o nome, endereço ou tipo de local..." 
        >
        <button onclick="searchLocations()" class="search-btn">
          <i class="fas fa-search"></i> Buscar
        </button>
      </div>

      <div class="location-grid" id="locationResults">
        <div class="location-card" data-name="hemomar centro hematologia hemoterapia cohama daniel touche doação sangue hemocentro">
          <h3>HEMOMAR - Centro de Hematologia</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Av. Daniel de La Touche - Cohama, São Luís - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3216-8100</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>24 horas - Doação: Seg a Sáb 7h às 18h</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Referência estadual em doação de sangue</span>
          </div>
          <span class="location-badge badge-hemocentro">Hemocentro</span>
        </div>

        <div class="location-card" data-name="hemomar imperatriz hemocentro doação sangue interior sul maranhão">
          <h3>HEMOMAR - Hemonúcleo Imperatriz</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Rua Urbano Santos - Centro, Imperatriz - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(99) 3524-8100</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 7h às 17h | Sáb: 7h às 12h</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Atende região sul do Maranhão</span>
          </div>
          <span class="location-badge badge-hemocentro">Hemocentro</span>
        </div>

        <div class="location-card" data-name="hospital universitário são luis barão itapary doação sangue centro ufma">
          <h3>Hospital Universitário - UFMA</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Rua Barão de Itapary, 227 - Centro, São Luís - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(98) 2109-1000</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 7h às 19h</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Banco de sangue e atendimento emergencial</span>
          </div>
          <span class="location-badge badge-hospital">Hospital</span>
        </div>

        <div class="location-card" data-name="hospital criança são luis silva jardim pediatria doação sangue centro">
          <h3>Hospital da Criança - São Luís</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Rua Silva Jardim, 135 - Centro, São Luís - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3218-8200</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 8h às 18h</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Especializado em pediatria</span>
          </div>
          <span class="location-badge badge-hospital">Hospital</span>
        </div>

        <div class="location-card" data-name="hospital são domingos nascimento moraes doação sangue centro particular">
          <h3>Hospital São Domingos</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Rua Nascimento de Moraes, 347 - Centro, São Luís - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3221-6600</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>24 horas</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Banco de sangue 24h</span>
          </div>
          <span class="location-badge badge-hospital">Hospital</span>
        </div>

        <div class="location-card" data-name="hospital carlos macieira renascença turu doação sangue holandeses">
          <h3>Hospital Carlos Macieira</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Av. dos Holandeses, 1000 - Turu, São Luís - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3214-3000</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 7h às 19h | Emergência: 24h</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Atendimento emergencial</span>
          </div>
          <span class="location-badge badge-hospital">Hospital</span>
        </div>

        <div class="location-card" data-name="laboratório sabin renascença exames sangue análises clínicas">
          <h3>Laboratório Sabin</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Av. dos Holandeses, 5 - Renascença, São Luís - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3235-8000</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 6h às 18h | Sáb: 6h às 14h</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Exames de tipagem sanguínea e hemograma</span>
          </div>
          <span class="location-badge badge-laboratorio">Laboratório</span>
        </div>

        <div class="location-card" data-name="laboratório padrão calhau exames sangue análises clínicas">
          <h3>Laboratório Padrão</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Av. Litorânea, 100 - Calhau, São Luís - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3235-1200</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 6h às 19h | Sáb: 6h às 15h</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Exames completos de sangue</span>
          </div>
          <span class="location-badge badge-laboratorio">Laboratório</span>
        </div>

        <div class="location-card" data-name="laboratório delboni auriemo renascença exames sangue análises clínicas">
          <h3>Laboratório Delboni Auriemo</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Shopping da Ilha - Renascença, São Luís - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3235-9000</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 7h às 17h | Sáb: 7h às 13h</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Rede nacional de laboratórios</span>
          </div>
          <span class="location-badge badge-laboratorio">Laboratório</span>
        </div>

        <div class="location-card" data-name="laboratório médico santa clara centro exames sangue análises clínicas">
          <h3>Laboratório Médico Santa Clara</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Rua do Sol, 300 - Centro, São Luís - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3232-7800</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 6h às 18h | Sáb: 7h às 12h</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Atendimento rápido e eficiente</span>
          </div>
          <span class="location-badge badge-laboratorio">Laboratório</span>
        </div>

        <div class="location-card" data-name="laboratório unimed renascença exames sangue análises clínicas convênio">
          <h3>Laboratório Unimed</h3>
          <div class="location-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Av. Colares Moreira, 444 - Renascença, São Luís - MA</span>
          </div>
          <div class="location-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3216-9000</span>
          </div>
          <div class="location-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 6h30 às 18h | Sáb: 7h às 13h</span>
          </div>
          <div class="location-info">
            <i class="fas fa-star"></i>
            <span>Atende convênios e particulares</span>
          </div>
          <span class="location-badge badge-laboratorio">Laboratório</span>
        </div>
      </div>

      <div class="no-results" id="noResults">
        <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
        <p>Nenhum local encontrado. Tente buscar por outro termo.</p>
      </div>
    </div>
  </section>

  <section id="faq">
    <h2 class="section-title">Perguntas Frequentes</h2>
    <div class="faq-container">
      <div class="faq-item">
        <button class="faq-question">
          <span>Quem pode doar sangue?</span>
          <span class="faq-icon"><i class="fas fa-plus"></i></span>
        </button>
        <div class="faq-answer">
          <p>Pessoas entre 16 e 69 anos (primeira doação até 60 anos), com no mínimo 50kg, em boas condições de saúde, descansadas e alimentadas. Apresentar documento com foto.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span>Com que frequência posso doar?</span>
          <span class="faq-icon"><i class="fas fa-plus"></i></span>
        </button>
        <div class="faq-answer">
          <p>Homens: a cada 2 meses (até 4x/ano). Mulheres: a cada 3 meses (até 3x/ano). Intervalo necessário para reposição de ferro.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span>Doação de sangue dói?</span>
          <span class="faq-icon"><i class="fas fa-plus"></i></span>
        </button>
        <div class="faq-answer">
          <p>Pode causar leve dor na picada inicial. Durante o processo, a maioria sente apenas leve incômodo. É rápido, seguro e qualquer desconforto passa logo.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span>Quanto tempo dura?</span>
          <span class="faq-icon"><i class="fas fa-plus"></i></span>
        </button>
        <div class="faq-answer">
          <p>Todo o processo leva cerca de 40 minutos. A coleta em si dura no máximo 10 minutos. Após, recomenda-se 15 minutos de observação.</p>
        </div>
      </div>

      <div class="faq-item">
        <button class="faq-question">
          <span>Como é feita a doação?</span>
          <span class="faq-icon"><i class="fas fa-plus"></i></span>
        </button>
        <div class="faq-answer">
          <p>O doador deita em uma cadeira e uma agulha é colocada no braço para coletar o sangue. A coleta dura cerca de 10 minutos. Ao final, recebe lanche e orientações.</p>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5 class="mt-2">Fluxo Vital</h5>
          <p>Conectando doadores e receptores para salvar vidas. Facilitamos o processo de doação para garantir acesso a todos.</p>
        </div>
        <div class="col-md-4 mb-3">
          <h5>Links Úteis</h5>
          <ul class="list-unstyled">
            <li><a href="#doacoes" class="text-white text-decoration-none">Doações</a></li>
            <li><a href="#faq" class="text-white text-decoration-none">Perguntas Frequentes</a></li>
            <li><a href="#locais" class="text-white text-decoration-none">Locais</a></li>
            <li><a href="#estoque" class="text-white text-decoration-none">Estoque de Sangue</a></li>
            <li><a href="https://www.gov.br/saude/pt-br/composicao/saes/sangue" target="_blank" class="text-white text-decoration-none">Portal Nacional do Sangue</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-3">
          <h5>Contato</h5>
          <p><i class="fas fa-map-marker-alt me-2"></i>CEUMA - Renascença - São Luís/MA</p>
          <p><i class="fas fa-phone me-2"></i>(98) 4002-8922</p>
          <p><i class="fas fa-envelope me-2"></i>contato@fluxovital.org.br</p>
        </div>
      </div>
      <div class="text-center mt-4 pt-4" style="border-top: 1px solid rgba(255,255,255,0.1);">
        <p class="mb-0">&copy; 2025 Fluxo Vital. Todos os direitos reservados.</p>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('active');
      const icon = menuToggle.querySelector('i');
      icon.classList.toggle('fa-bars');
      icon.classList.toggle('fa-times');
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
          const navbarHeight = document.querySelector('.navbar').offsetHeight;
          const targetPosition = target.offsetTop - navbarHeight - 20;
          
          window.scrollTo({
            top: targetPosition,
            behavior: 'smooth'
          });

          if (mobileMenu.classList.contains('active')) {
            mobileMenu.classList.remove('active');
            menuToggle.querySelector('i').classList.replace('fa-times', 'fa-bars');
          }
        }
      });
    });


    document.querySelectorAll('.faq-question').forEach(btn => {
      btn.addEventListener('click', () => {
        const item = btn.parentElement;
        const isActive = item.classList.contains('active');
        
        // Remove 'active' de todos os itens
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
        
        // Adiciona 'active' apenas ao item clicado (se não estava ativo)
        if (!isActive) item.classList.add('active');
      });
    });

    function searchLocations() {
      const searchValue = document.getElementById('searchLocation').value.toLowerCase().trim();
      const locationCards = document.querySelectorAll('.location-card');
      const noResults = document.getElementById('noResults');
      let visibleCount = 0;
      
      locationCards.forEach(card => {
        const searchData = card.getAttribute('data-name').toLowerCase();
        const cardText = card.textContent.toLowerCase();
        
        if (searchValue === '' || searchData.includes(searchValue) || cardText.includes(searchValue)) {
          card.style.display = 'block';
          visibleCount++;
        } else {
          card.style.display = 'none';
        }
      });
      
      if (visibleCount === 0) {
        noResults.style.display = 'block';
      } else {
        noResults.style.display = 'none';
      }
    }

    document.getElementById('searchLocation').addEventListener('keypress', (e) => {
      if (e.key === 'Enter') searchLocations();
    });

    document.getElementById('searchLocation').addEventListener('input', searchLocations);
  </script>

</body>
</html>
