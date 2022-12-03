<<<<<<< HEAD
DROP TABLE IF EXISTS TitleEpisode CASCADE;

CREATE TABLE TitleEpisode(
	tconst text primary key references TitleBasics,
	parentTconst text not null references TitleBasics,
	seasonNumber smallint check(seasonNumber>=0), 
	episodeNumber int check(episodeNumber>=0)
=======
DROP TABLE IF EXISTS TitleEpisode CASCADE;

CREATE TABLE TitleEpisode(
	tconst text primary key references TitleBasics,
	parentTconst text not null references TitleBasics,
	seasonNumber smallint check(seasonNumber>=0), 
	episodeNumber int check(episodeNumber>=0)
>>>>>>> 66d89702235afc2a9cbd565ed568f958a6704b33
);