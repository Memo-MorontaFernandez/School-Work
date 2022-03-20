-- Delete all old records

Delete From Invoice_Item;
Delete From Invoice;
Delete From Item;
Delete From Registration;
Delete From Registration_Status;
Delete From Customer;
Delete From Room;
Delete From Customer_Source;
Delete From Room_Type;


-- Insert Into Customer_Source table

Insert Into Customer_Source
	(Customer_Source_Code, Customer_Source_Description)
Values
	('C', 'Customer Referral');

Insert Into Customer_Source
	(Customer_Source_Code, Customer_Source_Description)
Values
	('N', 'Newspaper');

Insert Into Customer_Source
	(Customer_Source_Code, Customer_Source_Description)
Values
	('R', 'Radio');

Insert Into Customer_Source
	(Customer_Source_Code, Customer_Source_Description)
Values
	('T', 'Television');

Insert Into Customer_Source
	(Customer_Source_Code, Customer_Source_Description)
Values
	('I', 'Internet');

Insert Into Customer_Source
	(Customer_Source_Code, Customer_Source_Description)
Values
	('Y', 'Yellow Pages');


-- Insert Into Customer table

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('BAR0', 'Barkley', 'Chuck', '300 Oak St', 'Three Hills', 'AB', 'T1P 2T0', '450467891234', 'I', 7873112, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('BRA0', 'Bradley', 'John', '9606 134 Ave', 'Edmonton', 'AB', 'T5Z 3U4', null, 'I', 4556622, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('ALI0', 'Alinowski', 'Josephine', '17 3rd Ave', 'New York', 'NY', '10235', '955512345678', 'T', 6679449, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('ALI1', 'Alison', 'Peter', '19 Maple St', 'Modesto', 'CA', '95869', '305677889988', 'T', 5551236, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('MAS0', 'Mason', 'George', '10222 102 ST', 'Edmonton', 'AB', 'T5P 1W1', null, 'N', 4668822, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('BUF0', 'Buffet', 'James', '123 195 AVE N.E.', 'Calgary', 'AB', 'T2Y 4R5', '450454327896', 'N', 2226699, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('CAR0', 'Carter', 'Joe', '10110 101 ST N.E.', 'Calgary', 'AB', 'T2C 3E4', null, 'R', 2884545, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('SMI0', 'Smith', 'Tom', '15 Elm Road', 'Victoria', 'BC', 'V6T 7U8', '450412345678', 'R', 4463210, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('JAM0', 'James', 'Mary', '1313 Mocking Bird St', 'Eugene', 'OR', '91827', null, 'Y', 6679632, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('JON0', 'Jones', 'James', '15 Red Road', 'Red Deer', 'AB', 'T4Y 7T7', '450466677788', 'Y', 3526974, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('SAM0', 'Sampson', 'Joseph', '1234 109 Ave', 'Edmonton', 'AB', 'T5Z 2T8', null, 'T', 9099009, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('ROB0', 'Robertson', 'Bill', '45 167 St', 'Leduc', 'AB', 'T8Y 5T0', null, 'T', 6758945, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('GUN0', 'Gunn', 'Lorne', '125 Oakway Park', 'Edmonton', 'AB', 'T6Y 4R5', '450412123434', 'N', 9982654, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('BRE0', 'Breslin', 'James', 'C5 180 80 St. S.W.', 'Calgary', 'AB', 'T3R 4R5', '450455448867', 'N', 2678913, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('WHO0', 'Whomack', 'Joe', '111 11 St.', 'High River', 'AB', 'T1K 1Q0', '450476859403', 'C', 2558866, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('SMI1', 'Smith', 'Mary', 'PO BOX 34, RR252', 'Edmonton', 'AB', 'T6Y 8J0', '450411112222', 'C', 4569873, null);

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('JON1', 'Jones', 'Toni', '27 Red Road', 'Red Deer', 'AB', 'T7B 8M9', null, 'C', 8855992, null);


-- Insert Into Room_Type

Insert Into Room_Type
	(Room_Type_Code, Room_Type_Description)
Values
	('A', 'Double');

Insert Into Room_Type
	(Room_Type_Code, Room_Type_Description)
Values
	('C', '2 Double');

Insert Into Room_Type
	(Room_Type_Code, Room_Type_Description)
Values
	('D', '2 Queen');

Insert Into Room_Type
	(Room_Type_Code, Room_Type_Description)
Values
	('E', 'Suite');

Insert Into Room_Type
	(Room_Type_Code, Room_Type_Description)
Values
	('F', 'Kitchenette');

Insert Into Room_Type
	(Room_Type_Code, Room_Type_Description)
Values
	('G', 'President''s Suite');

Insert Into Room_Type
	(Room_Type_Code, Room_Type_Description)
Values
	('B', 'Queen');

Insert Into Room_Type
	(Room_Type_Code, Room_Type_Description)
Values
	('O', 'Other');


-- Insert Into Room

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(7, 'N', 'N', 121.95, 'C');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(8, 'N', 'N', 121.95, 'C');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(9, 'N', 'A', 199.00, 'F');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(1, 'S', 'A', 121.95, 'C');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(2, 'S', 'D', 114.50, 'B');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(3, 'N', 'C', 136.95, 'D');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(4, 'S', 'A', 136.95, 'D');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(10, 'S', 'N', 249.00, 'E');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(11, 'N', 'D', 136.95, 'D');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(12, 'N', 'N', 136.95, 'D');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(5, 'N', 'C', 121.95, 'C');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(6, 'N', 'D', 121.95, 'C');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(31, 'N', 'N', 111.50, 'A');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(32, 'N', 'N', 111.50, 'A');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(33, 'N', 'N', 111.50, 'A');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(34, 'S', 'N', 299.00, 'G');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(0, 'S', 'A', 0.00, 'O');


-- Insert Into Registration_Status

Insert Into Registration_Status
	(Registration_Status_Code, Registration_Status_Descriptor)
Values
	('N', 'No Show');

Insert Into Registration_Status
	(Registration_Status_Code, Registration_Status_Descriptor)
Values
	('R', 'Reserved');

Insert Into Registration_Status
	(Registration_Status_Code, Registration_Status_Descriptor)
Values
	('P', 'Paid');

Insert Into Registration_Status
	(Registration_Status_Code, Registration_Status_Descriptor)
Values
	('C', 'Cancelled');

Insert Into Registration_Status
	(Registration_Status_Code, Registration_Status_Descriptor)
Values
	('L', 'Late Cancelled');

Insert Into Registration_Status
	(Registration_Status_Code, Registration_Status_Descriptor)
Values
	('O', 'Outstanding');


-- Insert Into Registration

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(7, 2, To_Date('20-Jun-2020 13:09:02', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('25-Jun-2020 14:08:54', 'DD-Mon-YYYY HH24:MI:SS'), 'BUF0', 'P', 400.75, 601.13); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(8, 7, To_Date('11-Aug-2020 09:23:27', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('13-Aug-2020 14:06:40', 'DD-Mon-YYYY HH24:MI:SS'), 'CAR0', 'O', 170.74, 256.10); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(9, 33, To_Date('20-Jul-2020 14:22:36', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('28-Jul-2020 12:02:10', 'DD-Mon-YYYY HH24:MI:SS'), 'GUN0', 'P', 624.40, 936.60); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(10, 5, To_Date('25-Jun-2020 18:41:50', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('26-Jun-2020 12:32:07', 'DD-Mon-YYYY HH24:MI:SS'), 'JAM0', 'P', 85.37, 128.05); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(11, 5, To_Date('05-Aug-2020 13:51:10', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('07-Aug-2020 12:06:10', 'DD-Mon-YYYY HH24:MI:SS'), 'JON0', 'C', 170.74, 256.10); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(12, 34, To_Date('10-Aug-2020 10:21:25', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('13-Aug-2020 19:48:57', 'DD-Mon-YYYY HH24:MI:SS'), 'JON1', 'P', 627.90, 941.85); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(2, 34, To_Date('10-Jun-2020 11:27:12', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('13-Jun-2020 12:55:38', 'DD-Mon-YYYY HH24:MI:SS'), 'ALI1', 'P', 627.90, 941.85); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(3, 12, To_Date('11-Aug-2020 16:45:16', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('13-Aug-2020 11:27:35', 'DD-Mon-YYYY HH24:MI:SS'), 'ALI0', 'P', 191.74, 287.60); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(5, 5, To_Date('26-May-2020 12:06:41', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('31-May-2020 13:58:55', 'DD-Mon-YYYY HH24:MI:SS'), 'BRA0', 'P', 426.85, 640.24); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(6, 1, To_Date('05-Jun-2020 15:27:16', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('07-Jun-2020 11:35:16', 'DD-Mon-YYYY HH24:MI:SS'), 'BRE0', 'P', 170.74, 256.10); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(13, 11, To_Date('11-Aug-2020 17:11:20', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('13-Aug-2020 16:17:56', 'DD-Mon-YYYY HH24:MI:SS'), 'MAS0', 'P', 191.74, 287.60); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(14, 11, To_Date('20-Jul-2020 09:14:44', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('25-Jul-2020 17:50:47', 'DD-Mon-YYYY HH24:MI:SS'), 'ROB0', 'O', 479.35, 718.99); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(15, 6, To_Date('26-Jul-2020 14:44:28', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('31-Jul-2020 17:47:30', 'DD-Mon-YYYY HH24:MI:SS'), 'SAM0', 'P', 426.85, 640.24); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(16, 1, To_Date('05-Aug-2020 18:10:29', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('07-Aug-2020 18:41:31', 'DD-Mon-YYYY HH24:MI:SS'), 'SMI0', 'P', 170.74, 256.10); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(17, 3, To_Date('10-Aug-2020 12:35:57', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('13-Aug-2020 10:19:04', 'DD-Mon-YYYY HH24:MI:SS'), 'ALI1', 'N', 287.61, 431.39); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(18, 4, To_Date('11-Aug-2020 14:56:38', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('13-Aug-2020 08:34:12', 'DD-Mon-YYYY HH24:MI:SS'), 'BRA0', 'P', 191.74, 287.60); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(20, 8, To_Date('26-Jul-2020 13:17:39', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('31-Jul-2020 11:33:34', 'DD-Mon-YYYY HH24:MI:SS'), 'BRE0', 'P', 426.85, 640.24); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(21, 1, To_Date('04-Aug-2021 11:26:27', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('06-Aug-2021 17:58:05', 'DD-Mon-YYYY HH24:MI:SS'), 'BRE0', 'R', 185.00, 274.72); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(22, 34, To_Date('09-Aug-2021 10:04:48', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('12-Aug-2021 15:34:35', 'DD-Mon-YYYY HH24:MI:SS'), 'ALI1', 'C', 627.90, 941.85); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(23, 12, To_Date('10-Aug-2021 18:35:52', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('12-Aug-2021 13:56:48', 'DD-Mon-YYYY HH24:MI:SS'), 'ALI0', 'R', 199.81, 297.08); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(25, 5, To_Date('24-Apr-2021 19:40:06', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('29-Apr-2021 19:38:37', 'DD-Mon-YYYY HH24:MI:SS'), 'WHO0', 'O', 509.35, 758.36); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(26, 1, To_Date('04-May-2021 19:05:35', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('06-May-2021 13:11:38', 'DD-Mon-YYYY HH24:MI:SS'), 'SMI0', 'O', 170.74, 256.10); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(28, 11, To_Date('10-Aug-2021 11:19:28', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('12-Aug-2021 16:07:02', 'DD-Mon-YYYY HH24:MI:SS'), 'MAS0', 'R', 191.74, 287.60); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(29, 11, To_Date('19-Jul-2021 19:18:18', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('24-Jul-2021 09:18:51', 'DD-Mon-YYYY HH24:MI:SS'), 'CAR0', 'R', 479.35, 718.99); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(43, 8, To_Date('06-Aug-2021 17:01:43', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('07-Aug-2021 16:31:09', 'DD-Mon-YYYY HH24:MI:SS'), 'GUN0', 'C', 85.37, 128.05); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(44, 10, To_Date('17-Aug-2021 19:01:36', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('21-Aug-2021 18:24:16', 'DD-Mon-YYYY HH24:MI:SS'), 'WHO0', 'R', Null, Null); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(45, 1, To_Date('26-Aug-2021 17:15:17', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('28-Aug-2021 08:20:25', 'DD-Mon-YYYY HH24:MI:SS'), 'SMI0', 'R', Null, Null); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(46, 9, To_Date('26-Aug-2021 15:23:20', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('28-Aug-2021 13:10:44', 'DD-Mon-YYYY HH24:MI:SS'), 'ALI1', 'R', Null, Null); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(30, 5, To_Date('25-May-2021 12:01:37', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('30-May-2021 12:52:44', 'DD-Mon-YYYY HH24:MI:SS'), 'BRA0', 'C', Null, Null); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(31, 1, To_Date('04-Sep-2021 15:13:16', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('06-Sep-2021 13:09:56', 'DD-Mon-YYYY HH24:MI:SS'), 'SMI1', 'R', Null, Null); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(32, 34, To_Date('09-Oct-2021 09:22:02', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('12-Oct-2021 16:29:44', 'DD-Mon-YYYY HH24:MI:SS'), 'SMI0', 'R', Null, Null); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(33, 12, To_Date('10-Sep-2021 11:36:15', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('12-Sep-2021 18:59:23', 'DD-Mon-YYYY HH24:MI:SS'), 'JAM0', 'R', 191.74, 287.60); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(34, 32, To_Date('19-Jul-2021 12:40:35', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('20-Jul-2021 14:53:39', 'DD-Mon-YYYY HH24:MI:SS'), 'ROB0', 'R', 78.05, 117.08); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(35, 2, To_Date('25-Jul-2021 09:09:43', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('30-Jul-2021 15:48:17', 'DD-Mon-YYYY HH24:MI:SS'), 'ROB0', 'R', 400.75, 601.13); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(36, 3, To_Date('04-Aug-2021 17:51:04', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('06-Aug-2021 19:16:06', 'DD-Mon-YYYY HH24:MI:SS'), 'BAR0', 'R', 191.74, 287.60); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(37, 1, To_Date('21-Jul-2020 14:46:35', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('22-Jul-2020 17:16:21', 'DD-Mon-YYYY HH24:MI:SS'), 'WHO0', 'L', 85.37, 128.05); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(38, 12, To_Date('12-Aug-2020 14:57:43', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('13-Aug-2020 09:04:23', 'DD-Mon-YYYY HH24:MI:SS'), 'WHO0', 'L', 95.87, 143.80); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(39, 12, To_Date('16-Aug-2020 12:26:03', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('17-Aug-2020 12:20:48', 'DD-Mon-YYYY HH24:MI:SS'), 'WHO0', 'N', 95.87, 143.80); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(40, 31, To_Date('24-Jun-2021 13:14:05', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('25-Jun-2021 15:45:03', 'DD-Mon-YYYY HH24:MI:SS'), 'BRE0', 'R', 78.05, 117.08); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(41, 3, To_Date('26-Jul-2021 11:16:14', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('27-Jul-2021 13:35:37', 'DD-Mon-YYYY HH24:MI:SS'), 'JAM0', 'R', 129.05, 189.99); 

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(42, 11, To_Date('16-Jun-2020 15:17:40', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('18-Jun-2020 16:18:35', 'DD-Mon-YYYY HH24:MI:SS'), 'SMI0', 'C', 53.43, 75.83); 


-- Insert Into Item

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(573, 'Coke', 0.75, 1.25, 0);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(574, 'Chocolate Cake', 2.28, 3.5, 5);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(535, 'Omelette', 3.71, 4.95, 10);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(541, 'Clubhouse Sandwich', 2.81, 4.75, 10);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(555, 'Extra Cheese', 0.56, 0.95, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(550, 'Extra Tomato', 0.49, 0.85, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(551, 'Extra Bacon', 0.65, 1.25, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(560, 'Hot Dog', 1.46, 2.25, 10);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(561, 'Extra Relish', 0.33, 0.5, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(562, 'Extra Mustard', 0.33, 0.5, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(563, 'Hamburger', 2.11, 4.25, 10);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(570, 'Red Wine', 3.89, 5.99, 20);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(600, 'White Wine', 3.89, 5.99, 20);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(601, 'Imported Beer', 3.24, 4.99, 10);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(602, 'Scrambled Eggs (2)', 3.22, 4.95, 10);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(529, 'Coffee', 1.13, 1.5, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(540, 'Fruit Juice', 1.13, 1.5, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(533, 'Cold Cereal', 1.69, 2.25, 5);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(534, 'Hot Cereal', 2.06, 2.75, 5);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(571, 'Fried Eggs (2)', 2.76, 4.25, 10);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(572, 'Extra Egg', 0.81, 1.25, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(575, 'Cheese Cake', 2.28, 3.5, 5);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(576, 'Pancakes (3)', 1.92, 2.95, 5);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(577, 'Extra Pancake', 0.81, 1.25, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(578, 'Jam', 0.33, 0.5, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(499, 'Delivery Charge', 0.65, 1, null);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(99, 'Room Charge', 1, 1, null);


-- Insert Into Invoice

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(8974, 2, To_Date('11-Jun-2020 17:28:46', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 44.85, 941.85);

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9200, 3, To_Date('11-Aug-2020 17:12:54', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 13.70, 287.60); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(8930, 5, To_Date('29-May-2020 08:06:49', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 30.49, 640.24); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(8966, 6, To_Date('05-Jun-2020 16:06:10', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 12.20, 256.10); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9100, 7, To_Date('23-Jun-2020 17:41:03', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 28.63, 601.13); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9275, 8, To_Date('11-Aug-2020 14:51:51', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 12.20, 256.10); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9000, 9, To_Date('26-Jul-2020 12:02:39', 'DD-Mon-YYYY HH24:MI:SS'), Null, 44.60, 936.60); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9500, 10, To_Date('25-Jun-2020 18:45:44', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 6.10, 128.05); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9542, 11, To_Date('05-Aug-2020 17:53:46', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 12.20, 256.10); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9562, 12, To_Date('11-Aug-2020 12:39:56', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 44.85, 941.85); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9270, 13, To_Date('11-Aug-2020 18:24:55', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 13.70, 287.60); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9300, 14, To_Date('23-Jul-2020 17:31:18', 'DD-Mon-YYYY HH24:MI:SS'), Null, 34.24, 718.99); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9499, 15, To_Date('29-Jul-2020 13:56:02', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 30.49, 640.24); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9545, 16, To_Date('05-Aug-2020 19:19:35', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 12.20, 256.10); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9566, 17, To_Date('11-Aug-2020 20:20:53', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 20.54, 431.39); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9273, 18, To_Date('11-Aug-2020 15:49:45', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 13.70, 287.60); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11665, 20, To_Date('29-Jul-2020 13:02:14', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 30.49, 640.24); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11771, 21, To_Date('04-Aug-2021 14:15:06', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 12.20, 256.10); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11891, 21, To_Date('04-Aug-2021 16:19:54', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 0.13, 2.63); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11902, 21, To_Date('04-Aug-2021 17:07:29', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 0.76, 15.99); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11801, 22, To_Date('10-Aug-2021 17:50:36', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 44.85, 941.85); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(10888, 23, To_Date('10-Aug-2021 19:09:37', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 13.70, 287.60); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(10912, 41, To_Date('26-Jul-2021 12:09:11', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 6.85, 143.80); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(10918, 23, To_Date('11-Aug-2021 13:19:20', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 0.45, 9.48); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9777, 25, To_Date('27-Apr-2021 14:51:17', 'DD-Mon-YYYY HH24:MI:SS'), Null, 30.49, 640.24); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9900, 26, To_Date('04-May-2021 19:47:40', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 12.20, 256.10); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(10900, 28, To_Date('10-Aug-2021 11:25:49', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 13.70, 287.60); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(10000, 29, To_Date('22-Jul-2021 10:07:04', 'DD-Mon-YYYY HH24:MI:SS'), Null, 34.24, 718.99); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(10910, 33, To_Date('10-Sep-2021 14:24:11', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 13.70, 287.60); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11005, 34, To_Date('19-Jul-2021 13:26:28', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 5.58, 117.08); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11555, 35, To_Date('28-Jul-2021 14:12:58', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 28.63, 601.13); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9787, 25, To_Date('27-Apr-2021 19:32:42', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 0.66, 13.90); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9792, 25, To_Date('27-Apr-2021 12:56:27', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 4.87, 102.17); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9794, 25, To_Date('27-Apr-2021 18:02:07', 'DD-Mon-YYYY HH24:MI:SS'), 'N', 0.10, 2.05); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9053, 42, To_Date('16-Jun-2020 16:33:32', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 3.39, 71.15); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9302, 42, To_Date('16-Jun-2020 15:38:45', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 0.13, 2.63); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9303, 42, To_Date('16-Jun-2020 18:04:37', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 0.10, 2.05); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9623, 41, To_Date('26-Jul-2021 15:26:24', 'DD-Mon-YYYY HH24:MI:SS'), Null, 1.43, 30.13); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11007, 41, To_Date('26-Jul-2021 20:08:44', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 0.46, 9.59); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11806, 41, To_Date('26-Jul-2021 11:57:39', 'DD-Mon-YYYY HH24:MI:SS'), 'N', 0.31, 6.47); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11920, 43, To_Date('06-Aug-2021 17:23:53', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 6.10, 128.05); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9280, 36, To_Date('04-Aug-2021 19:46:58', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 13.70, 287.60); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9600, 37, To_Date('21-Jul-2020 17:38:11', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 6.10, 128.05); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(9617, 38, To_Date('12-Aug-2020 15:37:05', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 6.85, 143.80); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(10500, 39, To_Date('16-Aug-2020 17:12:44', 'DD-Mon-YYYY HH24:MI:SS'), 'Y', 6.85, 143.80); 

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(11250, 40, To_Date('25-Jun-2021 14:16:11', 'DD-Mon-YYYY HH24:MI:SS'), Null, 5.58, 117.08); 


-- Insert Into Invoice_Item

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9566, 99, 3, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9273, 99, 2, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9900, 99, 2, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(10900, 99, 2, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(10000, 99, 5, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(10910, 99, 2, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11005, 99, 1, 78.05, 111.50); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11555, 99, 5, 80.15, 114.50); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9787, 551, 1, 0.65, 1.25); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9787, 560, 2, 1.46, 2.03); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9787, 561, 1, 0.33, 0.50); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9787, 600, 1, 3.89, 4.79); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11665, 99, 5, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11801, 99, 3, 209.30, 299.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(10888, 99, 2, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9777, 99, 5, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9792, 541, 25, 2.81, 4.28); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9794, 555, 1, 0.56, 0.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(8974, 99, 3, 209.30, 299.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9200, 99, 2, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(8930, 99, 5, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(8966, 99, 2, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9100, 99, 5, 80.15, 114.50); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9275, 99, 2, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9000, 99, 8, 78.05, 111.50); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9500, 99, 1, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9302, 499, 1, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9303, 499, 1, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9623, 499, 2, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9270, 99, 2, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9300, 99, 5, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9499, 99, 5, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9545, 99, 2, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9053, 573, 14, 0.75, 1.25); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9053, 571, 14, 2.76, 3.83); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11806, 578, 2, 0.33, 0.50); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11891, 499, 1, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11902, 499, 1, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11920, 99, 1, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(10912, 99, 1, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(10918, 535, 2, 3.71, 4.46); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9280, 99, 2, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9053, 499, 2, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9787, 499, 4, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9792, 499, 1, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9794, 499, 1, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(10918, 499, 1, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9600, 99, 1, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9617, 99, 1, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(10500, 99, 1, 95.87, 136.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9623, 541, 5, 2.81, 4.28); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11007, 533, 4, 1.69, 2.14); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11806, 575, 1, 2.28, 3.33); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11250, 99, 1, 78.05, 111.50); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11007, 499, 1, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11806, 499, 2, 0.65, 1.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11771, 99, 2, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11891, 540, 1, 1.13, 1.50); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(11902, 533, 7, 1.69, 2.14); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9542, 99, 2, 85.37, 121.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9562, 99, 3, 209.30, 299.00); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9302, 540, 1, 1.13, 1.50); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9303, 555, 1, 0.56, 0.95); 

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(9623, 534, 3, 2.06, 2.61); 

-- MAX Test records

Insert Into Customer_Source
	(Customer_Source_Code, Customer_Source_Description)
Values
	('W', 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWW');

Insert Into Customer
	(Customer_Code, Last_Name, First_Name, Street_Address, City, Province, Postal_Code, Credit_Card_Number, Customer_Source_Code, Phone_Number, Area_Code)
Values
	('WWW9', 'WWWWWWWWWWWWWWWWWWWZ', 'WWWWWWWWWWWWWWZ', 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWZ', 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWZ', 'WW', 'W0W 0W0', 'WWWWWWWWWWWWWWWZ', 'W', 9999999999, 999);

Insert Into Room_Type
	(Room_Type_Code, Room_Type_Description)
Values
	('W', 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWZ');

Insert Into Room
	(Room_Number, Smoking_SN, Pet_Status, Room_Rate, Room_Type_Code)
Values
	(999, 'S', 'D', 9999.99, 'W');

Insert Into Registration_Status
	(Registration_Status_Code, Registration_Status_Descriptor)
Values
	('W', 'WWWWWWWWWWWWWWWWWWWZ');

Insert into Registration
	(Registration_Number, Room_Number, Arrival_Date, Departure_Date, Customer_Code, Registration_Status_Code, Total_Cost, Total_Price)
Values
	(999999, 999, To_Date('31-Dec-2021 23:59:59', 'DD-Mon-YYYY HH24:MI:SS'), To_Date('31-Dec-2021 23:59:59', 'DD-Mon-YYYY HH24:MI:SS'), 'WWW9', 'R', 9999999999.99, 9999999999.99);

Insert Into Item
	(Item_Number, Item_Description, Current_Cost, Current_Price, Discount)
Values
	(9999, 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWZ', 999.99, 999.99, 10);

Insert into Invoice
	(Invoice_Number, Registration_Number, Invoice_Date, Paid_YN, Invoice_GST, Invoice_Total)
Values
	(999999, 999999, To_Date('31-Dec-2021 23:59:59', 'DD-Mon-YYYY HH24:MI:SS'), 'N', 9999999.99, 99999999.99);

Insert into Invoice_Item
	(Invoice_Number, Item_Number, Quantity_Sold, Selling_Cost, Selling_Price)
Values
	(999999, 9999, 99999, 999.99, 899.99);

commit;
