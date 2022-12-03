
from time import time

def injectFiles(cur,dataPath) -> bool:
    e=0
    start = time()
    print("Started title.rating")
    with open(dataPath+"title.ratings.csv","r", encoding="utf8") as f:
        f.readline()
        line = f.readline()[:-1]
        i=0
        while(line!=""):
            try:
                val = line.split("\t")
                for j in range(len(val)):
                    if(val[j]=='\\N'):
                        val[j] = None
                cur.execute("""INSERT INTO titleratings VALUES
                            (%(tconst)s,%(averageRating)s,%(numVotes)s)""",
                            {
                                "tconst":val[0],
                                "averageRating":val[1],
                                "numVotes":val[2]
                            })
            except:
                e+=1
            line = f.readline()[:-1]
    print("Finished title.rating in " + str(time()-start) + " seconds with a total of "+ str(e) +" errors.")


