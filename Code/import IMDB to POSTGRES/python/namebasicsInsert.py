<<<<<<< HEAD

from time import time

def injectFiles(cur,dataPath) -> bool:
    e=0
    start = time()
    print("Started name.basics")
    with open(dataPath+"name.basics.csv","r", encoding="utf8") as f:
        f.readline()
        line = f.readline()[:-1]
        i=0
        while(line!=""):
            try:
                val = line.split("\t")
                for j in range(len(val)):
                    if(val[j]=='\\N'):
                        val[j] = None
                if(val[4]!=None):
                    val[4] = '{' + val[4] + '}'
                if(val[5]!=None):
                    val[5] = '{' + val[5][:-1] + '}'
                cur.execute("""INSERT INTO namebasics VALUES
                            (%(nconst)s,%(primaryName)s,%(birthYear)s,
                            %(deathYear)s,%(primaryProfession)s,%(knowForTitles)s)""",
                            {
                                "nconst":val[0],
                                "primaryName":val[1],
                                "birthYear":val[2],
                                "deathYear":val[3],
                                "primaryProfession":val[4],
                                "knowForTitles":val[5],
                            })
            except:
                e+=1
            line = f.readline()[:-1] 
=======

from time import time

def injectFiles(cur,dataPath) -> bool:
    e=0
    start = time()
    print("Started name.basics")
    with open(dataPath+"name.basics.csv","r", encoding="utf8") as f:
        f.readline()
        line = f.readline()[:-1]
        i=0
        while(line!=""):
            try:
                val = line.split("\t")
                for j in range(len(val)):
                    if(val[j]=='\\N'):
                        val[j] = None
                if(val[4]!=None):
                    val[4] = '{' + val[4] + '}'
                if(val[5]!=None):
                    val[5] = '{' + val[5][:-1] + '}'
                cur.execute("""INSERT INTO namebasics VALUES
                            (%(nconst)s,%(primaryName)s,%(birthYear)s,
                            %(deathYear)s,%(primaryProfession)s,%(knowForTitles)s)""",
                            {
                                "nconst":val[0],
                                "primaryName":val[1],
                                "birthYear":val[2],
                                "deathYear":val[3],
                                "primaryProfession":val[4],
                                "knowForTitles":val[5],
                            })
            except:
                e+=1
            line = f.readline()[:-1] 
>>>>>>> 66d89702235afc2a9cbd565ed568f958a6704b33
    print("Finished name.basics in " + str(time()-start) + " seconds with a total of "+ str(e) +" errors.")