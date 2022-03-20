-- Create a function to return student courses and marks
Create or Replace Function FN_Get_Courses_and_Marks
	(P_SID Number)
Return Varchar2
As
	Cursor C_CourseMarks	IS SELECT	C.CName, G.Mark	
							From		MM_Course C, MM_Grade G
							Where 	C.CID = G.CID AND
									G.SID = P_SID;
		V_CName		Varchar2(50);
		V_Mark		Number(5,2);
		V_Output	Varchar2(500);
	Begin
		Open C_CourseMarks;
		Fetch C_CourseMarks Into V_CName, V_Mark;
		If C_CourseMarks%NotFound Then
			V_Output := 'The student ' || to_char(P_SID) || ' has not taken any courses';
		ELSE
			While C_CourseMarks%Found Loop
				V_Output := V_Output || V_CName || to_char(V_Mark, '999.99');
				Fetch C_CourseMarks Into V_CName, V_Mark;
			End Loop;
		End If;
		Close C_CourseMarks;
		Return V_Output;
End FN_Get_Courses_and_Marks;
/
Show Errors;

-- Create a function to return the name(s) of the student with the highest mark in a course
Create or Replace Function FN_Student_with_Highest_Mark
	(P_CID Char)
Return Varchar2 
AS
	V_SName			Varchar2(50);
	V_Output		Varchar2(250);
	V_SID			Number(8,0);
	V_Mark			Number(5,2);
	V_High_Mark		Number(5,2);
	
	Cursor C_HighestMarks	IS 	Select	SID, Mark
								From	MM_Grade
								Where	CID = P_CID;
Begin
	Open C_HighestMarks;
	Fetch C_HighestMarks INTO V_SID, V_Mark;
	If C_HighestMarks%NotFound THEN
		V_Output := 'No Students have taken this course ' || P_CID;
	Else
		Select Max(Mark)
		Into	V_High_Mark
		From	MM_Grade
		Where	CID = P_CID;
		
		While C_HighestMarks%Found Loop
			If V_Mark = V_High_Mark Then
				Select	SName
				Into	V_SName
				From 	MM_Student
				Where	SID = V_SID;
				V_Output := V_Output || V_SName;
			End If;
			Fetch C_HighestMarks Into V_SID, V_Mark;
		End Loop;
		V_Output := V_Output || to_Char(V_Mark, '999.99');
	End If;
	Close C_HighestMarks;
	Return V_Output;
End FN_Student_with_Highest_Mark;
/
Show Errors;