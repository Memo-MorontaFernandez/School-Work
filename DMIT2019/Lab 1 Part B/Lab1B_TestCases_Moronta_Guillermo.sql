-- q3. test
Select area_code, postal_code, phone_number
From customer
/

Begin
    PR_Q3;
End;

Select area_code, postal_code, phone_number
From customer
/

-- q4. test

PKG_Q4.PKG_FN_Q4 ('Joe', 'Whomack');

PKG_Q4.PKG_FN_Q4 ('WHO0');

-- q5. test
Select *
From Invoice_Item, Invoice
Where Invoice_Item.Invoice_Number = 8930
/

Insert Into Invoice_Item
(invoice_number, item_number, quantity_sold, selling_cost, selling_price)
Values (8930, 99, 5, 999.99, 999.99); 

Delete From Invoice_Item
Where invoice_number = 8930;

Update Invoice_Item
SET invoice_number = '000000'
Where invoice_number = 8930;

Select *
From Invoice_Item, Invoice
Where Invoice_Item.Invoice_Number = 8930
/