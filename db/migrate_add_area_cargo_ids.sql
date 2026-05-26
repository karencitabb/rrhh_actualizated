-- Script: migrate_add_area_cargo_ids.sql
-- Agrega columnas id_areas e id_cargo a trabajadores si no existen
ALTER TABLE trabajadores
  ADD COLUMN IF NOT EXISTS id_areas INT NULL AFTER id_generos,
  ADD COLUMN IF NOT EXISTS id_cargo INT NULL AFTER id_areas;
