--
-- PostgreSQL database dump
--

-- Dumped from database version 13.1 (Debian 13.1-1.pgdg100+1)
-- Dumped by pg_dump version 13.1 (Debian 13.1-1.pgdg100+1)

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
-- Name: indicacao; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.indicacao (
    id SERIAL PRIMARY KEY,
    nome character varying(200) NOT NULL,
    cpf character varying(11) NOT NULL UNIQUE,
    telefone character varying(15),
    email character varying(150) UNIQUE NOT NULL,
    status_id integer DEFAULT 1
);


--
-- Name: status; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.status (
    id SERIAL PRIMARY KEY,
    descricao character varying(200) NOT NULL
);

--
-- Name: indicacao status_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.indicacao
    ADD CONSTRAINT status_id_fkey FOREIGN KEY (status_id) REFERENCES public.status(id);


--
-- INSERT STATUS
--

INSERT INTO public.status (descricao) VALUES ('INICIADA');
INSERT INTO public.status (descricao) VALUES ('EM PROCESSO');
INSERT INTO public.status (descricao) VALUES ('FINALIZADA');

--
-- PostgreSQL database dump complete
--

