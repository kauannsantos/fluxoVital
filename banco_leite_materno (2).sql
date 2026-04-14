-- =============================================================
--  FLUXO VITAL — Banco para doação de leite materno
-- =============================================================

CREATE DATABASE IF NOT EXISTS fluxovital
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE fluxovital;

-- =============================================================
-- TABELA: doadoras
-- =============================================================

-- Identificação
CREATE TABLE IF NOT EXISTS doadoras (
  id                     INT UNSIGNED  NOT NULL AUTO_INCREMENT,


  nome                   VARCHAR(150)  NOT NULL,
  cpf                    CHAR(14)      NOT NULL,
  rg                     VARCHAR(20)   DEFAULT NULL,
  nascimento             DATE          NOT NULL,
  email                  VARCHAR(150)  NOT NULL,
  telefone               VARCHAR(15)   NOT NULL,
  endereco               VARCHAR(300)  NOT NULL,

  -- Dados da amamentação
  data_parto             DATE          NOT NULL,
  tipo_parto             ENUM('normal','cesariana') NOT NULL,
  idade_gestacional      ENUM('prematuro_extremo','prematuro_moderado','prematuro_tardio','termo') NOT NULL,
  num_filhos_amamentando ENUM('1','2','3') NOT NULL,
  amamentacao_exclusiva  ENUM('sim','parcial','nao') NOT NULL,
  producao_estimada      ENUM('menos200','200_500','500_1000','mais1000','nao_sei') NOT NULL,

  -- Triagem — condições inabilitantes (0 = não, 1 = sim)
  inab_hiv               TINYINT(1)    NOT NULL DEFAULT 0,
  inab_htlv              TINYINT(1)    NOT NULL DEFAULT 0,
  inab_hepatite          TINYINT(1)    NOT NULL DEFAULT 0,
  inab_sifilis           TINYINT(1)    NOT NULL DEFAULT 0,
  inab_chagas            TINYINT(1)    NOT NULL DEFAULT 0,
  inab_mastite           TINYINT(1)    NOT NULL DEFAULT 0,
  inab_candidiase_mam    TINYINT(1)    NOT NULL DEFAULT 0,
  inab_radio             TINYINT(1)    NOT NULL DEFAULT 0,

  -- Triagem — condições para avaliação médica (0 = não, 1 = sim)
  aval_medicamento       TINYINT(1)    NOT NULL DEFAULT 0,
  aval_alcool            TINYINT(1)    NOT NULL DEFAULT 0,
  aval_cigarro           TINYINT(1)    NOT NULL DEFAULT 0,
  aval_vacina            TINYINT(1)    NOT NULL DEFAULT 0,
  aval_procedimento      TINYINT(1)    NOT NULL DEFAULT 0,
  aval_silicone          TINYINT(1)    NOT NULL DEFAULT 0,
  aval_diabetes          TINYINT(1)    NOT NULL DEFAULT 0,
  aval_hipertensao       TINYINT(1)    NOT NULL DEFAULT 0,

  -- Histórico e coleta
  historico_doacao       ENUM('nunca','sim','regular') NOT NULL,
  modalidade_coleta      ENUM('unidade','domicilio','ambos') NOT NULL,
  observacoes            TEXT          DEFAULT NULL,

  -- Agendamento
  unidade                ENUM('blh_central','blh_hgcc','blh_huwc','blh_ijf','domicilio') NOT NULL,
  data_agendamento       DATE          NOT NULL,
  turno                  ENUM('manha','tarde') NOT NULL,
  como_soube             ENUM('maternidade','pediatra','indicacao','redes','campanha','outro') DEFAULT NULL,

  -- Consentimento e status
  consentimento          TINYINT(1)    NOT NULL DEFAULT 0,
  status                 ENUM('pendente','aprovada','inabilitada','em_avaliacao') NOT NULL DEFAULT 'pendente',

  -- Metadados
  criado_em              DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP,
  atualizado_em          DATETIME      NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

  PRIMARY KEY (id),
  UNIQUE KEY uq_cpf   (cpf),
  UNIQUE KEY uq_email (email),
  INDEX idx_status           (status),
  INDEX idx_data_agendamento (data_agendamento),

  CONSTRAINT chk_consentimento CHECK (consentimento = 1)

) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
