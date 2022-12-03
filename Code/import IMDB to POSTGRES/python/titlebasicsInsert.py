from time import time

def injectFiles(cur,dataPath) -> bool:
    e=0
    start = time()
    print("Started title.basics")
    with open(dataPath+"title.basics.csv","r", encoding="utf8") as f:
        f.readline()
        line = f.readline()[:-1]
        i=0
        while(line!=""):
            try:
                val = line.split("\t")
                for j in range(len(val)):
                    if(val[j]=='\\N'):
                        val[j] = None
                if(val[8]!=None):
                    val[8] = '{' + val[8][:-1] + '}'
                cur.execute("""INSERT INTO titlebasics VALUES
                            (%(tconst)s,%(titleType)s,%(primaryTitle)s,
                            %(originalTitle)s,%(isAdult)s,%(startYear)s,%(endYear)s,
                            %(untimeMinutes)s,%(genres)s)""",
                            {
                                "tconst":val[0],
                                "titleType":val[1],
                                "primaryTitle":val[2],
                                "originalTitle":val[3],
                                "isAdult":val[4],
                                "startYear":val[5],
                                "endYear":val[6],
                                "untimeMinutes":val[7],
                                "genres":val[8],
                            })
            except:
                e+=1
            line = f.readline()[:-1]
    print("Finished title.basics in " + str(time()-start) + " seconds with a total of "+ str(e) +" errors.")