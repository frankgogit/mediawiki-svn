CREATE TABLE online_status (
	`userid` int(5) NOT NULL default '0',
	`username` varchar(255) NOT NULL default '',
	`timestamp` char(14) NOT NULL default '',
	PRIMARY KEY USING HASH (`userid`, `username`)
) ENGINE=MEMORY;

