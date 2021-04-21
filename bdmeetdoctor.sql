--
-- PostgreSQL database dump
--

-- Dumped from database version 10.8
-- Dumped by pg_dump version 10.8

-- Started on 2020-09-24 14:53:15

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12924)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 3043 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 196 (class 1259 OID 17227)
-- Name: disponibilite; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.disponibilite (
    iddisponibilite bigint NOT NULL,
    idstructure bigint NOT NULL,
    idmedecin bigint NOT NULL,
    jour date NOT NULL,
    heuredebut time(0) without time zone NOT NULL,
    heurefin time(0) without time zone NOT NULL,
    nbrconsultation integer,
    placerestant integer,
    actif boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.disponibilite OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 17231)
-- Name: disponibilite_iddisponibilite_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.disponibilite_iddisponibilite_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.disponibilite_iddisponibilite_seq OWNER TO postgres;

--
-- TOC entry 3044 (class 0 OID 0)
-- Dependencies: 197
-- Name: disponibilite_iddisponibilite_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.disponibilite_iddisponibilite_seq OWNED BY public.disponibilite.iddisponibilite;


--
-- TOC entry 198 (class 1259 OID 17233)
-- Name: examens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.examens (
    idexamen bigint NOT NULL,
    libelle character varying(255) NOT NULL,
    type character varying(255) NOT NULL,
    actif boolean DEFAULT true,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.examens OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 17240)
-- Name: examens_idexamen_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.examens_idexamen_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.examens_idexamen_seq OWNER TO postgres;

--
-- TOC entry 3045 (class 0 OID 0)
-- Dependencies: 199
-- Name: examens_idexamen_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.examens_idexamen_seq OWNED BY public.examens.idexamen;


--
-- TOC entry 200 (class 1259 OID 17242)
-- Name: laboexam; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.laboexam (
    idlaboexam bigint NOT NULL,
    idexamen bigint NOT NULL,
    idlabo bigint NOT NULL,
    heuredebut time(0) without time zone NOT NULL,
    heurefin time(0) without time zone NOT NULL,
    prix double precision NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    actif boolean DEFAULT true NOT NULL
);


ALTER TABLE public.laboexam OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 17246)
-- Name: laboexam_idlaboexam_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.laboexam_idlaboexam_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.laboexam_idlaboexam_seq OWNER TO postgres;

--
-- TOC entry 3046 (class 0 OID 0)
-- Dependencies: 201
-- Name: laboexam_idlaboexam_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.laboexam_idlaboexam_seq OWNED BY public.laboexam.idlaboexam;


--
-- TOC entry 202 (class 1259 OID 17248)
-- Name: laboratoires; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.laboratoires (
    idlabo bigint NOT NULL,
    idstructure bigint NOT NULL,
    nom character varying(255) NOT NULL,
    telephone character varying(255) NOT NULL,
    bp character varying(255),
    email character varying(255) NOT NULL,
    heureouverture time(0) without time zone,
    heurefermeture time(0) without time zone,
    joursouvres character varying(255),
    actif boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.laboratoires OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 17255)
-- Name: laboratoires_idlabo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.laboratoires_idlabo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.laboratoires_idlabo_seq OWNER TO postgres;

--
-- TOC entry 3047 (class 0 OID 0)
-- Dependencies: 203
-- Name: laboratoires_idlabo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.laboratoires_idlabo_seq OWNED BY public.laboratoires.idlabo;


--
-- TOC entry 204 (class 1259 OID 17257)
-- Name: medecin; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.medecin (
    idmedecin bigint NOT NULL,
    idspecialite bigint NOT NULL,
    nom character varying(255) NOT NULL,
    prenom character varying(255) NOT NULL,
    telephone character varying(255),
    email character varying(255),
    titre character varying(255),
    anexercice character varying(255),
    titrehonorifique character varying(255),
    pays character varying(255),
    ville character varying(255),
    identifiant character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    actif boolean DEFAULT true NOT NULL,
    exerce character varying(255) DEFAULT 'En exercice'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    idstructure integer NOT NULL,
    CONSTRAINT medecin_exerce_check CHECK (((exerce)::text = ANY (ARRAY[('En exercice'::character varying)::text, ('Suspendu'::character varying)::text, ('En retraite'::character varying)::text])))
);


ALTER TABLE public.medecin OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 17266)
-- Name: medecin_idmedecin_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.medecin_idmedecin_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.medecin_idmedecin_seq OWNER TO postgres;

--
-- TOC entry 3048 (class 0 OID 0)
-- Dependencies: 205
-- Name: medecin_idmedecin_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.medecin_idmedecin_seq OWNED BY public.medecin.idmedecin;


--
-- TOC entry 206 (class 1259 OID 17268)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 17271)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 3049 (class 0 OID 0)
-- Dependencies: 207
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 208 (class 1259 OID 17273)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 17279)
-- Name: patient; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.patient (
    idpatient bigint NOT NULL,
    nom character varying(255) NOT NULL,
    prenom character varying(255) NOT NULL,
    telephone character varying(255),
    age integer,
    sexe character varying(255),
    cnib character varying(255) NOT NULL,
    pays character varying(255),
    ville character varying(255),
    identifiant character varying(255),
    passeport character varying(255),
    email character varying(255),
    actif boolean DEFAULT true,
    email_verified_at timestamp(0) without time zone,
    password character varying(255),
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.patient OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 17286)
-- Name: patient_idpatient_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.patient_idpatient_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.patient_idpatient_seq OWNER TO postgres;

--
-- TOC entry 3050 (class 0 OID 0)
-- Dependencies: 210
-- Name: patient_idpatient_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.patient_idpatient_seq OWNED BY public.patient.idpatient;


--
-- TOC entry 211 (class 1259 OID 17288)
-- Name: rendezvous; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.rendezvous (
    idrdv bigint NOT NULL,
    idmedecin bigint NOT NULL,
    idpatient bigint NOT NULL,
    jour date,
    effectue boolean NOT NULL,
    reprogramme boolean NOT NULL,
    paye boolean NOT NULL,
    symptomes character varying(255),
    antecedants character varying(255),
    examensfait character varying(255),
    ordrepassage integer,
    actif boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    heuredebut time(6) with time zone,
    heurefin time(6) with time zone,
    iddisponibilite integer
);


ALTER TABLE public.rendezvous OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 17295)
-- Name: rendezvous_idrdv_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rendezvous_idrdv_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rendezvous_idrdv_seq OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 17297)
-- Name: rendezvous_idrdv_seq1; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.rendezvous_idrdv_seq1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rendezvous_idrdv_seq1 OWNER TO postgres;

--
-- TOC entry 3051 (class 0 OID 0)
-- Dependencies: 213
-- Name: rendezvous_idrdv_seq1; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.rendezvous_idrdv_seq1 OWNED BY public.rendezvous.idrdv;


--
-- TOC entry 214 (class 1259 OID 17299)
-- Name: specialite; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.specialite (
    idspecialite bigint NOT NULL,
    libelle character varying(255) NOT NULL,
    actif boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.specialite OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 17303)
-- Name: specialite_idspecialite_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.specialite_idspecialite_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.specialite_idspecialite_seq OWNER TO postgres;

--
-- TOC entry 3052 (class 0 OID 0)
-- Dependencies: 215
-- Name: specialite_idspecialite_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.specialite_idspecialite_seq OWNED BY public.specialite.idspecialite;


--
-- TOC entry 216 (class 1259 OID 17305)
-- Name: strspecial; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.strspecial (
    idstrspecial bigint NOT NULL,
    idstructure bigint NOT NULL,
    idspecialite bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.strspecial OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 17308)
-- Name: strspecial_idstrspecial_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.strspecial_idstrspecial_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.strspecial_idstrspecial_seq OWNER TO postgres;

--
-- TOC entry 3053 (class 0 OID 0)
-- Dependencies: 217
-- Name: strspecial_idstrspecial_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.strspecial_idstrspecial_seq OWNED BY public.strspecial.idstrspecial;


--
-- TOC entry 218 (class 1259 OID 17310)
-- Name: structure; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.structure (
    idstructure bigint NOT NULL,
    idstructparent integer NOT NULL,
    responsable character varying(255),
    nom character varying(255) NOT NULL,
    telephone character varying(255),
    bp character varying(255),
    email character varying(255) NOT NULL,
    fax character varying(255),
    siteweb character varying(255),
    pays character varying(255),
    ville character varying(255),
    rue character varying(255),
    specialite character varying(255),
    actif boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.structure OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 17317)
-- Name: structure_idstructure_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.structure_idstructure_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.structure_idstructure_seq OWNER TO postgres;

--
-- TOC entry 3054 (class 0 OID 0)
-- Dependencies: 219
-- Name: structure_idstructure_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.structure_idstructure_seq OWNED BY public.structure.idstructure;


--
-- TOC entry 220 (class 1259 OID 17319)
-- Name: test; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.test (
    idtest bigint NOT NULL,
    idlabo bigint NOT NULL,
    idpatient bigint NOT NULL,
    paye boolean NOT NULL,
    reprogramme boolean NOT NULL,
    ordrepassage integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    actif boolean DEFAULT true NOT NULL,
    jour date,
    idexamen bigint
);


ALTER TABLE public.test OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 17323)
-- Name: test_idtest_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.test_idtest_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.test_idtest_seq OWNER TO postgres;

--
-- TOC entry 3055 (class 0 OID 0)
-- Dependencies: 221
-- Name: test_idtest_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.test_idtest_seq OWNED BY public.test.idtest;


--
-- TOC entry 222 (class 1259 OID 17325)
-- Name: todos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.todos (
    id bigint NOT NULL,
    text character varying(255),
    completed boolean,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.todos OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 17328)
-- Name: todos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.todos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.todos_id_seq OWNER TO postgres;

--
-- TOC entry 3056 (class 0 OID 0)
-- Dependencies: 223
-- Name: todos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.todos_id_seq OWNED BY public.todos.id;


--
-- TOC entry 224 (class 1259 OID 17330)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(255),
    email character varying(255),
    identifiant character varying(255),
    password character varying(255),
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    api_token character varying(80)
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 17336)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 3057 (class 0 OID 0)
-- Dependencies: 225
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 226 (class 1259 OID 17338)
-- Name: vuedispo; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.vuedispo AS
 SELECT s.idstructure,
    s.nom AS nomstructure,
    med.idmedecin AS id,
    med.nom AS nommedecin,
    med.prenom AS prenommedecin,
    med.titre AS titremedecin,
    spec.idspecialite,
    spec.libelle AS libellespecialite,
    dispo.jour AS jourdispo,
    dispo.heuredebut,
    dispo.nbrconsultation,
    dispo.heurefin,
    dispo.placerestant,
    dispo.iddisponibilite AS iddispo,
    dispo.actif
   FROM public.structure s,
    public.medecin med,
    public.specialite spec,
    public.disponibilite dispo
  WHERE ((med.idmedecin = dispo.idmedecin) AND (dispo.idstructure = s.idstructure) AND (med.idspecialite = spec.idspecialite));


ALTER TABLE public.vuedispo OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 17501)
-- Name: vueexamen; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.vueexamen AS
 SELECT lab.idlabo,
    lab.nom AS nomlabo,
    s.idstructure,
    s.nom AS nomstructure,
    lab.heureouverture AS laboouverture,
    lab.heurefermeture AS labofermeture,
    e.idexamen,
    e.libelle AS libelleexamen,
    e.type AS typeexamen,
    e.actif
   FROM public.structure s,
    public.laboratoires lab,
    public.examens e,
    public.laboexam lbe
  WHERE ((lbe.idlabo = lab.idlabo) AND (lbe.idexamen = e.idexamen) AND (lab.idstructure = s.idstructure));


ALTER TABLE public.vueexamen OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 17347)
-- Name: vuemedecin; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.vuemedecin AS
 SELECT medecin.nom,
    medecin.prenom,
    medecin.telephone,
    medecin.email,
    medecin.titre,
    medecin.anexercice,
    medecin.titrehonorifique,
    medecin.pays,
    medecin.ville,
    medecin.identifiant,
    medecin.password,
    medecin.actif,
    medecin.exerce,
    medecin.idmedecin AS id,
    specialite.idspecialite,
    specialite.libelle AS specialite,
    structure.idstructure,
    structure.nom AS structure
   FROM public.medecin,
    public.specialite,
    public.structure
  WHERE ((medecin.idspecialite = specialite.idspecialite) AND (structure.idstructure = medecin.idstructure));


ALTER TABLE public.vuemedecin OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 17351)
-- Name: vuerendezvous; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.vuerendezvous AS
 SELECT rd.idrdv,
    pat.idpatient AS id,
    pat.nom AS nompatient,
    pat.prenom AS prenompatient,
    pat.cnib AS cnibpatient,
    pat.age AS agepatient,
    med.idmedecin,
    med.nom AS nommedecin,
    med.prenom AS prenommedecin,
    med.idspecialite,
    spec.libelle AS specialitemedecin,
    med.titre AS titremedecin,
    rd.jour AS jourrendezvous,
    rd.ordrepassage,
    rd.iddisponibilite,
    rd.heuredebut,
    rd.heurefin,
    rd.actif
   FROM public.medecin med,
    public.patient pat,
    public.rendezvous rd,
    public.specialite spec
  WHERE ((rd.idmedecin = med.idmedecin) AND (rd.idpatient = pat.idpatient) AND (med.idspecialite = spec.idspecialite));


ALTER TABLE public.vuerendezvous OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 17356)
-- Name: vuespecialitestructure; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.vuespecialitestructure AS
 SELECT spec.idspecialite,
    spec.libelle AS specialite,
    str.idstructure,
    str.nom AS nomstructure,
    str.telephone
   FROM public.structure str,
    public.specialite spec,
    public.strspecial
  WHERE ((spec.idspecialite = strspecial.idspecialite) AND (str.idstructure = strspecial.idstructure));


ALTER TABLE public.vuespecialitestructure OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 17510)
-- Name: vuetest; Type: VIEW; Schema: public; Owner: postgres
--

CREATE VIEW public.vuetest AS
 SELECT p.idpatient AS id,
    p.nom AS nompatient,
    p.prenom AS prenompatient,
    p.cnib AS cnibpatient,
    ex.idexamen,
    ex.libelle AS libellexamen,
    lab.idlabo,
    labex.heuredebut,
    labex.heurefin,
    lab.nom AS nomlaboratoire,
    t.idtest,
    t.actif,
    t.jour AS jourtest
   FROM public.patient p,
    public.examens ex,
    public.test t,
    public.laboratoires lab,
    public.laboexam labex
  WHERE ((ex.idexamen = t.idexamen) AND (t.idpatient = p.idpatient) AND (t.idlabo = lab.idlabo) AND (labex.idlabo = lab.idlabo) AND (labex.idexamen = ex.idexamen));


ALTER TABLE public.vuetest OWNER TO postgres;

--
-- TOC entry 2787 (class 2604 OID 17360)
-- Name: disponibilite iddisponibilite; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.disponibilite ALTER COLUMN iddisponibilite SET DEFAULT nextval('public.disponibilite_iddisponibilite_seq'::regclass);


--
-- TOC entry 2789 (class 2604 OID 17361)
-- Name: examens idexamen; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.examens ALTER COLUMN idexamen SET DEFAULT nextval('public.examens_idexamen_seq'::regclass);


--
-- TOC entry 2791 (class 2604 OID 17362)
-- Name: laboexam idlaboexam; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laboexam ALTER COLUMN idlaboexam SET DEFAULT nextval('public.laboexam_idlaboexam_seq'::regclass);


--
-- TOC entry 2793 (class 2604 OID 17363)
-- Name: laboratoires idlabo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laboratoires ALTER COLUMN idlabo SET DEFAULT nextval('public.laboratoires_idlabo_seq'::regclass);


--
-- TOC entry 2796 (class 2604 OID 17364)
-- Name: medecin idmedecin; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.medecin ALTER COLUMN idmedecin SET DEFAULT nextval('public.medecin_idmedecin_seq'::regclass);


--
-- TOC entry 2798 (class 2604 OID 17365)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 2800 (class 2604 OID 17366)
-- Name: patient idpatient; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patient ALTER COLUMN idpatient SET DEFAULT nextval('public.patient_idpatient_seq'::regclass);


--
-- TOC entry 2802 (class 2604 OID 17367)
-- Name: rendezvous idrdv; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rendezvous ALTER COLUMN idrdv SET DEFAULT nextval('public.rendezvous_idrdv_seq1'::regclass);


--
-- TOC entry 2804 (class 2604 OID 17368)
-- Name: specialite idspecialite; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.specialite ALTER COLUMN idspecialite SET DEFAULT nextval('public.specialite_idspecialite_seq'::regclass);


--
-- TOC entry 2805 (class 2604 OID 17369)
-- Name: strspecial idstrspecial; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.strspecial ALTER COLUMN idstrspecial SET DEFAULT nextval('public.strspecial_idstrspecial_seq'::regclass);


--
-- TOC entry 2807 (class 2604 OID 17370)
-- Name: structure idstructure; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.structure ALTER COLUMN idstructure SET DEFAULT nextval('public.structure_idstructure_seq'::regclass);


--
-- TOC entry 2809 (class 2604 OID 17371)
-- Name: test idtest; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.test ALTER COLUMN idtest SET DEFAULT nextval('public.test_idtest_seq'::regclass);


--
-- TOC entry 2810 (class 2604 OID 17372)
-- Name: todos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.todos ALTER COLUMN id SET DEFAULT nextval('public.todos_id_seq'::regclass);


--
-- TOC entry 2811 (class 2604 OID 17373)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3006 (class 0 OID 17227)
-- Dependencies: 196
-- Data for Name: disponibilite; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.disponibilite (iddisponibilite, idstructure, idmedecin, jour, heuredebut, heurefin, nbrconsultation, placerestant, actif, created_at, updated_at) VALUES (44, 1, 17, '2020-07-29', '10:00:00', '15:00:00', 5, NULL, true, '2020-08-31 17:31:40', '2020-08-31 17:31:40');
INSERT INTO public.disponibilite (iddisponibilite, idstructure, idmedecin, jour, heuredebut, heurefin, nbrconsultation, placerestant, actif, created_at, updated_at) VALUES (46, 1, 20, '2020-09-11', '06:00:00', '08:00:00', 4, NULL, true, '2020-09-13 14:36:57', '2020-09-13 14:36:57');
INSERT INTO public.disponibilite (iddisponibilite, idstructure, idmedecin, jour, heuredebut, heurefin, nbrconsultation, placerestant, actif, created_at, updated_at) VALUES (45, 1, 17, '2020-08-13', '04:00:00', '09:00:00', 8, NULL, false, '2020-08-31 17:31:54', '2020-09-13 14:37:44');


--
-- TOC entry 3008 (class 0 OID 17233)
-- Dependencies: 198
-- Data for Name: examens; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.examens (idexamen, libelle, type, actif, created_at, updated_at) VALUES (87, 'Hemoglobine A', 'sang', false, '2020-07-07 14:39:37', '2020-07-07 14:40:42');
INSERT INTO public.examens (idexamen, libelle, type, actif, created_at, updated_at) VALUES (89, 'globule bleue', 'sang', false, '2020-07-08 11:38:54', '2020-07-08 11:42:22');
INSERT INTO public.examens (idexamen, libelle, type, actif, created_at, updated_at) VALUES (86, 'Groupe Sanguin', 'sang', false, '2020-07-07 14:39:10', '2020-07-08 11:42:41');
INSERT INTO public.examens (idexamen, libelle, type, actif, created_at, updated_at) VALUES (85, 'Electrophorèse A', 'sang', true, '2020-07-07 14:38:18', '2020-07-09 09:04:59');
INSERT INTO public.examens (idexamen, libelle, type, actif, created_at, updated_at) VALUES (88, 'Glycemie Bleue', 'sang', true, '2020-07-07 14:40:12', '2020-07-09 09:05:12');
INSERT INTO public.examens (idexamen, libelle, type, actif, created_at, updated_at) VALUES (90, 'Groupe Sanguin Vert', 'sang', true, '2020-07-08 11:43:02', '2020-07-09 09:11:36');
INSERT INTO public.examens (idexamen, libelle, type, actif, created_at, updated_at) VALUES (92, 'Modulaire vision', 'sang', false, '2020-07-09 11:27:16', '2020-07-09 11:27:39');
INSERT INTO public.examens (idexamen, libelle, type, actif, created_at, updated_at) VALUES (91, 'Chocolat Rouge Politiques', 'sang', true, '2020-07-09 09:06:07', '2020-08-10 11:38:37');
INSERT INTO public.examens (idexamen, libelle, type, actif, created_at, updated_at) VALUES (93, 'TRIPOKAS', 'sang', true, '2020-08-10 16:37:19', '2020-08-10 16:37:19');
INSERT INTO public.examens (idexamen, libelle, type, actif, created_at, updated_at) VALUES (94, 'hello', 'man', true, '2020-08-11 15:24:50', '2020-08-11 15:24:50');


--
-- TOC entry 3010 (class 0 OID 17242)
-- Dependencies: 200
-- Data for Name: laboexam; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3012 (class 0 OID 17248)
-- Dependencies: 202
-- Data for Name: laboratoires; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3014 (class 0 OID 17257)
-- Dependencies: 204
-- Data for Name: medecin; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.medecin (idmedecin, idspecialite, nom, prenom, telephone, email, titre, anexercice, titrehonorifique, pays, ville, identifiant, password, actif, exerce, created_at, updated_at, idstructure) VALUES (17, 4, 'SOURABIE', 'Ardiouma', '669800000', 'sourab@yahoo.fr', 'Docteur', '12', 'Professeur', 'Togo', 'Lome', 'Sourabie124', '$2y$10$2otd6JxZG47xvoYVoQCtO.XDXK43Du5XK0rv8RwY2RIjs3OyKOW8G', true, 'En exercice', '2020-08-14 09:17:47', '2020-08-14 09:17:47', 1);
INSERT INTO public.medecin (idmedecin, idspecialite, nom, prenom, telephone, email, titre, anexercice, titrehonorifique, pays, ville, identifiant, password, actif, exerce, created_at, updated_at, idstructure) VALUES (4, 1, 'TOURE', 'Jean', '70214587', NULL, 'Docteur', '12', 'Chevalier de l''ordre', NULL, NULL, 'toure', 'jhuhu545', false, 'En exercice', NULL, '2020-08-14 09:18:34', 1);
INSERT INTO public.medecin (idmedecin, idspecialite, nom, prenom, telephone, email, titre, anexercice, titrehonorifique, pays, ville, identifiant, password, actif, exerce, created_at, updated_at, idstructure) VALUES (18, 2, 'SORGO', 'Malidou Armand', '784512120', 'malidou@yahoo.fr', 'Professeur', '14', 'Chevalier de l''ordre', 'Burkina', 'Ouahigouya', 'malidou4', '$2y$10$LEeMsw1lwfc/3rFMkB1YM.96nqc6hwjAg7Sxxf1x4J9ClCQXTng0O', true, 'En exercice', '2020-08-17 11:26:31', '2020-08-17 12:48:25', 1);
INSERT INTO public.medecin (idmedecin, idspecialite, nom, prenom, telephone, email, titre, anexercice, titrehonorifique, pays, ville, identifiant, password, actif, exerce, created_at, updated_at, idstructure) VALUES (16, 2, 'KOUMBIA', 'Isidore', '7777770', 'isidore2@yahoo.fr', 'professeur', '10', 'chevalier', 'Mali', 'Bamako', 'is20202', '$2y$10$cXiMAv3j6cM.ECg1OumcvuDf3pBksqYSJSlkaCzzweSr8HjfH9Fw.', false, 'En exercice', '2020-08-14 09:14:31', '2020-08-17 13:17:47', 1);
INSERT INTO public.medecin (idmedecin, idspecialite, nom, prenom, telephone, email, titre, anexercice, titrehonorifique, pays, ville, identifiant, password, actif, exerce, created_at, updated_at, idstructure) VALUES (20, 3, 'DIMTOUNDA', 'Elischama', '70221045', 'dimtounda@gmail.com', 'Docteur', '15', 'chevalier de l''ordre national', 'Burkina Faso', 'Bobo Dioulasso', 'dimtoum14', '$2y$10$vuaSVmJ8bEVNdLk/R1V4D.DT4HoNMeOzw4gpTVfi3p.HjUDL7snyS', true, 'En exercice', '2020-09-03 15:10:14', '2020-09-03 15:10:14', 1);
INSERT INTO public.medecin (idmedecin, idspecialite, nom, prenom, telephone, email, titre, anexercice, titrehonorifique, pays, ville, identifiant, password, actif, exerce, created_at, updated_at, idstructure) VALUES (21, 5, 'KIRAKOYA', 'Arnaud', '70000145', 'kirakoya@gmail.com', 'Professeur', '14', 'Chevalier de l''ordre', 'Burkina', 'Ouaga', 'kirakoya12', '$2y$10$LZqYyM.4vfacfPoPB0Mg7Ou1V5APNvN2Y.stk27J3xTeXRgAokAva', true, 'En exercice', '2020-09-03 15:12:42', '2020-09-03 15:12:42', 1);


--
-- TOC entry 3016 (class 0 OID 17268)
-- Dependencies: 206
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.migrations (id, migration, batch) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (3, '2020_03_25_102842_create_todos_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (4, '2020_03_25_114145_add_token_to_users_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (5, '2020_04_15_00000_create_examens_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (6, '2020_04_15_00000_create_patient_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (7, '2020_04_15_00000_create_specialite_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (8, '2020_04_15_00000_create_structure_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (9, '2020_04_15_00001_create_laboratoires_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (10, '2020_04_15_00001_create_medecin_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (11, '2020_04_15_00001_create_strspecial_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (12, '2020_04_15_00002_create_disponibilite_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (13, '2020_04_15_00002_create_laboexam_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (14, '2020_04_15_00002_create_rendezvous_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (15, '2020_04_15_00002_create_test_table', 1);


--
-- TOC entry 3018 (class 0 OID 17273)
-- Dependencies: 208
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3019 (class 0 OID 17279)
-- Dependencies: 209
-- Data for Name: patient; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (78, 'SALAMON', 'Boureima', '654654', 15, 'Masculin', '654654', 'Burkina', 'kjghkjg', 'polo123', '65456', NULL, true, NULL, '$2y$10$0uExJQ.PdS4JLF6PbrsIl.9.UjaCjlwd.UaG2zx1YDN7/9lLy4JeS', NULL, '2020-08-12 10:37:10', '2020-08-12 10:37:10');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (79, 'OULA', 'Patrick', '45465', 55, 'Masculin', '455456', 'bobo', 'bobo', 'polo', '654654', NULL, true, NULL, '$2y$10$zRDrlyaQfHiHtIZ6PNamXOpei0eu/IXxQYmWMlb6z0PeEZQKBqPFa', NULL, '2020-08-12 12:59:29', '2020-08-12 12:59:29');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (80, 'GANAMOU', 'Patrick', '6565', 45, 'Masculin', '6565', 'bobo', 'bobo', 'pala', '6565', NULL, true, NULL, '$2y$10$imwSfGuANvjmdOWznTMMVuqSYlyot9G5Sodz3d.BEKgyH51wdyxKe', NULL, '2020-08-12 13:00:34', '2020-08-12 13:00:34');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (83, 'ILBOUA', 'LO', '56465', 88, 'Masculin', '56465', 'PO', 'PLO', 'lapo', '14564', NULL, true, NULL, '$2y$10$r29QU8tASah6xRhJsplcKObsunoeEDa.s.WXRM9DirS3eFJSbPsd2', NULL, '2020-08-12 13:03:39', '2020-08-12 13:03:39');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (84, 'KABORE', 'Kali', '654564', NULL, 'Masculin', '54654', 'bobo', 'bolo', 'lop', '56465', NULL, true, NULL, '$2y$10$sxWwqGrFLOj8nqL9iO91..5Ym74TPw2bu0AdvwfeFTxtwasaxT7bu', NULL, '2020-08-12 13:05:06', '2020-08-12 13:05:06');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (86, 'GIRAKOYA', 'PO', '789632', 44, 'Masculin', '4654', 'LO', 'PO', 'gira123', '5646', NULL, true, NULL, NULL, NULL, '2020-08-12 13:06:27', '2020-08-12 13:06:27');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (87, 'GOLO', 'Lobana', '8755120', 45, 'Masculin', '7899', 'polo', 'polo', 'pra12', '879632', NULL, true, NULL, '$2y$10$trcf4iX5wqx9WsgfO08YPuquQbPsnMjOcTAy05fz/l5s6VOJtywOC', NULL, '2020-08-12 13:07:45', '2020-08-12 13:07:45');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (89, 'KAPOLO', 'Adama', '5555555', 25, 'Masculin', '5258', 'Bolo', 'poli', 'polima', '87965', NULL, true, NULL, '$2y$10$o6NDbom9NlJq88U2cZE3z.NZQXPp2SjN0k7wJA0uR6dCj8xM4zJ4S', NULL, '2020-08-12 13:10:41', '2020-08-12 13:10:41');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (91, 'DALOUA', 'Alidou', '2540009', 52, 'Masculin', '5555', 'bobo', 'polo', 'Tiemo', '785', NULL, true, NULL, '$2y$10$SwzV1fgGvgUrIwNdSDgkUOsdVQ5t9UQnYATE936Tt/6bCnrNQnfu6', NULL, '2020-08-12 13:13:22', '2020-08-12 13:13:22');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (92, 'OUEDRAOGO', 'Alexis', '88888', 44, 'Masculin', '45454', 'poloma', 'poloma', 'ibratas', '65454', NULL, true, NULL, '$2y$10$DwjQVPperwcYiF56hn3gzOBE3.g0bjyrShOE94Iu4tBy06kwGe3.W', NULL, '2020-08-12 13:18:59', '2020-08-12 13:18:59');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (82, 'DIALLO', 'Alphonse', '5454', 55, 'Masculin', '5454', 'burkina', 'ouaga', 'pekou', '2454', 'labara@yahoo.fr', true, NULL, '$2y$10$bb97LA.HIl7ok3FtNjTZ/eNBBqM1u.iz/N2Pz63niT9MTtQ2N8f/K', NULL, '2020-08-12 13:02:36', '2020-08-12 15:11:09');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (88, 'TAMBOURAMOLA', 'Jack', '222220222', 66, 'Masculin', '2222', 'Ghana', 'Accra', 'pouraman', '78932222', 'tamboura@gmail.com', true, NULL, '$2y$10$IGHyXWsOlOMeRz3u.OY6IeY4WriWvtGvC4Zhk.o66sxOOQoJEd8I6', NULL, '2020-08-12 13:09:24', '2020-08-12 15:15:09');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (93, 'ROUMBA', 'Robert', '548748000', 44, 'Masculin', '55494', 'Burkina', 'ouaga', 'roumba123', '88956', 'roumba@yahoo.fr', true, NULL, '$2y$10$d7A9OF/5RsBdEQGJT6VBtOIuL2inQQPgKn8hR9HlX8ipU4IN/DDl2', NULL, '2020-08-12 15:21:37', '2020-08-12 15:21:37');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (90, 'TARAMA', 'Landry Meirveille', '000211450', 44, 'Feminin', '254', 'bobo', 'polo', 'iblo123', '879652', 'landry@yahoo.fr', true, NULL, '$2y$10$GEHSMs4F2Iet6ppaosTKSulr8/Oy7JWvy2WleUNYxjlSNR/mIzVim', NULL, '2020-08-12 13:11:57', '2020-08-12 15:32:58');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (94, 'OUI', 'Assita Nadege', '784512', 18, 'Feminin', 'B5558', 'Burkina', 'Ouagadougou', 'oui1234', 'B4589', 'oui@yahoo.fr', false, NULL, '$2y$10$w2TrI3/IDJt/T/5liq7MmOzsvrLjlpMt1UBUnKtpUrwfWqcosoNe.', NULL, '2020-09-13 15:00:52', '2020-09-13 15:01:07');
INSERT INTO public.patient (idpatient, nom, prenom, telephone, age, sexe, cnib, pays, ville, identifiant, passeport, email, actif, email_verified_at, password, remember_token, created_at, updated_at) VALUES (81, 'DOUMBIA', 'Paul', '54564', 45, 'Masculin', '54564', 'Togo', 'lome', 'togo', '56465', NULL, false, NULL, '$2y$10$R2jFZwTQ6zylPR9dtKYKIezDJs2YzC7zi.TQPlULsNrNtuk7Y3fv6', NULL, '2020-08-12 13:01:31', '2020-09-13 15:01:16');


--
-- TOC entry 3021 (class 0 OID 17288)
-- Dependencies: 211
-- Data for Name: rendezvous; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (69, 17, 90, '2020-07-29', false, false, false, 'alain', 'boulima', 'ramata', NULL, false, '2020-09-08 13:47:23', '2020-09-08 13:47:30', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (61, 17, 90, '2020-08-13', false, false, false, NULL, NULL, NULL, NULL, false, '2020-08-31 21:44:54', '2020-09-08 13:47:41', '04:00:00+02', '09:00:00+02', 45);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (74, 17, 90, '2020-07-29', false, false, false, 'ml', 'polo', 'lddd', NULL, false, '2020-09-08 14:00:56', '2020-09-08 14:01:00', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (73, 17, 90, '2020-08-13', false, false, false, NULL, NULL, NULL, NULL, false, '2020-09-08 13:59:34', '2020-09-08 14:01:10', '04:00:00+02', '09:00:00+02', 45);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (70, 17, 90, '2020-07-29', false, false, false, NULL, NULL, NULL, NULL, false, '2020-09-08 13:49:56', '2020-09-08 14:01:17', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (62, 17, 82, '2020-07-29', false, false, false, 'maux de tete, maux de ventre, fievre', 'diabetique', 'NFS', NULL, false, '2020-09-01 12:17:31', '2020-09-08 11:49:31', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (63, 17, 82, '2020-08-13', false, false, false, 'RAS', 'Paludisme', 'RAS', NULL, false, '2020-09-01 12:18:00', '2020-09-08 11:49:42', '04:00:00+02', '09:00:00+02', 45);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (64, 17, 82, '2020-07-29', false, false, false, 'les bons symptomes', 'un antecedant', 'les examens faits', NULL, true, '2020-09-08 11:51:49', '2020-09-08 11:51:49', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (65, 17, 82, '2020-07-29', false, false, false, NULL, NULL, NULL, NULL, true, '2020-09-08 12:18:48', '2020-09-08 12:18:48', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (66, 17, 86, '2020-07-29', false, false, false, NULL, NULL, NULL, NULL, true, '2020-09-08 13:35:32', '2020-09-08 13:35:32', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (67, 17, 88, '2020-07-29', false, false, false, NULL, NULL, NULL, NULL, true, '2020-09-08 13:35:55', '2020-09-08 13:35:55', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (68, 17, 88, '2020-07-29', false, false, false, NULL, NULL, NULL, NULL, true, '2020-09-08 13:38:22', '2020-09-08 13:38:22', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (60, 17, 90, '2020-07-29', false, false, false, NULL, NULL, NULL, NULL, false, '2020-08-31 21:44:44', '2020-09-08 13:46:53', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (71, 17, 90, '2020-08-13', false, false, false, NULL, NULL, NULL, NULL, false, '2020-09-08 13:50:37', '2020-09-08 14:01:21', '04:00:00+02', '09:00:00+02', 45);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (72, 17, 90, '2020-07-29', false, false, false, 'les symptomes', 'antecedants', 'les examens', NULL, false, '2020-09-08 13:56:37', '2020-09-08 14:01:25', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (76, 17, 90, '2020-08-13', false, false, false, NULL, NULL, NULL, NULL, false, '2020-09-08 14:01:35', '2020-09-08 14:01:41', '04:00:00+02', '09:00:00+02', 45);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (75, 17, 90, '2020-07-29', false, false, false, NULL, NULL, NULL, NULL, false, '2020-09-08 14:01:30', '2020-09-08 14:01:45', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (77, 17, 90, '2020-07-29', false, false, false, NULL, NULL, NULL, NULL, false, '2020-09-10 09:12:26', '2020-09-10 09:12:30', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (79, 20, 90, '2020-09-11', false, false, false, 'fièvre', 'Paludisme', 'NFS', NULL, false, '2020-09-13 15:42:03', '2020-09-13 15:42:07', '06:00:00+02', '08:00:00+02', 46);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (78, 17, 90, '2020-07-29', false, false, false, 'fièvre forte', 'maux de tète', 'Electrophorèse', NULL, false, '2020-09-13 15:40:56', '2020-09-13 15:42:10', '10:00:00+02', '15:00:00+02', 44);
INSERT INTO public.rendezvous (idrdv, idmedecin, idpatient, jour, effectue, reprogramme, paye, symptomes, antecedants, examensfait, ordrepassage, actif, created_at, updated_at, heuredebut, heurefin, iddisponibilite) VALUES (80, 17, 93, '2020-07-29', false, false, false, 'gripé', 'Epatite', 'RFS', NULL, false, '2020-09-19 08:29:39', '2020-09-19 08:32:23', '10:00:00+02', '15:00:00+02', 44);


--
-- TOC entry 3024 (class 0 OID 17299)
-- Dependencies: 214
-- Data for Name: specialite; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.specialite (idspecialite, libelle, actif, created_at, updated_at) VALUES (1, 'dentiste', true, NULL, NULL);
INSERT INTO public.specialite (idspecialite, libelle, actif, created_at, updated_at) VALUES (2, 'urologue', true, NULL, NULL);
INSERT INTO public.specialite (idspecialite, libelle, actif, created_at, updated_at) VALUES (3, 'cardiologue', true, NULL, NULL);
INSERT INTO public.specialite (idspecialite, libelle, actif, created_at, updated_at) VALUES (4, 'nerologue', true, NULL, NULL);
INSERT INTO public.specialite (idspecialite, libelle, actif, created_at, updated_at) VALUES (5, 'traumatologue', true, NULL, NULL);
INSERT INTO public.specialite (idspecialite, libelle, actif, created_at, updated_at) VALUES (6, 'pneumologue', true, NULL, NULL);


--
-- TOC entry 3026 (class 0 OID 17305)
-- Dependencies: 216
-- Data for Name: strspecial; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3028 (class 0 OID 17310)
-- Dependencies: 218
-- Data for Name: structure; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.structure (idstructure, idstructparent, responsable, nom, telephone, bp, email, fax, siteweb, pays, ville, rue, specialite, actif, created_at, updated_at) VALUES (1, 1, 'TRAORE', 'juvenal', '70211478', NULL, 'Juvenal@yahoo.fr', NULL, NULL, NULL, NULL, NULL, 'cardio', true, NULL, NULL);


--
-- TOC entry 3030 (class 0 OID 17319)
-- Dependencies: 220
-- Data for Name: test; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 3032 (class 0 OID 17325)
-- Dependencies: 222
-- Data for Name: todos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.todos (id, text, completed, created_at, updated_at) VALUES (37, NULL, NULL, '2020-07-01 17:57:11', '2020-07-01 17:57:11');
INSERT INTO public.todos (id, text, completed, created_at, updated_at) VALUES (38, NULL, NULL, '2020-07-01 17:57:36', '2020-07-01 17:57:36');
INSERT INTO public.todos (id, text, completed, created_at, updated_at) VALUES (39, 'on a renseigner', NULL, '2020-07-02 09:13:42', '2020-07-02 09:13:42');
INSERT INTO public.todos (id, text, completed, created_at, updated_at) VALUES (40, 'La bête humaine', true, '2020-07-02 09:19:21', '2020-07-02 09:19:21');
INSERT INTO public.todos (id, text, completed, created_at, updated_at) VALUES (41, 'voyons les donnees', true, '2020-07-02 09:41:32', '2020-07-02 09:41:32');
INSERT INTO public.todos (id, text, completed, created_at, updated_at) VALUES (42, 'voyons les donnees', true, '2020-07-02 09:44:35', '2020-07-02 09:44:35');
INSERT INTO public.todos (id, text, completed, created_at, updated_at) VALUES (43, 'un tres bon essai', true, '2020-07-02 09:46:31', '2020-07-02 09:46:31');


--
-- TOC entry 3034 (class 0 OID 17330)
-- Dependencies: 224
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (110, 'TRAORE IBRAHIM', 'ibra@yahoo.fr', 'ibrat', '$2y$10$uSp6NbjtLGP0nyNd1Gqw4edqvmnDz9mwJPjX/axDaPP0nGFqj/tT2', NULL, NULL, NULL, NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (111, NULL, NULL, 'polo123', '$2y$10$0uExJQ.PdS4JLF6PbrsIl.9.UjaCjlwd.UaG2zx1YDN7/9lLy4JeS', NULL, '2020-08-12 10:37:10', '2020-08-12 10:37:10', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (112, NULL, NULL, 'polo', '$2y$10$zRDrlyaQfHiHtIZ6PNamXOpei0eu/IXxQYmWMlb6z0PeEZQKBqPFa', NULL, '2020-08-12 12:59:29', '2020-08-12 12:59:29', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (113, NULL, NULL, 'pala', '$2y$10$imwSfGuANvjmdOWznTMMVuqSYlyot9G5Sodz3d.BEKgyH51wdyxKe', NULL, '2020-08-12 13:00:34', '2020-08-12 13:00:34', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (114, NULL, NULL, 'togo', '$2y$10$R2jFZwTQ6zylPR9dtKYKIezDJs2YzC7zi.TQPlULsNrNtuk7Y3fv6', NULL, '2020-08-12 13:01:31', '2020-08-12 13:01:31', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (116, NULL, NULL, 'lapo', '$2y$10$r29QU8tASah6xRhJsplcKObsunoeEDa.s.WXRM9DirS3eFJSbPsd2', NULL, '2020-08-12 13:03:39', '2020-08-12 13:03:39', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (117, NULL, NULL, 'lop', '$2y$10$sxWwqGrFLOj8nqL9iO91..5Ym74TPw2bu0AdvwfeFTxtwasaxT7bu', NULL, '2020-08-12 13:05:06', '2020-08-12 13:05:06', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (118, NULL, NULL, 'gira123', '$2y$10$dpwp40iUF0mrOZEMeNAA9uXcncgIhGyK7w0YEEbPZHfZdLX98JZ3a', NULL, '2020-08-12 13:05:56', '2020-08-12 13:05:56', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (119, NULL, NULL, 'pra12', '$2y$10$trcf4iX5wqx9WsgfO08YPuquQbPsnMjOcTAy05fz/l5s6VOJtywOC', NULL, '2020-08-12 13:07:45', '2020-08-12 13:07:45', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (121, NULL, NULL, 'polima', '$2y$10$o6NDbom9NlJq88U2cZE3z.NZQXPp2SjN0k7wJA0uR6dCj8xM4zJ4S', NULL, '2020-08-12 13:10:41', '2020-08-12 13:10:41', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (123, NULL, NULL, 'Tiemo', '$2y$10$SwzV1fgGvgUrIwNdSDgkUOsdVQ5t9UQnYATE936Tt/6bCnrNQnfu6', NULL, '2020-08-12 13:13:22', '2020-08-12 13:13:22', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (124, NULL, NULL, 'ibratas', '$2y$10$DwjQVPperwcYiF56hn3gzOBE3.g0bjyrShOE94Iu4tBy06kwGe3.W', NULL, '2020-08-12 13:18:59', '2020-08-12 13:18:59', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (115, 'DIALLO', 'labara@yahoo.fr', 'pekou', '$2y$10$bb97LA.HIl7ok3FtNjTZ/eNBBqM1u.iz/N2Pz63niT9MTtQ2N8f/K', NULL, '2020-08-12 13:02:36', '2020-08-12 15:11:09', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (120, 'TAMBOURAMOLA', 'tamboura@gmail.com', 'pouraman', '$2y$10$IGHyXWsOlOMeRz3u.OY6IeY4WriWvtGvC4Zhk.o66sxOOQoJEd8I6', NULL, '2020-08-12 13:09:24', '2020-08-12 15:15:09', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (126, NULL, 'roumba@yahoo.fr', 'roumba123', '$2y$10$d7A9OF/5RsBdEQGJT6VBtOIuL2inQQPgKn8hR9HlX8ipU4IN/DDl2', NULL, '2020-08-12 15:21:37', '2020-08-12 15:21:37', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (122, 'TARAMA', 'landry@yahoo.fr', 'iblo123', '$2y$10$GEHSMs4F2Iet6ppaosTKSulr8/Oy7JWvy2WleUNYxjlSNR/mIzVim', NULL, '2020-08-12 13:11:57', '2020-08-12 15:32:58', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (127, NULL, NULL, 'identiiii', '$2y$10$QgTj/AKcobPLcnpkPEnFt.dmNQc8yavQ1nxM6.SwwdBcDPP5InDda', NULL, '2020-08-13 13:36:29', '2020-08-13 13:36:29', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (128, NULL, 'Burkinaooi', 'kolo', '$2y$10$eU7QXsfxjHPkxpvSAltxoO0j1rOjEMqkrFDbtiMJ2WD3X4DuQBGXm', NULL, '2020-08-13 13:40:11', '2020-08-13 13:40:11', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (129, NULL, 'ganame@yahoo.fr', 'GANAMOT1', '$2y$10$yxB1GudRQcKnUvcj.hCtNOFKG3QyX.JWo4SQAgFU0.1JC1OdJ1bwi', NULL, '2020-08-14 08:27:25', '2020-08-14 08:27:25', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (130, NULL, 'amina@yahoo.fr', 'Ganamelo', '$2y$10$of88iW9GSSQDvrrgx8n4Hues2ZMHOsNru52mnJpXMDG8be.qEYXxC', NULL, '2020-08-14 08:40:54', '2020-08-14 08:40:54', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (131, NULL, 'koroba@yahoo.fr', 'KOROBA', '$2y$10$Y7t2XsE/0Tyzqff3YIJXVeSEW89jXe0xKTMCPuzXSXx6OuoUTtmBy', NULL, '2020-08-14 08:44:45', '2020-08-14 08:44:45', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (132, NULL, '00000', 'dori', '$2y$10$JrnCy0HEhncCba7weE76r.twPiNWf6LtlnMHkltoO3wE4cubdQs/e', NULL, '2020-08-14 08:57:14', '2020-08-14 08:57:14', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (133, NULL, 'gorou@yahoo.fr', 'Gorou', '$2y$10$fg8JLXWKj9iqeuojCemrSOkRCJ17ekyNz/gACUGLO57wD3HzEgnf.', NULL, '2020-08-14 08:59:35', '2020-08-14 08:59:35', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (135, NULL, 'gorou1@yahoo.fr', 'Gorou1', '$2y$10$dICW8JAHST7OFVLwhKA64O19vQfOnwEoUwl/q3RCgxp6DPPZGuKd6', NULL, '2020-08-14 09:03:09', '2020-08-14 09:03:09', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (136, NULL, 'gorou2@yahoo.fr', 'Gorou2', '$2y$10$DnLBtkQwrl0uTyZT8s6wlOsX.b.m5/v60YJ7ZcpT0W9E2dkrVnGyW', NULL, '2020-08-14 09:06:15', '2020-08-14 09:06:15', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (137, NULL, 'isidore@yahoo.fr', 'is2020', '$2y$10$XNWAXQpjrs5q7DfWWFg77ehdgfKyN9/LnO9vT99LBo6WOnHGqgoHu', NULL, '2020-08-14 09:10:03', '2020-08-14 09:10:03', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (138, NULL, 'isidore2@yahoo.fr', 'is20202', '$2y$10$cXiMAv3j6cM.ECg1OumcvuDf3pBksqYSJSlkaCzzweSr8HjfH9Fw.', NULL, '2020-08-14 09:14:31', '2020-08-14 09:14:31', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (139, NULL, 'sourab@yahoo.fr', 'Sourabie124', '$2y$10$2otd6JxZG47xvoYVoQCtO.XDXK43Du5XK0rv8RwY2RIjs3OyKOW8G', NULL, '2020-08-14 09:17:47', '2020-08-14 09:17:47', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (140, 'SORGO', 'malidou@yahoo.fr', 'malidou4', '$2y$10$LEeMsw1lwfc/3rFMkB1YM.96nqc6hwjAg7Sxxf1x4J9ClCQXTng0O', NULL, '2020-08-17 11:26:31', '2020-08-17 11:37:57', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (144, NULL, 'dimtounda@gmail.com', 'dimtoum14', '$2y$10$vuaSVmJ8bEVNdLk/R1V4D.DT4HoNMeOzw4gpTVfi3p.HjUDL7snyS', NULL, '2020-09-03 15:10:13', '2020-09-03 15:10:13', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (145, NULL, 'kirakoya@gmail.com', 'kirakoya12', '$2y$10$LZqYyM.4vfacfPoPB0Mg7Ou1V5APNvN2Y.stk27J3xTeXRgAokAva', NULL, '2020-09-03 15:12:42', '2020-09-03 15:12:42', NULL);
INSERT INTO public.users (id, name, email, identifiant, password, remember_token, created_at, updated_at, api_token) VALUES (146, NULL, 'oui@yahoo.fr', 'oui1234', '$2y$10$w2TrI3/IDJt/T/5liq7MmOzsvrLjlpMt1UBUnKtpUrwfWqcosoNe.', NULL, '2020-09-13 15:00:52', '2020-09-13 15:00:52', NULL);


--
-- TOC entry 3058 (class 0 OID 0)
-- Dependencies: 197
-- Name: disponibilite_iddisponibilite_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.disponibilite_iddisponibilite_seq', 46, true);


--
-- TOC entry 3059 (class 0 OID 0)
-- Dependencies: 199
-- Name: examens_idexamen_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.examens_idexamen_seq', 94, true);


--
-- TOC entry 3060 (class 0 OID 0)
-- Dependencies: 201
-- Name: laboexam_idlaboexam_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.laboexam_idlaboexam_seq', 1, false);


--
-- TOC entry 3061 (class 0 OID 0)
-- Dependencies: 203
-- Name: laboratoires_idlabo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.laboratoires_idlabo_seq', 3, true);


--
-- TOC entry 3062 (class 0 OID 0)
-- Dependencies: 205
-- Name: medecin_idmedecin_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.medecin_idmedecin_seq', 21, true);


--
-- TOC entry 3063 (class 0 OID 0)
-- Dependencies: 207
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 15, true);


--
-- TOC entry 3064 (class 0 OID 0)
-- Dependencies: 210
-- Name: patient_idpatient_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.patient_idpatient_seq', 94, true);


--
-- TOC entry 3065 (class 0 OID 0)
-- Dependencies: 212
-- Name: rendezvous_idrdv_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rendezvous_idrdv_seq', 4, true);


--
-- TOC entry 3066 (class 0 OID 0)
-- Dependencies: 213
-- Name: rendezvous_idrdv_seq1; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.rendezvous_idrdv_seq1', 80, true);


--
-- TOC entry 3067 (class 0 OID 0)
-- Dependencies: 215
-- Name: specialite_idspecialite_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.specialite_idspecialite_seq', 6, true);


--
-- TOC entry 3068 (class 0 OID 0)
-- Dependencies: 217
-- Name: strspecial_idstrspecial_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.strspecial_idstrspecial_seq', 1, false);


--
-- TOC entry 3069 (class 0 OID 0)
-- Dependencies: 219
-- Name: structure_idstructure_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.structure_idstructure_seq', 1, false);


--
-- TOC entry 3070 (class 0 OID 0)
-- Dependencies: 221
-- Name: test_idtest_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.test_idtest_seq', 1, false);


--
-- TOC entry 3071 (class 0 OID 0)
-- Dependencies: 223
-- Name: todos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.todos_id_seq', 43, true);


--
-- TOC entry 3072 (class 0 OID 0)
-- Dependencies: 225
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 146, true);


--
-- TOC entry 2813 (class 2606 OID 17375)
-- Name: disponibilite disponibilite_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.disponibilite
    ADD CONSTRAINT disponibilite_pkey PRIMARY KEY (iddisponibilite);


--
-- TOC entry 2815 (class 2606 OID 17377)
-- Name: examens examens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.examens
    ADD CONSTRAINT examens_pkey PRIMARY KEY (idexamen);


--
-- TOC entry 2817 (class 2606 OID 17379)
-- Name: laboexam laboexam_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laboexam
    ADD CONSTRAINT laboexam_pkey PRIMARY KEY (idlaboexam);


--
-- TOC entry 2819 (class 2606 OID 17381)
-- Name: laboratoires laboratoires_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laboratoires
    ADD CONSTRAINT laboratoires_email_unique UNIQUE (email);


--
-- TOC entry 2821 (class 2606 OID 17383)
-- Name: laboratoires laboratoires_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laboratoires
    ADD CONSTRAINT laboratoires_pkey PRIMARY KEY (idlabo);


--
-- TOC entry 2823 (class 2606 OID 17385)
-- Name: medecin medecin_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.medecin
    ADD CONSTRAINT medecin_email_unique UNIQUE (email);


--
-- TOC entry 2825 (class 2606 OID 17387)
-- Name: medecin medecin_identifiant_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.medecin
    ADD CONSTRAINT medecin_identifiant_unique UNIQUE (identifiant);


--
-- TOC entry 2827 (class 2606 OID 17389)
-- Name: medecin medecin_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.medecin
    ADD CONSTRAINT medecin_pkey PRIMARY KEY (idmedecin);


--
-- TOC entry 2829 (class 2606 OID 17391)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2832 (class 2606 OID 17393)
-- Name: patient patient_cnib_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patient
    ADD CONSTRAINT patient_cnib_unique UNIQUE (cnib);


--
-- TOC entry 2834 (class 2606 OID 17395)
-- Name: patient patient_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patient
    ADD CONSTRAINT patient_email_unique UNIQUE (email);


--
-- TOC entry 2836 (class 2606 OID 17397)
-- Name: patient patient_identifiant_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patient
    ADD CONSTRAINT patient_identifiant_unique UNIQUE (identifiant);


--
-- TOC entry 2838 (class 2606 OID 17399)
-- Name: patient patient_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patient
    ADD CONSTRAINT patient_pkey PRIMARY KEY (idpatient);


--
-- TOC entry 2840 (class 2606 OID 17401)
-- Name: patient patient_telephone_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patient
    ADD CONSTRAINT patient_telephone_unique UNIQUE (telephone);


--
-- TOC entry 2842 (class 2606 OID 17403)
-- Name: rendezvous rendezvous_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rendezvous
    ADD CONSTRAINT rendezvous_pkey PRIMARY KEY (idrdv);


--
-- TOC entry 2844 (class 2606 OID 17405)
-- Name: specialite specialite_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.specialite
    ADD CONSTRAINT specialite_pkey PRIMARY KEY (idspecialite);


--
-- TOC entry 2846 (class 2606 OID 17407)
-- Name: strspecial strspecial_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.strspecial
    ADD CONSTRAINT strspecial_pkey PRIMARY KEY (idstrspecial);


--
-- TOC entry 2848 (class 2606 OID 17409)
-- Name: structure structure_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.structure
    ADD CONSTRAINT structure_email_unique UNIQUE (email);


--
-- TOC entry 2850 (class 2606 OID 17411)
-- Name: structure structure_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.structure
    ADD CONSTRAINT structure_pkey PRIMARY KEY (idstructure);


--
-- TOC entry 2852 (class 2606 OID 17413)
-- Name: test test_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.test
    ADD CONSTRAINT test_pkey PRIMARY KEY (idtest);


--
-- TOC entry 2854 (class 2606 OID 17415)
-- Name: todos todos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.todos
    ADD CONSTRAINT todos_pkey PRIMARY KEY (id);


--
-- TOC entry 2856 (class 2606 OID 17417)
-- Name: users users_api_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_api_token_unique UNIQUE (api_token);


--
-- TOC entry 2858 (class 2606 OID 17419)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2860 (class 2606 OID 17421)
-- Name: users users_identifiant_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_identifiant_unique UNIQUE (identifiant);


--
-- TOC entry 2862 (class 2606 OID 17423)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2830 (class 1259 OID 17424)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- TOC entry 2863 (class 2606 OID 17425)
-- Name: disponibilite disponibilite_idmedecin_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.disponibilite
    ADD CONSTRAINT disponibilite_idmedecin_foreign FOREIGN KEY (idmedecin) REFERENCES public.medecin(idmedecin);


--
-- TOC entry 2864 (class 2606 OID 17430)
-- Name: disponibilite disponibilite_idstructure_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.disponibilite
    ADD CONSTRAINT disponibilite_idstructure_foreign FOREIGN KEY (idstructure) REFERENCES public.structure(idstructure);


--
-- TOC entry 2865 (class 2606 OID 17435)
-- Name: laboexam laboexam_idexamen_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laboexam
    ADD CONSTRAINT laboexam_idexamen_foreign FOREIGN KEY (idexamen) REFERENCES public.examens(idexamen);


--
-- TOC entry 2866 (class 2606 OID 17440)
-- Name: laboexam laboexam_idlabo_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laboexam
    ADD CONSTRAINT laboexam_idlabo_foreign FOREIGN KEY (idlabo) REFERENCES public.laboratoires(idlabo);


--
-- TOC entry 2867 (class 2606 OID 17445)
-- Name: laboratoires laboratoires_idstructure_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.laboratoires
    ADD CONSTRAINT laboratoires_idstructure_foreign FOREIGN KEY (idstructure) REFERENCES public.structure(idstructure);


--
-- TOC entry 2868 (class 2606 OID 17450)
-- Name: medecin medecin_id_structure_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.medecin
    ADD CONSTRAINT medecin_id_structure_foreign FOREIGN KEY (idstructure) REFERENCES public.structure(idstructure);


--
-- TOC entry 2869 (class 2606 OID 17455)
-- Name: medecin medecin_idspecialite_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.medecin
    ADD CONSTRAINT medecin_idspecialite_foreign FOREIGN KEY (idspecialite) REFERENCES public.specialite(idspecialite);


--
-- TOC entry 2870 (class 2606 OID 17460)
-- Name: rendezvous rendezvous_iddisponibilite_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rendezvous
    ADD CONSTRAINT rendezvous_iddisponibilite_foreign FOREIGN KEY (iddisponibilite) REFERENCES public.disponibilite(iddisponibilite);


--
-- TOC entry 2871 (class 2606 OID 17465)
-- Name: rendezvous rendezvous_idmedecin_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rendezvous
    ADD CONSTRAINT rendezvous_idmedecin_foreign FOREIGN KEY (idmedecin) REFERENCES public.medecin(idmedecin);


--
-- TOC entry 2872 (class 2606 OID 17470)
-- Name: rendezvous rendezvous_idpatient_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.rendezvous
    ADD CONSTRAINT rendezvous_idpatient_foreign FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


--
-- TOC entry 2873 (class 2606 OID 17475)
-- Name: strspecial strspecial_idspecialite_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.strspecial
    ADD CONSTRAINT strspecial_idspecialite_foreign FOREIGN KEY (idspecialite) REFERENCES public.specialite(idspecialite);


--
-- TOC entry 2874 (class 2606 OID 17480)
-- Name: strspecial strspecial_idstructure_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.strspecial
    ADD CONSTRAINT strspecial_idstructure_foreign FOREIGN KEY (idstructure) REFERENCES public.structure(idstructure);


--
-- TOC entry 2875 (class 2606 OID 17485)
-- Name: structure structure_idstructparent_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.structure
    ADD CONSTRAINT structure_idstructparent_foreign FOREIGN KEY (idstructparent) REFERENCES public.structure(idstructure);


--
-- TOC entry 2878 (class 2606 OID 17505)
-- Name: test test_idexamen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.test
    ADD CONSTRAINT test_idexamen FOREIGN KEY (idexamen) REFERENCES public.examens(idexamen);


--
-- TOC entry 2876 (class 2606 OID 17490)
-- Name: test test_idlabo_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.test
    ADD CONSTRAINT test_idlabo_foreign FOREIGN KEY (idlabo) REFERENCES public.laboratoires(idlabo);


--
-- TOC entry 2877 (class 2606 OID 17495)
-- Name: test test_idpatient_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.test
    ADD CONSTRAINT test_idpatient_foreign FOREIGN KEY (idpatient) REFERENCES public.patient(idpatient);


-- Completed on 2020-09-24 14:53:17

--
-- PostgreSQL database dump complete
--

