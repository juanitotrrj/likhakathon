insert into StaffRole (roleDescription, creationDate) values ('Sales Agent', now());
insert into Staff (lastName, firstName, midName, birthDay, roleId, creationDate) values ('Hernandez', 'Adel', NULL, NULL, 1, now());
insert into systemuser (creationdate, userName, passWord, passwordSalt, staffId) values (now(), 'adel','password','password', 1);
insert into country (countryName, creationDate, dataEncoder) values ('Philippines', now(), 1);
insert into townCity (countryId, townCityName, creationDate, dataEncoder) values (1, 'Taguig City', now(), 1);