-- Create a procedure to update the MM_Grade table 
CREATE or REPLACE PROCEDURE PR_Update_MMGrade
	(P_SID Number, P_CID Char, P_Mark Number)
AS
BEGIN
	Update 	MM_Grade
	Set 	Mark = P_Mark
	Where 	SID = P_SID and 
			CID = P_CID;
-- Exception usually here
END PR_Update_MMGrade;
/

Show Errors;

-- Create a second procedure to update the MM_Grade table 
Create or Replace Procedure PR_Update_MMGrade2
	(P_SName varchar2, P_CName varchar2, P_Mark number)
AS
	V_SID 	Number(8,0);
	V_CID	Char(8);
BEGIN
	SELECT 	SID
	Into	V_SID
	From 	MM_Student
	Where 	SName = P_SName;
	
	SELECT 	CID
	Into	V_CID
	From 	MM_Course
	Where 	CName = P_CName;
	
	Update 	MM_Grade
	Set 	Mark = P_Mark
	Where 	SID = V_SID and 
			CID = V_CID;
-- Exception
END PR_Update_MMGrade2;
/
Show Errors;

-- Create a function to return the sname when passed in a SID
Create or Replace Function FN_Return_SName
	( P_SID Number )
RETURN F_SName varchar2
AS
	V_SName Varchar2(50);
BEGIN
	SELECT SName
	Into V_SName
	From MM_Student
	Where SID = P_SID;
	Return V_SName;
END FN_Return_SName;
/
Show Errors;

-- Create a function to return the student name and enrollment date when passed in a SID
Create or Replace Function FN_Get_SName_and_EDate
(P_SID Number)
Return Varchar2
As
	V_SName varchar2(50);
	V_EDate date;
	V_Output varchar(100);
Begin
	SELECT SName, EDate
	Into V_SName, V_EDate
	From MM_Student
	Where SID = P_SID;
	V_Output := 'The student ' || V_SName || ' enrolled on ' || To_Char(V_EDate, 'DD-MON-YYYY');
	Return V_Output;
End FN_Get_SName_and_EDate;
/
Show Errors;

-- Passing a course ID to return 1 of 3 strings
Create or Replace Function FN_Show_Course_Enrollments
(P_CID char)
Return Varchar2
AS
	V_CName 	varchar2(50);
	V_Output 	varchar2(75);
	V_Count		number(3, 0);
Begin
	Select 	Count(SID)
	Into	V_Count
	From	MM_Grade
	Where	CID = P_CID;
	
	Select 	CName
	Into 	V_CName
	From 	MM_Course
	Where 	CID = P_CID;
	
	V_Output := 'The course ' || V_CName;
		
	If V_Count = 0 Then
		V_Output := V_Output || ' is empty';
	ELSIF V_Count >= 1 or V_Count <= 25 Then
		V_Output := V_Output || ' has' || to_char(V_Count) || ' students';
	ELSE
		V_Output := V_Output || ' is overloaded';
	END IF;
	
	Return V_Output;
End FN_Show_Course_Enrollments;
/
Show Errors;

