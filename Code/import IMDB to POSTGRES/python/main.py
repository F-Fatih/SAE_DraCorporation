<<<<<<< HEAD
from getLink import createLink
from downloadFiles import download
from injectData import injectData

DATA_PATH = "./data/"
SQL_PATH = "./sql/"

def main():
    link = createLink()
    download(DATA_PATH)
    injectData(link,DATA_PATH,SQL_PATH)
    
if(__name__=="__main__"):
=======
from getLink import createLink
from downloadFiles import download
from injectData import injectData

DATA_PATH = "./data/"
SQL_PATH = "./sql/"

def main():
    link = createLink()
    download(DATA_PATH)
    injectData(link,DATA_PATH,SQL_PATH)
    
if(__name__=="__main__"):
>>>>>>> 66d89702235afc2a9cbd565ed568f958a6704b33
    main()