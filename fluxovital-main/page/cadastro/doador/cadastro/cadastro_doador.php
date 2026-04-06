<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro do Doador - Fluxo Vital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: linear-gradient(135deg, #ffe9ec 0%, #ffd4d8 100%);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      position: relative;
      overflow-x: hidden;
    }

    /* Background elaborado com tema de doação de sangue */
    .blood-background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 0;
      pointer-events: none;
      overflow: hidden;
    }

    /* Círculos de sangue animados */
    .blood-circle {
      position: absolute;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(157, 4, 14, 0.12) 0%, rgba(157, 4, 14, 0.05) 50%, transparent 70%);
      animation: pulse 8s ease-in-out infinite;
    }

    .blood-circle-1 {
      width: 600px;
      height: 600px;
      top: -200px;
      right: -150px;
      animation-delay: 0s;
    }

    .blood-circle-2 {
      width: 500px;
      height: 500px;
      bottom: -150px;
      left: -100px;
      animation-delay: 2s;
    }

    .blood-circle-3 {
      width: 400px;
      height: 400px;
      top: 30%;
      left: -100px;
      animation-delay: 4s;
    }

    @keyframes pulse {
      0%, 100% {
        transform: scale(1);
        opacity: 1;
      }
      50% {
        transform: scale(1.15);
        opacity: 0.7;
      }
    }

    /* Gotas de sangue caindo */
    .blood-drop {
      position: absolute;
      color: #9d040e;
      opacity: 0.08;
      font-size: 30px;
      animation: fall linear infinite;
    }

    @keyframes fall {
      0% {
        transform: translateY(-100px) rotate(0deg);
        opacity: 0;
      }
      10% {
        opacity: 0.08;
      }
      90% {
        opacity: 0.08;
      }
      100% {
        transform: translateY(100vh) rotate(360deg);
        opacity: 0;
      }
    }

    .blood-drop:nth-child(1) { left: 5%; animation-duration: 15s; animation-delay: 0s; }
    .blood-drop:nth-child(2) { left: 15%; animation-duration: 18s; animation-delay: 2s; font-size: 25px; }
    .blood-drop:nth-child(3) { left: 25%; animation-duration: 20s; animation-delay: 4s; font-size: 35px; }
    .blood-drop:nth-child(4) { left: 35%; animation-duration: 16s; animation-delay: 1s; }
    .blood-drop:nth-child(5) { left: 45%; animation-duration: 19s; animation-delay: 3s; font-size: 28px; }
    .blood-drop:nth-child(6) { left: 55%; animation-duration: 17s; animation-delay: 5s; }
    .blood-drop:nth-child(7) { left: 65%; animation-duration: 21s; animation-delay: 2s; font-size: 32px; }
    .blood-drop:nth-child(8) { left: 75%; animation-duration: 18s; animation-delay: 4s; }
    .blood-drop:nth-child(9) { left: 85%; animation-duration: 16s; animation-delay: 1s; font-size: 26px; }
    .blood-drop:nth-child(10) { left: 95%; animation-duration: 19s; animation-delay: 3s; }

    /* Ícones de doação flutuantes */
    .donation-icon {
      position: absolute;
      color: #9d040e;
      opacity: 0.06;
      animation: float 12s ease-in-out infinite;
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0) rotate(0deg);
      }
      25% {
        transform: translateY(-20px) rotate(5deg);
      }
      50% {
        transform: translateY(-40px) rotate(0deg);
      }
      75% {
        transform: translateY(-20px) rotate(-5deg);
      }
    }

    .icon-heart-1 {
      top: 15%;
      left: 8%;
      font-size: 90px;
      animation-delay: 0s;
    }

    .icon-heartbeat {
      top: 25%;
      right: 10%;
      font-size: 70px;
      animation-delay: 2s;
    }

    .icon-hand {
      bottom: 25%;
      left: 12%;
      font-size: 80px;
      animation-delay: 4s;
    }

    .icon-heart-2 {
      top: 55%;
      right: 18%;
      font-size: 65px;
      animation-delay: 1s;
    }

    .icon-plus {
      bottom: 15%;
      right: 12%;
      font-size: 75px;
      animation-delay: 3s;
    }

    /* Ondas de fundo */
    .wave-layer {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 200px;
      background: linear-gradient(180deg, transparent 0%, rgba(157, 4, 14, 0.03) 100%);
    }

    .wave {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 200%;
      height: 100%;
      background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120'%3E%3Cpath d='M321.39 56.44c58-10.79 114.16-30.13 172-41.86 82.39-16.72 168.19-17.73 250.45-.39C823.78 31 906.67 72 985.66 92.83c70.05 18.48 146.53 26.09 214.34 3V0H0v27.35a600.21 600.21 0 00321.39 29.09z' fill='%239d040e' fill-opacity='0.05'/%3E%3C/svg%3E") repeat-x;
      animation: wave 25s linear infinite;
      opacity: 0.4;
    }

    .wave:nth-child(2) {
      animation: wave 20s linear infinite reverse;
      opacity: 0.3;
    }

    @keyframes wave {
      0% {
        transform: translateX(0);
      }
      100% {
        transform: translateX(-50%);
      }
    }

    /* Padrão de células sanguíneas */
    .blood-cells {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0.03;
      background-image: 
        radial-gradient(circle at 20% 30%, #9d040e 2px, transparent 2px),
        radial-gradient(circle at 60% 70%, #9d040e 3px, transparent 3px),
        radial-gradient(circle at 80% 20%, #9d040e 2px, transparent 2px),
        radial-gradient(circle at 40% 80%, #9d040e 2.5px, transparent 2.5px),
        radial-gradient(circle at 10% 60%, #9d040e 2px, transparent 2px);
      background-size: 200px 200px, 250px 250px, 180px 180px, 220px 220px, 190px 190px;
      background-position: 0 0, 50px 50px, 100px 20px, 30px 80px, 70px 40px;
      animation: moveCell 60s linear infinite;
    }

    @keyframes moveCell {
      0% {
        background-position: 0 0, 50px 50px, 100px 20px, 30px 80px, 70px 40px;
      }
      100% {
        background-position: 200px 200px, 250px 250px, 280px 220px, 230px 280px, 270px 240px;
      }
    }

    /* Navbar Styles */
    .navbar {
      background: linear-gradient(135deg, #9d040e 0%, #7B1B1B 100%);
      padding: 1rem 0;
      box-shadow: 0 4px 12px rgba(123, 27, 27, 0.3);
      position: sticky;
      top: 0;
      z-index: 1000;
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
    }

    .logo img {
      height: 50px;
      width: auto;
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
    }

    .nav-links a:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateY(-2px);
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
    }

    .nav-btn:hover {
     background: rgba(255,255,255,0.95);
      box-shadow: 0 6px 30px rgba(255,255,255,0.35);
      transform: translateY(-3px) !important;
      color: var(--primary-dark) !important;
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
    }

    .mobile-menu {
      display: none;
      flex-direction: column;
      background: #7B1B1B;
      padding: 1rem 2rem;
      gap: 1rem;
    }

    .mobile-menu a {
      color: white;
      text-decoration: none;
      padding: 0.75rem;
      border-radius: 0.5rem;
      transition: background 0.3s ease;
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
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 2rem 1rem;
      position: relative;
      z-index: 10;
    }

    .fluxo-card {
      max-width: 500px;
      width: 100%;
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(10px);
      border-radius: 2rem;
      padding: 3rem 2.5rem;
      box-shadow: 0 20px 60px rgba(157, 4, 14, 0.15);
      animation: fadeIn 0.6s ease;
      border: 2px solid rgba(255, 255, 255, 0.8);
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fluxo-card h3 {
      color: #9d040e;
      font-weight: 700;
      font-size: 1.75rem;
      margin-bottom: 1.5rem;
      text-shadow: 0 2px 4px rgba(157, 4, 14, 0.1);
    }

    .info-text {
      background: linear-gradient(135deg, rgba(157, 4, 14, 0.08) 0%, rgba(157, 4, 14, 0.12) 100%);
      padding: 1rem 1.25rem;
      border-radius: 1rem;
      margin-bottom: 1.5rem;
      border-left: 4px solid #9d040e;
      font-size: 0.9rem;
      color: #5c1313;
    }

    .form-label {
      color: #5c1313;
      font-weight: 600;
      margin-bottom: 0.5rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .form-label i {
      color: #9d040e;
    }

    .input-group {
      margin-bottom: 1.25rem;
    }

    .input-group-text {
      background: rgba(157, 4, 14, 0.05);
      border: 2px solid #e0e0e0;
      border-right: none;
      color: #9d040e;
      border-radius: 1rem 0 0 1rem;
      padding: 0.75rem 1rem;
    }

    .form-control {
      border-radius: 0 1rem 1rem 0;
      border: 2px solid #e0e0e0;
      border-left: none;
      padding: 0.75rem 1rem;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.9);
    }

    .form-control:focus {
      border-color: #9d040e;
      box-shadow: 0 0 0 0.2rem rgba(157, 4, 14, 0.15);
      background: white;
      border-left: none;
    }

    .form-control:focus + .input-group-text,
    .input-group:focus-within .input-group-text {
      border-color: #9d040e;
    }

    .btn-fluxo {
      background: linear-gradient(135deg, #9d040e 0%, #7B1B1B 100%);
      border: none;
      color: white;
      padding: 0.875rem;
      font-weight: 600;
      font-size: 1.1rem;
      border-radius: 1rem;
      transition: all 0.3s ease;
      margin-top: 0.5rem;
    }

    .btn-fluxo:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(157, 4, 14, 0.4);
      background: linear-gradient(135deg, #7B1B1B 0%, #5c1313 100%);
    }

    .alert {
      border-radius: 1rem;
      border: none;
      padding: 1rem 1.25rem;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .alert i {
      font-size: 1.25rem;
    }

    .login-link {
      color: #6c757d;
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .login-link:hover {
      color: #9d040e;
    }

    .login-link strong {
      color: #9d040e;
    }

    /* Footer */
    footer {
      background: linear-gradient(135deg, #7B1B1B 0%, #5c1313 100%);
      color: white;
      text-align: center;
      padding: 1.5rem;
      font-size: 0.9rem;
      box-shadow: 0 -4px 12px rgba(123, 27, 27, 0.3);
      position: relative;
      z-index: 10;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .nav-links {
        display: none;
      }

      .mobile-toggle {
        display: block;
      }

      .fluxo-card {
        padding: 2rem 1.5rem;
        margin: 1rem;
      }

      .nav-container {
        padding: 0 1rem;
      }

      .logo-main {
        font-size: 1.25rem;
      }

      .logo img {
        height: 40px;
      }

      .blood-circle-1,
      .blood-circle-2,
      .blood-circle-3 {
        width: 300px;
        height: 300px;
      }

      .donation-icon {
        font-size: 50px !important;
      }
    }
  </style>

  <script>
    function validarFormulario() {
      const senha = document.getElementById("senha").value;
      const confirma = document.getElementById("confirma_senha").value;
      if (senha !== confirma) {
        alert("As senhas não coincidem.");
        return false;
      }
      return true;
    }
  </script>
</head>
<body>

  <!-- Background elaborado com tema de doação de sangue -->
  <div class="blood-background">
    <div class="blood-cells"></div>
    
    <div class="blood-circle blood-circle-1"></div>
    <div class="blood-circle blood-circle-2"></div>
    <div class="blood-circle blood-circle-3"></div>
    
    <div class="blood-drop"><i class="fas fa-tint"></i></div>
    <div class="blood-drop"><i class="fas fa-tint"></i></div>
    <div class="blood-drop"><i class="fas fa-tint"></i></div>
    <div class="blood-drop"><i class="fas fa-tint"></i></div>
    <div class="blood-drop"><i class="fas fa-tint"></i></div>
    <div class="blood-drop"><i class="fas fa-tint"></i></div>
    <div class="blood-drop"><i class="fas fa-tint"></i></div>
    <div class="blood-drop"><i class="fas fa-tint"></i></div>
    <div class="blood-drop"><i class="fas fa-tint"></i></div>
    <div class="blood-drop"><i class="fas fa-tint"></i></div>
    
    <i class="fas fa-heart donation-icon icon-heart-1"></i>
    <i class="fas fa-heartbeat donation-icon icon-heartbeat"></i>
    <i class="fas fa-hand-holding-heart donation-icon icon-hand"></i>
    <i class="fas fa-heart donation-icon icon-heart-2"></i>>
    
    <div class="wave-layer">
      <div class="wave"></div>
      <div class="wave"></div>
    </div>
  </div>

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
        <li><a href="#faq">FAQ</a></li>
        <li><a href="#contact" class="nav-btn"><i class="fas fa-heart"></i> Quero Doar</a></li>
      </ul>
      <button class="mobile-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
      </button>
    </div>
    <div class="mobile-menu" id="mobileMenu">
      <a href="#home">Início</a>
      <a href="#about">Sobre</a>
      <a href="#process">Processo</a>
      <a href="#faq">FAQ</a>
      <a href="#contact" class="nav-btn"><i class="fas fa-heart"></i> Quero Doar</a>
    </div>
  </nav>

  <main>
    <div class="fluxo-card">
      <h3 class="text-center">Cadastro do Doador</h3>

      <?php if (isset($_SESSION['erro'])): ?>
        <div class="alert alert-danger" role="alert">
          <i class="bi bi-exclamation-triangle-fill"></i>
          <div>
            <?php
              echo htmlspecialchars($_SESSION['erro']);
              unset($_SESSION['erro']);
            ?>
          </div>
        </div>
      <?php endif; ?>

      <div class="info-text">
        <strong><i class="fas fa-info-circle"></i> Importante:</strong> Após este cadastro, você será direcionado a um pequeno questionário sobre sua doação de <strong><?= htmlspecialchars(ucfirst($_SESSION['tipo_doacao'] ?? 'sangue')); ?></strong>.
      </div>

      <form method="POST" action="processa_doador.php" onsubmit="return validarFormulario()" novalidate>
        
        <div class="input-group">
          <span class="input-group-text">
            <i class="bi bi-person-fill"></i>
          </span>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required autofocus />
        </div>

        <div class="input-group">
          <span class="input-group-text">
            <i class="bi bi-envelope-fill"></i>
          </span>
          <input type="email" class="form-control" id="email" name="email" placeholder="Seu e-mail" required />
        </div>

        <div class="input-group">
          <span class="input-group-text">
            <i class="bi bi-telephone-fill"></i>
          </span>
          <input type="tel" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required />
        </div>

        <div class="input-group">
          <span class="input-group-text">
            <i class="bi bi-lock-fill"></i>
          </span>
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha (mínimo 6 caracteres)" minlength="6" required />
        </div>

        <div class="input-group">
          <span class="input-group-text">
            <i class="bi bi-lock-fill"></i>
          </span>
          <input type="password" class="form-control" id="confirma_senha" name="confirma_senha" placeholder="Confirme a senha" required />
        </div>

        <button type="submit" class="btn btn-fluxo w-100">
          <i class="fas fa-user-plus me-2"></i>Cadastrar
        </button>
      </form>

      <div class="text-center mt-4">
        <a href="/fluxovital/page/cadastro/doador/login/login_doador.php" class="login-link">
          <small>Já tem conta? <strong>Faça login</strong></small>
        </a>
      </div>
    </div>
  </main>

  <footer>
    &copy; <?php echo date('Y'); ?> Fluxo Vital - Todos os direitos reservados.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('active');
      const icon = menuToggle.querySelector('i');
      icon.classList.toggle('fa-bars');
      icon.classList.toggle('fa-times');
    });

    // Validação visual do Bootstrap
    (() => {
      'use strict';
      const forms = document.querySelectorAll('form');

      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    })();
  </script>

</body>
</html>

