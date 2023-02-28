import os
import json
import psycopg2
import requests
from bs4 import BeautifulSoup


conn = psycopg2.connect(
    host="",
    database="",
    user="",
    password=""
)

path = "C:\\Users\\Fatih.Fatih-PC\\Desktop\\SAE_DraCorporation\\Code\\SAE\\PHP\\Content\\json\\"

def detectionDernierJson():
    latest_file = max(os.listdir(path), key=lambda x: os.stat(os.path.join(path, x)).st_ctime)

    with open(path +latest_file, "r") as file:
        nconst = json.load(file)
    return nconst


jsonLecture = detectionDernierJson()
id = str(jsonLecture['nconst'])
lien = []

cur = conn.cursor()
cur.execute("SELECT nconst, primaryname FROM namebasics WHERE nconst='" + id + "'")
            
for nconst, prenom in cur:
    url = "https://fr.wikipedia.org/wiki/" + prenom
        
    response = requests.get(url)
    soup = BeautifulSoup(response.text, 'html.parser')
    
    img_div = soup.find("div", {"class": "images"})
    
    if img_div:
        img_element = img_div.find("img")
        img_src = img_element["src"]
        requete = "INSERT INTO afficheacteurs (nconst, lien) VALUES ('" + nconst + "', 'https:" + img_src + "')"
        lien.append(str("https:" + img_src))
        
    else:
        requete = "INSERT INTO afficheacteurs (nconst) VALUES ('" + nconst + "')"
        lien.append("NoPictureAvailable.png")
    
insert = conn.cursor()
insert.execute(requete)
conn.commit()
insert.close()
cur.close()

with open(str(path) + id + "_resultat" + ".json", "w") as file:
    json.dump(lien, file)
