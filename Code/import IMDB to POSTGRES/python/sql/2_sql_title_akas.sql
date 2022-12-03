<<<<<<< HEAD
DROP TABLE IF EXISTS TitleAkas CASCADE;

CREATE TABLE TitleAkas(
	titleId text references TitleBasics,
	ordering int,
	PRIMARY KEY(titleId, ordering),
	title text not null, 
	region text,
	language text, 
	types text, 
	attributes text,
	isOriginalTitle boolean
=======
DROP TABLE IF EXISTS TitleAkas CASCADE;

CREATE TABLE TitleAkas(
	titleId text references TitleBasics,
	ordering int,
	PRIMARY KEY(titleId, ordering),
	title text not null, 
	region text,
	language text, 
	types text, 
	attributes text,
	isOriginalTitle boolean
>>>>>>> 66d89702235afc2a9cbd565ed568f958a6704b33
);