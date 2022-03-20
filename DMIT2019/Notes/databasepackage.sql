-- create a database package for a student function (get sname) and procedure (update grade)
Create or Replace Package PKG_Student 
IS
	Function PKG_FN_Get_SName
		(P_SID Number)
	Return Varchar2;
	
	Procedure PKG_PR_Update_Mark
		(P_SID Number, P_CID Char, P_Mark Number);
End PKG_Student;
/
Show Errors;

Create or Replace Package Body PKG_Student 
IS
	Function PKG_FN_Get_SName
		(P_SID Number)
	Return Varchar2
	AS
		V_SName Varchar2(50);
	BEGIN
		select  SName
		into	V_SName
		from	mm_student
		where	SID = P_SID;
		Return 	V_SName;
	END PKG_FN_Get_SName;
	
	Procedure PKG_PR_Update_Mark
		(P_SID Number, P_CID Char, P_Mark Number)
	AS
	BEGIN
		Update 	MM_Grade
		Set 	Mark = P_Mark
		Where 	SID = P_SID and 
				CID = P_CID;
	End PKG_PR_Update_Mark;
End PKG_Student;
/
Show Errors;
	
-- Create a package with an overloaded functions that return the enrollment date
Create or Replace Package PKG_Student
IS
	Function PKG_FN_Get_EDate
		(P_SID Number)
	Return Date;
	
	Function PKG_FN_Get_EDate
		(P_SName Varchar2)
	Return Date;
End PKG_Student;
/
Show Errors;

Create or Replace Package Body PKG_Student
IS
	Function PKG_FN_Get_EDate
		(P_SID Number)
	Return Date;
	AS
		V_EDate Date;
	Begin
		Select 	EDate
		Into 	V_EDate
		From	MM_Student
		Where	SID = P_SID;
		Return 	V_EDate;
		
	End PKG_FN_Get_EDate;
	
	Function PKG_FN_Get_EDate
		(P_SName Varchar2)
	Return Date;
	AS
		V_EDate Date;
	Begin
		Select 	EDate
		Into 	V_EDate
		From	MM_Student
		Where	SName = P_SName;
		Return 	V_EDate;
End PKG_Student;
/
Show Errors;