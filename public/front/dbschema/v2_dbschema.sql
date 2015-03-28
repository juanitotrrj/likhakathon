create table SystemRole(
	id serial primary key,
	roleDescription varchar(32) not null,
	creationDate timestamptz not null
);

create index idx_SystemRole on SystemRole(id);

create table SystemUser(
	id serial primary key,
	creationDate timestamptz not null,
    realName varchar(125) not null,
	sysUserName varchar(32) unique not null,
	passWd varchar(15) not null,
	passwdSalt varchar(25) not null,
    roleId integer references SystemRole(id) on delete restrict,
    isSuspended boolean default false,
    dataEncoder integer default NULL references SystemUser(id) on delete restrict
);

create index idx_SystemUser on SystemUser(id);

create table ItemSupplierCostRefDoc(
	id serial primary key,
	receiptNumber varchar(64) not null,
	receiptDate date not null,
	isClosed boolean default false,
	closedBy integer default null references SystemUser(id) on delete restrict,
	isCleared boolean default false,
	clearedBy integer default null references SystemUser(id) on delete restrict,
	isAudited boolean default false,
	auditedBy integer default null references SystemUser(id) on delete restrict,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict	
);

create index idx_ItemSupplierCostRefDoc on ItemSupplierCostRefDoc(id);

create table Supplier(
	id serial primary key,
	contactPerson varchar(64) default null,
	companyName varchar(64) not null,
	address varchar(128) not null,
	contactNumber varchar(64) default null,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_Supplier on Supplier(id);

create table itemClass(
    id serial primary key,
    description varchar(64) not null,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict    
);

create index idx_itemClass on itemClass(id);

create table Item(
	id serial primary key,
	itemName varchar(64) not null,
	itemCode varchar(15) unique not null,
    itemClassId integer references itemClass(id) on delete restrict,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_Item on Item(id);

create table ItemCostHistory(
	id serial primary key,
	itemId integer references Item(id) on delete restrict,
	supplierId integer references Supplier(id) on delete restrict,
	itemSupplierRefDocId integer references ItemSupplierCostRefDoc(id) on delete restrict,
	costValue numeric(9, 2) not null,
	historyTimestamp timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_ItemCostHistory on ItemCostHistory(id);

create table ItemPriceHistory(
	id serial primary key,
	itemId integer references Item(id) on delete restrict,
	priceValue numeric(9, 2) not null,
	discountedPrice numeric(9, 2) not null,
	historyTimestamp timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict,
	CHECK (priceValue > 0),
	CHECK (discountedPrice > 0),
	CHECK (priceValue > discountedPrice)
);

create index idx_ItemPriceHistory on ItemPriceHistory(id);

create table Customer(
	id serial primary key,
	lastName varchar(32) not null,
	firstName varchar(32) not null,
	midName varchar(32) default null,
	birthDay date default null,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_Customer on Customer(id);

create table SpecialCustomerItemPriceHistory(
	id serial primary key,
	itemId integer references Item(id) on delete restrict,
	customerId integer references Customer(id) on delete restrict,
	priceValue numeric(9, 2) not null,
	discountedPrice numeric(9, 2) not null,
	historyTimestamp timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict,
	CHECK (priceValue > 0),
	CHECK (discountedPrice > 0),
	CHECK (priceValue > discountedPrice)
);

create index idx_SpecialCustomerItemPriceHistory on SpecialCustomerItemPriceHistory(id);

create table Country(
	id serial primary key,
	countryName varchar(32) not null,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_Country on Country(id);

create table TownCity(
	id serial primary key,
	countryId integer references Country(id) on delete restrict,
	townCityName varchar(32) default null,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_TownCity on TownCity(id);

create table BrgyName(
	id serial primary key,
	brgyName varchar(32) default null,
	townCityId integer references TownCity(id) on delete restrict,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict	
);

create index idx_BrgyName on BrgyName(id);

create table CustomerAddress(
	id serial primary key,
	customerId integer references Customer(id) on delete restrict,
	doorFloorHouseCompoundBlockLot varchar(32) not null,
	streetName varchar(32) default null,
	zoneNumber varchar(3) default null,
	brgyName integer references BrgyName(id) on delete restrict,
	zipCode varchar(8) default null,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_CustomerAddress on CustomerAddress(id);

create table CustomerContact(
	id serial primary key,
	customerId integer references Customer(id) on delete restrict,
	phoneNumber varchar(32) not null,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_CustomerContact on CustomerContact(id);

create table CustomerNotes(
	id serial primary key,
	customerId integer references Customer(id) on delete restrict,
	noteEntry text not null,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_CustomerNotes on CustomerNotes(id);

create table BizBranch(
	id serial primary key,
	branchName varchar(32) not null,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_BizBranch on BizBranch(id);

create table SalesHistory(
	id serial primary key,
	receiptNumber varchar(32) unique not null,
	customerId integer references Customer(id) on delete restrict,
	branchId integer default null references BizBranch(id) on delete restrict,
	deliveredBy integer default null references SystemUser(id) on delete restrict,
	isCancelled boolean default false,
    cancelledBy integer default null references SystemUser(id) on delete restrict,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_SalesHistory on SalesHistory(id);

create table SalesDetails(
	id serial primary key,
	salesId integer references SalesHistory(id) on delete restrict,
	itemId integer references Item(id) on delete restrict,
	itemQty integer not null,
    subTotal numeric(9, 2) not null,
	isCancelled boolean default false,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_SalesDetails on SalesDetails(id);

create table SalesNotes(
	id serial primary key,
	transactionId integer references SalesHistory(id) on delete restrict,
	noteEntry text not null,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_SalesNotes on SalesNotes(id);

create table InterbranchItemTransferHistory(
	id serial primary key,
	receiptNumber varchar(32) unique not null,
	sourceBranch integer references BizBranch(id) on delete restrict,
	destBranch integer references BizBranch(id) on delete restrict,
	isOutFromSourceBranch boolean default false,
	sourceBranchSignatory integer default null references SystemUser(id) on delete restrict,
	isInToDestBranch boolean default false,
	destBranchSignatory integer default null references SystemUser(id) on delete restrict,
	isCancelled boolean default false,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_InterbranchItemTransferHistory on InterbranchItemTransferHistory(id);

create table InterbranchItemTransferDetails(
	id serial primary key,
	itemTransferId integer references InterbranchItemTransferHistory(id) on delete restrict,
	itemId integer references Item(id) on delete restrict,
	itemCode varchar(128) not null,
	isCancelled boolean default false,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_InterbranchItemTransferDetails on InterbranchItemTransferDetails(id);

create table smsMessages(
    id serial primary key,
    smsContent varchar(140) not null,
    creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_smsMessages on smsMessages(id);

create table employeeLogin(
    id serial primary key,
    creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict    
);

create index idx_employeelogin on employeeLogin(id);

create table employeeLogout(
    id serial primary key,
    creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict    
);

create index idx_employeelogout on employeeLogout(id);