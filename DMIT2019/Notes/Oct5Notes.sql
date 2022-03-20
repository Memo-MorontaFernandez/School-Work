-- create a database trigger to disallow old IST courses
Create or Replace Trigger TR_BIUR_MMGRADE_No_IST_Courses
Before Insert Or Update Of CID
On MM_Grade
For Each Row
Begin
	If Upper(Substr(:new.CID, 1, 3)) = 'IST' Then
		RAISE_APPLICATION_ERROR(-20010, 'IST Courses are no longer valid');
	-- Else
	End If;
End TR_BIUR_MMGRADE_No_IST_Courses;
/ 
Show Errors;