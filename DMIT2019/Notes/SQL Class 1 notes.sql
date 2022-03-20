-- Create the MM_Student Table
Create Table MM_Student
	(
		SID	number (8,0)	Constraint PK_MMStudent_SID	Primary Key	
							Constraint NN_MMStudent_SID not null,
							
		SName varchar2 (50)	Default 'Unknown'
							Constraint NL_MMStudent_SName null,
							
		Gender	char (1)	Constraint CK_MMStudent_Gender_MFN Check (Gender In ('M', 'F', 'N'))
							Constraint NN_MMStudent_Gender not null,
		
		EDate	date		Default sysdate	
							Constraint NN_MMStudent_EDate not null
	);
