CREATE TABLE IF NOT EXISTS SnippetTemplates (Id INT AUTO_INCREMENT NOT NULL, Name VARCHAR(255) NOT NULL, Controller VARCHAR(255) DEFAULT NULL, TemplateCode LONGTEXT NOT NULL, Favourite TINYINT(1) DEFAULT NULL, Enabled TINYINT(1) NOT NULL, IconInactive LONGTEXT DEFAULT NULL, IconActive LONGTEXT DEFAULT NULL, Created DATETIME NOT NULL, Modified DATETIME NOT NULL, PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS SnippetTemplateField (Id INT AUTO_INCREMENT NOT NULL, Name VARCHAR(255) NOT NULL, Type VARCHAR(255) NOT NULL, Scope VARCHAR(255) NOT NULL, Required TINYINT(1) NOT NULL, TemplateId INT NOT NULL, INDEX IDX_2060662F846113F (TemplateId), PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS SnippetFields (Id INT AUTO_INCREMENT NOT NULL, Data LONGTEXT DEFAULT NULL, Name VARCHAR(255) NOT NULL, SnippetId INT NOT NULL, TemplateFieldId INT NOT NULL, INDEX IDX_1F835121B00DA91C (SnippetId), INDEX IDX_1F835121EBCA9337 (TemplateFieldId), PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS Snippets (Id INT AUTO_INCREMENT NOT NULL, Name VARCHAR(255) NOT NULL, Enabled TINYINT(1) NOT NULL, Created DATETIME NOT NULL, Modified DATETIME NOT NULL, TemplateId INT DEFAULT NULL, INDEX IDX_1457978AF846113F (TemplateId), PRIMARY KEY(Id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `ArticleSnippets` (`ArticleNr` int(11) NOT NULL, `SnippetId` int(11) NOT NULL, KEY `FK_5080CDEB00DA91C` (`SnippetId`), CONSTRAINT `FK_5080CDEB00DA91C` FOREIGN KEY (`SnippetId`) REFERENCES `Snippets` (`Id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE SnippetTemplateField ADD CONSTRAINT FK_2060662F846113F FOREIGN KEY (TemplateId) REFERENCES SnippetTemplates (Id);
ALTER TABLE SnippetFields ADD CONSTRAINT FK_1F835121B00DA91C FOREIGN KEY (SnippetId) REFERENCES Snippets (Id);
ALTER TABLE SnippetFields ADD CONSTRAINT FK_1F835121EBCA9337 FOREIGN KEY (TemplateFieldId) REFERENCES SnippetTemplateField (Id);
ALTER TABLE Snippets ADD CONSTRAINT FK_1457978AF846113F FOREIGN KEY (TemplateId) REFERENCES SnippetTemplates (Id);