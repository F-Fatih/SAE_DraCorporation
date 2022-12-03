<<<<<<< HEAD

from time import time

def injectFiles(cur,dataPath) -> bool:
    e=0
    start = time()
    print("Started title.episode")
    with open(dataPath+"title.episode.csv","r", encoding="utf8") as f:
        f.readline()
        line = f.readline()[:-1]
        i=0
        while(line!=""):
            try:
                val = line.split("\t")
                for j in range(len(val)):
                    if(val[j]=='\\N'):
                        val[j] = None
                cur.execute("""INSERT INTO titleepisode VALUES
                            (%(tconst)s,%(parentTconst)s,%(seasonNumber)s,
                            %(episodeNumber)s)""",
                            {
                                "tconst":val[0],
                                "parentTconst":val[1],
                                "seasonNumber":val[2],
                                "episodeNumber":val[3],
                            })
            except:
                e+=1
            line = f.readline()[:-1]
=======

from time import time

def injectFiles(cur,dataPath) -> bool:
    e=0
    start = time()
    print("Started title.episode")
    with open(dataPath+"title.episode.csv","r", encoding="utf8") as f:
        f.readline()
        line = f.readline()[:-1]
        i=0
        while(line!=""):
            try:
                val = line.split("\t")
                for j in range(len(val)):
                    if(val[j]=='\\N'):
                        val[j] = None
                cur.execute("""INSERT INTO titleepisode VALUES
                            (%(tconst)s,%(parentTconst)s,%(seasonNumber)s,
                            %(episodeNumber)s)""",
                            {
                                "tconst":val[0],
                                "parentTconst":val[1],
                                "seasonNumber":val[2],
                                "episodeNumber":val[3],
                            })
            except:
                e+=1
            line = f.readline()[:-1]
>>>>>>> 66d89702235afc2a9cbd565ed568f958a6704b33
    print("Finished title.episode in " + str(time()-start) + " seconds with a total of "+ str(e) +" errors.")