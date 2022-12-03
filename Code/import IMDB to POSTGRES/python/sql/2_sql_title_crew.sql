<<<<<<< HEAD
DROP TABLE IF EXISTS TitleCrew CASCADE;

CREATE TABLE TitleCrew(
	tconst text primary key references TitleBasics,
	directors text,
	writers text
=======
DROP TABLE IF EXISTS TitleCrew CASCADE;

CREATE TABLE TitleCrew(
	tconst text primary key references TitleBasics,
	directors text,
	writers text
>>>>>>> 66d89702235afc2a9cbd565ed568f958a6704b33
);