UPDATE FOODS SET FOODPRICE = '4' WHERE FOODID = '6';
UPDATE ORDERED_LIST SET FOODNUM = '2', ORDERPRICE = '8' WHERE OID = '1';
UPDATE FOODS SET FOODID = '3' WHERE FOODID = 1;
UPDATE FOODS SET FOODID = '1' WHERE FOODNAME = 'GLACES';
UPDATE ORDER_TABLES SET ORDERNUM = '1112' WHERE ORDERNUM = '1111';
UPDATE ORDER_TABLES SET ORDERNUM = '1111' WHERE TABLENUM = '111';


DELETE FROM ADMIN WHERE AD_NOM = '1010';
DELETE FROM ORDERED_LIST WHERE OID = '1';
DELETE FROM FOODS WHERE FOODID = '4';
DELETE FROM FOODS WHERE FOODNAME = 'COLA';
DELETE FROM ORDER_TABLES WHERE ORDERNUM = '1111';
DELETE FROM ORDER_TABLES WHERE TABLENUM = '111';


SELECT AD_PW FROM ADMIN WHERE AD_NOM='111';
SELECT * FROM FOODS WHERE FOODID = '1';
SELECT * FROM BILLS WHERE TABLENUM = '111';
SELECT SUM(BILLPRICE) FROM BILLS GROUP BY TABLENUM;
SELECT * FROM BILLS ORDER BY BILLTIME;

SELECT FOODNAME FROM ORDERED_LIST INNER JOIN FOODS ON ORDERED_LIST.FOODID = FOODS.FOODID 
WHERE FOODNUM IN
(
SELECT MAX(FOODNUM) FROM ORDERED_LIST
);
SELECT FOODTYPE FROM ORDERED_LIST INNER JOIN FOODS ON ORDERED_LIST.FOODID = FOODS.FOODID 
WHERE FOODNUM IN
(
SELECT MAX(FOODNUM) FROM ORDERED_LIST
);
SELECT FOODIMAGE FROM ORDERED_LIST INNER JOIN FOODS ON ORDERED_LIST.FOODID = FOODS.FOODID 
WHERE FOODNUM IN
(
SELECT MAX(FOODNUM) FROM ORDERED_LIST
);
SELECT FOODID FROM ORDERED_LIST INNER JOIN BILLS ON ORDERED_LIST.ORDERNUM = BILLS.ORDERNUM WHERE SERVICESTATE='0';
SELECT COUNT(ORDERED_LIST.TABLENUM) FROM ORDERED_LIST LEFT OUTER JOIN BILLS ON ORDERED_LIST.ORDERNUM = BILLS.ORDERNUM  WHERE PAYSTATE IS NULL GROUP BY ORDERED_LIST.ORDERNUM;


SELECT FOODNAME FROM ORDERED_LIST INNER JOIN FOODS ON ORDERED_LIST.FOODID = FOODS.FOODID INNER JOIN BILLS ON ORDERED_LIST.ORDERNUM = BILLS.ORDERNUM WHERE SERVICESTATE = '0';
SELECT FOODTYPE FROM ORDERED_LIST INNER JOIN FOODS ON ORDERED_LIST.FOODID = FOODS.FOODID INNER JOIN BILLS ON ORDERED_LIST.ORDERNUM = BILLS.ORDERNUM WHERE SERVICESTATE = '0';
SELECT FOODIMAGE FROM ORDERED_LIST INNER JOIN FOODS ON ORDERED_LIST.FOODID = FOODS.FOODID INNER JOIN BILLS ON ORDERED_LIST.ORDERNUM = BILLS.ORDERNUM WHERE SERVICESTATE = '0';
SELECT FOODNAME FROM ORDERED_LIST INNER JOIN FOODS ON ORDERED_LIST.FOODID = FOODS.FOODID INNER JOIN BILLS ON ORDERED_LIST.ORDERNUM = BILLS.ORDERNUM WHERE PAYSTATE = '0';
SELECT SUM(BILLS.BILLPRICE) FROM ORDERED_LIST LEFT OUTER JOIN BILLS ON ORDERED_LIST.ORDERNUM = BILLS.ORDERNUM  LEFT OUTER JOIN FOODS ON ORDERED_LIST.FOODID = FOODS.FOODID GROUP BY FOODS.FOODID;
