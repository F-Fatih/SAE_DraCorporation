
from time import time

def injectFiles(cur,dataPath) -> bool:
    e=0
    start = time()
    print("Started title.crew")
    with open(dataPath+"title.crew.csv","r", encoding="utf8") as f:
        f.readline()
        line = f.readline()[:-1]
        i=0
        while(line!=""):
            try:
                val = line.split("\t")
                for j in range(len(val)):
                    if(val[j]=='\\N'):
                        val[j] = None
                if(val[1]!=None):
                    val[1] = '{' + val[1] + '}'
                if(val[2]!=None):
                    val[2] = '{' + val[2][:-1] + '}'
                cur.execute("""INSERT INTO titlecrew VALUES
                            (%(tconst)s,%(directors)s,%(writers)s)""",
                            {
                                "tconst":val[0],
                                "directors":val[1],
                                "writers":val[2],
                            })
            except:
                e+=1
            line = f.readline()[:-1]
    print()
    print("Finished title.crew in " + str(time()-start) + " seconds with a total of "+ str(e) +" errors.")