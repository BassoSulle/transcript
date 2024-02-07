PGDMP  $                    |            lv_soma_transcript     16.1 (Ubuntu 16.1-1.pgdg22.04+1)     16.1 (Ubuntu 16.1-1.pgdg22.04+1) �               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16575    lv_soma_transcript    DATABASE     ~   CREATE DATABASE lv_soma_transcript WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'en_US.UTF-8';
 "   DROP DATABASE lv_soma_transcript;
                postgres    false            �            1259    32961    academic_year_progress    TABLE     7  CREATE TABLE public.academic_year_progress (
    id bigint NOT NULL,
    year_of_studies character varying(255) NOT NULL,
    current_semister_id bigint NOT NULL,
    progress_status boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.academic_year_progress;
       public         heap    postgres    false            �            1259    32960    academic_year_progress_id_seq    SEQUENCE     �   CREATE SEQUENCE public.academic_year_progress_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.academic_year_progress_id_seq;
       public          postgres    false    249                       0    0    academic_year_progress_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.academic_year_progress_id_seq OWNED BY public.academic_year_progress.id;
          public          postgres    false    248            �            1259    16649    award_classifications    TABLE     -  CREATE TABLE public.award_classifications (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    overall_gpa integer NOT NULL,
    high_gpa integer NOT NULL,
    low_gpa integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 )   DROP TABLE public.award_classifications;
       public         heap    postgres    false            �            1259    16648    award_classifications_id_seq    SEQUENCE     �   CREATE SEQUENCE public.award_classifications_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.award_classifications_id_seq;
       public          postgres    false    231                       0    0    award_classifications_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.award_classifications_id_seq OWNED BY public.award_classifications.id;
          public          postgres    false    230            �            1259    16713    course_semister_modules    TABLE       CREATE TABLE public.course_semister_modules (
    id bigint NOT NULL,
    course_id bigint NOT NULL,
    semister_id bigint NOT NULL,
    module_ids json,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    ac_year_id bigint
);
 +   DROP TABLE public.course_semister_modules;
       public         heap    postgres    false            �            1259    16712    course_semiser_modules_id_seq    SEQUENCE     �   CREATE SEQUENCE public.course_semiser_modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.course_semiser_modules_id_seq;
       public          postgres    false    241                       0    0    course_semiser_modules_id_seq    SEQUENCE OWNED BY     `   ALTER SEQUENCE public.course_semiser_modules_id_seq OWNED BY public.course_semister_modules.id;
          public          postgres    false    240            �            1259    16663    courses    TABLE       CREATE TABLE public.courses (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    duration integer NOT NULL,
    department_id bigint NOT NULL,
    n_t_a_level_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.courses;
       public         heap    postgres    false            �            1259    16662    courses_id_seq    SEQUENCE     w   CREATE SEQUENCE public.courses_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.courses_id_seq;
       public          postgres    false    235                       0    0    courses_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.courses_id_seq OWNED BY public.courses.id;
          public          postgres    false    234            �            1259    16614    departments    TABLE     �   CREATE TABLE public.departments (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.departments;
       public         heap    postgres    false            �            1259    16613    departments_id_seq    SEQUENCE     {   CREATE SEQUENCE public.departments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.departments_id_seq;
       public          postgres    false    223                       0    0    departments_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.departments_id_seq OWNED BY public.departments.id;
          public          postgres    false    222            �            1259    16590    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false            �            1259    16589    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    219                       0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    218            �            1259    16642    grades    TABLE       CREATE TABLE public.grades (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    high_marks integer NOT NULL,
    low_marks integer NOT NULL,
    point integer NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.grades;
       public         heap    postgres    false            �            1259    16641    grades_id_seq    SEQUENCE     v   CREATE SEQUENCE public.grades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.grades_id_seq;
       public          postgres    false    229                       0    0    grades_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.grades_id_seq OWNED BY public.grades.id;
          public          postgres    false    228            �            1259    24768    lecturer_modules    TABLE     ,  CREATE TABLE public.lecturer_modules (
    id bigint NOT NULL,
    lecturer_id bigint NOT NULL,
    module_id bigint NOT NULL,
    complete_status boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    semister_id integer
);
 $   DROP TABLE public.lecturer_modules;
       public         heap    postgres    false            �            1259    24767    lecturer_modules_id_seq    SEQUENCE     �   CREATE SEQUENCE public.lecturer_modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.lecturer_modules_id_seq;
       public          postgres    false    247                        0    0    lecturer_modules_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.lecturer_modules_id_seq OWNED BY public.lecturer_modules.id;
          public          postgres    false    246            �            1259    16577 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false            �            1259    16576    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    216            !           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    215            �            1259    16628    modules    TABLE     .  CREATE TABLE public.modules (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    code character varying(255) NOT NULL,
    credit character varying(255) NOT NULL,
    semister_id bigint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.modules;
       public         heap    postgres    false            �            1259    16627    modules_id_seq    SEQUENCE     w   CREATE SEQUENCE public.modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.modules_id_seq;
       public          postgres    false    227            "           0    0    modules_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.modules_id_seq OWNED BY public.modules.id;
          public          postgres    false    226            �            1259    16656    n_t_a_s    TABLE     �   CREATE TABLE public.n_t_a_s (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    award_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.n_t_a_s;
       public         heap    postgres    false            �            1259    16655    n_t_a_s_id_seq    SEQUENCE     w   CREATE SEQUENCE public.n_t_a_s_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.n_t_a_s_id_seq;
       public          postgres    false    233            #           0    0    n_t_a_s_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.n_t_a_s_id_seq OWNED BY public.n_t_a_s.id;
          public          postgres    false    232            �            1259    16583    password_resets    TABLE     �   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    postgres    false            �            1259    16602    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
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
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false            �            1259    16601    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    221            $           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    220            �            1259    16750    results    TABLE     �  CREATE TABLE public.results (
    id bigint NOT NULL,
    student_reg_no bigint NOT NULL,
    module_code character varying(255) NOT NULL,
    c_a_marks double precision NOT NULL,
    s_e_marks double precision NOT NULL,
    total_marks double precision NOT NULL,
    grade_id bigint,
    staff_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.results;
       public         heap    postgres    false            �            1259    16749    results_id_seq    SEQUENCE     w   CREATE SEQUENCE public.results_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.results_id_seq;
       public          postgres    false    245            %           0    0    results_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.results_id_seq OWNED BY public.results.id;
          public          postgres    false    244            �            1259    16621 	   semisters    TABLE     �   CREATE TABLE public.semisters (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.semisters;
       public         heap    postgres    false            �            1259    16620    semisters_id_seq    SEQUENCE     y   CREATE SEQUENCE public.semisters_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.semisters_id_seq;
       public          postgres    false    225            &           0    0    semisters_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.semisters_id_seq OWNED BY public.semisters.id;
          public          postgres    false    224            �            1259    16680    staffs    TABLE     #  CREATE TABLE public.staffs (
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
    DROP TABLE public.staffs;
       public         heap    postgres    false            �            1259    16679    staffs_id_seq    SEQUENCE     v   CREATE SEQUENCE public.staffs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.staffs_id_seq;
       public          postgres    false    237            '           0    0    staffs_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.staffs_id_seq OWNED BY public.staffs.id;
          public          postgres    false    236            �            1259    16732    student_modules    TABLE       CREATE TABLE public.student_modules (
    id bigint NOT NULL,
    student_id bigint NOT NULL,
    module_id bigint NOT NULL,
    complete_status boolean DEFAULT false NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 #   DROP TABLE public.student_modules;
       public         heap    postgres    false            �            1259    16731    student_modules_id_seq    SEQUENCE        CREATE SEQUENCE public.student_modules_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.student_modules_id_seq;
       public          postgres    false    243            (           0    0    student_modules_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.student_modules_id_seq OWNED BY public.student_modules.id;
          public          postgres    false    242            �            1259    16696    students    TABLE     �  CREATE TABLE public.students (
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
    DROP TABLE public.students;
       public         heap    postgres    false            �            1259    16695    students_id_seq    SEQUENCE     x   CREATE SEQUENCE public.students_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.students_id_seq;
       public          postgres    false    239            )           0    0    students_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.students_id_seq OWNED BY public.students.id;
          public          postgres    false    238            %           2604    32964    academic_year_progress id    DEFAULT     �   ALTER TABLE ONLY public.academic_year_progress ALTER COLUMN id SET DEFAULT nextval('public.academic_year_progress_id_seq'::regclass);
 H   ALTER TABLE public.academic_year_progress ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    249    248    249                       2604    16652    award_classifications id    DEFAULT     �   ALTER TABLE ONLY public.award_classifications ALTER COLUMN id SET DEFAULT nextval('public.award_classifications_id_seq'::regclass);
 G   ALTER TABLE public.award_classifications ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    230    231    231                       2604    16716    course_semister_modules id    DEFAULT     �   ALTER TABLE ONLY public.course_semister_modules ALTER COLUMN id SET DEFAULT nextval('public.course_semiser_modules_id_seq'::regclass);
 I   ALTER TABLE public.course_semister_modules ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    240    241    241                       2604    16666 
   courses id    DEFAULT     h   ALTER TABLE ONLY public.courses ALTER COLUMN id SET DEFAULT nextval('public.courses_id_seq'::regclass);
 9   ALTER TABLE public.courses ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    234    235    235                       2604    16617    departments id    DEFAULT     p   ALTER TABLE ONLY public.departments ALTER COLUMN id SET DEFAULT nextval('public.departments_id_seq'::regclass);
 =   ALTER TABLE public.departments ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    223    223                       2604    16593    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218    219                       2604    16645 	   grades id    DEFAULT     f   ALTER TABLE ONLY public.grades ALTER COLUMN id SET DEFAULT nextval('public.grades_id_seq'::regclass);
 8   ALTER TABLE public.grades ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    229    228    229            #           2604    24771    lecturer_modules id    DEFAULT     z   ALTER TABLE ONLY public.lecturer_modules ALTER COLUMN id SET DEFAULT nextval('public.lecturer_modules_id_seq'::regclass);
 B   ALTER TABLE public.lecturer_modules ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    246    247    247                       2604    16580    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    216    216                       2604    16631 
   modules id    DEFAULT     h   ALTER TABLE ONLY public.modules ALTER COLUMN id SET DEFAULT nextval('public.modules_id_seq'::regclass);
 9   ALTER TABLE public.modules ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    227    226    227                       2604    16659 
   n_t_a_s id    DEFAULT     h   ALTER TABLE ONLY public.n_t_a_s ALTER COLUMN id SET DEFAULT nextval('public.n_t_a_s_id_seq'::regclass);
 9   ALTER TABLE public.n_t_a_s ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    233    232    233                       2604    16605    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    221    220    221            "           2604    16753 
   results id    DEFAULT     h   ALTER TABLE ONLY public.results ALTER COLUMN id SET DEFAULT nextval('public.results_id_seq'::regclass);
 9   ALTER TABLE public.results ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    245    244    245                       2604    16624    semisters id    DEFAULT     l   ALTER TABLE ONLY public.semisters ALTER COLUMN id SET DEFAULT nextval('public.semisters_id_seq'::regclass);
 ;   ALTER TABLE public.semisters ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    225    225                       2604    16683 	   staffs id    DEFAULT     f   ALTER TABLE ONLY public.staffs ALTER COLUMN id SET DEFAULT nextval('public.staffs_id_seq'::regclass);
 8   ALTER TABLE public.staffs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    236    237    237                        2604    16735    student_modules id    DEFAULT     x   ALTER TABLE ONLY public.student_modules ALTER COLUMN id SET DEFAULT nextval('public.student_modules_id_seq'::regclass);
 A   ALTER TABLE public.student_modules ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    242    243    243                       2604    16699    students id    DEFAULT     j   ALTER TABLE ONLY public.students ALTER COLUMN id SET DEFAULT nextval('public.students_id_seq'::regclass);
 :   ALTER TABLE public.students ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    239    238    239                      0    32961    academic_year_progress 
   TABLE DATA                 public          postgres    false    249   o�                  0    16649    award_classifications 
   TABLE DATA                 public          postgres    false    231   �       
          0    16713    course_semister_modules 
   TABLE DATA                 public          postgres    false    241   K�                 0    16663    courses 
   TABLE DATA                 public          postgres    false    235   �       �          0    16614    departments 
   TABLE DATA                 public          postgres    false    223   G�       �          0    16590    failed_jobs 
   TABLE DATA                 public          postgres    false    219   Ӳ       �          0    16642    grades 
   TABLE DATA                 public          postgres    false    229   ��                 0    24768    lecturer_modules 
   TABLE DATA                 public          postgres    false    247   q�       �          0    16577 
   migrations 
   TABLE DATA                 public          postgres    false    216   �       �          0    16628    modules 
   TABLE DATA                 public          postgres    false    227   ŵ                 0    16656    n_t_a_s 
   TABLE DATA                 public          postgres    false    233   ��       �          0    16583    password_resets 
   TABLE DATA                 public          postgres    false    217   �       �          0    16602    personal_access_tokens 
   TABLE DATA                 public          postgres    false    221   9�                 0    16750    results 
   TABLE DATA                 public          postgres    false    245   S�       �          0    16621 	   semisters 
   TABLE DATA                 public          postgres    false    225   m�                 0    16680    staffs 
   TABLE DATA                 public          postgres    false    237   �                 0    16732    student_modules 
   TABLE DATA                 public          postgres    false    243   ��                 0    16696    students 
   TABLE DATA                 public          postgres    false    239   ��       *           0    0    academic_year_progress_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.academic_year_progress_id_seq', 1, true);
          public          postgres    false    248            +           0    0    award_classifications_id_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public.award_classifications_id_seq', 3, true);
          public          postgres    false    230            ,           0    0    course_semiser_modules_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.course_semiser_modules_id_seq', 4, true);
          public          postgres    false    240            -           0    0    courses_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.courses_id_seq', 3, true);
          public          postgres    false    234            .           0    0    departments_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.departments_id_seq', 3, true);
          public          postgres    false    222            /           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    218            0           0    0    grades_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.grades_id_seq', 3, true);
          public          postgres    false    228            1           0    0    lecturer_modules_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.lecturer_modules_id_seq', 4, true);
          public          postgres    false    246            2           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 17, true);
          public          postgres    false    215            3           0    0    modules_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.modules_id_seq', 5, true);
          public          postgres    false    226            4           0    0    n_t_a_s_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.n_t_a_s_id_seq', 2, true);
          public          postgres    false    232            5           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    220            6           0    0    results_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.results_id_seq', 1, false);
          public          postgres    false    244            7           0    0    semisters_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.semisters_id_seq', 5, true);
          public          postgres    false    224            8           0    0    staffs_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.staffs_id_seq', 5, true);
          public          postgres    false    236            9           0    0    student_modules_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.student_modules_id_seq', 1, false);
          public          postgres    false    242            :           0    0    students_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.students_id_seq', 4, true);
          public          postgres    false    238            R           2606    32967 2   academic_year_progress academic_year_progress_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.academic_year_progress
    ADD CONSTRAINT academic_year_progress_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.academic_year_progress DROP CONSTRAINT academic_year_progress_pkey;
       public            postgres    false    249            <           2606    16654 0   award_classifications award_classifications_pkey 
   CONSTRAINT     n   ALTER TABLE ONLY public.award_classifications
    ADD CONSTRAINT award_classifications_pkey PRIMARY KEY (id);
 Z   ALTER TABLE ONLY public.award_classifications DROP CONSTRAINT award_classifications_pkey;
       public            postgres    false    231            J           2606    16720 3   course_semister_modules course_semiser_modules_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.course_semister_modules
    ADD CONSTRAINT course_semiser_modules_pkey PRIMARY KEY (id);
 ]   ALTER TABLE ONLY public.course_semister_modules DROP CONSTRAINT course_semiser_modules_pkey;
       public            postgres    false    241            @           2606    16668    courses courses_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.courses DROP CONSTRAINT courses_pkey;
       public            postgres    false    235            4           2606    16619    departments departments_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.departments
    ADD CONSTRAINT departments_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.departments DROP CONSTRAINT departments_pkey;
       public            postgres    false    223            +           2606    16598    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    219            -           2606    16600 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    219            :           2606    16647    grades grades_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.grades
    ADD CONSTRAINT grades_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.grades DROP CONSTRAINT grades_pkey;
       public            postgres    false    229            P           2606    24774 &   lecturer_modules lecturer_modules_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.lecturer_modules
    ADD CONSTRAINT lecturer_modules_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.lecturer_modules DROP CONSTRAINT lecturer_modules_pkey;
       public            postgres    false    247            (           2606    16582    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    216            8           2606    16635    modules modules_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.modules
    ADD CONSTRAINT modules_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.modules DROP CONSTRAINT modules_pkey;
       public            postgres    false    227            >           2606    16661    n_t_a_s n_t_a_s_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.n_t_a_s
    ADD CONSTRAINT n_t_a_s_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.n_t_a_s DROP CONSTRAINT n_t_a_s_pkey;
       public            postgres    false    233            /           2606    16609 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    221            1           2606    16612 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    221            N           2606    16755    results results_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.results
    ADD CONSTRAINT results_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.results DROP CONSTRAINT results_pkey;
       public            postgres    false    245            6           2606    16626    semisters semisters_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.semisters
    ADD CONSTRAINT semisters_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.semisters DROP CONSTRAINT semisters_pkey;
       public            postgres    false    225            B           2606    16694    staffs staffs_email_unique 
   CONSTRAINT     V   ALTER TABLE ONLY public.staffs
    ADD CONSTRAINT staffs_email_unique UNIQUE (email);
 D   ALTER TABLE ONLY public.staffs DROP CONSTRAINT staffs_email_unique;
       public            postgres    false    237            D           2606    16687    staffs staffs_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.staffs
    ADD CONSTRAINT staffs_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.staffs DROP CONSTRAINT staffs_pkey;
       public            postgres    false    237            L           2606    16738 $   student_modules student_modules_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.student_modules
    ADD CONSTRAINT student_modules_pkey PRIMARY KEY (id);
 N   ALTER TABLE ONLY public.student_modules DROP CONSTRAINT student_modules_pkey;
       public            postgres    false    243            F           2606    16711    students students_email_unique 
   CONSTRAINT     Z   ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_email_unique UNIQUE (email);
 H   ALTER TABLE ONLY public.students DROP CONSTRAINT students_email_unique;
       public            postgres    false    239            H           2606    16704    students students_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.students DROP CONSTRAINT students_pkey;
       public            postgres    false    239            )           1259    16588    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            postgres    false    217            2           1259    16610 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    221    221            `           2606    32968 I   academic_year_progress academic_year_progress_current_semister_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.academic_year_progress
    ADD CONSTRAINT academic_year_progress_current_semister_id_foreign FOREIGN KEY (current_semister_id) REFERENCES public.semisters(id) ON DELETE CASCADE;
 s   ALTER TABLE ONLY public.academic_year_progress DROP CONSTRAINT academic_year_progress_current_semister_id_foreign;
       public          postgres    false    225    249    3382            X           2606    16721 @   course_semister_modules course_semiser_modules_course_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.course_semister_modules
    ADD CONSTRAINT course_semiser_modules_course_id_foreign FOREIGN KEY (course_id) REFERENCES public.courses(id) ON DELETE CASCADE;
 j   ALTER TABLE ONLY public.course_semister_modules DROP CONSTRAINT course_semiser_modules_course_id_foreign;
       public          postgres    false    235    241    3392            Y           2606    16726 B   course_semister_modules course_semiser_modules_semister_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.course_semister_modules
    ADD CONSTRAINT course_semiser_modules_semister_id_foreign FOREIGN KEY (semister_id) REFERENCES public.semisters(id) ON DELETE CASCADE;
 l   ALTER TABLE ONLY public.course_semister_modules DROP CONSTRAINT course_semiser_modules_semister_id_foreign;
       public          postgres    false    241    225    3382            T           2606    16669 %   courses courses_department_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_department_id_foreign FOREIGN KEY (department_id) REFERENCES public.departments(id) ON DELETE CASCADE;
 O   ALTER TABLE ONLY public.courses DROP CONSTRAINT courses_department_id_foreign;
       public          postgres    false    235    223    3380            U           2606    16674 &   courses courses_n_t_a_level_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.courses
    ADD CONSTRAINT courses_n_t_a_level_id_foreign FOREIGN KEY (n_t_a_level_id) REFERENCES public.n_t_a_s(id) ON DELETE CASCADE;
 P   ALTER TABLE ONLY public.courses DROP CONSTRAINT courses_n_t_a_level_id_foreign;
       public          postgres    false    233    235    3390            ^           2606    24775 5   lecturer_modules lecturer_modules_lecturer_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.lecturer_modules
    ADD CONSTRAINT lecturer_modules_lecturer_id_foreign FOREIGN KEY (lecturer_id) REFERENCES public.staffs(id) ON DELETE CASCADE;
 _   ALTER TABLE ONLY public.lecturer_modules DROP CONSTRAINT lecturer_modules_lecturer_id_foreign;
       public          postgres    false    237    247    3396            _           2606    24780 3   lecturer_modules lecturer_modules_module_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.lecturer_modules
    ADD CONSTRAINT lecturer_modules_module_id_foreign FOREIGN KEY (module_id) REFERENCES public.modules(id) ON DELETE CASCADE;
 ]   ALTER TABLE ONLY public.lecturer_modules DROP CONSTRAINT lecturer_modules_module_id_foreign;
       public          postgres    false    227    3384    247            S           2606    16636 #   modules modules_semister_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.modules
    ADD CONSTRAINT modules_semister_id_foreign FOREIGN KEY (semister_id) REFERENCES public.semisters(id) ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.modules DROP CONSTRAINT modules_semister_id_foreign;
       public          postgres    false    225    3382    227            \           2606    16756     results results_grade_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.results
    ADD CONSTRAINT results_grade_id_foreign FOREIGN KEY (grade_id) REFERENCES public.grades(id) ON DELETE CASCADE;
 J   ALTER TABLE ONLY public.results DROP CONSTRAINT results_grade_id_foreign;
       public          postgres    false    229    3386    245            ]           2606    16761     results results_staff_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.results
    ADD CONSTRAINT results_staff_id_foreign FOREIGN KEY (staff_id) REFERENCES public.staffs(id) ON DELETE CASCADE;
 J   ALTER TABLE ONLY public.results DROP CONSTRAINT results_staff_id_foreign;
       public          postgres    false    237    3396    245            V           2606    16688 #   staffs staffs_department_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.staffs
    ADD CONSTRAINT staffs_department_id_foreign FOREIGN KEY (department_id) REFERENCES public.departments(id) ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.staffs DROP CONSTRAINT staffs_department_id_foreign;
       public          postgres    false    237    3380    223            Z           2606    16744 1   student_modules student_modules_module_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.student_modules
    ADD CONSTRAINT student_modules_module_id_foreign FOREIGN KEY (module_id) REFERENCES public.modules(id) ON DELETE CASCADE;
 [   ALTER TABLE ONLY public.student_modules DROP CONSTRAINT student_modules_module_id_foreign;
       public          postgres    false    227    3384    243            [           2606    16739 2   student_modules student_modules_student_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.student_modules
    ADD CONSTRAINT student_modules_student_id_foreign FOREIGN KEY (student_id) REFERENCES public.students(id) ON DELETE CASCADE;
 \   ALTER TABLE ONLY public.student_modules DROP CONSTRAINT student_modules_student_id_foreign;
       public          postgres    false    239    3400    243            W           2606    16705 #   students students_course_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.students
    ADD CONSTRAINT students_course_id_foreign FOREIGN KEY (course_id) REFERENCES public.courses(id) ON DELETE CASCADE;
 M   ALTER TABLE ONLY public.students DROP CONSTRAINT students_course_id_foreign;
       public          postgres    false    235    3392    239               h   x���v
Q���W((M��L�KLNLI��L��LM,�/(�O/J-.Vs�	uV�0�QP7202���:
@~ZbNq*TX��H��\��������H���5 ��          T   x���v
Q���W((M��L�K,O,J�O�I,.�L�LN,���+Vs�	uV�0�QP/I-.Q�Q0#�P�i��� �T      
   �   x���v
Q���W((M��L�K�/-*N�/N��,.I-���O)�I-Vs�	uV�0�Q0�Q0�QP�V2T�Q2Q�Ur��Lt��H������������5�'�V��6[m��ZC+ck-�L̬����rq �"=t         V   x���v
Q���W((M��L�K�/-*N-Vs�	uV�0�QP/I-.Q�Q0##���������������������:aMk... ��4      �   |   x���v
Q���W((M��L�KI-H,*�M�+)Vs�	uV�0�QPw��-(-I-R(.)M�L-V����*�Z�Y����Ĭ-�5��<���hBIjq	�I��V�����pq �5�      �   
   x���          �   t   x���v
Q���W((M��L�K/JLI-Vs�	uV�0�QPwT�Q040�Q07�Q "u##]#]CK+c+su�\�-1jvR��o�&�Xa���� p-|         �   x���v
Q���W((M��L��IM.)-J-���O)�I-Vs�	uV�0�Q0�Q0�QHK�)N�QP7202�50"K+C3+Cu���\�$�f���m&�V&f����I��l�)��,�����q
� m�� �iT      �   �  x����n�0E��
vm����RW]d�J�&�v���l��_�C�[hVp��p������lw�����R<��IqS���^�>7����%���?(��F�k}iU�Jji4~���:�����Oo�I�}����d���qDSot8�����s�t��
�R[|�#�Q%�VaWj��$B ��tP��+S�f�捎�h
��F˺��N���78����\�yW�{c�6ct�ڷ�	5�s*�g����CQY#�E)n�:��[%[�$ԩ4h��ͼ�@�0�!�N��R���a��Y�kË�'�'�ň�kQ�.��/��	�V�w��|,��v�A`s�d6�R�?�0O"%Y�mﾮ�n�?�0&�^��D��P%������$$S�I�е΅e]
��\�Y�'u��>������      �   �   x���Ak� ����-lC��Ν��!2����Ń�h����=Z6�y��y�����������~��H���z펻=���2v5	�#��ELf�3��`׀&J��P�<�c��`B>2��V�eS���/U�w�:���(��hq
1���-�h2�Vx;��`�n�4Zn�����zx~}aH6�K���	5gW�<;�5S��MQ+�7�����l�         d   x���v
Q���W((M��L�ˋ/�O�/Vs�	uV�0�QP�IL�/JUH-.NU��/.)*MQP�Q0J���*Z�X��ִ��� ^��      �   
   x���          �   
   x���             
   x���          �   o   x���v
Q���W((M��L�+N��,.I-*Vs�	uV�0�QP/I-.Q0V���Lt�t�L-��,p	kZsyc�!P0TT��4##+#ta����	�.. �T1s         �  x���M��0���
�C{N�j��`�R��2�M	"����,���n������<�լ��v9�rm���Y�	�"aȸ_c�n�/��/�ʷjI��!Y�2��ˠl5l��V�#�$��t+�mq��ѵAW���h�N�%����80�&xe�Z�l��r��R��E|=X������#��� 䀬�X��.=T�X����{�?9�֬ה��y���m�.޳�t�j��sD�xxy4(����������"�Ui�DV��Cr��ľ��BH�"A����u7�v_�at��:a��}���4��"F���z;��.���Ǎ@B���C;C���tF�Db��-�*�Z7�X�^9JgI���L��U��YQ,Bǟ��6�e��v�#WV��A��@�-�l��;�T��)�y��S�	t��� ��T         
   x���             G  x����n�@��>�,Lh��s�覤�A�JmW�(PF)�Z}�:�&��fΜ?sr��ojMf��f>��E�,�eU�ض*����ܡ kI�F�H�-m����� "{��(ɺ�Ox�1Q1�r��D׫x���\�����m�}�}��Nn�Jo��̋g?�ҝ�]C��د�U�X�e�~�C�EO�^�[ H��M��1ё*�iC)�?��8�O#g��Y
r"|�'��/����_�� ��u�����	Ah���M{�k`�eE�췬2���&�<�BMf~,��||8R�o	T�������7���j� Ċ$     