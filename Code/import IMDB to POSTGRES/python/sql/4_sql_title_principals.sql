<<<<<<< HEAD
DROP TABLE IF EXISTS TitlePrincipals CASCADE;

CREATE TABLE TitlePrincipals(
	tconst text references TitleBasics,
	ordering int,
	nconst text references NameBasics,
	primary key(tconst, ordering, nconst),
	category text,
	job text,
	character text
=======
DROP TABLE IF EXISTS TitlePrincipals CASCADE;

CREATE TABLE TitlePrincipals(
	tconst text references TitleBasics,
	ordering int,
	nconst text references NameBasics,
	primary key(tconst, ordering, nconst),
	category text,
	job text,
	character text
>>>>>>> 66d89702235afc2a9cbd565ed568f958a6704b33
);