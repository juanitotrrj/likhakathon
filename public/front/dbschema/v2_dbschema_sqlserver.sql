create table SystemRole(
	id int primary key,
	roleDescription varchar(32) not null,
	creationDate timestamp not null
);

create index idx_SystemRole on SystemRole(id);

create table SystemUser(
	id int primary key,
	creationDate timestamp not null,
    realName varchar(125) not null,
	sysUserName varchar(32) unique not null,
	passWd varchar(15) not null,
	passwdSalt varchar(25) not null,
    roleId integer references SystemRole(id),
    isSuspended bit default 0,
    dataEncoder integer default NULL references SystemUser(id)
);

create index idx_SystemUser on SystemUser(id);

create table ItemSupplierCostRefDoc(
	id int primary key,
	receiptNumber varchar(64) not null,
	receiptDate date not null,
	isClosed bit default 0,
	closedBy integer default null references SystemUser(id),
	isCleared bit default 0,
	clearedBy integer default null references SystemUser(id),
	isAudited bit default 0,
	auditedBy integer default null references SystemUser(id),
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_ItemSupplierCostRefDoc on ItemSupplierCostRefDoc(id);

create table Supplier(
	id int primary key,
	contactPerson varchar(64) default null,
	companyName varchar(64) not null,
	address varchar(128) not null,
	contactNumber varchar(64) default null,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_Supplier on Supplier(id);

create table Item(
	id int primary key,
	itemName varchar(64) not null,
	itemCode varchar(15) unique not null,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_Item on Item(id);

create table ItemCostHistory(
	id int primary key,
	itemId integer references Item(id),
	supplierId integer references Supplier(id),
	itemSupplierRefDocId integer references ItemSupplierCostRefDoc(id),
	costValue numeric(9, 2) not null,
	historyTimestamp timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_ItemCostHistory on ItemCostHistory(id);

create table ItemPriceHistory(
	id int primary key,
	itemId integer references Item(id),
	priceValue numeric(9, 2) not null,
	discountedPrice numeric(9, 2) not null,
	historyTimestamp timestamp not null,
	dataEncoder integer references SystemUser(id),
	CHECK (priceValue > 0),
	CHECK (discountedPrice > 0),
	CHECK (priceValue > discountedPrice)
);

create index idx_ItemPriceHistory on ItemPriceHistory(id);

create table Customer(
	id int primary key,
	lastName varchar(32) not null,
	firstName varchar(32) not null,
	midName varchar(32) default null,
	birthDay date default null,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_Customer on Customer(id);

create table SpecialCustomerItemPriceHistory(
	id int primary key,
	itemId integer references Item(id),
	customerId integer references Customer(id),
	priceValue numeric(9, 2) not null,
	discountedPrice numeric(9, 2) not null,
	historyTimestamp timestamp not null,
	dataEncoder integer references SystemUser(id),
	CHECK (priceValue > 0),
	CHECK (discountedPrice > 0),
	CHECK (priceValue > discountedPrice)
);

create index idx_SpecialCustomerItemPriceHistory on SpecialCustomerItemPriceHistory(id);

create table Country(
	id int primary key,
	countryName varchar(32) not null,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_Country on Country(id);

create table TownCity(
	id int primary key,
	countryId integer references Country(id),
	townCityName varchar(32) default null,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_TownCity on TownCity(id);

create table BrgyName(
	id int primary key,
	brgyName varchar(32) default null,
	townCityId integer references TownCity(id),
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_BrgyName on BrgyName(id);

create table CustomerAddress(
	id int primary key,
	customerId integer references Customer(id),
	doorFloorHouseCompoundBlockLot varchar(32) not null,
	streetName varchar(32) default null,
	zoneNumber varchar(3) default null,
	brgyName integer references BrgyName(id),
	zipCode varchar(8) default null,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_CustomerAddress on CustomerAddress(id);

create table CustomerContact(
	id int primary key,
	customerId integer references Customer(id),
	phoneNumber varchar(32) not null,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_CustomerContact on CustomerContact(id);

create table CustomerNotes(
	id int primary key,
	customerId integer references Customer(id),
	noteEntry text not null,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_CustomerNotes on CustomerNotes(id);

create table BizBranch(
	id int primary key,
	branchName varchar(32) not null,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_BizBranch on BizBranch(id);

create table SalesHistory(
	id int primary key,
	receiptNumber varchar(32) unique not null,
	customerId integer references Customer(id),
	branchId integer references BizBranch(id),
	deliveredBy integer references SystemUser(id),
	isCancelled bit default 0,
    cancelledBy integer references SystemUser(id),
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id)
);

create index idx_SalesHistory on SalesHistory(id);

create table SalesDetails(
	id int primary key,
	salesId integer references SalesHistory(id) ,
	deliveryAddress integer references CustomerAddress(id) ,
	itemId integer references Item(id) ,
	itemCode varchar(128) not null,
	salesPrice integer references ItemPriceHistory(id) ,
	isCancelled bit default 0,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id) 
);

create index idx_SalesDetails on SalesDetails(id);

create table SalesNotes(
	id int primary key,
	transactionId integer references SalesHistory(id) ,
	noteEntry text not null,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id) 
);

create index idx_SalesNotes on SalesNotes(id);

create table InterbranchItemTransferHistory(
	id int primary key,
	receiptNumber varchar(32) unique not null,
	sourceBranch integer references BizBranch(id) ,
	destBranch integer references BizBranch(id) ,
	isOutFromSourceBranch bit default 0,
	sourceBranchSignatory integer default null references SystemUser(id) ,
	isInToDestBranch bit default 0,
	destBranchSignatory integer default null references SystemUser(id) ,
	isCancelled bit default 0,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id) 
);

create index idx_InterbranchItemTransferHistory on InterbranchItemTransferHistory(id);

create table InterbranchItemTransferDetails(
	id int primary key,
	itemTransferId integer references InterbranchItemTransferHistory(id) ,
	itemId integer references Item(id) ,
	itemCode varchar(128) not null,
	isCancelled bit default 0,
	creationDate timestamp not null,
	dataEncoder integer references SystemUser(id) 
);

create index idx_InterbranchItemTransferDetails on InterbranchItemTransferDetails(id);