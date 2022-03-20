-- Constraint Microsoft_Style 
	Check(Postal_Code LIKE '[A-Z][0-9][A-Z][0-9][A-Z][0-9]')
	
-- Constraint Oracle_Style
	Check(REGEXP_LIKE (Postal_Code, '^[A-Z][0-9][A-Z][0-9][A-Z][0-9]$'))

-- Constraint Oracle_Style