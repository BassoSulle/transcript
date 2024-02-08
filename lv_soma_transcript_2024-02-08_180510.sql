--
-- PostgreSQL database dump
--

-- Dumped from database version 16.1 (Ubuntu 16.1-1.pgdg22.04+1)
-- Dumped by pg_dump version 16.1 (Ubuntu 16.1-1.pgdg22.04+1)

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
-- Name: academic_year_progress; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.academic_year_progress (
    id bigint NOT NULL,
    year_of_studies character varying(255) NOT NULL,
    current_semister_id bigint NOT NULL,
    progress_status boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.academic_year_progress OWNER TO postgres;

--
-- Name: academic_year_progress_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.academic_year_progress_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.academic_year_progress_id_seq OWNER TO postgres;

--
-- Name: academic_year_progress_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.academic_year_progress_id_seq OWNED BY public.academic_year_progress.id;


--
-- Name: award_classifications; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.award_classifications (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    overall_gpa integer NOT NULL,
    high_gpa integer NOT NULL,
    low_gpa integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.award_classifications OWNER TO postgres;

--
-- Name: award_classifications_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.award_classifications_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.award_classifications_id_seq OWNER TO postgres;

--
-- Name: award_classifications_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.award_classifications_id_seq OWNED BY public.award_classifications.id;


--
-- Name: course_semister_modules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.course_semister_modules (
    id bigint NOT NULL,
    course_id bigint NOT NULL,
    semister_id bigint NOT NULL,
    module_ids json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    ac_year_id bigint
);


ALTER TABLE public.course_semister_modules OWNER TO postgres;

--
-- Name: course_semiser_modules_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.course_semiser_modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.course_semiser_modules_id_seq OWNER TO postgres;

--
-- Name: course_semiser_modules_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.course_semiser_modules_id_seq OWNED BY public.course_semister_modules.id;


--
-- Name: courses; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.courses (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    duration integer NOT NULL,
    department_id bigint NOT NULL,
    n_t_a_level_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.courses OWNER TO postgres;

--
-- Name: courses_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.courses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.courses_id_seq OWNER TO postgres;

--
-- Name: courses_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.courses_id_seq OWNED BY public.courses.id;


--
-- Name: departments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.departments (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.departments OWNER TO postgres;

--
-- Name: departments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.departments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.departments_id_seq OWNER TO postgres;

--
-- Name: departments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.departments_id_seq OWNED BY public.departments.id;


--
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
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- Name: grades; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.grades (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    high_marks integer NOT NULL,
    low_marks integer NOT NULL,
    point integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.grades OWNER TO postgres;

--
-- Name: grades_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.grades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.grades_id_seq OWNER TO postgres;

--
-- Name: grades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.grades_id_seq OWNED BY public.grades.id;


--
-- Name: lecturer_modules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.lecturer_modules (
    id bigint NOT NULL,
    lecturer_id bigint NOT NULL,
    module_id bigint NOT NULL,
    complete_status boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    semister_id integer
);


ALTER TABLE public.lecturer_modules OWNER TO postgres;

--
-- Name: lecturer_modules_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.lecturer_modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.lecturer_modules_id_seq OWNER TO postgres;

--
-- Name: lecturer_modules_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.lecturer_modules_id_seq OWNED BY public.lecturer_modules.id;


--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
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
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- Name: modules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.modules (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    code character varying(255) NOT NULL,
    credit character varying(255) NOT NULL,
    semister_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.modules OWNER TO postgres;

--
-- Name: modules_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.modules_id_seq OWNER TO postgres;

--
-- Name: modules_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.modules_id_seq OWNED BY public.modules.id;


--
-- Name: n_t_a_s; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.n_t_a_s (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    award_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.n_t_a_s OWNER TO postgres;

--
-- Name: n_t_a_s_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.n_t_a_s_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.n_t_a_s_id_seq OWNER TO postgres;

--
-- Name: n_t_a_s_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.n_t_a_s_id_seq OWNED BY public.n_t_a_s.id;


--
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
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
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- Name: results; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.results (
    id bigint NOT NULL,
    student_reg_no bigint NOT NULL,
    module_code character varying(255) NOT NULL,
    c_a_marks double precision NOT NULL,
    f_e_marks double precision NOT NULL,
    total_marks double precision NOT NULL,
    grade_id bigint,
    staff_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.results OWNER TO postgres;

--
-- Name: results_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.results_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.results_id_seq OWNER TO postgres;

--
-- Name: results_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.results_id_seq OWNED BY public.results.id;


--
-- Name: semisters; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.semisters (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.semisters OWNER TO postgres;

--
-- Name: semisters_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.semisters_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.semisters_id_seq OWNER TO postgres;

--
-- Name: semisters_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.semisters_id_seq OWNED BY public.semisters.id;


--
-- Name: staffs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.staffs (
    id bigint NOT NULL,
    first_name character varying(255) NOT NULL,
    middle_name character varying(255),
    surname character varying(255) NOT NULL,
    role character varying(255) NOT NULL,
    department_id bigint,
    email character varying(255) NOT NULL,
    gender character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    module_ids json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.staffs OWNER TO postgres;

--
-- Name: staffs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.staffs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.staffs_id_seq OWNER TO postgres;

--
-- Name: staffs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.staffs_id_seq OWNED BY public.staffs.id;


--
-- Name: student_modules; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.student_modules (
    id bigint NOT NULL,
    student_id bigint NOT NULL,
    module_id bigint NOT NULL,
    complete_status boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.student_modules OWNER TO postgres;

--
-- Name: student_modules_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.student_modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.student_modules_id_seq OWNER TO postgres;

--
-- Name: student_modules_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.student_modules_id_seq OWNED BY public.student_modules.id;


--
-- Name: students; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.students (
    id bigint NOT NULL,
    first_name character varying(255) NOT NULL,
    middle_name character varying(255),
    surname character varying(255) NOT NULL,
    registration_no bigint NOT NULL,
    course_id bigint NOT NULL,
    email character varying(255) NOT NULL,
    gender character varying(255) NOT NULL,
    dob date NOT NULL,
    passport_size character varying(255),
    password character varying(255) DEFAULT '$2y$10$78OKx3A6DIpDKsNJq5WrCOi9jo9hMLA961AwfFdreehvFe7u/1DE6'::character varying NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    role character varying(255) DEFAULT 'Student'::character varying NOT NULL
);


ALTER TABLE public.students OWNER TO postgres;

--
-- Name: students_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.students_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.students_id_seq OWNER TO postgres;

--
-- Name: students_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.students_id_seq OWNED BY public.students.id;


--
-- Name: academic_year_progress id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_year_progress ALTER COLUMN id SET DEFAULT nextval('public.academic_year_progress_id_seq'::regclass);


--
-- Name: award_classifications id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.award_classifications ALTER COLUMN id SET DEFAULT nextval('public.award_classifications_id_seq'::regclass);


--
-- Name: course_semister_modules id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.course_semister_modules ALTER COLUMN id SET DEFAULT nextval('public.course_semiser_modules_id_seq'::regclass);


--
-- Name: courses id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.courses ALTER COLUMN id SET DEFAULT nextval('public.courses_id_seq'::regclass);


--
-- Name: departments id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departments ALTER COLUMN id SET DEFAULT nextval('public.departments_id_seq'::regclass);


--
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- Name: grades id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grades ALTER COLUMN id SET DEFAULT nextval('public.grades_id_seq'::regclass);


--
-- Name: lecturer_modules id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lecturer_modules ALTER COLUMN id SET DEFAULT nextval('public.lecturer_modules_id_seq'::regclass);


--
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- Name: modules id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modules ALTER COLUMN id SET DEFAULT nextval('public.modules_id_seq'::regclass);


--
-- Name: n_t_a_s id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.n_t_a_s ALTER COLUMN id SET DEFAULT nextval('public.n_t_a_s_id_seq'::regclass);


--
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- Name: results id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.results ALTER COLUMN id SET DEFAULT nextval('public.results_id_seq'::regclass);


--
-- Name: semisters id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.semisters ALTER COLUMN id SET DEFAULT nextval('public.semisters_id_seq'::regclass);


--
-- Name: staffs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staffs ALTER COLUMN id SET DEFAULT nextval('public.staffs_id_seq'::regclass);


--
-- Name: student_modules id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_modules ALTER COLUMN id SET DEFAULT nextval('public.student_modules_id_seq'::regclass);


--
-- Name: students id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students ALTER COLUMN id SET DEFAULT nextval('public.students_id_seq'::regclass);


--
-- Data for Name: academic_year_progress; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.academic_year_progress (id, year_of_studies, current_semister_id, progress_status, created_at, updated_at) FROM stdin;
1	2024/2025	1	f	2024-02-07 07:39:02	2024-02-07 11:23:06
\.


--
-- Data for Name: award_classifications; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.award_classifications (id, name, overall_gpa, high_gpa, low_gpa, created_at, updated_at) FROM stdin;
4	Bachelor	4	5	2	\N	\N
\.


--
-- Data for Name: course_semister_modules; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.course_semister_modules (id, course_id, semister_id, module_ids, created_at, updated_at, ac_year_id) FROM stdin;
5	4	1	["4","5","9","11","7"]	2024-02-08 14:43:05	2024-02-08 14:43:05	1
7	4	6	["6","8","12","10","1"]	2024-02-08 14:44:44	2024-02-08 14:47:53	1
\.


--
-- Data for Name: courses; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.courses (id, name, duration, department_id, n_t_a_level_id, created_at, updated_at) FROM stdin;
4	Bachelor in Computer Engineering	4	1	3	2024-02-08 14:34:22	2024-02-08 14:34:22
\.


--
-- Data for Name: departments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.departments (id, name, created_at, updated_at) FROM stdin;
1	Computer studies	2024-02-01 05:36:44	2024-02-01 06:44:18
4	General Studies	2024-02-08 14:29:07	2024-02-08 14:29:07
5	Electronic and Telecommunication 	2024-02-08 14:29:21	2024-02-08 14:29:21
\.


--
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- Data for Name: grades; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.grades (id, name, high_marks, low_marks, point, created_at, updated_at) FROM stdin;
2	A	100	75	5	2024-02-01 09:03:47	2024-02-01 09:03:47
3	B+	74	65	4	2024-02-01 09:30:02	2024-02-08 14:39:51
4	B	64	60	3	2024-02-08 14:45:57	2024-02-08 14:45:57
5	C	59	40	2	2024-02-08 14:46:17	2024-02-08 14:46:17
6	D	49	40	1	2024-02-08 14:46:46	2024-02-08 14:46:46
7	F	39	0	0	2024-02-08 14:47:05	2024-02-08 14:47:05
\.


--
-- Data for Name: lecturer_modules; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.lecturer_modules (id, lecturer_id, module_id, complete_status, created_at, updated_at, semister_id) FROM stdin;
2	5	4	f	2024-02-02 09:16:14	2024-02-02 09:16:14	1
3	5	1	f	2024-02-02 09:45:46	2024-02-02 09:45:46	1
4	5	5	f	2024-02-07 08:13:03	2024-02-07 08:13:03	4
5	6	4	f	2024-02-08 14:59:25	2024-02-08 14:59:25	1
6	6	5	f	2024-02-08 14:59:32	2024-02-08 14:59:32	1
7	6	7	f	2024-02-08 14:59:33	2024-02-08 14:59:33	1
\.


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_100000_create_password_resets_table	1
2	2019_08_19_000000_create_failed_jobs_table	2
3	2019_12_14_000001_create_personal_access_tokens_table	3
4	2024_01_05_110848_create_departments_table	4
5	2024_01_05_112140_create_semisters_table	5
6	2024_01_05_113616_create_modules_table	6
7	2024_01_05_113942_create_grades_table	7
8	2024_01_05_114444_create_award__classifications_table	8
9	2024_01_05_114724_create_n_t_a_s_table	9
10	2024_01_05_112348_create_courses_table	10
11	2024_01_05_120412_staff	11
12	2024_01_05_115018_create_students_table	12
13	2024_01_24_134405_create_course_semiser_modules_table	13
14	2024_01_24_132147_create_student_modules_table	14
15	2024_01_05_120952_create_results_table	15
16	2024_02_02_080555_create_lecturer_modules_table	16
17	2024_02_07_065432_create_academic_year_progress_table	17
\.


--
-- Data for Name: modules; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.modules (id, name, code, credit, semister_id, created_at, updated_at) FROM stdin;
4	Database Programming and Administration	COU 07501	12	\N	2024-02-02 08:21:47	2024-02-08 14:36:05
1	Operating System	COU 07502	9	\N	2024-02-01 18:29:05	2024-02-08 14:36:35
5	Data Structure	COU 07503	9	\N	2024-02-02 08:27:48	2024-02-08 14:37:06
6	Multimedia and Design	COU 07504	6	\N	2024-02-08 14:37:51	2024-02-08 14:37:51
7	Numerical methods	GSU 07505	6	\N	2024-02-08 14:39:21	2024-02-08 14:39:21
8	Cyber Security	COU 07601	12	\N	2024-02-08 14:40:09	2024-02-08 14:40:09
9	Fubrication and Electronics	ETU 07602	9	\N	2024-02-08 14:40:34	2024-02-08 14:40:34
10	Digital Signal Processing	COU 07603	12	\N	2024-02-08 14:41:07	2024-02-08 14:41:07
11	Digital Electronics	ETU 07604	9	\N	2024-02-08 14:41:54	2024-02-08 14:41:54
12	Artiffical Intteligence	COU 07605	9	\N	2024-02-08 14:42:21	2024-02-08 14:42:21
\.


--
-- Data for Name: n_t_a_s; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.n_t_a_s (id, name, award_id, created_at, updated_at) FROM stdin;
3	NTA Level 8	4	2024-02-08 14:33:33	2024-02-08 14:33:33
\.


--
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: results; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.results (id, student_reg_no, module_code, c_a_marks, f_e_marks, total_marks, grade_id, staff_id, created_at, updated_at) FROM stdin;
1	1234567	Libero soluta quisqu	55	40	95	2	5	2024-02-08 06:09:39	2024-02-08 07:07:35
2	1234567	Cou 123	35	40	75	2	5	2024-02-08 07:24:21	2024-02-08 07:24:21
3	2102302221363	COU 07501	54	35	89	2	6	2024-02-08 15:00:22	2024-02-08 15:00:22
4	2102302221363	COU 07503	55	26	81	2	6	2024-02-08 15:00:46	2024-02-08 15:00:46
5	2102302221363	GSU 07505	35	25	60	4	6	2024-02-08 15:01:04	2024-02-08 15:01:04
\.


--
-- Data for Name: semisters; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.semisters (id, name, created_at, updated_at) FROM stdin;
1	Semister 1	2024-02-01 11:22:02	2024-02-01 12:02:24
6	Semister 2	2024-02-07 10:20:22	2024-02-07 11:19:52
\.


--
-- Data for Name: staffs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.staffs (id, first_name, middle_name, surname, role, department_id, email, gender, password, remember_token, module_ids, created_at, updated_at) FROM stdin;
2	Hashim	Kasim	Salehe	Lecturer	1	hashim@gmail.com	male	$2y$10$WrQjH7QjAXrsBdfq9nT/8.99/mI.cImsPEuGwRuKXn1r/C/phyYNe	\N	\N	2024-02-01 05:59:50	2024-02-01 06:18:37
5	Juma	\N	Juma	Lecturer	1	juma@gmail.com	male	$2y$10$zTsJNtw8XqgaLh6vDLmsg.UbwFoxpbMT2LstjtPa2aQiPn1avFOaO	\N	\N	2024-02-01 18:44:41	2024-02-01 18:44:41
6	Gustove 	Joseph 	Sanga	Lecturer	1	sanga@gmail.com	male	$2y$10$wV7IbJQHv5js6hzIdUn3Oe2.RJ.jc1QTl/ykV/J/IQy6nK6y6dU/m	\N	\N	2024-02-08 14:45:44	2024-02-08 14:45:44
1	Bashir	Basso	Maduka	Admin	1	georgemaduka92@gmail.com	male	$2y$10$LE9DS.af5Mf00BT6Ol2w9OcY4q2cdb2/lQJNENr9RJMF9.mcr7jCi	uzJINnT9muDBJpvsoo5mLjXQXck2mxr67fgfd8X3HY0bQjFCDcQQfNTctYfJ	\N	2024-02-01 04:56:39	2024-02-01 06:19:40
\.


--
-- Data for Name: student_modules; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.student_modules (id, student_id, module_id, complete_status, created_at, updated_at) FROM stdin;
5	8	4	f	2024-02-08 14:57:22	2024-02-08 14:57:22
6	8	5	f	2024-02-08 14:57:22	2024-02-08 14:57:22
7	8	7	f	2024-02-08 14:57:22	2024-02-08 14:57:22
8	8	9	f	2024-02-08 14:57:22	2024-02-08 14:57:22
9	8	11	f	2024-02-08 14:57:22	2024-02-08 14:57:22
\.


--
-- Data for Name: students; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.students (id, first_name, middle_name, surname, registration_no, course_id, email, gender, dob, passport_size, password, remember_token, created_at, updated_at, role) FROM stdin;
8	Elibariki	Basso	Sulle	2102302221363	4	basso@gmail.com	male	2002-02-14	\N	$2y$10$fIrYL.kg0i8sDoWe1JErm.fO8reWKXZcuM/E0KHqIsvLZtxZbdjuC	\N	2024-02-08 14:49:00	2024-02-08 14:49:00	Student
9	Bashir 	Idd	Juma	2102302112345	4	bashiri@gmail.com	male	1996-02-15	\N	$2y$10$BaFVCsh8hXeLwyV2t9Yug.iANSt2HoMkE7ynmxtnqFWpxvMdU/BiW	\N	2024-02-08 14:51:16	2024-02-08 14:51:16	Student
10	George	Maduka	George	2102302229565	4	maduka@gmail.com	male	1998-02-14	\N	$2y$10$4Oig/GA0dinlsXN1B7i3tuB/8v8yVxvlqHYbdKbD6J71aC3wu0Yym	\N	2024-02-08 14:52:48	2024-02-08 14:52:48	Student
\.


--
-- Name: academic_year_progress_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.academic_year_progress_id_seq', 1, true);


--
-- Name: award_classifications_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.award_classifications_id_seq', 4, true);


--
-- Name: course_semiser_modules_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.course_semiser_modules_id_seq', 7, true);


--
-- Name: courses_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.courses_id_seq', 4, true);


--
-- Name: departments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.departments_id_seq', 5, true);


--
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- Name: grades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.grades_id_seq', 7, true);


--
-- Name: lecturer_modules_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.lecturer_modules_id_seq', 7, true);


--
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 17, true);


--
-- Name: modules_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.modules_id_seq', 12, true);


--
-- Name: n_t_a_s_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.n_t_a_s_id_seq', 3, true);


--
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- Name: results_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.results_id_seq', 5, true);


--
-- Name: semisters_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.semisters_id_seq', 7, true);


--
-- Name: staffs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.staffs_id_seq', 6, true);


--
-- Name: student_modules_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.student_modules_id_seq', 9, true);


--
-- Name: students_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.students_id_seq', 10, true);


--
-- Name: academic_year_progress academic_year_progress_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_year_progress
    ADD CONSTRAINT academic_year_progress_pkey PRIMARY KEY (id);


--
-- Name: award_classifications award_classifications_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.award_classifications
    ADD CONSTRAINT award_classifications_pkey PRIMARY KEY (id);


--
-- Name: course_semister_modules course_semiser_modules_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.course_semister_modules
    ADD CONSTRAINT course_semiser_modules_pkey PRIMARY KEY (id);


--
-- Name: courses courses_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_pkey PRIMARY KEY (id);


--
-- Name: departments departments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.departments
    ADD CONSTRAINT departments_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- Name: grades grades_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.grades
    ADD CONSTRAINT grades_pkey PRIMARY KEY (id);


--
-- Name: lecturer_modules lecturer_modules_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lecturer_modules
    ADD CONSTRAINT lecturer_modules_pkey PRIMARY KEY (id);


--
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- Name: modules modules_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modules
    ADD CONSTRAINT modules_pkey PRIMARY KEY (id);


--
-- Name: n_t_a_s n_t_a_s_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.n_t_a_s
    ADD CONSTRAINT n_t_a_s_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- Name: results results_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.results
    ADD CONSTRAINT results_pkey PRIMARY KEY (id);


--
-- Name: semisters semisters_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.semisters
    ADD CONSTRAINT semisters_pkey PRIMARY KEY (id);


--
-- Name: staffs staffs_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staffs
    ADD CONSTRAINT staffs_email_unique UNIQUE (email);


--
-- Name: staffs staffs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staffs
    ADD CONSTRAINT staffs_pkey PRIMARY KEY (id);


--
-- Name: student_modules student_modules_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_modules
    ADD CONSTRAINT student_modules_pkey PRIMARY KEY (id);


--
-- Name: students students_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_email_unique UNIQUE (email);


--
-- Name: students students_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_pkey PRIMARY KEY (id);


--
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- Name: academic_year_progress academic_year_progress_current_semister_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.academic_year_progress
    ADD CONSTRAINT academic_year_progress_current_semister_id_foreign FOREIGN KEY (current_semister_id) REFERENCES public.semisters(id) ON DELETE CASCADE;


--
-- Name: course_semister_modules course_semiser_modules_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.course_semister_modules
    ADD CONSTRAINT course_semiser_modules_course_id_foreign FOREIGN KEY (course_id) REFERENCES public.courses(id) ON DELETE CASCADE;


--
-- Name: course_semister_modules course_semiser_modules_semister_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.course_semister_modules
    ADD CONSTRAINT course_semiser_modules_semister_id_foreign FOREIGN KEY (semister_id) REFERENCES public.semisters(id) ON DELETE CASCADE;


--
-- Name: courses courses_department_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_department_id_foreign FOREIGN KEY (department_id) REFERENCES public.departments(id) ON DELETE CASCADE;


--
-- Name: courses courses_n_t_a_level_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_n_t_a_level_id_foreign FOREIGN KEY (n_t_a_level_id) REFERENCES public.n_t_a_s(id) ON DELETE CASCADE;


--
-- Name: lecturer_modules lecturer_modules_lecturer_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lecturer_modules
    ADD CONSTRAINT lecturer_modules_lecturer_id_foreign FOREIGN KEY (lecturer_id) REFERENCES public.staffs(id) ON DELETE CASCADE;


--
-- Name: lecturer_modules lecturer_modules_module_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lecturer_modules
    ADD CONSTRAINT lecturer_modules_module_id_foreign FOREIGN KEY (module_id) REFERENCES public.modules(id) ON DELETE CASCADE;


--
-- Name: modules modules_semister_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.modules
    ADD CONSTRAINT modules_semister_id_foreign FOREIGN KEY (semister_id) REFERENCES public.semisters(id) ON DELETE CASCADE;


--
-- Name: results results_grade_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.results
    ADD CONSTRAINT results_grade_id_foreign FOREIGN KEY (grade_id) REFERENCES public.grades(id) ON DELETE CASCADE;


--
-- Name: results results_staff_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.results
    ADD CONSTRAINT results_staff_id_foreign FOREIGN KEY (staff_id) REFERENCES public.staffs(id) ON DELETE CASCADE;


--
-- Name: staffs staffs_department_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staffs
    ADD CONSTRAINT staffs_department_id_foreign FOREIGN KEY (department_id) REFERENCES public.departments(id) ON DELETE CASCADE;


--
-- Name: student_modules student_modules_module_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_modules
    ADD CONSTRAINT student_modules_module_id_foreign FOREIGN KEY (module_id) REFERENCES public.modules(id) ON DELETE CASCADE;


--
-- Name: student_modules student_modules_student_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student_modules
    ADD CONSTRAINT student_modules_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(id) ON DELETE CASCADE;


--
-- Name: students students_course_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_course_id_foreign FOREIGN KEY (course_id) REFERENCES public.courses(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

