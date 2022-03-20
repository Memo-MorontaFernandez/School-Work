Set Pagesize 99
Column Customer_Code Format A8 Heading "Customer|Code"
Column First_Name Format A10
Column Street_Address Format A20
Column Province Format A8 Heading "Province|State"
Column Postal_Code Format A8 Heading "Postal|Code"
Column Customer_Source_Code Format A8 Heading "Customer|Source|Code" Justify Right
Column Phone_Number Format A8 Heading "Phone|Number"
Select Customer_Code, First_Name, Street_Address, Province, Postal_Code,
lpad(Customer_Source_Code,8) Customer_Source_Code, Phone_Number
From Customer
Order By Customer_Code;