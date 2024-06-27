--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3
-- Dumped by pg_dump version 16.2

-- Started on 2024-06-27 17:37:31

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 231 (class 1259 OID 20618)
-- Name: bookings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bookings (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    table_id bigint NOT NULL,
    date date NOT NULL,
    "time" json NOT NULL,
    totalprice numeric(8,2) NOT NULL,
    status character varying(255) DEFAULT 'pending'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.bookings OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 20617)
-- Name: bookings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.bookings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.bookings_id_seq OWNER TO postgres;

--
-- TOC entry 4988 (class 0 OID 0)
-- Dependencies: 230
-- Name: bookings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.bookings_id_seq OWNED BY public.bookings.id;


--
-- TOC entry 225 (class 1259 OID 20583)
-- Name: cart; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cart (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    date date NOT NULL,
    totalprice integer NOT NULL,
    product_id bigint,
    product_type character varying(255),
    quantity integer,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.cart OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 20656)
-- Name: cart_bookings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cart_bookings (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    table_id bigint NOT NULL,
    date date NOT NULL,
    "time" json NOT NULL,
    totalprice numeric(10,2) NOT NULL,
    status character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.cart_bookings OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 20655)
-- Name: cart_bookings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cart_bookings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.cart_bookings_id_seq OWNER TO postgres;

--
-- TOC entry 4989 (class 0 OID 0)
-- Dependencies: 236
-- Name: cart_bookings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cart_bookings_id_seq OWNED BY public.cart_bookings.id;


--
-- TOC entry 224 (class 1259 OID 20582)
-- Name: cart_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cart_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.cart_id_seq OWNER TO postgres;

--
-- TOC entry 4990 (class 0 OID 0)
-- Dependencies: 224
-- Name: cart_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cart_id_seq OWNED BY public.cart.id;


--
-- TOC entry 221 (class 1259 OID 20559)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 20558)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 4991 (class 0 OID 0)
-- Dependencies: 220
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 235 (class 1259 OID 20647)
-- Name: foodandbeverage; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.foodandbeverage (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    price numeric(8,2) NOT NULL,
    description text NOT NULL,
    stock integer NOT NULL,
    mainpic character varying(255) NOT NULL,
    pic2 character varying(255),
    pic3 character varying(255),
    pic4 character varying(255),
    type character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.foodandbeverage OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 20646)
-- Name: foodandbeverage_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.foodandbeverage_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.foodandbeverage_id_seq OWNER TO postgres;

--
-- TOC entry 4992 (class 0 OID 0)
-- Dependencies: 234
-- Name: foodandbeverage_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.foodandbeverage_id_seq OWNED BY public.foodandbeverage.id;


--
-- TOC entry 227 (class 1259 OID 20595)
-- Name: history; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.history (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    product_id bigint,
    product_type character varying(50),
    date date NOT NULL,
    "time" time(0) without time zone NOT NULL,
    totalprice integer NOT NULL,
    paymentmethod character varying(30) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    quantity integer
);


ALTER TABLE public.history OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 20675)
-- Name: history_bookings; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.history_bookings (
    id bigint NOT NULL,
    user_id bigint NOT NULL,
    table_id bigint NOT NULL,
    booking_start timestamp(0) without time zone NOT NULL,
    "time" json NOT NULL,
    total_price numeric(10,2) NOT NULL,
    payment_method character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.history_bookings OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 20674)
-- Name: history_bookings_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.history_bookings_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.history_bookings_id_seq OWNER TO postgres;

--
-- TOC entry 4993 (class 0 OID 0)
-- Dependencies: 238
-- Name: history_bookings_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.history_bookings_id_seq OWNED BY public.history_bookings.id;


--
-- TOC entry 226 (class 1259 OID 20594)
-- Name: history_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.history_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.history_id_seq OWNER TO postgres;

--
-- TOC entry 4994 (class 0 OID 0)
-- Dependencies: 226
-- Name: history_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.history_id_seq OWNED BY public.history.id;


--
-- TOC entry 216 (class 1259 OID 20533)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 20532)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 4995 (class 0 OID 0)
-- Dependencies: 215
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 219 (class 1259 OID 20551)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 20571)
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 20570)
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- TOC entry 4996 (class 0 OID 0)
-- Dependencies: 222
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- TOC entry 240 (class 1259 OID 20693)
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 20638)
-- Name: stick; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.stick (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    price numeric(8,2) NOT NULL,
    description text NOT NULL,
    stock integer NOT NULL,
    mainpic character varying(255) NOT NULL,
    pic2 character varying(255),
    pic3 character varying(255),
    pic4 character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.stick OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 20637)
-- Name: stick_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.stick_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.stick_id_seq OWNER TO postgres;

--
-- TOC entry 4997 (class 0 OID 0)
-- Dependencies: 232
-- Name: stick_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.stick_id_seq OWNED BY public.stick.id;


--
-- TOC entry 229 (class 1259 OID 20607)
-- Name: tables; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tables (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    status character varying(255) DEFAULT 'available'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT tables_status_check CHECK (((status)::text = ANY ((ARRAY['available'::character varying, 'booked'::character varying])::text[])))
);


ALTER TABLE public.tables OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 20606)
-- Name: tables_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tables_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.tables_id_seq OWNER TO postgres;

--
-- TOC entry 4998 (class 0 OID 0)
-- Dependencies: 228
-- Name: tables_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tables_id_seq OWNED BY public.tables.id;


--
-- TOC entry 218 (class 1259 OID 20540)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    username character varying(50) NOT NULL,
    email character varying(50) NOT NULL,
    password character varying(255) NOT NULL,
    profilepic character varying(255) NOT NULL,
    is_admin boolean DEFAULT false NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 20539)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 4999 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 4762 (class 2604 OID 20621)
-- Name: bookings id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookings ALTER COLUMN id SET DEFAULT nextval('public.bookings_id_seq'::regclass);


--
-- TOC entry 4758 (class 2604 OID 20586)
-- Name: cart id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart ALTER COLUMN id SET DEFAULT nextval('public.cart_id_seq'::regclass);


--
-- TOC entry 4766 (class 2604 OID 20659)
-- Name: cart_bookings id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart_bookings ALTER COLUMN id SET DEFAULT nextval('public.cart_bookings_id_seq'::regclass);


--
-- TOC entry 4755 (class 2604 OID 20562)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 4765 (class 2604 OID 20650)
-- Name: foodandbeverage id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.foodandbeverage ALTER COLUMN id SET DEFAULT nextval('public.foodandbeverage_id_seq'::regclass);


--
-- TOC entry 4759 (class 2604 OID 20598)
-- Name: history id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.history ALTER COLUMN id SET DEFAULT nextval('public.history_id_seq'::regclass);


--
-- TOC entry 4767 (class 2604 OID 20678)
-- Name: history_bookings id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.history_bookings ALTER COLUMN id SET DEFAULT nextval('public.history_bookings_id_seq'::regclass);


--
-- TOC entry 4752 (class 2604 OID 20536)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 4757 (class 2604 OID 20574)
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- TOC entry 4764 (class 2604 OID 20641)
-- Name: stick id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stick ALTER COLUMN id SET DEFAULT nextval('public.stick_id_seq'::regclass);


--
-- TOC entry 4760 (class 2604 OID 20610)
-- Name: tables id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tables ALTER COLUMN id SET DEFAULT nextval('public.tables_id_seq'::regclass);


--
-- TOC entry 4753 (class 2604 OID 20543)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 4973 (class 0 OID 20618)
-- Dependencies: 231
-- Data for Name: bookings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bookings (id, user_id, table_id, date, "time", totalprice, status, created_at, updated_at) FROM stdin;
1	4	10	2024-06-27	["11:00","12:00"]	120000.00	confirmed	2024-06-27 06:04:52	2024-06-27 06:04:52
2	3	6	2024-06-27	["11:00","12:00"]	120000.00	confirmed	2024-06-27 06:20:55	2024-06-27 06:20:55
\.


--
-- TOC entry 4967 (class 0 OID 20583)
-- Dependencies: 225
-- Data for Name: cart; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cart (id, user_id, date, totalprice, product_id, product_type, quantity, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 4979 (class 0 OID 20656)
-- Dependencies: 237
-- Data for Name: cart_bookings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cart_bookings (id, user_id, table_id, date, "time", totalprice, status, created_at, updated_at) FROM stdin;
1	4	10	2024-06-27	"[\\"11:00\\",\\"12:00\\"]"	120000.00	pending	2024-06-27 06:03:23	2024-06-27 06:03:23
\.


--
-- TOC entry 4963 (class 0 OID 20559)
-- Dependencies: 221
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 4977 (class 0 OID 20647)
-- Dependencies: 235
-- Data for Name: foodandbeverage; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.foodandbeverage (id, name, price, description, stock, mainpic, pic2, pic3, pic4, type, created_at, updated_at) FROM stdin;
1	Nasi goreng Ayam	50000.00	Nasi goreng klasik dengan ayam, telur, dan bumbu khas Indonesia.	20	storage/img/nasgor.jpg	cheeseburger_1.jpg	cheeseburger_2.jpg	cheeseburger_3.jpg	food	\N	\N
2	Nasi ayam rica rica	75000.00	Nasi dengan ayam dimasak pedas dengan bumbu rica-rica khas Manado.	15	storage/img/rica.jpg	veggie_pizza_1.jpg	veggie_pizza_2.jpg	veggie_pizza_3.jpg	food	\N	\N
3	Nasi Beef Yakiniku	30000.00	Nasi dengan irisan daging sapi panggang ala Jepang dengan saus yakiniku.	25	storage/img/beef.jpg	chocolate_milkshake_1.jpg	chocolate_milkshake_2.jpg	chocolate_milkshake_3.jpg	food	\N	\N
4	Roti Bakar Coklat Keju	20000.00	Roti bakar dengan olesan coklat dan keju leleh.	30	storage/img/roti.jpeg	lemonade_1.jpg	lemonade_2.jpg	lemonade_3.jpg	food	\N	\N
5	Indomie Kuah Kari Ayam	55000.00	Mie instan rebus dengan kuah kari ayam yang gurih.	10	storage/img/indomi.jpg	grilled_chicken_sandwich_1.jpg	grilled_chicken_sandwich_2.jpg	grilled_chicken_sandwich_3.jpg	food	\N	\N
6	Lemonade Soda Punch	40000.00	Minuman berkarbonasi segar dari air lemon dan gula.	20	storage/img/lemonade.jpg	cappuccino_1.jpg	cappuccino_2.jpg	cappuccino_3.jpg	drinks	\N	\N
7	ambasing	12333.00	ambasing	22	storage/img/fnb/Firefly - Honkai Star Rail.jpeg	\N	\N	\N	food	2024-06-27 06:45:54	2024-06-27 06:45:54
\.


--
-- TOC entry 4969 (class 0 OID 20595)
-- Dependencies: 227
-- Data for Name: history; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.history (id, user_id, product_id, product_type, date, "time", totalprice, paymentmethod, created_at, updated_at, quantity) FROM stdin;
1	3	3	stick	2024-06-27	06:20:31	45000	Virtual Account	2024-06-27 06:20:31	2024-06-27 06:20:31	1
2	3	2	stick	2024-06-27	06:20:31	85000	Virtual Account	2024-06-27 06:20:31	2024-06-27 06:20:31	1
\.


--
-- TOC entry 4981 (class 0 OID 20675)
-- Dependencies: 239
-- Data for Name: history_bookings; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.history_bookings (id, user_id, table_id, booking_start, "time", total_price, payment_method, created_at, updated_at) FROM stdin;
1	4	10	2024-06-27 11:00:00	["11:00","12:00"]	120000.00	Virtual Account	2024-06-27 06:04:52	2024-06-27 06:04:52
2	3	6	2024-06-27 11:00:00	["11:00","12:00"]	120000.00	Virtual Account	2024-06-27 06:20:55	2024-06-27 06:20:55
\.


--
-- TOC entry 4958 (class 0 OID 20533)
-- Dependencies: 216
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2019_12_14_000001_create_personal_access_tokens_table	1
5	2023_05_19_134349_create_cart_table	1
6	2023_05_19_144003_create_history_table	1
7	2024_06_09_103656_create_tables_table	1
8	2024_06_09_103732_create_bookings_table	1
9	2024_06_11_223608_create_stick_table	1
10	2024_06_11_224700_create_food_and_beverage_table	1
11	2024_06_18_115454_create_cart_bookings_table	1
12	2024_06_18_115555_create_history_bookings_table	1
13	2024_06_19_141516_create_sessions_table	1
\.


--
-- TOC entry 4961 (class 0 OID 20551)
-- Dependencies: 219
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 4965 (class 0 OID 20571)
-- Dependencies: 223
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 4982 (class 0 OID 20693)
-- Dependencies: 240
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
V8hk87gqpgbKYMuT99dLMiHU1V2CT7QEp9xQ0FAZ	2	127.0.0.1	Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36	YTo0OntzOjY6Il90b2tlbiI7czo0MDoibFlzSDR3YXBXVVJzUTZ4WG5xTDZMbDNyYzhnTGJ4WnY3NjdQbk4zOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9zdGlja3MvY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9	1719470838
\.


--
-- TOC entry 4975 (class 0 OID 20638)
-- Dependencies: 233
-- Data for Name: stick; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.stick (id, name, price, description, stock, mainpic, pic2, pic3, pic4, created_at, updated_at) FROM stdin;
1	Predator Air Rush	10000.00	Introducing the Predator Air Rush jump cue with Air REVO carbon fiber composite shaft. 	10	storage/img/predator.jpg	AfterhourPic1.jpg	AfterhourPic2.jpg	AfterhourPic3.jpg	\N	\N
4	CueMall Valor Model F	60000.00	CueMall Valor series is the newest innovation in Carbon Cue. Shaft made with Carbon Fibre and bold decal designs.	10	storage/img/cuemall.jpg	911Pic1.jpg	911Pic2.jpg	911Pic3.jpg	\N	\N
5	Scorpion Trojan TR-06	50000.00	Scorpion Trojan series is the newest innovation Carbon Cue. Shaft made with Real Carbon, and with bold designs with water transfer imaging technology.	10	storage/img/scorpion.jpg	KalsPic1.jpg	KalsPic2.jpg	KalsPic3.jpg	\N	\N
6	Predator SP8 Curly/Heart LL	50000.00	Predator 8-Point Sneaky Pete Pool Cue - Purple Heart/Curly - Elephant Pattern Leather Wrap.	10	storage/img/predator2.jpg	HexaPic1.jpg	HexaPic2.jpg	HexaPic3.jpg	\N	\N
3	Predator P3 Emerald Green Revo	45000.00	Featuring a Metallic Green finish with Black Gloss Stripe, 30-piece construction, and the Uni-Loc© Weight Cartridge system.	9	storage/img/revo.jpg	BerlianPic1.jpg	BerlianPic2.jpg	BerlianPic3.jpg	\N	2024-06-27 06:20:31
2	Fury Tempest AF Series AF-1	85000.00	Fury Tempest cue series presents an unbeatable price-performance ratio whilst not compromising design and quality.	9	storage/img/fury.png	QBilliardPic1.jpg	QBilliardPic2.jpg	QBilliardPic3.jpg	\N	2024-06-27 06:20:31
7	Ev4de	12333.00	22222	2222	storage/img/stick/Artoria.jpeg	\N	\N	\N	2024-06-27 06:47:14	2024-06-27 06:47:14
\.


--
-- TOC entry 4971 (class 0 OID 20607)
-- Dependencies: 229
-- Data for Name: tables; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.tables (id, name, status, created_at, updated_at) FROM stdin;
1	Table 1	available	2024-06-27 04:07:19	2024-06-27 04:07:19
2	Table 2	available	2024-06-27 04:07:19	2024-06-27 04:07:19
3	Table 3	available	2024-06-27 04:07:19	2024-06-27 04:07:19
4	Table 4	available	2024-06-27 04:07:19	2024-06-27 04:07:19
5	Table 5	available	2024-06-27 04:07:19	2024-06-27 04:07:19
6	Table 6	available	2024-06-27 04:07:19	2024-06-27 04:07:19
7	Table 7	available	2024-06-27 04:07:19	2024-06-27 04:07:19
8	Table 8	available	2024-06-27 04:07:19	2024-06-27 04:07:19
9	Table 9	available	2024-06-27 04:07:19	2024-06-27 04:07:19
10	Table 10	available	2024-06-27 04:07:19	2024-06-27 04:07:19
11	Table 11	available	2024-06-27 04:07:19	2024-06-27 04:07:19
12	Table 12	available	2024-06-27 04:07:19	2024-06-27 04:07:19
13	Table 13	available	2024-06-27 04:07:19	2024-06-27 04:07:19
14	Table 14	available	2024-06-27 04:07:19	2024-06-27 04:07:19
15	Table 15	available	2024-06-27 04:07:19	2024-06-27 04:07:19
16	Table 16	available	2024-06-27 04:07:19	2024-06-27 04:07:19
\.


--
-- TOC entry 4960 (class 0 OID 20540)
-- Dependencies: 218
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, username, email, password, profilepic, is_admin, remember_token, created_at, updated_at) FROM stdin;
1	user	user@example.com	$2y$12$iJyZBoSdRBYasFQyi0hXLOwAz21zJGR2hXqgnrL8NvcXcNS86HcqW	noprofil.jpg	f	\N	\N	\N
2	admin	admin@example.com	$2y$12$7FQPE6QOIFlFveQeEUotpOfoQKXezAl4B09k6JdMxxkXNBp3phaLe	noprofil.jpg	t	\N	\N	\N
3	nicholas	nicholas@gmail.com	$2y$12$L4eTdxq4G.DgtNy/S2YC9.D75dpw4lbXO.WbHYRDBOtY1p/UaSGx.		f	\N	2024-06-27 05:59:01	2024-06-27 05:59:01
4	vincent	vincent@gmail	$2y$12$jsLcc5HSnKIgNQkAgHFGauRpAGWhx/ZA.gAbA31tQ4WfDGeeLTsfC		f	\N	2024-06-27 06:00:46	2024-06-27 06:00:46
\.


--
-- TOC entry 5000 (class 0 OID 0)
-- Dependencies: 230
-- Name: bookings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.bookings_id_seq', 2, true);


--
-- TOC entry 5001 (class 0 OID 0)
-- Dependencies: 236
-- Name: cart_bookings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cart_bookings_id_seq', 3, true);


--
-- TOC entry 5002 (class 0 OID 0)
-- Dependencies: 224
-- Name: cart_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cart_id_seq', 2, true);


--
-- TOC entry 5003 (class 0 OID 0)
-- Dependencies: 220
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 5004 (class 0 OID 0)
-- Dependencies: 234
-- Name: foodandbeverage_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.foodandbeverage_id_seq', 7, true);


--
-- TOC entry 5005 (class 0 OID 0)
-- Dependencies: 238
-- Name: history_bookings_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.history_bookings_id_seq', 2, true);


--
-- TOC entry 5006 (class 0 OID 0)
-- Dependencies: 226
-- Name: history_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.history_id_seq', 2, true);


--
-- TOC entry 5007 (class 0 OID 0)
-- Dependencies: 215
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 13, true);


--
-- TOC entry 5008 (class 0 OID 0)
-- Dependencies: 222
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 5009 (class 0 OID 0)
-- Dependencies: 232
-- Name: stick_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.stick_id_seq', 7, true);


--
-- TOC entry 5010 (class 0 OID 0)
-- Dependencies: 228
-- Name: tables_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.tables_id_seq', 16, true);


--
-- TOC entry 5011 (class 0 OID 0)
-- Dependencies: 217
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 4, true);


--
-- TOC entry 4793 (class 2606 OID 20626)
-- Name: bookings bookings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookings
    ADD CONSTRAINT bookings_pkey PRIMARY KEY (id);


--
-- TOC entry 4799 (class 2606 OID 20663)
-- Name: cart_bookings cart_bookings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart_bookings
    ADD CONSTRAINT cart_bookings_pkey PRIMARY KEY (id);


--
-- TOC entry 4787 (class 2606 OID 20588)
-- Name: cart cart_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart
    ADD CONSTRAINT cart_pkey PRIMARY KEY (id);


--
-- TOC entry 4778 (class 2606 OID 20567)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4780 (class 2606 OID 20569)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 4797 (class 2606 OID 20654)
-- Name: foodandbeverage foodandbeverage_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.foodandbeverage
    ADD CONSTRAINT foodandbeverage_pkey PRIMARY KEY (id);


--
-- TOC entry 4801 (class 2606 OID 20682)
-- Name: history_bookings history_bookings_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.history_bookings
    ADD CONSTRAINT history_bookings_pkey PRIMARY KEY (id);


--
-- TOC entry 4789 (class 2606 OID 20600)
-- Name: history history_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.history
    ADD CONSTRAINT history_pkey PRIMARY KEY (id);


--
-- TOC entry 4770 (class 2606 OID 20538)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 4776 (class 2606 OID 20557)
-- Name: password_resets password_resets_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_resets
    ADD CONSTRAINT password_resets_pkey PRIMARY KEY (email);


--
-- TOC entry 4782 (class 2606 OID 20578)
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- TOC entry 4784 (class 2606 OID 20581)
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- TOC entry 4804 (class 2606 OID 20699)
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- TOC entry 4795 (class 2606 OID 20645)
-- Name: stick stick_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stick
    ADD CONSTRAINT stick_pkey PRIMARY KEY (id);


--
-- TOC entry 4791 (class 2606 OID 20616)
-- Name: tables tables_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tables
    ADD CONSTRAINT tables_pkey PRIMARY KEY (id);


--
-- TOC entry 4772 (class 2606 OID 20550)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 4774 (class 2606 OID 20548)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 4785 (class 1259 OID 20579)
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- TOC entry 4802 (class 1259 OID 20701)
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- TOC entry 4805 (class 1259 OID 20700)
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- TOC entry 4808 (class 2606 OID 20632)
-- Name: bookings bookings_table_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookings
    ADD CONSTRAINT bookings_table_id_foreign FOREIGN KEY (table_id) REFERENCES public.tables(id) ON DELETE CASCADE;


--
-- TOC entry 4809 (class 2606 OID 20627)
-- Name: bookings bookings_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bookings
    ADD CONSTRAINT bookings_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4810 (class 2606 OID 20669)
-- Name: cart_bookings cart_bookings_table_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart_bookings
    ADD CONSTRAINT cart_bookings_table_id_foreign FOREIGN KEY (table_id) REFERENCES public.tables(id) ON DELETE CASCADE;


--
-- TOC entry 4811 (class 2606 OID 20664)
-- Name: cart_bookings cart_bookings_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart_bookings
    ADD CONSTRAINT cart_bookings_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4806 (class 2606 OID 20589)
-- Name: cart cart_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cart
    ADD CONSTRAINT cart_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 4812 (class 2606 OID 20688)
-- Name: history_bookings history_bookings_table_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.history_bookings
    ADD CONSTRAINT history_bookings_table_id_foreign FOREIGN KEY (table_id) REFERENCES public.tables(id) ON DELETE CASCADE;


--
-- TOC entry 4813 (class 2606 OID 20683)
-- Name: history_bookings history_bookings_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.history_bookings
    ADD CONSTRAINT history_bookings_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4807 (class 2606 OID 20601)
-- Name: history history_user_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.history
    ADD CONSTRAINT history_user_id_foreign FOREIGN KEY (user_id) REFERENCES public.users(id) ON UPDATE CASCADE ON DELETE CASCADE;


-- Completed on 2024-06-27 17:37:31

--
-- PostgreSQL database dump complete
--

