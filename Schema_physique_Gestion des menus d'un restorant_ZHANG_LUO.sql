/*==============================================================*/
/* NOM DE SGBD :  ORACLE VERSION 10GR2                          */
/* DATE DE CREATION :  2020/8/8 23:27:25                        */
/*==============================================================*/


ALTER TABLE BILLS
   DROP CONSTRAINT FK_BILLS_ASSOCIATI_ORDER_TA;

ALTER TABLE ORDERED_LIST
   DROP CONSTRAINT FK_ORDERED__ASSOCIATI_ORDER_TA;

ALTER TABLE ORDERED_LIST
   DROP CONSTRAINT FK_ORDERED__ASSOCIATI_FOODS;

DROP TABLE ADMIN CASCADE CONSTRAINTS;

DROP INDEX ASSOCIATION_4_FK;

DROP TABLE BILLS CASCADE CONSTRAINTS;

DROP TABLE FOODS CASCADE CONSTRAINTS;

DROP TABLE ORDER_TABLES CASCADE CONSTRAINTS;

DROP INDEX ASSOCIATION_3_FK;

DROP INDEX ASSOCIATION_1_FK;

DROP TABLE ORDERED_LIST CASCADE CONSTRAINTS;

/*==============================================================*/
/* TABLE : ADMIN                                              */
/*==============================================================*/
CREATE TABLE ADMIN  (
   AD_NOM             VARCHAR2(30)                             NOT NULL,
   AD_PW             VARCHAR2(30)                             NOT NULL
);

/*==============================================================*/
/* TABLE : BILLS                                              */
/*==============================================================*/
CREATE TABLE BILLS  (
   BILLID            NUMBER(4)                       NOT NULL,
   TABLENUM           NUMBER(8)                       NOT NULL,
   ORDERNUM           NUMBER(8)                       NOT NULL,
   BILLPRICE          NUMBER(8)                       NOT NULL,
   BILLTIME          TIMESTAMP                          NOT NULL,
   SERVICESTATE       NUMBER(8)                       NOT NULL,
   PAYSTATE          NUMBER(8)                       NOT NULL,
   CONSTRAINT PK_BILLS PRIMARY KEY (BILLID)
);


/*==============================================================*/
/* INDEX : ASSOCIATION_4_FK                                   */
/*==============================================================*/
CREATE INDEX ASSOCIATION_4_FK ON BILLS (
   ORDERNUM ASC
);

/*==============================================================*/
/* TABLE : FOODS                                              */
/*==============================================================*/
CREATE TABLE FOODS  (
   FOODID             NUMBER(8)                       NOT NULL,
   FOODNAME           VARCHAR2(30)                           NOT NULL,
   FOODTYPE            VARCHAR2(30)                           NOT NULL,
   FOODPRICE          NUMBER(8)                       NOT NULL,
   FOODIMAGE           VARCHAR2(30)                           NOT NULL,
   CONSTRAINT PK_FOODS PRIMARY KEY (FOODID)
);

/*==============================================================*/
/* TABLE : ORDER_TABLES                                       */
/*==============================================================*/
CREATE TABLE ORDER_TABLES  (
   TABLENUM           NUMBER(8)                       NOT NULL,
   ORDERNUM           NUMBER(8)                       NOT NULL,
   CONSTRAINT PK_ORDER_TABLES PRIMARY KEY (ORDERNUM)
);

/*==============================================================*/
/* TABLE : ORDERED_LIST                                       */
/*==============================================================*/
CREATE TABLE ORDERED_LIST  (
   OID                NUMBER(8)                       NOT NULL,
   FOODID             NUMBER(8)                       NOT NULL,
   ORDERNUM           NUMBER(8)                       NOT NULL,
   FOODNUM            NUMBER(8)                       NOT NULL,
   ORDERPRICE         NUMBER(8)                       NOT NULL,
   TABLENUM          NUMBER(8)                       NOT NULL,
   CONSTRAINT PK_ORDERED_LIST PRIMARY KEY (OID)
);

/*==============================================================*/
/* INDEX : ASSOCIATION_1_FK                                   */
/*==============================================================*/
CREATE INDEX ASSOCIATION_1_FK ON ORDERED_LIST (
   ORDERNUM ASC
);

/*==============================================================*/
/* INDEX : ASSOCIATION_3_FK                                   */
/*==============================================================*/
CREATE INDEX ASSOCIATION_3_FK ON ORDERED_LIST (
   FOODID ASC
);

ALTER TABLE BILLS
   ADD CONSTRAINT FK_BILLS_ASSOCIATI_ORDER_TA FOREIGN KEY (ORDERNUM)
      REFERENCES ORDER_TABLES (ORDERNUM);

ALTER TABLE ORDERED_LIST
   ADD CONSTRAINT FK_ORDERED__ASSOCIATI_ORDER_TA FOREIGN KEY (ORDERNUM)
      REFERENCES ORDER_TABLES (ORDERNUM);

ALTER TABLE ORDERED_LIST
   ADD CONSTRAINT FK_ORDERED__ASSOCIATI_FOODS FOREIGN KEY (FOODID)
      REFERENCES FOODS (FOODID);
