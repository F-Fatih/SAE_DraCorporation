<<<<<<< HEAD

from time import time

def injectFiles(cur,dataPath) -> bool:
    e=0
    start = time()
    print("Started title.akas")
    with open(dataPath+"title.akas.csv","r", encoding="utf8") as f:
        f.readline()
        line = f.readline()[:-1]
        i=0
        while(line!=""):
            try:
                val = line.split("\t")
                for j in range(len(val)):
                    if(val[j]=='\\N'):
                        val[j] = None
                if(val[5]!=None):
                    val[5] = '{' + val[5] + '}'
                if(val[6]!=None):
                    val[6] = '{' + val[6] + '}'
                cur.execute("""INSERT INTO titleakas VALUES
                            (%(titleid)s,%(ordering)s,%(title)s,
                            %(region)s,%(language)s,%(types)s,%(attribute)s,
                            %(isorginaltitle)s)""",
                            {
                                "titleid":val[0],
                                "ordering":val[1],
                                "title":val[2],
                                "region":val[3],
                                "language":val[4],
                                "types":val[5],
                                "attribute":val[6],
                                "isorginaltitle":val[7],
                            })
            except:
                e+=1
            line = f.readline()[:-1]
=======

from time import time

def injectFiles(cur,dataPath) -> bool:
    e=0
    start = time()
    print("Started title.akas")
    with open(dataPath+"title.akas.csv","r", encoding="utf8") as f:
        f.readline()
        line = f.readline()[:-1]
        i=0
        while(line!=""):
            try:
                val = line.split("\t")
                for j in range(len(val)):
                    if(val[j]=='\\N'):
                        val[j] = None
                if(val[5]!=None):
                    val[5] = '{' + val[5] + '}'
                if(val[6]!=None):
                    val[6] = '{' + val[6] + '}'
                cur.execute("""INSERT INTO titleakas VALUES
                            (%(titleid)s,%(ordering)s,%(title)s,
                            %(region)s,%(language)s,%(types)s,%(attribute)s,
                            %(isorginaltitle)s)""",
                            {
                                "titleid":val[0],
                                "ordering":val[1],
                                "title":val[2],
                                "region":val[3],
                                "language":val[4],
                                "types":val[5],
                                "attribute":val[6],
                                "isorginaltitle":val[7],
                            })
            except:
                e+=1
            line = f.readline()[:-1]
>>>>>>> 66d89702235afc2a9cbd565ed568f958a6704b33
    print("Finished title.akas in " + str(time()-start) + " seconds with a total of "+ str(e) +" errors.")