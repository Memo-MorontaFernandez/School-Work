-- Trigger 'Order of Firing'
-- 1. Virtual tables are populated
-- 2. Before row level trigger fires
-- 3. Data is validated for the row
-- 4. DML action for the row is done (the block of code is executed)
-- 5. After row level trigger fires
-- 6. Virtual tables are cleared

-- Create a trigger to populate the SID value with the seq value
Create or Replace Trigger TR_BIR_MMStudent_Populate_SID
Before Insert 
On MM_Student
For Each Row
Declare 
	V_SID Number(8,0);
Begin
	Select	SID_SEQ.NextVal
	Into	V_SID
	From	Dual;
	
	:new.SID := V_SID
	
End TR_BIR_MMStudent_Populate_SID;
/ 
Show Errors;
