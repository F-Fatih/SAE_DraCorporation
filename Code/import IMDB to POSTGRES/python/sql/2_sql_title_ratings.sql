<<<<<<< HEAD
DROP TABLE IF EXISTS TitleRatings CASCADE;

CREATE TABLE TitleRatings(
	tconst text primary key references TitleBasics,
	averageRating float check(averageRating>=0 AND averageRating<=10),
	numVotes int check(numVotes>=0)
=======
DROP TABLE IF EXISTS TitleRatings CASCADE;

CREATE TABLE TitleRatings(
	tconst text primary key references TitleBasics,
	averageRating float check(averageRating>=0 AND averageRating<=10),
	numVotes int check(numVotes>=0)
>>>>>>> 66d89702235afc2a9cbd565ed568f958a6704b33
);