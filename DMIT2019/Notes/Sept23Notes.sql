-- Create a procedure to populate new tables
Create or Replace Procedure PR_Populate_New_Tables
AS
	CURSOR C_Grades IS 	SELECT
						From	MM_Grade
						Where 	Mark < 50 or 
								Mark >= 80;
	V_SID	Number(8, 0);
	V_CID	Char(8);
	V_Mark	Number(5,2);
Begin
	Open C_Grades;
	Fetch C_Grades Into V_SID, V_CID, V_Mark;
	While C_Grades%Found Loop
		If V_Mark >= 80 then
			Insert into MM_Honours
				(SID, CID, Mark)
			Values 
				(V_SID, V_CID, V_Mark);
		ELSE
			Insert into MM_Help_Me
				(SID, CID, Mark)
			Values 
				(V_SID, V_CID, V_Mark);
		End If;
		Fetch C_Grades Into V_SID, V_CID, V_Mark;
	End Loop;
	Close C_Grades;
End PR_Populate_New_Tables;
/
Show Errors;

Create or Replace Procedure PR_Populate_New_Tables
AS
	CURSOR C_Grades IS 	SELECT
						From	MM_Grade
						Where 	Mark < 50 or 
								Mark >= 80;
	row type
Begin
	Open C_Grades;
	Fetch C_Grades Into V_SID, V_CID, V_Mark;
	While C_Grades%Found Loop
		If V_Mark >= 80 then
			Insert into MM_Honours
				(SID, CID, Mark)
			Values 
				(V_SID, V_CID, V_Mark);
		ELSE
			Insert into MM_Help_Me
				(SID, CID, Mark)
			Values 
				(V_SID, V_CID, V_Mark);
		End If;
		Fetch C_Grades Into V_SID, V_CID, V_Mark;
	End Loop;
	Close C_Grades;
End PR_Populate_New_Tables;
/
Show Errors;