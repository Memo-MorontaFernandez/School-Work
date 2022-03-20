-- Create a procedure to update the mark column on the MM_Grade TABLE
CREATE or REPLACE PROCEDURE PR_Update_MMGrade
	(P_SID Number, P_CID Char, P_Mark Number)
AS
	V_SID	NUMBER(8,0);
	E_Mark_Not_Between_0_100	Exception;
BEGIN
	If P_Mark Not Between 0 and 100 then
		Raise E_Mark_Not_Between_0_100;
	Else 
		Select 	SID
		Into 	V_SID
		From 	MM_Grade
		Where 	SID = P_SID and 
				CID = P_CID;
		-- Select query necessary to use When No_Data_Found exception		
				
		Update 	MM_Grade
		Set 	Mark = P_Mark
		Where 	SID = P_SID and 
				CID = P_CID;
	End If;
	
	EXCEPTION
	When No_Data_Found Then
		RAISE_APPLICATION_ERROR(-20123, 'No Grade record found for student ' || to_char(P_SID) || ' and course ' || P_CID);
	When E_Mark_Not_Between_0_100 Then
		RAISE_APPLICATION_ERROR(-20101, 'The mark entered was ' || to_char(P_Mark) || ' is not between 0 and 100, please try again');
	When Others Then
		RAISE_APPLICATION_ERROR(-20124, 'An unexpected error has occurred, please call tech support');
END PR_Update_MMGrade;
/
Show Errors;