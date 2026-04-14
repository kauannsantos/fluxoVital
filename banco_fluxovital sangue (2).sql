-- ============================================================
--  FLUXO VITAL — BANCO DE DADOS SANGUEE
-- ============================================================

CREATE DATABASE IF NOT EXISTS fluxovital
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE fluxovital;

-- ------------------------------------------------------------
-- doadores de sangue
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS doadores_sangue (
  id                  INT UNSIGNED     NOT NULL AUTO_INCREMENT,

  -- Identificação
  nome                VARCHAR(150)     NOT NULL,
  cpf                 CHAR(14)         NOT NULL,          -- formato: 000.000.000-00 Do cpf 11 digitos 
  rg                  VARCHAR(20)          NULL,
  nascimento          DATE             NOT NULL,
  sexo                ENUM('M','F')    NOT NULL,
  peso                DECIMAL(5,2)     NOT NULL,
  email               VARCHAR(150)     NOT NULL,
  telefone            VARCHAR(15)      NOT NULL,

  -- Tipo sanguíneo
  tipo_sanguineo      VARCHAR(20)          NULL,          -- A+, A−, B+, B−, AB+, AB−, O+, O−, ou até desconhecido

  -- Triagem — checkboxes (0 = não marcado, 1 = marcado)
  cond_vacina         TINYINT(1)       NOT NULL DEFAULT 0,
  cond_tatuagem       TINYINT(1)       NOT NULL DEFAULT 0,
  cond_cronica        TINYINT(1)       NOT NULL DEFAULT 0,
  cond_medicamento    TINYINT(1)       NOT NULL DEFAULT 0,
  cond_infeccao       TINYINT(1)       NOT NULL DEFAULT 0,
  cond_cirurgia       TINYINT(1)       NOT NULL DEFAULT 0,

  historico_doacao    ENUM('nunca','sim','regular') NOT NULL,

  observacoes         TEXT                 NULL,

  -- Agendamento no formularioi
  unidade             VARCHAR(50)      NOT NULL,
  data_agendamento    DATE             NOT NULL,
  turno               ENUM('manha','tarde') NOT NULL,
  como_soube          VARCHAR(30)          NULL,

  -- Controle interno
  status              ENUM('pendente','aprovado','inabilitado') NOT NULL DEFAULT 'pendente',
  criado_em           DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP,

  PRIMARY KEY (id),
  UNIQUE KEY uq_cpf (cpf),
  INDEX idx_data_agendamento (data_agendamento),
  INDEX idx_tipo_sanguineo   (tipo_sanguineo),
  INDEX idx_status           (status)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
