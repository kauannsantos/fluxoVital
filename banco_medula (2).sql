-- ============================================================
--  FLUXO VITAL Doadores de Medula Óssea
-- ============================================================

CREATE DATABASE IF NOT EXISTS fluxovital
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE fluxovital;

-- ------------------------------------------------------------
-- tabela doadores de medula
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS doadores_medula (
  id                      INT UNSIGNED  NOT NULL AUTO_INCREMENT,

  -- ── IDENTIFICAÇÃO ──────────────────────────────
  nome                    VARCHAR(150)  NOT NULL,
  cpf                     CHAR(11)      NOT NULL,           -- apenas dígitos
  rg                      VARCHAR(20)       NULL,
  nascimento              DATE          NOT NULL,
  sexo                    ENUM('M','F') NOT NULL,
  peso                    DECIMAL(5,2)  NOT NULL,           -- mínimo é 50 kg
  altura                  SMALLINT      NOT NULL,           -- em centímetros, ex: 170
  etnia                   ENUM(
                            'branca','parda','preta',
                            'amarela','indigena','nao_inf'
                          )             NOT NULL,
  email                   VARCHAR(150)  NOT NULL,
  telefone                VARCHAR(15)   NOT NULL,

  -- ── INAPTIDÃO PERMANENTE  ──────────
  -- 0 = não marcado, 1 = marcado
  inapt_perm_doenca_autoimune   TINYINT(1) NOT NULL DEFAULT 0,
  inapt_perm_cancer             TINYINT(1) NOT NULL DEFAULT 0,
  inapt_perm_hiv                TINYINT(1) NOT NULL DEFAULT 0,
  inapt_perm_hepatite_bc        TINYINT(1) NOT NULL DEFAULT 0,
  inapt_perm_diabetes_insulina  TINYINT(1) NOT NULL DEFAULT 0,
  inapt_perm_doenca_cardiovasc  TINYINT(1) NOT NULL DEFAULT 0,
  inapt_perm_doenca_pulmonar    TINYINT(1) NOT NULL DEFAULT 0,
  inapt_perm_doenca_renal       TINYINT(1) NOT NULL DEFAULT 0,
  inapt_perm_doenca_neurologica TINYINT(1) NOT NULL DEFAULT 0,
  inapt_perm_gravidez           TINYINT(1) NOT NULL DEFAULT 0,

  -- ──  INAPTIDÃO TEMPORÁRIA (checkboxes) ──────────
  inapt_temp_tatuagem_piercing  TINYINT(1) NOT NULL DEFAULT 0,
  inapt_temp_cirurgia_recente   TINYINT(1) NOT NULL DEFAULT 0,
  inapt_temp_transfusao         TINYINT(1) NOT NULL DEFAULT 0,
  inapt_temp_vacina_viva        TINYINT(1) NOT NULL DEFAULT 0,
  inapt_temp_infeccao_ativa     TINYINT(1) NOT NULL DEFAULT 0,
  inapt_temp_antibiotico        TINYINT(1) NOT NULL DEFAULT 0,
  inapt_temp_anticoagulante     TINYINT(1) NOT NULL DEFAULT 0,
  inapt_temp_transplante        TINYINT(1) NOT NULL DEFAULT 0,
  inapt_temp_gravidez_12m       TINYINT(1) NOT NULL DEFAULT 0,
  inapt_temp_alcool_excesso     TINYINT(1) NOT NULL DEFAULT 0,

  -- ──  HISTÓRICO DE SAÚDE ─────────────────────────
  historico_medula        ENUM('nao','sim')             NOT NULL,
  cadastro_redome         ENUM('nao','sim','nao_sei')   NOT NULL,
  medicamentos            VARCHAR(300)                      NULL,  -- texto livre
  alergias                VARCHAR(300)                      NULL,  -- texto livre
  historico_familiar      ENUM('nao','sim','nao_sei')       NULL,

  -- ──  MODALIDADE DE DOAÇÃO ───────────────────────
  modalidade              ENUM(
                            'periferico','puncao',
                            'qualquer','medico'
                          )                                 NULL,

  -- ──  AGENDAMENTO  ───────────────────
  unidade                 VARCHAR(50)                   NOT NULL,
  data_coleta             DATE                          NOT NULL,
  turno                   ENUM('manha','tarde')         NOT NULL,
  como_soube              VARCHAR(30)                       NULL,

  -- ──  OBSERVAÇÕES ────────────────────────────────
  observacoes             TEXT                              NULL,

  -- ── CONSENTIMENTO ───────────────────────────────────────
  consentimento           TINYINT(1)  NOT NULL DEFAULT 0,   -- 1 = aceito

  -- ── CONTROLE INTERNO ────────────────────────────────────
  status                  ENUM('pendente','aprovado','inapto_temp','inapto_perm')
                                      NOT NULL DEFAULT 'pendente',
  criado_em               DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP,
  atualizado_em           DATETIME    NOT NULL DEFAULT CURRENT_TIMESTAMP
                                      ON UPDATE CURRENT_TIMESTAMP,

  PRIMARY KEY (id),
  UNIQUE KEY  uq_cpf            (cpf),
  INDEX       idx_data_coleta   (data_coleta),
  INDEX       idx_etnia         (etnia),
  INDEX       idx_status        (status),
  INDEX       idx_redome        (cadastro_redome)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
