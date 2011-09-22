ALTER TABLE wcf1_session ADD portalCategoryID INT(10) NOT NULL DEFAULT 0;
ALTER TABLE wcf1_session ADD publicationObjectID INT(10) NOT NULL DEFAULT 0;
ALTER TABLE wcf1_session ADD publicationType VARCHAR(255) NOT NULL DEFAULT '';