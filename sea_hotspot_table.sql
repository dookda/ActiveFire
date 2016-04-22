CREATE TABLE public.sea_hotspot
(
  id SERIAL,
  latitude double precision,
  longitude double precision,
  brightness double precision,
  scan double precision,
  track double precision,
  acq_date date,
  acq_time character varying(10),
  satellite character varying(10),
  confidence double precision,
  version character varying(30),
  bright_t31 double precision,
  frp double precision,
  daynight character varying(10),
  geom geometry(Point,4326),
  CONSTRAINT sea_hotspot_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.sea_hotspot
  OWNER TO postgres;

CREATE INDEX sea_hotspot_gix ON sea_hotspot USING GIST (geom);