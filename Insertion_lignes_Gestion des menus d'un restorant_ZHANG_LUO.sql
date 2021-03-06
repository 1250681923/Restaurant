
INSERT INTO ADMIN (AD_NOM, AD_PW) VALUES ('111', '111');
INSERT INTO ADMIN (AD_NOM, AD_PW) VALUES ('222', '222');
INSERT INTO ADMIN (AD_NOM, AD_PW) VALUES ('333', '333');
INSERT INTO ADMIN (AD_NOM, AD_PW) VALUES ('444', '444');
INSERT INTO ADMIN (AD_NOM, AD_PW) VALUES ('555', '555');
INSERT INTO ADMIN (AD_NOM, AD_PW) VALUES ('666', '666');
INSERT INTO ADMIN (AD_NOM, AD_PW) VALUES ('777', '777');
INSERT INTO ADMIN (AD_NOM, AD_PW) VALUES ('888', '888');
INSERT INTO ADMIN (AD_NOM, AD_PW) VALUES ('999', '999');
INSERT INTO ADMIN (AD_NOM, AD_PW) VALUES ('1010', '1010');

INSERT INTO FOODS (FOODID, FOODNAME, FOODTYPE, FOODPRICE, FOODIMAGE) VALUES ('1', 'GLACES', 'DESSERTS', '3.7', 'glaces.png');
INSERT INTO FOODS (FOODNAME, FOODTYPE, FOODPRICE, FOODIMAGE) VALUES ('POMME', 'DESSERTS', '2', 'pomme.png');
INSERT INTO FOODS (FOODNAME, FOODTYPE, FOODPRICE, FOODIMAGE) VALUES ('COLA', 'BOISSON', '2', 'cola.png');
INSERT INTO FOODS (FOODNAME, FOODTYPE, FOODPRICE, FOODIMAGE) VALUES ('EVIAN', 'BOISSON', '2', 'evian.png');
INSERT INTO FOODS (FOODNAME, FOODTYPE, FOODPRICE, FOODIMAGE) VALUES ('CHOCOLATCHAUD', 'BOISSON', '2', 'chocolatchaud.png');
INSERT INTO FOODS (FOODNAME, FOODTYPE, FOODPRICE, FOODIMAGE) VALUES ('FRITES', 'FRITES', '2', 'frites.png');
INSERT INTO FOODS (FOODNAME, FOODTYPE, FOODPRICE, FOODIMAGE) VALUES ('MACARON', 'PATISSERIE', '2', 'macaron.png');
INSERT INTO FOODS (FOODNAME, FOODTYPE, FOODPRICE, FOODIMAGE) VALUES ('MACARONCRANBERRY', 'PATISSERIE', '2', 'macaroncranberry.png');
INSERT INTO FOODS (FOODNAME, FOODTYPE, FOODPRICE, FOODIMAGE) VALUES ('DOUBLECHEESE', 'BUGGER', '2', 'doublecheese.png');
INSERT INTO FOODS (FOODNAME, FOODTYPE, FOODPRICE, FOODIMAGE) VALUES ('TRIPLECHEESE', 'BUGGER', '3', 'triplecheese.png');

INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES ('111', '1111');
INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES ('222', '2222');
INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES ('333', '3333');
INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES ('444', '4444');
INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES ('555', '5555');
INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES ('666', '6666');
INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES ('777', '7777');
INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES ('888', '8888');
INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES ('999', '9999');
INSERT INTO ORDER_TABLES (TABLENUM, ORDERNUM) VALUES ('101', '1010');

INSERT INTO ORDERED_LIST (FOODID, TABLENUM, ORDERNUM, FOODNUM, ORDERPRICE) VALUES ('1', '111', '1111', '1', '4');
INSERT INTO ORDERED_LIST (FOODID, TABLENUM, ORDERNUM, FOODNUM, ORDERPRICE) VALUES ('2', '222', '2222', '1', '2');
INSERT INTO ORDERED_LIST (FOODID, TABLENUM, ORDERNUM, FOODNUM, ORDERPRICE) VALUES ('5', '222', '2222', '1', '2');
INSERT INTO ORDERED_LIST (FOODID, TABLENUM, ORDERNUM, FOODNUM, ORDERPRICE) VALUES ('1', '333', '3333', '1', '4');
INSERT INTO ORDERED_LIST (FOODID, TABLENUM, ORDERNUM, FOODNUM, ORDERPRICE) VALUES ('1', '444', '4444', '1', '4');
INSERT INTO ORDERED_LIST (FOODID, TABLENUM, ORDERNUM, FOODNUM, ORDERPRICE) VALUES ('5', '444', '4444', '1', '2');
INSERT INTO ORDERED_LIST (FOODID, TABLENUM, ORDERNUM, FOODNUM, ORDERPRICE) VALUES ('1', '555', '5555', '1', '4');
INSERT INTO ORDERED_LIST (FOODID, TABLENUM, ORDERNUM, FOODNUM, ORDERPRICE) VALUES ('2', '555', '5555', '1', '2');
INSERT INTO ORDERED_LIST (FOODID, TABLENUM, ORDERNUM, FOODNUM, ORDERPRICE) VALUES ('5', '555', '5555', '1', '2');
INSERT INTO ORDERED_LIST (FOODID, TABLENUM, ORDERNUM, FOODNUM, ORDERPRICE) VALUES ('4', '555', '5555', '1', '2');

INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('111', '1111', '4', TO_TIMESTAMP('2020-08-08 00:49:02.073000000', 'YYYY-MM-DD HH24:MI:SS.FF'), '1', '1');
INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('222', '2222', '4', TO_TIMESTAMP('2020-08-08 00:49:02.073000000', 'YYYY-MM-DD HH24:MI:SS.FF'), '1', '1');
INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('333', '3333', '4', TO_TIMESTAMP('2020-08-08 00:49:02.073000000', 'YYYY-MM-DD HH24:MI:SS.FF'), '1', '1');
INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('444', '4444', '6', TO_TIMESTAMP('2020-08-08 00:49:02.073000000', 'YYYY-MM-DD HH24:MI:SS.FF'), '1', '1');
INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('555', '5555', '10', TO_TIMESTAMP('2020-08-08 00:49:02.073000000', 'YYYY-MM-DD HH24:MI:SS.FF'), '1', '1');

DELETE FROM BILLS WHERE BILLID = '1';
DELETE FROM BILLS WHERE BILLID = '2';
DELETE FROM BILLS WHERE BILLID = '3';
DELETE FROM BILLS WHERE BILLID = '4';
DELETE FROM BILLS WHERE BILLID = '5';
ALTER TABLE BILLS modify (BILLTIME VARCHAR2(30));
INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('111', '1111', '4', '2012-03-22 23:00:00', '1', '1');
INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('222', '2222', '4', '2012-03-22 23:00:00', '1', '1');
INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('333', '3333', '4', '2012-03-22 23:00:00', '1', '1');
INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('444', '4444', '6', '2012-03-22 23:00:00', '1', '1');
INSERT INTO BILLS (TABLENUM, ORDERNUM, BILLPRICE, BILLTIME, SERVICESTATE, PAYSTATE) VALUES ('555', '5555', '10','2012-03-22 23:00:00', '1', '1');