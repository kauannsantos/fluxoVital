<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fluxo Vital - Doação de Medula Óssea</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #b71c1c;
      --primary-dark: #8a1212;
      --bg-soft: #fff3f2;
      --text: #2d0b0b;
      --text-muted: #6b4a4a;
      --white: #fff;
      --shadow: 0 4px 20px rgba(183,28,28,0.1);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(180deg, #fffaf8, #fff1ee);
      color: var(--text);
      line-height: 1.6;
    }

    /* Nova Navbar Moderna */
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
    /* Hero */
    .hero {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: var(--white);
      background: url('https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=2000') center/cover;
      position: relative;
    }

    .hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at center, transparent 0%, rgba(0,0,0,0.3) 100%);
    }

    .hero-content {
      max-width: 800px;
      padding: 2rem;
      position: relative;
      z-index: 1;
    }

    .hero h1 {
      font-size: 3.5rem;
      font-weight: 800;
      margin-bottom: 1.2rem;
      text-shadow: 0 4px 20px rgba(0,0,0,0.3);
      line-height: 1.1;
    }

    .hero p {
      font-size: 1.3rem;
      margin-bottom: 2.5rem;
      opacity: 0.95;
      line-height: 1.6;
    }

    .hero-btns {
      display: flex;
      gap: 1.2rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn {
      padding: 1rem 2rem;
      border-radius: 50px;
      font-weight: 700;
      font-size: 1.05rem;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.6rem;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .btn:hover {
      transform: translateY(-3px);
    }

    .btn-primary {
      background: var(--white);
      color: var(--primary-dark);
      box-shadow: 0 4px 20px rgba(255,255,255,0.3);
    }

    .btn-primary:hover {
      box-shadow: 0 8px 30px rgba(255,255,255,0.4);
    }

    .btn-secondary {
      background: rgba(255,255,255,0.15);
      color: var(--white);
      border: 2px solid rgba(255,255,255,0.4);
      backdrop-filter: blur(10px);
    }

    .btn-secondary:hover {
      background: rgba(255,255,255,0.25);
      border-color: var(--white);
    }

    /* Stats */
    .stats {
      background: var(--white);
      padding: 3rem 1.5rem;
      margin-top: -3rem;
      position: relative;
      z-index: 10;
      border-radius: 20px 20px 0 0;
      box-shadow: var(--shadow);
    }

    .stats-grid {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 1.5rem;
    }

    .stat {
      text-align: center;
      padding: 1.5rem;
      background: linear-gradient(135deg, var(--bg-soft), #fff);
      border-radius: 15px;
      transition: all 0.3s ease;
      border: 1px solid rgba(183,28,28,0.1);
    }

    .stat:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(183,28,28,0.15);
    }

    .stat-number {
      font-size: 2.8rem;
      font-weight: 800;
      color: var(--primary);
      display: block;
    }

    .stat-label {
      font-weight: 700;
      margin-top: 0.5rem;
      color: var(--text);
    }

    .stat-description {
      font-size: 0.9rem;
      color: var(--text-muted);
      margin-top: 0.3rem;
    }


    .section {
      max-width: 1200px;
      margin: 0 auto;
      padding: 5rem 1.5rem;
    }

    .section-title {
      text-align: center;
      font-size: 2.8rem;
      font-weight: 800;
      margin-bottom: 1rem;
      color: var(--text);
      position: relative;
      display: inline-block;
      left: 50%;
      transform: translateX(-50%);
    }

    .section-title::after {
      content: '';
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: -15px;
      width: 80px;
      height: 5px;
      background: linear-gradient(90deg, var(--primary), var(--primary-dark));
      border-radius: 3px;
    }

    .section-subtitle {
      text-align: center;
      color: var(--text-muted);
      font-size: 1.15rem;
      max-width: 700px;
      margin: 0 auto 3.5rem;
      line-height: 1.7;
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    .card {
      background: var(--white);
      padding: 2.5rem;
      border-radius: 15px;
      box-shadow: var(--shadow);
      transition: all 0.3s ease;
      border: 1px solid rgba(183,28,28,0.05);
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 40px rgba(183,28,28,0.2);
    }

    .card-icon {
      width: 70px;
      height: 70px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--white);
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.8rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 4px 15px rgba(183,28,28,0.3);
    }

    .card-title {
      font-size: 1.4rem;
      font-weight: 700;
      margin-bottom: 0.8rem;
      color: var(--text);
    }

    .card-description {
      color: var(--text-muted);
      line-height: 1.7;
      font-size: 1rem;
    }

    .process {
      background: linear-gradient(135deg, var(--bg-soft), rgba(255,243,242,0.5));
      padding: 5rem 1.5rem;
    }

    .steps {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    .step {
      background: var(--white);
      padding: 2.5rem;
      border-radius: 15px;
      text-align: center;
      box-shadow: var(--shadow);
      transition: all 0.3s ease;
      border: 1px solid rgba(183,28,28,0.05);
    }

    .step:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 40px rgba(183,28,28,0.2);
    }

    .step-number {
      width: 70px;
      height: 70px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--white);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 800;
      font-size: 1.8rem;
      margin: 0 auto 1.5rem;
      box-shadow: 0 4px 15px rgba(183,28,28,0.3);
    }

    .step-title {
      font-weight: 700;
      font-size: 1.3rem;
      margin-bottom: 0.8rem;
      color: var(--text);
    }

    .step-description {
      color: var(--text-muted);
      line-height: 1.7;
    }

    /* FAQ */
    .faq {
      max-width: 900px;
      margin: 0 auto;
    }

    .faq-item {
      background: var(--white);
      margin-bottom: 1rem;
      border-radius: 12px;
      box-shadow: var(--shadow);
      overflow: hidden;
      border: 1px solid rgba(183,28,28,0.05);
      transition: all 0.3s ease;
    }

    .faq-item:hover {
      box-shadow: 0 8px 30px rgba(183,28,28,0.15);
    }

    .faq-question {
      width: 100%;
      padding: 1.5rem 1.8rem;
      background: none;
      border: none;
      text-align: left;
      font-weight: 700;
      font-size: 1.05rem;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
      color: var(--text);
      transition: all 0.3s ease;
    }

    .faq-question:hover {
      color: var(--primary);
    }

    .faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
      background: var(--bg-soft);
    }

    .faq-answer p {
      padding: 1.5rem 1.8rem;
      color: var(--text-muted);
      line-height: 1.7;
    }

    .faq-item.active .faq-answer {
      max-height: 300px;
    }

    .faq-icon {
      width: 30px;
      height: 30px;
      background: var(--bg-soft);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
      color: var(--primary);
    }

    .faq-item.active .faq-icon {
      transform: rotate(45deg);
      background: var(--primary);
      color: var(--white);
    }

    .hospitals {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--white);
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
      color: var(--primary-dark);
      padding: 1rem 2rem;
      white-space: nowrap;
    }

    .hospital-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
      gap: 1.5rem;
    }

    .hospital-card {
      background: white;
      padding: 2rem;
      border-radius: 15px;
      text-align: left;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }

    .hospital-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 30px rgba(0,0,0,0.2);
    }

    .hospital-card h3 {
      color: var(--text);
      margin-bottom: 1rem;
      font-size: 1.3rem;
    }

    .hospital-info {
      color: var(--text-muted);
      margin-bottom: 0.7rem;
      display: flex;
      align-items: flex-start;
      gap: 0.7rem;
    }

    .hospital-info i {
      color: var(--primary);
      margin-top: 0.2rem;
      min-width: 20px;
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
      color: var(--white);
      padding: 3rem 1.5rem 1.5rem;
      margin-top: 5rem;
    }

    .footer-grid {
      max-width: 1200px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 2.5rem;
      margin-bottom: 2.5rem;
    }

    .footer h3 {
      margin-bottom: 1.2rem;
      font-size: 1.2rem;
      font-weight: 700;
    }

    .footer ul {
      list-style: none;
    }

    .footer li {
      margin-bottom: 0.7rem;
      opacity: 0.9;
    }

    .footer a {
      color: inherit;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .footer a:hover {
      opacity: 1;
      padding-left: 5px;
    }

    .footer-bottom {
      text-align: center;
      padding-top: 2rem;
      border-top: 1px solid rgba(255,255,255,0.15);
      opacity: 0.8;
    }

    .back-top {
      position: fixed;
      right: 2rem;
      bottom: 2rem;
      width: 55px;
      height: 55px;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--white);
      border: none;
      border-radius: 50%;
      cursor: pointer;
      display: none;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 20px rgba(183,28,28,0.4);
      z-index: 100;
      transition: all 0.3s ease;
      font-size: 1.2rem;
    }

    .back-top:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 30px rgba(183,28,28,0.5);
    }

    .back-top.visible {
      display: flex;
    }

    @media (max-width: 768px) {
      .nav-links { display: none; }
      .mobile-toggle { display: flex; align-items: center; justify-content: center; }
      .hero h1 { font-size: 2.2rem; }
      .hero p { font-size: 1.1rem; }
      .section-title { font-size: 2rem; }
      .nav-container { height: 70px; }
      .cards { grid-template-columns: 1fr; }
      .steps { grid-template-columns: 1fr; }
      .hospital-grid { grid-template-columns: 1fr; }
      .search-input { min-width: 100%; }
    }
  </style>
</head>
<body>

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
        <li><a href="#about">Sobre</a></li>
        <li><a href="#process">Processo</a></li>
        <li><a href="#hospitals">Hospitais</a></li>
        <li><a href="#faq">FAQ</a></li>
        <li><a href="/fluxovital/page/cadastro/escolha_categoria.php" class="nav-btn"><i class="fas fa-heart"></i> Quero Doar</a></li>
      </ul>
      <button class="mobile-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
      </button>
    </div>
    <div class="mobile-menu" id="mobileMenu">
      <a href="#home">Início</a>
      <a href="#about">Sobre</a>
      <a href="#process">Processo</a>
      <a href="#hospitals">Hospitais</a>
      <a href="#faq">FAQ</a>
      <a href="/fluxovital/page/cadastro/escolha_categoria.php" class="nav-btn"><i class="fas fa-heart"></i> Quero Doar</a>
    </div>
  </nav>

  <section class="hero" id="home">
    <div class="hero-content">
      <h1>Doe Medula Óssea, Salve Vidas</h1>
      <p>Seja um doador e ofereça uma nova chance de vida para quem precisa. Um simples gesto que pode fazer toda a diferença no mundo.</p>
      <div class="hero-btns">
        <a href="/fluxovital/page/cadastro/escolha_categoria.php" class="btn btn-primary">
          <i class="fas fa-heart"></i> Quero Doar Agora
        </a>
        <a href="#about" class="btn btn-secondary">
          <i class="fas fa-info-circle"></i> Saiba Mais
        </a>
      </div>
    </div>
  </section>

  <section class="stats">
    <div class="stats-grid">
      <div class="stat">
        <span class="stat-number">35M</span>
        <div class="stat-label">Doadores Cadastrados</div>
        <div class="stat-description">No mundo todo</div>
      </div>
      <div class="stat">
        <span class="stat-number">25%</span>
        <div class="stat-label">Compatibilidade</div>
        <div class="stat-description">Entre irmãos</div>
      </div>
      <div class="stat">
        <span class="stat-number">90%</span>
        <div class="stat-label">Taxa de Cura</div>
        <div class="stat-description">Com transplante</div>
      </div>
      <div class="stat">
        <span class="stat-number">5K</span>
        <div class="stat-label">Aguardam Doador</div>
        <div class="stat-description">No Brasil</div>
      </div>
    </div>
  </section>


  <section class="section" id="about">
    <h2 class="section-title">Por que Doar?</h2>
    <p class="section-subtitle">A medula óssea é essencial para a produção de células sanguíneas e pode salvar vidas de pessoas com leucemia, linfomas e outras doenças graves.</p>
    <div class="cards">
      <div class="card">
        <div class="card-icon"><i class="fas fa-heartbeat"></i></div>
        <h3 class="card-title">Salvar Vidas</h3>
        <p class="card-description">Para muitos pacientes com doenças hematológicas, o transplante de medula óssea representa a única chance real de cura e sobrevivência.</p>
      </div>
      <div class="card">
        <div class="card-icon"><i class="fas fa-users"></i></div>
        <h3 class="card-title">Compatibilidade Rara</h3>
        <p class="card-description">A chance de encontrar um doador compatível fora da família é de apenas 1 em 100.000. Sua doação pode ser única.</p>
      </div>
      <div class="card">
        <div class="card-icon"><i class="fas fa-shield-alt"></i></div>
        <h3 class="card-title">Processo Seguro</h3>
        <p class="card-description">A doação é um procedimento seguro e bem estabelecido, realizado em ambiente hospitalar com toda assistência médica necessária.</p>
      </div>
    </div>
  </section>

  <section class="process" id="process">
    <h2 class="section-title">Como Funciona</h2>
    <p class="section-subtitle">Um processo simples e seguro que pode transformar vidas</p>
    <div class="steps">
      <div class="step">
        <div class="step-number">1</div>
        <h3 class="step-title">Cadastro</h3>
        <p class="step-description">Procure um hemocentro e faça seu cadastro. É necessário ter entre 18 e 35 anos e pesar mais de 50kg.</p>
      </div>
      <div class="step">
        <div class="step-number">2</div>
        <h3 class="step-title">Exame</h3>
        <p class="step-description">Será coletada uma pequena amostra de sangue para análise de compatibilidade (HLA).</p>
      </div>
      <div class="step">
        <div class="step-number">3</div>
        <h3 class="step-title">Registro</h3>
        <p class="step-description">Seus dados ficam armazenados no REDOME até os 60 anos de idade.</p>
      </div>
      <div class="step">
        <div class="step-number">4</div>
        <h3 class="step-title">Doação</h3>
        <p class="step-description">Se houver compatibilidade com algum paciente, você será contatado para realizar a doação.</p>
      </div>
    </div>
  </section>

  <section class="hospitals" id="hospitals">
    <div class="hospitals-container">
      <h2>Encontre um Centro de Transplante</h2>
      <p class="hospitals-subtitle">Localize o hospital mais próximo apto a realizar transplante de medula óssea em São Luís</p>
      
      <div class="search-box">
        <input 
          type="text" 
          id="searchLocation" 
          class="search-input"
          placeholder="Digite o nome do hospital, endereço ou especialidade..." 
        >
        <button onclick="searchHospitals()" class="btn search-btn">
          <i class="fas fa-search"></i> Buscar
        </button>
      </div>

      <div class="hospital-grid" id="hospitalResults">
        <!-- Hospital 1 -->
        <div class="hospital-card" data-name="hospital universitário são luis centro barão itapary transplante medula">
          <h3>Hospital Universitário - São Luís</h3>
          <div class="hospital-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Rua Barão de Itapary, 227 - Centro, São Luís - MA</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-phone"></i>
            <span>(98) 2109-1000</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 7h às 19h</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-star"></i>
            <span>Transplante de medula óssea disponível</span>
          </div>
        </div>

        <div class="hospital-card" data-name="hospital criança são luis centro silva jardim pediatria transplante">
          <h3>Hospital da Criança - São Luís</h3>
          <div class="hospital-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Rua Silva Jardim, 135 - Centro, São Luís - MA</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3218-8200</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 8h às 18h</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-star"></i>
            <span>Especializado em pediatria e transplantes</span>
          </div>
        </div>

        <div class="hospital-card" data-name="centro hematologia hemomar cohama daniel touche transplante medula sangue">
          <h3>Centro de Hematologia HEMOMAR</h3>
          <div class="hospital-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Av. Daniel de La Touche - Cohama, São Luís - MA</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3216-8100</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-clock"></i>
            <span>24 horas - Emergências</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-star"></i>
            <span>Referência em transplantes de medula óssea</span>
          </div>
        </div>


        <div class="hospital-card" data-name="hospital são domingos centro nascimento moraes transplante oncologia hematologia">
          <h3>Hospital São Domingos</h3>
          <div class="hospital-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Rua Nascimento de Moraes, 347 - Centro, São Luís - MA</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3221-6600</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-clock"></i>
            <span>Segunda a Domingo: 24 horas</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-star"></i>
            <span>Centro de oncologia e hematologia</span>
          </div>
        </div>

  
        <div class="hospital-card" data-name="hospital carlos macieira renascença transplante turu cirurgia">
          <h3>Hospital Carlos Macieira</h3>
          <div class="hospital-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Av. dos Holandeses, 1000 - Turu, São Luís - MA</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3214-3000</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-clock"></i>
            <span>Seg a Sex: 7h às 19h | Emergência: 24h</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-star"></i>
            <span>Suporte a procedimentos de transplante</span>
          </div>
        </div>

  
        <div class="hospital-card" data-name="hospital socorrão djalma marques socorro urgência emergência">
          <h3>Hospital de Urgência Dr. Clementino Moura (Socorrão II)</h3>
          <div class="hospital-info">
            <i class="fas fa-map-marker-alt"></i>
            <span>Av. Djalma Dutra - Alemanha, São Luís - MA</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-phone"></i>
            <span>(98) 3216-3900</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-clock"></i>
            <span>24 horas - Pronto Socorro</span>
          </div>
          <div class="hospital-info">
            <i class="fas fa-star"></i>
            <span>Atendimento de urgência e emergência</span>
          </div>
        </div>
      </div>

      <div class="no-results" id="noResults">
        <i class="fas fa-search" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.5;"></i>
        <p>Nenhum hospital encontrado. Tente buscar por outro termo.</p>
      </div>
    </div>
  </section>

  <section class="section" id="faq">
    <h2 class="section-title">Perguntas Frequentes</h2>
    <p class="section-subtitle">Esclareça suas principais dúvidas sobre a doação de medula óssea</p>
    <div class="faq">
      <div class="faq-item">
        <button class="faq-question">
          Quem pode doar medula óssea?
          <span class="faq-icon"><i class="fas fa-plus"></i></span>
        </button>
        <div class="faq-answer">
          <p>Pessoas entre 18 e 35 anos, com boa saúde, peso acima de 50kg e sem doenças impeditivas como HIV, hepatites B e C, ou doença de Chagas.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-question">
          A doação de medula óssea dói?
          <span class="faq-icon"><i class="fas fa-plus"></i></span>
        </button>
        <div class="faq-answer">
          <p>O procedimento é realizado sob anestesia quando necessário. Pode haver desconforto leve após o procedimento, similar a uma dor muscular temporária.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-question">
          Quais são os riscos da doação?
          <span class="faq-icon"><i class="fas fa-plus"></i></span>
        </button>
        <div class="faq-answer">
          <p>Os riscos são mínimos e supervisionados por equipe médica especializada. A medula óssea se regenera completamente em poucas semanas e a recuperação é rápida.</p>
        </div>
      </div>
      <div class="faq-item">
        <button class="faq-question">
          Como sei se sou compatível com alguém?
          <span class="faq-icon"><i class="fas fa-plus"></i></span>
        </button>
        <div class="faq-answer">
          <p>A compatibilidade é determinada através de exames laboratoriais de HLA. Se houver um paciente compatível, você será contatado pelos profissionais do REDOME.</p>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer-grid">
      <div>
        <h3>Fluxo Vital</h3>
        <ul>
          <li><a href="#about">Sobre nós</a></li>
          <li><a href="#process">Como funciona</a></li>
          <li><a href="#hospitals">Hospitais</a></li>
          <li><a href="#faq">Perguntas frequentes</a></li>
        </ul>
      </div>
      <div>
        <h3>Recursos Úteis</h3>
        <ul>
          <li><a href="https://www.inca.gov.br/conteudo-completo/redome-0" target="_blank">REDOME</a></li>
          <li><a href="https://www.prosangue.sp.gov.br/" target="_blank">Pró-Sangue</a></li>
          <li><a href="https://www.hemocentro.unicamp.br/" target="_blank">Hemocentro Unicamp</a></li>
          <li><a href="https://www.abrasta.org.br/" target="_blank">ABRASTA</a></li>
        </ul>
      </div>
      <div>
        <h3>Informações</h3>
        <ul>
          <li><a href="#">Termos de uso</a></li>
          <li><a href="#">Política de privacidade</a></li>
          <li><a href="#">Diretrizes médicas</a></li>
          <li><a href="#">Suporte</a></li>
        </ul>
      </div>
      <div>
        <h3>Fale Conosco</h3>
        <ul>
          <li><i class="fas fa-envelope"></i> contato@fluxovital.com.br</li>
          <li><i class="fas fa-phone"></i> 0800 123 4567</li>
          <li><i class="fas fa-ambulance"></i> Emergências: 192</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 Fluxo Vital. Todos os direitos reservados. Desenvolvido com ❤️ para salvar vidas.</p>
    </div>
  </footer>

  <button class="back-top" id="backTop">
    <i class="fas fa-arrow-up"></i>
  </button>

  <script>
    const navbar = document.querySelector('.navbar');
    
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.pageYOffset > 50);
    });

    const toggle = document.getElementById('menuToggle');
    const menu = document.getElementById('mobileMenu');
    
    toggle.addEventListener('click', () => {
      menu.classList.toggle('active');
      const icon = toggle.querySelector('i');
      icon.className = menu.classList.contains('active') ? 'fas fa-times' : 'fas fa-bars';
    });

    menu.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        menu.classList.remove('active');
        toggle.querySelector('i').className = 'fas fa-bars';
      });
    });

    document.querySelectorAll('.faq-question').forEach(btn => {
      btn.addEventListener('click', () => {
        const item = btn.parentElement;
        const isActive = item.classList.contains('active');
        
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
        
        if (!isActive) item.classList.add('active');
      });
    });

    const backTop = document.getElementById('backTop');
    
    window.addEventListener('scroll', () => {
      backTop.classList.toggle('visible', window.pageYOffset > 300);
    });
    
    backTop.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', e => {
        const href = anchor.getAttribute('href');
        if (href === '#' || !href.startsWith('#')) return;
        
        const target = document.querySelector(href);
        if (!target) return;
        
        e.preventDefault();
        const offset = 80;
        window.scrollTo({
          top: target.offsetTop - offset,
          behavior: 'smooth'
        });
      });
    });

    function searchHospitals() {
      const searchValue = document.getElementById('searchLocation').value.toLowerCase().trim();
      const hospitalCards = document.querySelectorAll('.hospital-card');
      const noResults = document.getElementById('noResults');
      let visibleCount = 0;
      
      hospitalCards.forEach(card => {
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
      if (e.key === 'Enter') searchHospitals();
    });


    document.getElementById('searchLocation').addEventListener('input', searchHospitals);
  </script>
</body>
</html>
