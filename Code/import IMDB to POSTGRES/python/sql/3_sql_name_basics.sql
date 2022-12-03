<<<<<<< HEAD
DROP TABLE IF EXISTS NameBasics CASCADE;

CREATE TABLE NameBasics(
	nconst text primary key,
	primaryName text not null,
	birthYear smallint check(birthYear>0),
	deathYear smallint, --check(deathYear is null OR deathYear>=birthYear),
	primaryProfession text,
	knownForTitles text
=======
DROP TABLE IF EXISTS NameBasics CASCADE;

CREATE TABLE NameBasics(
	nconst text primary key,
	primaryName text not null,
	birthYear smallint check(birthYear>0),
	deathYear smallint, --check(deathYear is null OR deathYear>=birthYear),
	primaryProfession text,
	knownForTitles text
>>>>>>> 66d89702235afc2a9cbd565ed568f958a6704b33
);