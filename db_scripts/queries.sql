--Q1. Find all the books bought on a specific range of dates (you are free to choose the range).
SELECT B.ISBN, B.Title
FROM TRANSACTION AS T, BOOK AS B
WHERE T.ISBN = B.ISBN 
	AND Date_time BETWEEN '05-01-2014' AND '05-05-2014';

--Q2. List all books from a specific publishing house (you are free to choose which house).
SELECT DISTINCT Title 
FROM BOOK 
WHERE P_House = 'Thomas & Mercer';

--Q3. Find all the books written by a specific author (you are free to choose which author).
SELECT DISTINCT Title 
FROM BOOK, AUTHOR,BOOK_AUTHOR 
WHERE BOOK.ISBN = BOOK_AUTHOR.ISBN 
	AND BOOK_AUTHOR.A_id = AUTHOR.A_id 
	AND AUTHOR.A_Name = 'Michael Lewis';

--Q4. Get a listing of books, ordered by their total ratings. 
SELECT BOOK.ISBN, BOOK.Title, ROUND(AVG(CAST(CAST (REVIEW_BOOK.Rating AS char)AS INT)),2) AS Avg_rating 
FROM BOOK LEFT OUTER JOIN REVIEW_BOOK ON (BOOK.ISBN = REVIEW_BOOK.ISBN) 
GROUP BY BOOK.ISBN 
ORDER BY Avg_rating ASC;

--Q5. Get a listing of customers, ordered (descending) by their total number of transactions. 
SELECT CUSTOMER.Username, CUSTOMER.C_Name, SUM(Quantity) AS Total_trans
FROM CUSTOMER LEFT OUTER JOIN TRANSACTION ON (CUSTOMER.Username = TRANSACTION.Username)
GROUP BY CUSTOMER.Username
ORDER BY Total_trans DESC;

--Q6. Find the total amount of purchases that were recorded during a month (you are free to choose which month).
--IF WE CONSIDER BOOKS AS SALES
SELECT COUNT(*) AS TOTAL_SALES_BOOKS, SUM(Checkout_price) AS Amount
FROM TRANSACTION
WHERE Date_time BETWEEN '04-06-2014' AND '05-05-2014';

--IF WE CONSIDER ORDERS AS SALES
SELECT MAX(Order_id) - MIN(Order_id) + 1 AS TOTAL_SALES_ORDERS, SUM(Checkout_price) AS Amount
FROM TRANSACTION
WHERE Date_time BETWEEN '04-06-2014' AND '05-05-2014';

--Q7. Compute the total amount of purchases for each week of operation. The output should be sorted by week.
--Note: The EXTRACT function gets the week of a specific date in that year.
SELECT (SELECT EXTRACT (WEEK FROM TRANSACTION.Date_time)) AS Week_no, COUNT(Transaction_id) AS Purchases, SUM(Checkout_price) AS Amount
FROM TRANSACTION
GROUP BY Week_no
ORDER BY Week_no ASC;

--Q8. Extra Credit: Find the customer with the highest number of reviews in the database.
--WE ASSUME NO. OF REVIEWS FOR BOOKS TO DISPLAY THE RESULTS

CREATE VIEW NO_OF_REVIEWS
AS SELECT C_Name, COUNT(*) AS No_of_reviews
FROM CUSTOMER LEFT OUTER JOIN REVIEW_BOOK ON (CUSTOMER.Username = REVIEW_BOOK.Username)
GROUP BY C_Name;

SELECT NR.C_Name, NR.No_of_reviews
FROM NO_OF_REVIEWS AS NR
WHERE NR.No_of_reviews >= ALL(SELECT NR.No_of_reviews FROM NO_OF_REVIEWS AS NR);
