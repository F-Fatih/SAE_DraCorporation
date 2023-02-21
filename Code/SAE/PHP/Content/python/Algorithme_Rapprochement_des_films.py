import heapq
import json
import os

path = "C:\\Users\\Fatih.Fatih-PC\\Desktop\\SAE_DraCorporation\\Code\\SAE\\PHP\\Content\\json\\"

def detectionDernierJson():
    latest_file = max(os.listdir(path), key=lambda x: os.stat(os.path.join(path, x)).st_ctime)

    with open(path + latest_file, "r") as file:
        startAndStop = json.load(file)
    return startAndStop

def ouvertureJSON(fichier):
    with open(path + fichier, 'r') as f:
        data = json.load(f)
    return data


def find_shortest_path(graph, start, end):
    visited = set()
    distances = {}
    parent = {}
    queue = []
    heapq.heappush(queue, (0, start))
    distances[start] = 0
    parent[start] = None

    while queue:
        distance, node = heapq.heappop(queue)
        if node not in visited:
            visited.add(node)
            if node == end:
                break
            neighbors = graph[node]
            for neighbor in neighbors:
                new_distance = distance + 1
                if neighbor not in distances or new_distance < distances[neighbor]:
                    distances[neighbor] = new_distance
                    parent[neighbor] = node
                    heapq.heappush(queue, (new_distance, neighbor))

    shortest_path = []
    current_node = end

    while current_node is not None:
        shortest_path.insert(0, current_node)
        current_node = parent[current_node]

    return shortest_path


startAndStop = detectionDernierJson()
graphe = ouvertureJSON("graphe.json")
resultat = find_shortest_path(graphe, startAndStop['start'], startAndStop['stop'])

with open(path + startAndStop['start'] + "_resultat_" + startAndStop['stop'] + ".json", "w") as file:
    json.dump(resultat, file)
