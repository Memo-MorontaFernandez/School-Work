-- q3.
Create or Replace Procedure PR_Q3
authid current_user
As
cursor C_Populate_AC    IS SELECT area_code, postal_code ,phone_number
                        From Customer;
                        -- Where area_code is null;
      V_AC      Number(3,0);   -- Area Code
      -- V_province char(2) -- province
	  V_PC      Varchar2(7);   -- Postal Code 
      V_PN      Number(10,0);  -- Original Phone Number
Begin
    Open C_Populate_AC;
    Fetch C_Populate_AC Into V_AC, V_PC, V_PN;
    While C_Populate_AC%Found Loop
	-- If v_province != 'AB' for non alberta regions
	-- Only use one update at the end
	-- Update Customer
	-- Set Area_Code = V_AC
	-- Where Customer_Code = V_CC
	-- Instead of update into the if, just set V_AC with it's new value 	
        If REGEXP_LIKE(V_PC, '(*)[A-Z][6-9]$') then
            Update Customer 
            SET area_code = 587, phone_number = 587 || V_PN
            Where postal_code = V_PC;
        Elsif REGEXP_LIKE(V_PC, '(*)[A-Z][0-3]$') then
            Update Customer 
            SET area_code = 825, phone_number = 825 || V_PN
            Where postal_code = V_PC;
        Elsif REGEXP_LIKE(V_PC, '^[0-9][0-9][0-9][0-9][0-9]$') then
            Update Customer 
            SET area_code = 555, phone_number = 555 || V_PN
            Where postal_code = V_PC;
        Elsif REGEXP_LIKE(V_PC, '^T[5-9]') then
            Update Customer 
            SET area_code = 780, phone_number = 780 || V_PN
            Where postal_code = V_PC;
        Elsif REGEXP_LIKE(V_PC, '^T[0-4]') then
            Update Customer 
            SET area_code = 403, phone_number = 403 || V_PN
            Where postal_code = V_PC;
    End If;
    Fetch C_Populate_AC Into V_AC, V_PC, V_PN;
    End Loop;
    Close C_Populate_AC;
End PR_Q3;
/
Show Errors;

-- q4.

Create or Replace Package PKG_Q4
authid current_user
Is
    Function PKG_FN_Q4
        (P_first_name varchar2, P_last_name varchar2)
    Return Varchar2;
    
    Function PKG_FN_Q4
        (P_customer_code char)
    Return Varchar2;
End PKG_Q4;
/
Show Errors;

Create or Replace Package Body PKG_Q4
Is
    Function PKG_FN_Q4
        (P_first_name varchar2, P_last_name varchar2)
    Return Varchar2
    As
        V_customer_details      varchar2(100);
        V_customer_stay_count   Number(2,0);
        V_customer_code         char(4);
        E_customer_not_stayed   Exception;
    Begin
        Select  -- customer_code, first_name, last_name
        into    -- customer_code, first_name, last_name
        from    customer
        where   --upper(first_name) = upper(P_first_name) and
                -- upper(last_name) = upper(P_last_name);
        
		v_output := 'the customer ' || v_customer_code || ' ' || v_first_name ||
		' ' || v_last_name ||;
		
        Select customer_code
        into V_customer_code
        from customer
        where   first_name = P_first_name and
                last_name = P_last_name;
        
        Select Count(registration_status_code)
        into    V_customer_stay_count
        from    registration
        where   customer_code = V_customer_code; 
        
        If V_customer_stay_count = 0 then
            Raise E_customer_not_stayed;
        Elsif V_customer_stay_count = 1 then
            V_customer_details := 'Room Num, Pet Status, Customer Source, Total Charge'; 
        Elsif V_customer_stay_count > 1 then
            V_customer_details := 'Num visits, Avg stay, room service total, room charge total';
        End If;
        Exception
        When No_Data_Found then
            RAISE_APPLICATION_ERROR
            (-20123, 'No customer found.');
        When E_customer_not_stayed then
            RAISE_APPLICATION_ERROR
            (-20124, 'Customer ' || (p_first_name) || ' has not stayed');
        Return V_customer_details;
    End PKG_FN_Q4;
    
    Function PKG_FN_Q4
        (P_customer_code char)
    Return Varchar2
    As
        V_customer_details      varchar2(100);
        V_customer_stay_count   Number(2,0);
        E_customer_not_stayed   Exception;
    Begin
        Select  customer_code
        into    V_customer_details
        from    customer
        where   customer_code = P_customer_code;
        
        Select Count(registration_status_code)
        into    V_customer_stay_count
        from    registration
        where   customer_code = P_customer_code;
        
         If V_customer_stay_count = 0 then
            Raise E_customer_not_stayed;
        Elsif V_customer_stay_count = 1 then
            V_customer_details := 'Room Num, Pet Status, Customer Source, Total Charge'; 
        Elsif V_customer_stay_count > 1 then
            V_customer_details := 'Num visits, Avg stay, room service total, room charge total';
        End If;
        Exception
        When No_Data_Found then
            RAISE_APPLICATION_ERROR
            (-20123, 'No customer found.');
        When E_customer_not_stayed then
            RAISE_APPLICATION_ERROR
            (-20124, 'Customer ' || (P_customer_code) || ' has not stayed');
        Return V_customer_details;
    End PKG_FN_Q4;
End PKG_Q4;
/
Show Errors;

-- q5.
Create or Replace Trigger TR_Q5
Before Insert or Update or Delete 
On Invoice_Item
For Each Row
-- Declare
--v_new_paid
--v_old_paid
Begin
    if INSERTING THEN
	
	elsif UPDATING then
	-- update needs to check both new and old invoices
-- Exception
End TR_Q5;
/
Show Errors;
