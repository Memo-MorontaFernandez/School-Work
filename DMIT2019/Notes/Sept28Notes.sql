-- Create a function to return a student's enrollment date
Create or Replace Function FN_Get_EDate
	(P_SName Varchar2)
Return Date
As
	V_EDate Date;
	V_Count Number(4,0);
BEGIN
	Select 	EDate
	Into	V_EDate
	From 	MM_Student
	Where 	SName = P_SName;
	Return	V_EDate;
EXCEPTION
	When No_Data_Found Then
		V_EDate := to_date('01-JAN-0001', 'DD-MON-YYYY');
		Return V_EDate;
	When Too_Many_Rows Then
		V_EDate := to_date('31-DEC-3000', 'DD-MON-YYYY');
		Return V_EDate;
	When Others Then
		V_EDate := to_date('31-DEC-9999', 'DD-MON-YYYY');
		Return V_EDate;
	
End FN_Get_EDate;
/
Show Errors;