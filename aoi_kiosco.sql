PGDMP      $                }         
   api_kiosco    17.4    17.4 �    e           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                           false            f           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                           false            g           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                           false            h           1262    16613 
   api_kiosco    DATABASE     p   CREATE DATABASE api_kiosco WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'es-VE';
    DROP DATABASE api_kiosco;
                     postgres    false            �            1259    16615    aliados    TABLE     �  CREATE TABLE public.aliados (
    id integer NOT NULL,
    nob_aliado character varying(100) NOT NULL,
    nro_documento character varying(15) NOT NULL,
    nro_celular character varying(15) NOT NULL,
    estatus bigint DEFAULT 1 NOT NULL,
    logo character varying(500),
    apikey character varying(500),
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone,
    sw_aliado bigint DEFAULT 1 NOT NULL,
    cta_aliado character varying(20),
    tipo_documento character varying(1),
    id_cod_telefono integer,
    email character varying(200),
    fec_activacion timestamp with time zone,
    max_vuelto numeric(10,2)
);
    DROP TABLE public.aliados;
       public         heap r       postgres    false            �            1259    16614    aliados_id_seq    SEQUENCE     �   CREATE SEQUENCE public.aliados_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.aliados_id_seq;
       public               postgres    false    218            i           0    0    aliados_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.aliados_id_seq OWNED BY public.aliados.id;
          public               postgres    false    217            �            1259    16650    api_aliados    TABLE     2  CREATE TABLE public.api_aliados (
    id integer NOT NULL,
    id_api integer NOT NULL,
    id_aliado integer NOT NULL,
    estatus bigint DEFAULT 1 NOT NULL,
    fec_afiliacion timestamp with time zone NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone
);
    DROP TABLE public.api_aliados;
       public         heap r       postgres    false            �            1259    16649    api_aliados_id_seq    SEQUENCE     �   CREATE SEQUENCE public.api_aliados_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.api_aliados_id_seq;
       public               postgres    false    222            j           0    0    api_aliados_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.api_aliados_id_seq OWNED BY public.api_aliados.id;
          public               postgres    false    221            �            1259    16627    apis    TABLE     ,  CREATE TABLE public.apis (
    id integer NOT NULL,
    nob_api character varying(200) NOT NULL,
    estatus bigint DEFAULT 1 NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone,
    id_tipo_api integer NOT NULL,
    desc_api character varying(500)
);
    DROP TABLE public.apis;
       public         heap r       postgres    false            �            1259    16626    apis_id_seq    SEQUENCE     �   CREATE SEQUENCE public.apis_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.apis_id_seq;
       public               postgres    false    220            k           0    0    apis_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.apis_id_seq OWNED BY public.apis.id;
          public               postgres    false    219            �            1259    16748    cache    TABLE     �   CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);
    DROP TABLE public.cache;
       public         heap r       postgres    false            �            1259    16755    cache_locks    TABLE     �   CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);
    DROP TABLE public.cache_locks;
       public         heap r       postgres    false            �            1259    16956    codigo_telefonos    TABLE     �   CREATE TABLE public.codigo_telefonos (
    id integer NOT NULL,
    cod_telefono character varying(4) NOT NULL,
    estatus bigint DEFAULT 1 NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone
);
 $   DROP TABLE public.codigo_telefonos;
       public         heap r       postgres    false            �            1259    16955    codigo_telefonos_id_seq    SEQUENCE     �   CREATE SEQUENCE public.codigo_telefonos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.codigo_telefonos_id_seq;
       public               postgres    false    249            l           0    0    codigo_telefonos_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.codigo_telefonos_id_seq OWNED BY public.codigo_telefonos.id;
          public               postgres    false    248            �            1259    16974    dispositivo_aliados    TABLE     R  CREATE TABLE public.dispositivo_aliados (
    id integer NOT NULL,
    id_aliado integer NOT NULL,
    mac_dispositivo character varying(100) NOT NULL,
    des_dispositivo character varying(300) NOT NULL,
    estatus integer DEFAULT 1 NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone
);
 '   DROP TABLE public.dispositivo_aliados;
       public         heap r       postgres    false            �            1259    16973    dispositivo_aliados_id_seq    SEQUENCE     �   CREATE SEQUENCE public.dispositivo_aliados_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.dispositivo_aliados_id_seq;
       public               postgres    false    251            m           0    0    dispositivo_aliados_id_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.dispositivo_aliados_id_seq OWNED BY public.dispositivo_aliados.id;
          public               postgres    false    250            �            1259    16780    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap r       postgres    false            �            1259    16779    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public               postgres    false    245            n           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public               postgres    false    244            �            1259    16772    job_batches    TABLE     d  CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);
    DROP TABLE public.job_batches;
       public         heap r       postgres    false            �            1259    16763    jobs    TABLE     �   CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);
    DROP TABLE public.jobs;
       public         heap r       postgres    false            �            1259    16762    jobs_id_seq    SEQUENCE     t   CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.jobs_id_seq;
       public               postgres    false    242            o           0    0    jobs_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;
          public               postgres    false    241            �            1259    16705    log_transacciones    TABLE     �  CREATE TABLE public.log_transacciones (
    id integer NOT NULL,
    id_aliado integer NOT NULL,
    id_api integer NOT NULL,
    nro_cta_receptora character varying(50),
    nro_cta_pagadora character varying(50),
    monto numeric(10,2) NOT NULL,
    id_usuario integer NOT NULL,
    lote character varying(50),
    id_dispositivo integer,
    fec_transaccion timestamp with time zone,
    created_at timestamp with time zone,
    updated_at timestamp with time zone
);
 %   DROP TABLE public.log_transacciones;
       public         heap r       postgres    false            �            1259    16704    log_transaccion_id_seq    SEQUENCE     �   CREATE SEQUENCE public.log_transaccion_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.log_transaccion_id_seq;
       public               postgres    false    230            p           0    0    log_transaccion_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.log_transaccion_id_seq OWNED BY public.log_transacciones.id;
          public               postgres    false    229            �            1259    16710    log_usuarios    TABLE     �   CREATE TABLE public.log_usuarios (
    id integer NOT NULL,
    id_usuario integer NOT NULL,
    fec_operacion timestamp with time zone,
    operacion character varying(100)
);
     DROP TABLE public.log_usuarios;
       public         heap r       postgres    false            �            1259    16709    log_usuarios_id_seq    SEQUENCE     �   CREATE SEQUENCE public.log_usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.log_usuarios_id_seq;
       public               postgres    false    232            q           0    0    log_usuarios_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.log_usuarios_id_seq OWNED BY public.log_usuarios.id;
          public               postgres    false    231            �            1259    16715 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap r       postgres    false            �            1259    16714    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public               postgres    false    234            r           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public               postgres    false    233            �            1259    16732    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap r       postgres    false            �            1259    16792    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
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
       public         heap r       postgres    false            �            1259    16791    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public               postgres    false    247            s           0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public               postgres    false    246            �            1259    16686    rol_usuarios    TABLE     �   CREATE TABLE public.rol_usuarios (
    id integer NOT NULL,
    nob_rol character varying(100) NOT NULL,
    estatus bigint DEFAULT 1 NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone
);
     DROP TABLE public.rol_usuarios;
       public         heap r       postgres    false            �            1259    16685    rol_usuarios_id_seq    SEQUENCE     �   CREATE SEQUENCE public.rol_usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.rol_usuarios_id_seq;
       public               postgres    false    226            t           0    0    rol_usuarios_id_seq    SEQUENCE OWNED BY     K   ALTER SEQUENCE public.rol_usuarios_id_seq OWNED BY public.rol_usuarios.id;
          public               postgres    false    225            �            1259    16739    sessions    TABLE     �   CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);
    DROP TABLE public.sessions;
       public         heap r       postgres    false            �            1259    16663 	   tipo_apis    TABLE     �   CREATE TABLE public.tipo_apis (
    id integer NOT NULL,
    nob_tipo_api character varying(100) NOT NULL,
    estatus bigint DEFAULT 1 NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone
);
    DROP TABLE public.tipo_apis;
       public         heap r       postgres    false            �            1259    16662    tipo_apis_id_seq    SEQUENCE     �   CREATE SEQUENCE public.tipo_apis_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.tipo_apis_id_seq;
       public               postgres    false    224            u           0    0    tipo_apis_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.tipo_apis_id_seq OWNED BY public.tipo_apis.id;
          public               postgres    false    223            �            1259    16722    users    TABLE     x  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         heap r       postgres    false            �            1259    16721    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public               postgres    false    236            v           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public               postgres    false    235            �            1259    16696    usuarios    TABLE     �  CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nob_usuario character varying(50) NOT NULL,
    ape_usuario character varying(50) NOT NULL,
    login character varying(100) NOT NULL,
    password character varying(100) NOT NULL,
    id_rol integer NOT NULL,
    id_aliado integer DEFAULT 0 NOT NULL,
    estatus bigint DEFAULT 1 NOT NULL,
    email_usuario character varying(200) NOT NULL,
    created_at timestamp with time zone NOT NULL,
    updated_at timestamp with time zone
);
    DROP TABLE public.usuarios;
       public         heap r       postgres    false            �            1259    16695    usuarios_id_seq    SEQUENCE     �   CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.usuarios_id_seq;
       public               postgres    false    228            w           0    0    usuarios_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;
          public               postgres    false    227            ]           2604    16618 
   aliados id    DEFAULT     h   ALTER TABLE ONLY public.aliados ALTER COLUMN id SET DEFAULT nextval('public.aliados_id_seq'::regclass);
 9   ALTER TABLE public.aliados ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    218    217    218            b           2604    16653    api_aliados id    DEFAULT     p   ALTER TABLE ONLY public.api_aliados ALTER COLUMN id SET DEFAULT nextval('public.api_aliados_id_seq'::regclass);
 =   ALTER TABLE public.api_aliados ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    221    222    222            `           2604    16630    apis id    DEFAULT     b   ALTER TABLE ONLY public.apis ALTER COLUMN id SET DEFAULT nextval('public.apis_id_seq'::regclass);
 6   ALTER TABLE public.apis ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    219    220    220            s           2604    16959    codigo_telefonos id    DEFAULT     z   ALTER TABLE ONLY public.codigo_telefonos ALTER COLUMN id SET DEFAULT nextval('public.codigo_telefonos_id_seq'::regclass);
 B   ALTER TABLE public.codigo_telefonos ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    248    249    249            u           2604    16977    dispositivo_aliados id    DEFAULT     �   ALTER TABLE ONLY public.dispositivo_aliados ALTER COLUMN id SET DEFAULT nextval('public.dispositivo_aliados_id_seq'::regclass);
 E   ALTER TABLE public.dispositivo_aliados ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    251    250    251            p           2604    16783    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    244    245    245            o           2604    16766    jobs id    DEFAULT     b   ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);
 6   ALTER TABLE public.jobs ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    242    241    242            k           2604    16708    log_transacciones id    DEFAULT     z   ALTER TABLE ONLY public.log_transacciones ALTER COLUMN id SET DEFAULT nextval('public.log_transaccion_id_seq'::regclass);
 C   ALTER TABLE public.log_transacciones ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    230    229    230            l           2604    16713    log_usuarios id    DEFAULT     r   ALTER TABLE ONLY public.log_usuarios ALTER COLUMN id SET DEFAULT nextval('public.log_usuarios_id_seq'::regclass);
 >   ALTER TABLE public.log_usuarios ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    231    232    232            m           2604    16718    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    233    234    234            r           2604    16795    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    246    247    247            f           2604    16689    rol_usuarios id    DEFAULT     r   ALTER TABLE ONLY public.rol_usuarios ALTER COLUMN id SET DEFAULT nextval('public.rol_usuarios_id_seq'::regclass);
 >   ALTER TABLE public.rol_usuarios ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    225    226    226            d           2604    16666    tipo_apis id    DEFAULT     l   ALTER TABLE ONLY public.tipo_apis ALTER COLUMN id SET DEFAULT nextval('public.tipo_apis_id_seq'::regclass);
 ;   ALTER TABLE public.tipo_apis ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    223    224    224            n           2604    16725    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    235    236    236            h           2604    16699    usuarios id    DEFAULT     j   ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);
 :   ALTER TABLE public.usuarios ALTER COLUMN id DROP DEFAULT;
       public               postgres    false    227    228    228            A          0    16615    aliados 
   TABLE DATA           �   COPY public.aliados (id, nob_aliado, nro_documento, nro_celular, estatus, logo, apikey, created_at, updated_at, sw_aliado, cta_aliado, tipo_documento, id_cod_telefono, email, fec_activacion, max_vuelto) FROM stdin;
    public               postgres    false    218   ��       E          0    16650    api_aliados 
   TABLE DATA           m   COPY public.api_aliados (id, id_api, id_aliado, estatus, fec_afiliacion, created_at, updated_at) FROM stdin;
    public               postgres    false    222   ��       C          0    16627    apis 
   TABLE DATA           c   COPY public.apis (id, nob_api, estatus, created_at, updated_at, id_tipo_api, desc_api) FROM stdin;
    public               postgres    false    220   J�       V          0    16748    cache 
   TABLE DATA           7   COPY public.cache (key, value, expiration) FROM stdin;
    public               postgres    false    239   �       W          0    16755    cache_locks 
   TABLE DATA           =   COPY public.cache_locks (key, owner, expiration) FROM stdin;
    public               postgres    false    240   5�       `          0    16956    codigo_telefonos 
   TABLE DATA           ]   COPY public.codigo_telefonos (id, cod_telefono, estatus, created_at, updated_at) FROM stdin;
    public               postgres    false    249   R�       b          0    16974    dispositivo_aliados 
   TABLE DATA              COPY public.dispositivo_aliados (id, id_aliado, mac_dispositivo, des_dispositivo, estatus, created_at, updated_at) FROM stdin;
    public               postgres    false    251   ��       \          0    16780    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public               postgres    false    245   Ȩ       Z          0    16772    job_batches 
   TABLE DATA           �   COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
    public               postgres    false    243   �       Y          0    16763    jobs 
   TABLE DATA           c   COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
    public               postgres    false    242   �       M          0    16705    log_transacciones 
   TABLE DATA           �   COPY public.log_transacciones (id, id_aliado, id_api, nro_cta_receptora, nro_cta_pagadora, monto, id_usuario, lote, id_dispositivo, fec_transaccion, created_at, updated_at) FROM stdin;
    public               postgres    false    230   �       O          0    16710    log_usuarios 
   TABLE DATA           P   COPY public.log_usuarios (id, id_usuario, fec_operacion, operacion) FROM stdin;
    public               postgres    false    232   <�       Q          0    16715 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public               postgres    false    234   Y�       T          0    16732    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public               postgres    false    237   ѩ       ^          0    16792    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public               postgres    false    247   �       I          0    16686    rol_usuarios 
   TABLE DATA           T   COPY public.rol_usuarios (id, nob_rol, estatus, created_at, updated_at) FROM stdin;
    public               postgres    false    226   �       U          0    16739    sessions 
   TABLE DATA           _   COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
    public               postgres    false    238   t�       G          0    16663 	   tipo_apis 
   TABLE DATA           V   COPY public.tipo_apis (id, nob_tipo_api, estatus, created_at, updated_at) FROM stdin;
    public               postgres    false    224   ��       S          0    16722    users 
   TABLE DATA           u   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public               postgres    false    236   ��       K          0    16696    usuarios 
   TABLE DATA           �   COPY public.usuarios (id, nob_usuario, ape_usuario, login, password, id_rol, id_aliado, estatus, email_usuario, created_at, updated_at) FROM stdin;
    public               postgres    false    228   �       x           0    0    aliados_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.aliados_id_seq', 42, true);
          public               postgres    false    217            y           0    0    api_aliados_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.api_aliados_id_seq', 29, true);
          public               postgres    false    221            z           0    0    apis_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.apis_id_seq', 13, true);
          public               postgres    false    219            {           0    0    codigo_telefonos_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.codigo_telefonos_id_seq', 8, true);
          public               postgres    false    248            |           0    0    dispositivo_aliados_id_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.dispositivo_aliados_id_seq', 1, false);
          public               postgres    false    250            }           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public               postgres    false    244            ~           0    0    jobs_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);
          public               postgres    false    241                       0    0    log_transaccion_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.log_transaccion_id_seq', 1, false);
          public               postgres    false    229            �           0    0    log_usuarios_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public.log_usuarios_id_seq', 1, false);
          public               postgres    false    231            �           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 4, true);
          public               postgres    false    233            �           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public               postgres    false    246            �           0    0    rol_usuarios_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.rol_usuarios_id_seq', 5, true);
          public               postgres    false    225            �           0    0    tipo_apis_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.tipo_apis_id_seq', 4, true);
          public               postgres    false    223            �           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 1, false);
          public               postgres    false    235            �           0    0    usuarios_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.usuarios_id_seq', 13, true);
          public               postgres    false    227            �           2606    16761    cache_locks cache_locks_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);
 F   ALTER TABLE ONLY public.cache_locks DROP CONSTRAINT cache_locks_pkey;
       public                 postgres    false    240            �           2606    16754    cache cache_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);
 :   ALTER TABLE ONLY public.cache DROP CONSTRAINT cache_pkey;
       public                 postgres    false    239            �           2606    16962 &   codigo_telefonos codigo_telefonos_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public.codigo_telefonos
    ADD CONSTRAINT codigo_telefonos_pkey PRIMARY KEY (id);
 P   ALTER TABLE ONLY public.codigo_telefonos DROP CONSTRAINT codigo_telefonos_pkey;
       public                 postgres    false    249            �           2606    16980 ,   dispositivo_aliados dispositivo_aliados_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.dispositivo_aliados
    ADD CONSTRAINT dispositivo_aliados_pkey PRIMARY KEY (id);
 V   ALTER TABLE ONLY public.dispositivo_aliados DROP CONSTRAINT dispositivo_aliados_pkey;
       public                 postgres    false    251            �           2606    16788    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public                 postgres    false    245            �           2606    16790 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public                 postgres    false    245            �           2606    16778    job_batches job_batches_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.job_batches DROP CONSTRAINT job_batches_pkey;
       public                 postgres    false    243            �           2606    16770    jobs jobs_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.jobs DROP CONSTRAINT jobs_pkey;
       public                 postgres    false    242            �           2606    16720    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public                 postgres    false    234            �           2606    16738 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public                 postgres    false    237            �           2606    16799 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public                 postgres    false    247            �           2606    16802 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public                 postgres    false    247            �           2606    16656    api_aliados pk_id 
   CONSTRAINT     O   ALTER TABLE ONLY public.api_aliados
    ADD CONSTRAINT pk_id PRIMARY KEY (id);
 ;   ALTER TABLE ONLY public.api_aliados DROP CONSTRAINT pk_id;
       public                 postgres    false    222            x           2606    16623    aliados pk_nob_aliado 
   CONSTRAINT     [   ALTER TABLE ONLY public.aliados
    ADD CONSTRAINT pk_nob_aliado PRIMARY KEY (nob_aliado);
 ?   ALTER TABLE ONLY public.aliados DROP CONSTRAINT pk_nob_aliado;
       public                 postgres    false    218            |           2606    16633    apis pk_nob_api 
   CONSTRAINT     R   ALTER TABLE ONLY public.apis
    ADD CONSTRAINT pk_nob_api PRIMARY KEY (nob_api);
 9   ALTER TABLE ONLY public.apis DROP CONSTRAINT pk_nob_api;
       public                 postgres    false    220            �           2606    16692    rol_usuarios pk_nob_rol 
   CONSTRAINT     Z   ALTER TABLE ONLY public.rol_usuarios
    ADD CONSTRAINT pk_nob_rol PRIMARY KEY (nob_rol);
 A   ALTER TABLE ONLY public.rol_usuarios DROP CONSTRAINT pk_nob_rol;
       public                 postgres    false    226            �           2606    16669    tipo_apis pk_nob_tipo_api 
   CONSTRAINT     a   ALTER TABLE ONLY public.tipo_apis
    ADD CONSTRAINT pk_nob_tipo_api PRIMARY KEY (nob_tipo_api);
 C   ALTER TABLE ONLY public.tipo_apis DROP CONSTRAINT pk_nob_tipo_api;
       public                 postgres    false    224            �           2606    16745    sessions sessions_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.sessions DROP CONSTRAINT sessions_pkey;
       public                 postgres    false    238            �           2606    16964     codigo_telefonos uk_cod_telefono 
   CONSTRAINT     c   ALTER TABLE ONLY public.codigo_telefonos
    ADD CONSTRAINT uk_cod_telefono UNIQUE (cod_telefono);
 J   ALTER TABLE ONLY public.codigo_telefonos DROP CONSTRAINT uk_cod_telefono;
       public                 postgres    false    249            ~           2606    16635 
   apis uk_id 
   CONSTRAINT     C   ALTER TABLE ONLY public.apis
    ADD CONSTRAINT uk_id UNIQUE (id);
 4   ALTER TABLE ONLY public.apis DROP CONSTRAINT uk_id;
       public                 postgres    false    220            �           2606    16694    rol_usuarios uk_id_rol 
   CONSTRAINT     O   ALTER TABLE ONLY public.rol_usuarios
    ADD CONSTRAINT uk_id_rol UNIQUE (id);
 @   ALTER TABLE ONLY public.rol_usuarios DROP CONSTRAINT uk_id_rol;
       public                 postgres    false    226            �           2606    16671    tipo_apis uk_id_tipo_api 
   CONSTRAINT     Q   ALTER TABLE ONLY public.tipo_apis
    ADD CONSTRAINT uk_id_tipo_api UNIQUE (id);
 B   ALTER TABLE ONLY public.tipo_apis DROP CONSTRAINT uk_id_tipo_api;
       public                 postgres    false    224            z           2606    16625    aliados uk_rif_aliado 
   CONSTRAINT     Y   ALTER TABLE ONLY public.aliados
    ADD CONSTRAINT uk_rif_aliado UNIQUE (nro_documento);
 ?   ALTER TABLE ONLY public.aliados DROP CONSTRAINT uk_rif_aliado;
       public                 postgres    false    218            �           2606    16731    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public                 postgres    false    236            �           2606    16729    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public                 postgres    false    236            �           1259    16771    jobs_queue_index    INDEX     B   CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);
 $   DROP INDEX public.jobs_queue_index;
       public                 postgres    false    242            �           1259    16800 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public                 postgres    false    247    247            �           1259    16747    sessions_last_activity_index    INDEX     Z   CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);
 0   DROP INDEX public.sessions_last_activity_index;
       public                 postgres    false    238            �           1259    16746    sessions_user_id_index    INDEX     N   CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);
 *   DROP INDEX public.sessions_user_id_index;
       public                 postgres    false    238            �           2606    16657    api_aliados fk_api    FK CONSTRAINT     o   ALTER TABLE ONLY public.api_aliados
    ADD CONSTRAINT fk_api FOREIGN KEY (id_api) REFERENCES public.apis(id);
 <   ALTER TABLE ONLY public.api_aliados DROP CONSTRAINT fk_api;
       public               postgres    false    220    4734    222            �           2606    16672    apis fk_id_tipo_api    FK CONSTRAINT     �   ALTER TABLE ONLY public.apis
    ADD CONSTRAINT fk_id_tipo_api FOREIGN KEY (id_tipo_api) REFERENCES public.tipo_apis(id) NOT VALID;
 =   ALTER TABLE ONLY public.apis DROP CONSTRAINT fk_id_tipo_api;
       public               postgres    false    224    220    4740            A   �   x�u��N�@F��S����aV�M�
�P���[�hS�>�h�fwfn�}�P�"��gq�&�R�DY��ʸ�*��F[ٻ��Yu�o�
mD�p���9єz������C"����[���<4��e@��i���8�Y��>ui�o���7�>ߴU\�����c��~��$%�=��4��~>^���͔�j��AhFn��K���B�^�8�ś��]є�(O����=N
:��������� 1a�      E   |   x��һC1Cњ��-�@����%�ϑ�U�% [B:�eCG:������r,����l�`Uz�7A
�p%GЕ^`*��c�O./r��M���e���λO,:��Xt^߱�qb�ys�"�3{w>�      C   �   x�}�A� E�3��jf���[4,�Y����cl����#�O��Z�A���4��;2�F�����'�0�cN��V��):�`�<�U��aX��Sc�d�'�}���B,>G׊�e��=��u�o?4�/�e2C*Bc)�?�.�����,�J�߾�%��!�զnX7
�:�����Űx�!�d�z�      V      x������ � �      W      x������ � �      `   I   x�}�A�0�7��:ǅ�NDTA��h0�g����0�yy,�!��Q$ZE�%y��)�Go�>ڷ��I&7      b      x������ � �      \      x������ � �      Z      x������ � �      Y      x������ � �      M      x������ � �      O      x������ � �      Q   h   x�e��
� �g���V���9Q����Id=8��wF��7�!�BY�Jr&��wQF��
�x���������`G��0�л��8ڑ�%�J�$�͹�Z�a�77      T      x������ � �      ^      x������ � �      I   Y   x�3�t��tt��4�4202�5 "C3+CS+#3]����X���(�e��������������E�1H�����H� (j\      U      x������ � �      G   X   x�3�N-*�L���4�4202�50�54T04�24�20�50
B�@�Fa.#� Gw��s:�;�����/8�'đd�1z\\\ 9�,�      S      x������ � �      K   �   x�u��
�0��Ϸ�����V�O.2i3����s�\��q�~�>J����c���L�'����X��ֳ>6g�1��1�D�KLS�K�X"3���0�S$�w��~�����|��	J'+��X�*�6Z��͂7m��`��Ǆ&c2sn�`�e�d�^y'�g%�x�H     