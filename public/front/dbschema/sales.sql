create table SalesHistory(
	id serial primary key,
	receiptNumber varchar(32) unique not null,
	customerId integer references Customer(id) on delete restrict,
	branchId integer references BizBranch(id) on delete restrict,
	deliveredBy integer references SystemUser(id) on delete restrict, 
	isCancelled boolean default false,
	creationDate timestamptz not null,
	dataEncoder integer references SystemUser(id) on delete restrict
);

create index idx_SalesHistory on SalesHistory(id);

create table SalesDetails(
	id serial primary key,
	salesId integer references SalesHistory(id) on delete restrict,
	deliveryAddress integer references CustomerAddress(id) on delete restrict,
	itemId integer references Item(id) on delete restrict,
	itemCode varchar(128) not null,
	salesPrice integer references ItemPriceHistory(id) on delete restrict,
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