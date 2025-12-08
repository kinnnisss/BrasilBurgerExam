-- ==========================================
--  SCRIPT SQL BRASIL BURGER (PostgreSQL)
-- ==========================================
DROP TABLE IF EXISTS MENU_COMPLEMENT       CASCADE;
DROP TABLE IF EXISTS MENU_BURGER           CASCADE;
DROP TABLE IF EXISTS PAIEMENT              CASCADE;
DROP TABLE IF EXISTS LIGNE_COMMANDE        CASCADE;
DROP TABLE IF EXISTS COMMANDE              CASCADE;
DROP TABLE IF EXISTS QUARTIER              CASCADE;
DROP TABLE IF EXISTS ZONE                  CASCADE;
DROP TABLE IF EXISTS LIVREUR               CASCADE;
DROP TABLE IF EXISTS MENU                  CASCADE;
DROP TABLE IF EXISTS COMPLEMENT            CASCADE;
DROP TABLE IF EXISTS BURGER                CASCADE;
DROP TABLE IF EXISTS GESTIONNAIRE          CASCADE;
DROP TABLE IF EXISTS CLIENT                CASCADE;



DO $$
BEGIN
  IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'type_complement_enum') THEN
    CREATE TYPE type_complement_enum AS ENUM ('FRITE', 'BOISSON');
  END IF;
END$$;


DO $$
BEGIN
  IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'etat_commande_enum') THEN
    CREATE TYPE etat_commande_enum AS ENUM ('ENCOURS', 'VALIDEE', 'TERMINER', 'ANNULEE');
  END IF;
END$$;


DO $$
BEGIN
  IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'type_consommation_enum') THEN
    CREATE TYPE type_consommation_enum AS ENUM ('SUR_PLACE', 'A_EMPORTER', 'LIVRAISON');
  END IF;
END$$;


DO $$
BEGIN
  IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'type_article_enum') THEN
    CREATE TYPE type_article_enum AS ENUM ('BURGER', 'MENU', 'COMPLEMENT');
  END IF;
END$$;


DO $$
BEGIN
  IF NOT EXISTS (SELECT 1 FROM pg_type WHERE typname = 'mode_paiement_enum') THEN
    CREATE TYPE mode_paiement_enum AS ENUM ('OM', 'WAVE');
  END IF;
END$$;



-- CLIENT
CREATE TABLE CLIENT (
  id_client    SERIAL PRIMARY KEY,
  nom          VARCHAR(100) NOT NULL,
  prenom       VARCHAR(100) NOT NULL,
  telephone    VARCHAR(20)  NOT NULL,
  login        VARCHAR(100) NOT NULL,
  password     VARCHAR(255) NOT NULL,
  CONSTRAINT uq_client_telephone UNIQUE (telephone),
  CONSTRAINT uq_client_login     UNIQUE (login)
);

-- GESTIONNAIRE
CREATE TABLE GESTIONNAIRE (
  id_gestionnaire SERIAL PRIMARY KEY,
  nom             VARCHAR(100) NOT NULL,
  prenom          VARCHAR(100) NOT NULL,
  login           VARCHAR(100) NOT NULL,
  password        VARCHAR(255) NOT NULL,
  CONSTRAINT uq_gestionnaire_login UNIQUE (login)
);

-- BURGER
CREATE TABLE BURGER (
  id_burger   SERIAL PRIMARY KEY,
  nom         VARCHAR(150)    NOT NULL,
  prix        NUMERIC(10,2)   NOT NULL,
  image       VARCHAR(255),
  is_archived BOOLEAN         NOT NULL DEFAULT FALSE,
  CONSTRAINT chk_burger_prix_pos CHECK (prix > 0)
);

-- COMPLEMENT
CREATE TABLE COMPLEMENT (
  id_complement   SERIAL PRIMARY KEY,
  nom             VARCHAR(150)          NOT NULL,
  type_complement type_complement_enum  NOT NULL,
  prix            NUMERIC(10,2)         NOT NULL,
  image           VARCHAR(255),
  is_archived     BOOLEAN               NOT NULL DEFAULT FALSE,
  CONSTRAINT chk_complement_prix_pos CHECK (prix > 0)
);

-- MENU
CREATE TABLE MENU (
  id_menu     SERIAL PRIMARY KEY,
  nom         VARCHAR(150)  NOT NULL,
  image       VARCHAR(255),
  prix        NUMERIC(10,2) NOT NULL,
  is_archived BOOLEAN       NOT NULL DEFAULT FALSE,
  CONSTRAINT chk_menu_prix_pos CHECK (prix >= 0)
);

-- ZONE 
CREATE TABLE ZONE (
  id_zone        SERIAL PRIMARY KEY,
  libelle        VARCHAR(150)  NOT NULL,
  prix_livraison NUMERIC(10,2) NOT NULL,
  CONSTRAINT chk_zone_prix_livraison CHECK (prix_livraison >= 0)
);

-- LIVREUR
CREATE TABLE LIVREUR (
  id_livreur SERIAL PRIMARY KEY,
  nom        VARCHAR(100) NOT NULL,
  prenom     VARCHAR(100) NOT NULL,
  telephone  VARCHAR(20)  NOT NULL,
  CONSTRAINT uq_livreur_telephone UNIQUE (telephone)
);

-- QUARTIER 
CREATE TABLE QUARTIER (
  id_quartier SERIAL PRIMARY KEY,
  libelle     VARCHAR(150) NOT NULL,
  id_zone     INTEGER      NOT NULL,
  CONSTRAINT fk_quartier_zone
    FOREIGN KEY (id_zone) REFERENCES ZONE(id_zone)
      ON UPDATE CASCADE
      ON DELETE RESTRICT
);



-- COMMANDE
CREATE TABLE COMMANDE (
  id_commande       SERIAL PRIMARY KEY,
  reference         VARCHAR(50)            NOT NULL,
  date_commande     TIMESTAMP              NOT NULL,
  etat              etat_commande_enum     NOT NULL,
  type_consommation type_consommation_enum NOT NULL,
  montant_total     NUMERIC(10,2)          NOT NULL,
  id_client         INTEGER                NOT NULL,
  id_zone           INTEGER,
  id_quartier       INTEGER,
  id_livreur        INTEGER,
  CONSTRAINT uq_commande_reference UNIQUE (reference),
  CONSTRAINT chk_commande_montant_pos CHECK (montant_total >= 0),
  CONSTRAINT fk_commande_client
    FOREIGN KEY (id_client) REFERENCES CLIENT(id_client)
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
  CONSTRAINT fk_commande_zone
    FOREIGN KEY (id_zone) REFERENCES ZONE(id_zone)
      ON UPDATE CASCADE
      ON DELETE SET NULL,
  CONSTRAINT fk_commande_quartier
    FOREIGN KEY (id_quartier) REFERENCES QUARTIER(id_quartier)
      ON UPDATE CASCADE
      ON DELETE SET NULL,
  CONSTRAINT fk_commande_livreur
    FOREIGN KEY (id_livreur) REFERENCES LIVREUR(id_livreur)
      ON UPDATE CASCADE
      ON DELETE SET NULL
);

-- LIGNE_COMMANDE
CREATE TABLE LIGNE_COMMANDE (
  id_ligne_commande SERIAL PRIMARY KEY,
  id_commande       INTEGER             NOT NULL,
  type_article      type_article_enum   NOT NULL,
  id_burger         INTEGER,
  id_menu           INTEGER,
  id_complement     INTEGER,
  quantite          INTEGER             NOT NULL,
  prix_unitaire     NUMERIC(10,2)       NOT NULL,
  prix_total        NUMERIC(10,2)       NOT NULL,
  CONSTRAINT fk_ligne_commande_commande
    FOREIGN KEY (id_commande) REFERENCES COMMANDE(id_commande)
      ON UPDATE CASCADE
      ON DELETE CASCADE,
  CONSTRAINT fk_ligne_commande_burger
    FOREIGN KEY (id_burger) REFERENCES BURGER(id_burger)
      ON UPDATE CASCADE
      ON DELETE SET NULL,
  CONSTRAINT fk_ligne_commande_menu
    FOREIGN KEY (id_menu) REFERENCES MENU(id_menu)
      ON UPDATE CASCADE
      ON DELETE SET NULL,
  CONSTRAINT fk_ligne_commande_complement
    FOREIGN KEY (id_complement) REFERENCES COMPLEMENT(id_complement)
      ON UPDATE CASCADE
      ON DELETE SET NULL,
  CONSTRAINT chk_ligne_commande_quantite_pos CHECK (quantite > 0),
  CONSTRAINT chk_ligne_commande_prix_pos CHECK (prix_unitaire >= 0 AND prix_total >= 0),
  CONSTRAINT chk_ligne_un_seul_article CHECK (
    (id_burger IS NOT NULL AND id_menu IS NULL AND id_complement IS NULL) OR
    (id_menu IS NOT NULL AND id_burger IS NULL AND id_complement IS NULL) OR
    (id_complement IS NOT NULL AND id_burger IS NULL AND id_menu IS NULL)
  )
);



CREATE TABLE PAIEMENT (
  id_paiement   SERIAL PRIMARY KEY,
  date_paiement TIMESTAMP          NOT NULL,
  montant       NUMERIC(10,2)      NOT NULL,
  mode_paiement mode_paiement_enum NOT NULL,
  id_commande   INTEGER            NOT NULL,
  CONSTRAINT chk_paiement_montant_pos CHECK (montant >= 0),
  CONSTRAINT fk_paiement_commande
    FOREIGN KEY (id_commande) REFERENCES COMMANDE(id_commande)
      ON UPDATE CASCADE
      ON DELETE RESTRICT,
  CONSTRAINT uq_paiement_commande UNIQUE (id_commande)
);



-- MENU_BURGER 
CREATE TABLE MENU_BURGER (
  id_menu   INTEGER NOT NULL,
  id_burger INTEGER NOT NULL,
  CONSTRAINT pk_menu_burger PRIMARY KEY (id_menu, id_burger),
  CONSTRAINT fk_menu_burger_menu
    FOREIGN KEY (id_menu) REFERENCES MENU(id_menu)
      ON UPDATE CASCADE
      ON DELETE CASCADE,
  CONSTRAINT fk_menu_burger_burger
    FOREIGN KEY (id_burger) REFERENCES BURGER(id_burger)
      ON UPDATE CASCADE
      ON DELETE RESTRICT
);

-- MENU_COMPLEMENT 
CREATE TABLE MENU_COMPLEMENT (
  id_menu       INTEGER NOT NULL,
  id_complement INTEGER NOT NULL,
  CONSTRAINT pk_menu_complement PRIMARY KEY (id_menu, id_complement),
  CONSTRAINT fk_menu_complement_menu
    FOREIGN KEY (id_menu) REFERENCES MENU(id_menu)
      ON UPDATE CASCADE
      ON DELETE CASCADE,
  CONSTRAINT fk_menu_complement_complement
    FOREIGN KEY (id_complement) REFERENCES COMPLEMENT(id_complement)
      ON UPDATE CASCADE
      ON DELETE RESTRICT
);



-- Index sur les clés étrangères fréquemment utilisées
CREATE INDEX idx_commande_client ON COMMANDE(id_client);
CREATE INDEX idx_commande_zone ON COMMANDE(id_zone);
CREATE INDEX idx_commande_quartier ON COMMANDE(id_quartier);
CREATE INDEX idx_commande_livreur ON COMMANDE(id_livreur);

CREATE INDEX idx_ligne_commande_commande ON LIGNE_COMMANDE(id_commande);
CREATE INDEX idx_ligne_commande_burger ON LIGNE_COMMANDE(id_burger);
CREATE INDEX idx_ligne_commande_menu ON LIGNE_COMMANDE(id_menu);
CREATE INDEX idx_ligne_commande_complement ON LIGNE_COMMANDE(id_complement);

CREATE INDEX idx_quartier_zone ON QUARTIER(id_zone);

CREATE INDEX idx_paiement_commande ON PAIEMENT(id_commande);

-- Index sur les colonnes fréquemment utilisées pour les recherches
CREATE INDEX idx_commande_date ON COMMANDE(date_commande);
CREATE INDEX idx_commande_etat ON COMMANDE(etat);
CREATE INDEX idx_commande_reference ON COMMANDE(reference);

-- ==========================================
--  FIN DU SCRIPT
-- ==========================================