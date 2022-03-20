-- Lab1A Question 1 Table Creation
-- Table Drops
Drop Table Invoice_Item;
Drop Table Invoice;
Drop Table Item;
Drop Table Registration;
Drop Table Registration_Status;
Drop Table Customer;
Drop Table Room;
Drop Table Customer_Source;
Drop Table Room_Type;

CREATE TABLE Customer_Source (
	Customer_Source_Code		Char(1)
		Constraint PK_Customer_Source_Customer_Source_Code primary key
		Constraint NN_Customer_Source_Customer_Source_Code not null,
	Customer_Source_Description	Varchar2(30)
		Constraint NN_Customer_Source_Customer_Source_Description not null
);

CREATE TABLE Customer (
	Customer_Code	Char(4)		
		Constraint PK_Customer_Customer_Code Primary Key
		Constraint CK_Customer_Customer_Code Check (REGEXP_LIKE(Customer_Code, '^[A-Z][A-Z][A-Z][0-9]$'))
		Constraint NN_Customer_Customer_Code not null,
	Last_Name		Varchar2(20)
		Constraint NN_Customer_Last_Name not null,
	First_Name		Varchar2(15)
		Constraint NN_Customer_First_Name not null,
	Street_Address	Varchar2(40)
		Constraint NN_Customer_Street_Address not null,
	City			Varchar2(35)
		Constraint NN_Customer_City not null,
	Province		Char(2)
		Default 'AB'
		Constraint CK_Customer_Province Check (REGEXP_LIKE(Province, '^[A-Z][A-Z]$'))
		Constraint NN_Customer_Province not null,
	Postal_Code		Varchar2(7)	
		Constraint NN_Customer_Postal_Code not null,
	Area_Code		Number(3,0)
		Constraint NL_Customer_Area_Code null,
	Phone_Number	Number(10,0)
		Constraint NN_Customer_Phone_Number not null,
	Credit_Card_Number	Varchar2(16)
		Default 'Null'
		Constraint NL_Customer_Credit_Card_Number null,
	Customer_Source_Code	Char(1)
		Constraint NN_Customer_Customer_Source_Code not null,   
    Constraint FK_Customer_Source 
    Foreign Key (Customer_Source_Code) 
    References Customer_Source(Customer_Source_Code)
);

CREATE TABLE Room_Type (
	Room_Type_Code			Char(1)
		Constraint PK_Room_Type_Room_Type_Code primary key
		Constraint NN_Room_Type_Room_Type_Code not null,
	Room_Type_Description	Varchar2(35)
		Constraint NN_Room_Type_Room_Type_Description not null
);

CREATE TABLE Room (
	Room_Number		Number(3,0)
		Constraint PK_Room_Room_Number primary key
		Constraint NN_Room_Room_Number not null,
	Smoking_SN		Char(1)
		Default 'N'
		Constraint CK_Room_Smoking_SN Check (Smoking_SN in ('S', 'N'))
		Constraint NN_Room_Smoking_SN not null,
	Pet_Status		Char(1)
		Default 'A'
		Constraint CK_Room_Pet_Status Check (Pet_Status in ('N', 'D', 'C', 'A'))
		Constraint NN_Room_Pet_Status not null,
	Room_Rate		Number(6,2)
		Default '0'
		Constraint CK_Room_Room_Rate Check (Room_Rate >= 0)
		Constraint NN_Room_Room_Rate not null,
	Room_Type_Code	Char(1)
		Constraint NN_Room_Room_Type_Code not null,
	Constraint FK_Room_Type
	Foreign key (Room_Type_Code)
    References Room_Type(Room_Type_Code)
);

CREATE TABLE Registration_Status (
	Registration_Status_Code		Char(1)
		Constraint PK_Registration_Status_Registration_Status_Code primary key
		Constraint NN_Registration_Status_Registration_Status_Code not null,
	Registration_Status_Descriptor	Varchar2(20)
		Constraint NN_Registration_Status_Registration_Status_Descriptor not null
);

CREATE TABLE Registration (
	Registration_Number			Number(6,0)
		Constraint PK_Registration_Registration_Number primary key
		Constraint NN_Registration_Registration_Number not null,
	Room_Number					Number(3,0)
		Constraint NN_Registration_Room_Number not null,
	Constraint FK_Room
	Foreign key (Room_Number)
	References Room (Room_Number),
	Arrival_Date 				Date
		Default sysdate
		Constraint CK_Registration_Arrival_Date Check (Arrival_Date > To_Date('01-Jan-2018 00:00:00', 'DD-Mon-YYYY HH24:MI:SS'))
		Constraint NN_Registration_Arrival_Date not null,
	Departure_Date				Date
		Default sysdate
		Constraint CK_Registration_Departure_Date Check (Departure_Date > To_Date('01-Jan-2018 00:00:00', 'DD-Mon-YYYY HH24:MI:SS'))
		Constraint NN_Registration_Departure_Date not null,
	Constraint CK_Registration_Departure_Date_After_Arrival Check (Departure_Date >= Arrival_Date),
	Customer_Code				Char(4)
		Constraint CK_Registration_Customer_Code Check (REGEXP_LIKE(Customer_Code, '^[A-Z][A-Z][A-Z][0-9]$'))		
		Constraint NN_Registration_Customer_Code not null,
	Constraint FK_Customer
	Foreign key (Customer_Code)
	References Customer(Customer_Code),
	Registration_Status_Code	Char(1)
		Constraint NN_Registration_Registration_Status_Code not null,
	Constraint FK_Registration_Status
	Foreign key (Registration_Status_Code)
	References Registration_Status(Registration_Status_Code),
	Total_Cost					Number(12,2)
		Default '0'
		Constraint CK_Registration_Total_Cost Check (Total_Cost >= 0)
		Constraint NL_Registration_Total_Cost null,
	Total_Price					Number(12,2)
		Default '0'
		Constraint CK_Registration_Total_Price Check (Total_Price >= 0)
		Constraint NL_Registration_Total_Price null
);

CREATE TABLE Invoice (
	Invoice_Number		Number(6,0)
		Constraint PK_Invoice_Invoice_Number primary key
		Constraint NN_Invoice_Invoice_Number not null,
	Registration_Number	Number(6,0)
		Constraint NN_Invoice_Registration_Number not null,
	Constraint FK_Registration
	Foreign key (Registration_Number)
	References Registration(Registration_Number),
	Invoice_Date		date
		Default sysdate
		Constraint NN_Invoice_Invoice_Date not null,
    Constraint CK_Invoice_Invoice_Date Check (Invoice_Date > To_Date('01-Jan-2018 00:00:00', 'DD-Mon-YYYY HH24:MI:SS')),
	Paid_YN				Char(1)
		Constraint CK_Invoice_Paid_YN Check (Paid_YN in ('Y', 'N'))
		Constraint NL_Invoice_Paid_YN null,
	Invoice_GST			Number(9,2)
		Default '0'
		Constraint CK_Invoice_Invoice_GST Check (Invoice_GST >= 0)
		Constraint NN_Invoice_Invoice_GST not null,
	Invoice_Total		Number(10,2)
		Default '0'
		Constraint CK_Invoice_Invoice_Total Check (Invoice_Total >= 0)
		Constraint NN_Invoice_Invoice_Total not null	
);

CREATE TABLE Item (
	Item_Number			Number(4,0)
		Constraint PK_Item_Item_Number primary key
		Constraint NN_Item_Item_Number not null,
	Item_Description	Varchar2(45)
		Constraint NN_Item_Item_Description not null,
	Current_Cost		Number(5,2)
		Default '0'
		Constraint CK_Item_Current_Cost Check (Current_Cost >= 0)
		Constraint NL_Item_Current_Cost null,
	Current_Price		Number(5,2)
		Default '0'
		Constraint CK_Item_Current_Price Check (Current_Price >= 0)
		Constraint NL_Item_Current_Price null,
	Discount			Number(3,0)
		Constraint CK_Item_Discount Check (Discount >= 0 AND Discount <= 100)
		Constraint NL_Item_Discount null
);

CREATE TABLE Invoice_Item (
	Invoice_Number		Number(6,0)
		Constraint NN_Invoice_Item_Invoice_Number not null,
	Constraint FK_Invoice
	Foreign key (Invoice_Number)
	References Invoice(Invoice_Number),
	Item_Number			Number(4,0)
		Constraint NN_Invoice_Item_Item_Number not null,
	Constraint FK_Item
	Foreign key (Item_Number)
	References Item(Item_Number),
	Primary Key (Invoice_Number, Item_Number),
	Quantity_Sold		Number(5,0)
		Default '1'
		Constraint NN_Invoice_Item_Quantity_Sold not null,
	Selling_Cost		Number(5,2)
		Default '0'
		Constraint CK_Invoice_Item_Selling_Cost Check (Selling_Cost >= 0)
		Constraint NN_Invoice_Item_Selling_Cost not null,
	Selling_Price		Number(5,2)
		Default '0'
		Constraint CK_Invoice_Item_Selling_Price Check (Selling_Price >= 0)
		Constraint NN_Invoice_Item_Selling_Price not null
);

-- Lab1A Question 2 Sequence Creation
Create Sequence Seq_Registration
Start with 50
Increment by 1
NOCACHE;

Create Sequence Seq_Invoice
Start with 12100
Increment by 10
NOCACHE;

Create Sequence Seq_Item
Start with 750
Increment by 1
NOCACHE;

Create Sequence Seq_Room
Start with 35
Increment by 5
NOCACHE;