<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLUXO VITAL - Doação de Leite Materno</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #7f1d1d;
            --primary-dark: #991b1b;
            --accent: #b91c1c;
            --light: #dc2626;
            --bg-light: #fef2f2;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --white: #ffffff;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        /* Navbar */
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

        .hero-banner {
            background: url('https://images.unsplash.com/photo-1555252333-9f8e92e65df9?q=80&w=2070') center/cover;
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            padding: 2rem;
            position: relative;
        }

        .banner-content {
            max-width: 900px;
            margin: 0 auto;
        }

        .banner-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .banner-content p {
            font-size: 1.2rem;
            margin-bottom: 3rem;
            line-height: 1.6;
            opacity: 0.95;
        }

        .btn-group {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            padding: 1.2rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .btn-primary {
            background: white;
            color: #8B0000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.3);
            background: #f8f8f8;
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background: white;
            color: #8B0000;
        }

        .btn i {
            font-size: 1rem;
        }

        /* Sections */
        section {
            padding: 5rem 0;
            position: relative;
        }

        .section-title {
            text-align: center;
            font-size: 2.8rem;
            margin-bottom: 1rem;
            color: var(--primary);
            font-weight: 900;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.2rem;
            color: var(--text-light);
            margin-bottom: 4rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }


        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            border: 2px solid transparent;
            opacity: 0;
            transform: translateY(30px);
        }

        .card.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(127, 29, 29, 0.15);
            border-color: var(--accent);
        }

        .card-icon {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            display: block;
        }

        .card h3 {
            color: var(--primary);
            margin-bottom: 1rem;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .card p {
            color: var(--text-light);
            line-height: 1.7;
        }

        /* Donation Section */
        .donation-section {
            background: linear-gradient(135deg, var(--bg-light), #fee2e2);
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .step {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            opacity: 0;
            transform: translateY(30px);
        }

        .step.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .step:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(127, 29, 29, 0.15);
        }

        .step-number {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.8rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 8px 20px rgba(127, 29, 29, 0.3);
        }

        .step h3 {
            color: var(--primary);
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .locations-section {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
        }

        .locations-section .section-title {
            color: white;
        }

        .locations-section .section-subtitle {
            color: rgba(255,255,255,0.9);
        }

        .search-box {
            display: flex;
            gap: 1rem;
            max-width: 600px;
            margin: 0 auto 3rem;
            background: rgba(255,255,255,0.1);
            padding: 0.5rem;
            border-radius: 50px;
            backdrop-filter: blur(10px);
        }

        .search-input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            outline: none;
        }

        .search-btn {
            background: white;
            color: var(--primary);
            border: none;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(255,255,255,0.3);
        }

        .locations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        .location-card {
            background: white;
            color: var(--text-dark);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(30px);
        }

        .location-card.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .location-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }

        .location-card h3 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.3rem;
        }

        .location-detail {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin-bottom: 0.8rem;
            color: var(--text-light);
        }

        .location-detail i {
            color: var(--accent);
            width: 20px;
        }

        /* FAQ Section */
        .faq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-item {
            background: white;
            margin-bottom: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
        }

        .faq-item.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .faq-item:hover {
            box-shadow: 0 8px 30px rgba(127, 29, 29, 0.12);
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
            color: var(--text-dark);
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .faq-question:hover {
            background: var(--bg-light);
            color: var(--primary);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background: var(--bg-light);
        }

        .faq-answer p {
            padding: 1.5rem 2rem;
            color: var(--text-light);
            line-height: 1.7;
        }

        .faq-item.active .faq-answer {
            max-height: 300px;
        }

        .faq-icon {
            width: 30px;
            height: 30px;
            background: var(--bg-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            color: var(--primary);
            flex-shrink: 0;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
            background: var(--primary);
            color: var(--white);
        }

        footer {
            background: linear-gradient(135deg, #9d040eff 0%, #bb0303ff 100%);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 5rem;
        }

        .footer-section h3 {
            color: #fecaca;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .footer-section a {
            color: #d1d5db;
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.2);
            padding-top: 2rem;
            text-align: center;
            color: #d1d5db;
        }

        @media (max-width: 968px) {
            .nav-links {
                display: none;
            }

            .mobile-toggle {
                display: flex;
            }

            .logo-main {
                font-size: 1.2rem;
            }

            .logo-sub {
                font-size: 0.65rem;
            }

            .banner-content h1 {
                font-size: 2.5rem;
            }

            .banner-content p {
                font-size: 1.1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .search-box {
                flex-direction: column;
                border-radius: 20px;
            }

            .search-input, .search-btn {
                border-radius: 15px;
            }
        }

        @media (max-width: 768px) {
            .banner-content h1 {
                font-size: 2rem;
            }
            
            .banner-content p {
                font-size: 1rem;
            }
            
            .btn-group {
                flex-direction: column;
                gap: 1rem;
            }
            
            .btn {
                width: 100%;
                max-width: 300px;
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
                <li><a href="#inicio">Início</a></li>
                <li><a href="#doacao">Como Doar</a></li>
                <li><a href="#locais">Locais</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="#contato">Contato</a></li>
                <li><a href="/fluxovital/page/cadastro/escolha_categoria.php" class="nav-btn"><i class="fas fa-heart"></i> Quero Doar</a></li>
            </ul>
            
            <button class="mobile-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    
    <div class="mobile-menu" id="mobileMenu">
        <a href="#inicio">Início</a>
        <a href="#doacao">Como Doar</a>
        <a href="#locais">Locais</a>
        <a href="#faq">FAQ</a>
        <a href="#contato">Contato</a>
        <a href="#doacao" class="nav-btn">Quero Doar</a>
    </div>

    <section id="inicio" class="hero-banner">
        <div class="banner-content">
            <h1>Doe Leite Materno, Salve Vidas</h1>
            <p>Seja uma doadora e ofereça uma nova chance de vida para quem precisa.<br>Um simples gesto que pode fazer toda a diferença no mundo.</p>
            
            <div class="btn-group">
                <a href="/fluxovital/page/cadastro/escolha_categoria.php" class="btn btn-primary">
                    <i class="fas fa-heart"></i> Quero Doar Agora
                </a>
                <a href="#about" class="btn btn-secondary">
                    <i class="fas fa-info-circle"></i> Saiba Mais
                </a>
            </div>
        </div>
    </section>

    <section id="beneficios">
        <div class="container">
            <h2 class="section-title">Benefícios do Leite Materno</h2>
            <p class="section-subtitle">O leite materno é o alimento mais completo e seguro para os bebês, especialmente para prematuros</p>
            
            <div class="cards-grid">
                <div class="card">
                    <span class="card-icon">🛡️</span>
                    <h3>Proteção Imunológica</h3>
                    <p>Rico em anticorpos que protegem contra infecções, alergias e doenças, fortalecendo o sistema imunológico desde os primeiros dias.</p>
                </div>
                <div class="card">
                    <span class="card-icon">🧠</span>
                    <h3>Desenvolvimento Cerebral</h3>
                    <p>Contém nutrientes essenciais como DHA e ARA, fundamentais para o desenvolvimento cognitivo e visual do bebê.</p>
                </div>
                <div class="card">
                    <span class="card-icon">💝</span>
                    <h3>Vínculo Afetivo</h3>
                    <p>Fortalece o vínculo emocional entre mãe e bebê, proporcionando segurança e bem-estar para ambos.</p>
                </div>
                <div class="card">
                    <span class="card-icon">⚖️</span>
                    <h3>Peso Ideal</h3>
                    <p>Ajuda a prevenir a obesidade infantil, pois o bebê regula naturalmente a quantidade de leite que consome.</p>
                </div>
                <div class="card">
                    <span class="card-icon">🌱</span>
                    <h3>Digestão Perfeita</h3>
                    <p>Facilmente digerido pelo sistema digestivo imaturo, reduzindo cólicas e desconfortos intestinais.</p>
                </div>
                <div class="card">
                    <span class="card-icon">💚</span>
                    <h3>Benefícios para a Mãe</h3>
                    <p>Reduz o risco de câncer de mama e ovário, acelera a recuperação pós-parto e fortalece os ossos.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="doacao" class="donation-section">
        <div class="container">
            <h2 class="section-title">Como Doar Leite Materno</h2>
            <p class="section-subtitle">Siga estes passos simples e comece a salvar vidas hoje mesmo</p>
            
            <div class="steps-grid">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Cadastre-se</h3>
                    <p>Entre em contato com um Banco de Leite Humano ou ligue para 0800-026-4006 para se cadastrar.</p>
                </div>
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Avaliação</h3>
                    <p>Passe por uma avaliação médica simples para verificar suas condições de saúde.</p>
                </div>
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Coleta em Casa</h3>
                    <p>Receba orientações sobre higiene e técnicas de ordenha segura em sua casa.</p>
                </div>
                <div class="step">
                    <div class="step-number">4</div>
                    <h3>Armazenamento</h3>
                    <p>Armazene o leite em recipiente esterilizado no congelador com total segurança.</p>
                </div>
                <div class="step">
                    <div class="step-number">5</div>
                    <h3>Distribuição</h3>
                    <p>O Banco de Leite busca na sua casa e distribui para recém-nascidos em UTIs neonatais.</p>
                </div>
                <div class="step">
                    <div class="step-number">6</div>
                    <h3>Acompanhamento</h3>
                    <p>Receba apoio e informações sobre saúde e amamentação durante todo o processo.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="locais" class="locations-section">
        <div class="container">
            <h2 class="section-title">Encontre um Banco de Leite</h2>
            <p class="section-subtitle">Localize o banco de leite humano mais próximo de você</p>
            
            <div class="search-box">
                <input type="text" class="search-input" placeholder="Digite sua cidade ou estado..." id="searchInput">
                <button class="search-btn" onclick="searchLocations()">
                    <i class="fas fa-search"></i> Buscar
                </button>
            </div>

            <div class="locations-grid">
                <div class="location-card">
                    <h3>Hospital Universitário - São Luís</h3>
                    <div class="location-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Rua Barão de Itapary, 227 - Centro</span>
                    </div>
                    <div class="location-detail">
                        <i class="fas fa-phone"></i>
                        <span>(98) 2109-1000</span>
                    </div>
                    <div class="location-detail">
                        <i class="fas fa-clock"></i>
                        <span>Seg a Sex: 7h às 19h</span>
                    </div>
                    <div class="location-detail">
                        <i class="fas fa-star"></i>
                        <span>Coleta domiciliar disponível</span>
                    </div>
                </div>

                <div class="location-card">
                    <h3>Maternidade Marly Sarney</h3>
                    <div class="location-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Av. Daniel de La Touche - Cohama</span>
                    </div>
                    <div class="location-detail">
                        <i class="fas fa-phone"></i>
                        <span>(98) 3216-8100</span>
                    </div>
                    <div class="location-detail">
                        <i class="fas fa-clock"></i>
                        <span>24 horas</span>
                    </div>
                    <div class="location-detail">
                        <i class="fas fa-star"></i>
                        <span>Emergência e coleta domiciliar</span>
                    </div>
                </div>

                <div class="location-card">
                    <h3>Hospital da Criança - São Luís</h3>
                    <div class="location-detail">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Rua Silva Jardim, 135 - Centro</span>
                    </div>
                    <div class="location-detail">
                        <i class="fas fa-phone"></i>
                        <span>(98) 3218-8200</span>
                    </div>
                    <div class="location-detail">
                        <i class="fas fa-clock"></i>
                        <span>Seg a Sex: 8h às 18h</span>
                    </div>
                    <div class="location-detail">
                        <i class="fas fa-star"></i>
                        <span>Especializado em pediatria</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faq">
        <div class="container">
            <h2 class="section-title">Perguntas Frequentes</h2>
            <p class="section-subtitle">Tire suas dúvidas sobre a doação de leite materno</p>
            
            <div class="faq-container">
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Quem pode doar leite materno?</span>
                        <span class="faq-icon"><i class="fas fa-plus"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>Qualquer mãe saudável que esteja amamentando pode doar leite materno. É necessário ter excesso de leite, estar em bom estado de saúde e seguir hábitos saudáveis de vida (não fumar, não usar drogas, não consumir álcool em excesso).</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Como é feita a coleta do leite?</span>
                        <span class="faq-icon"><i class="fas fa-plus"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>A coleta é feita pela própria mãe em casa, seguindo orientações de higiene rigorosas. O Banco de Leite fornece recipientes esterilizados e instruções detalhadas. A coleta domiciliar é gratuita e agendada conforme a disponibilidade da doadora.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Por quanto tempo posso doar?</span>
                        <span class="faq-icon"><i class="fas fa-plus"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>Você pode doar durante todo o período de amamentação, desde que mantenha as condições de saúde adequadas e tenha excesso de leite. Muitas mães doam por vários meses, ajudando múltiplos bebês.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>O leite doado é seguro?</span>
                        <span class="faq-icon"><i class="fas fa-plus"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>Sim, totalmente seguro. Todo leite doado passa por rigorosos processos de análise, pasteurização e controle de qualidade nos Bancos de Leite Humano, seguindo protocolos estabelecidos pelo Ministério da Saúde.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Preciso fazer exames para doar?</span>
                        <span class="faq-icon"><i class="fas fa-plus"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>Geralmente não são necessários exames específicos além dos já realizados no pré-natal. O Banco de Leite fará uma entrevista sobre seu histórico de saúde e hábitos de vida. Em alguns casos, podem ser solicitados exames complementares.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <button class="faq-question">
                        <span>Como armazenar o leite coletado?</span>
                        <span class="faq-icon"><i class="fas fa-plus"></i></span>
                    </button>
                    <div class="faq-answer">
                        <p>O leite deve ser armazenado em recipientes de vidro esterilizados, fornecidos pelo Banco de Leite. Deve ser congelado imediatamente após a coleta e pode ser conservado por até 6 meses no congelador comum ou 15 dias no freezer da geladeira.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sobre">
        <div class="container">
            <h2 class="section-title">Sobre a Doação de Leite Materno</h2>
            <p class="section-subtitle">Conheça mais sobre essa iniciativa que salva vidas todos os dias</p>
            
            <div class="cards-grid">
                <div class="card">
                    <span class="card-icon">📊</span>
                    <h3>Números que Salvam</h3>
                    <p>Mais de 220 Bancos de Leite Humano em todo o Brasil, coletando milhões de litros de leite materno anualmente e beneficiando milhares de recém-nascidos prematuros.</p>
                </div>
                <div class="card">
                    <span class="card-icon">🏥</span>
                    <h3>UTIs Neonatais</h3>
                    <p>O leite doado é fundamental para bebês internados em UTIs neonatais, especialmente prematuros que não podem ser amamentados diretamente por suas mães.</p>
                </div>
                <div class="card">
                    <span class="card-icon">🌟</span>
                    <h3>Reconhecimento Mundial</h3>
                    <p>O programa brasileiro de Bancos de Leite Humano é referência mundial e já foi implementado em outros países, salvando vidas ao redor do globo.</p>
                </div>
            </div>
        </div>
    </section>

    <footer id="contato">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>Contato</h3>
                    <p style="margin-bottom: 1rem;">Entre em contato conosco para mais informações sobre doação de leite materno.</p>
                    <div style="margin-bottom: 0.5rem;">
                        <i class="fas fa-phone" style="margin-right: 0.5rem; color: #fecaca;"></i>
                        <span>0800-026-4006 (Disque Saúde)</span>
                    </div>
                    <div style="margin-bottom: 0.5rem;">
                        <i class="fas fa-envelope" style="margin-right: 0.5rem; color: #fecaca;"></i>
                        <span>contato@fluxovital.com.br</span>
                    </div>
                    <div>
                        <i class="fas fa-map-marker-alt" style="margin-right: 0.5rem; color: #fecaca;"></i>
                        <span>São Luís - MA</span>
                    </div>
                </div>

                <div class="footer-section">
                    <h3>Links Úteis</h3>
                    <a href="#inicio">Início</a>
                    <a href="#beneficios">Benefícios</a>
                    <a href="#doacao">Como Doar</a>
                    <a href="#locais">Encontrar Locais</a>
                    <a href="#faq">Perguntas Frequentes</a>
                </div>

                <div class="footer-section">
                    <h3>Informações</h3>
                    <a href="#">Critérios para Doação</a>
                    <a href="#">Processo de Coleta</a>
                    <a href="#">Segurança e Qualidade</a>
                    <a href="#">Benefícios do Leite Materno</a>
                    <a href="#">Rede Brasileira de BLH</a>
                </div>

                <div class="footer-section">
                    <h3>Redes Sociais</h3>
                    <p style="margin-bottom: 1rem;">Siga-nos para mais informações e campanhas de conscientização.</p>
                    <div style="display: flex; gap: 1rem; font-size: 1.5rem;">
                        <a href="#" style="color: #fecaca; text-decoration: none; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" style="color: #fecaca; text-decoration: none; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" style="color: #fecaca; text-decoration: none; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" style="color: #fecaca; text-decoration: none; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.2)'" onmouseout="this.style.transform='scale(1)'">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2024 Fluxo Vital - Doação de Leite Materno. Todos os direitos reservados.</p>
                <p style="margin-top: 0.5rem; font-size: 0.9rem;">Este site é uma iniciativa de conscientização sobre a importância da doação de leite materno.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('active');
        }

        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
                document.getElementById('mobileMenu').classList.remove('active');
            });
        });

        document.querySelectorAll('.faq-question').forEach(btn => {
            btn.addEventListener('click', () => {
                const item = btn.parentElement;
                const isActive = item.classList.contains('active');
                
    
                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
                
                // Adiciona 'active' apenas ao item clicado (se não estava ativo)
                if (!isActive) item.classList.add('active');
            });
        });

        function searchLocations() {
            const searchInput = document.getElementById('searchInput');
            const searchTerm = searchInput.value.toLowerCase().trim();
            
            if (!searchTerm) {
                alert('Por favor, digite uma cidade ou estado para buscar.');
                return;
            }
            
            const locations = document.querySelectorAll('.location-card');
            let found = false;
            
            locations.forEach(card => {
                const text = card.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    card.style.display = 'block';
                    card.style.border = '3px solid var(--accent)';
                    card.style.transform = 'scale(1.02)';
                    found = true;
                } else {
                    card.style.display = 'none';
                }
            });
            
            if (!found) {
                alert('Nenhum resultado encontrado para "' + searchTerm + '". Tente buscar por "São Luís", "Maranhão" ou "MA".');
                locations.forEach(card => {
                    card.style.display = 'block';
                    card.style.border = 'none';
                    card.style.transform = 'scale(1)';
                });
            }
        }

        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchLocations();
            }
        });

        function animateOnScroll() {
            const elements = document.querySelectorAll('.card, .step, .location-card, .faq-item');
            
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 100;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('animate');
                }
            });
        }

        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', function() {
            setTimeout(animateOnScroll, 100);
        });


        window.addEventListener('load', function() {
            setTimeout(function() {
                const cards = document.querySelectorAll('.card');
                const steps = document.querySelectorAll('.step');
                const locations = document.querySelectorAll('.location-card');
                const faqs = document.querySelectorAll('.faq-item');
                
                cards.forEach((card, index) => {
                    card.style.transitionDelay = `${index * 0.1}s`;
                });
                
                steps.forEach((step, index) => {
                    step.style.transitionDelay = `${index * 0.1}s`;
                });
                
                locations.forEach((location, index) => {
                    location.style.transitionDelay = `${index * 0.1}s`;
                });
                
                faqs.forEach((faq, index) => {
                    faq.style.transitionDelay = `${index * 0.05}s`;
                });
            }, 100);
        });

        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallax = document.querySelector('.hero-banner');
            
            if (parallax && scrolled < parallax.offsetHeight) {
                parallax.style.backgroundPositionY = `${scrolled * 0.5}px`;
            }
        });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('section').forEach(section => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(20px)';
            section.style.transition = 'all 0.6s ease';
            observer.observe(section);
        });
    </script>
</body>
</html>
