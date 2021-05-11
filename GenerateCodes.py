import requests
from random import randint
count = int(input("Wie viele Codes möchten Sie generieren?"))
string = ""
for i in range(count):
    num = randint(10000, 99999)
    string+=str(num) + "\n"
    requests.get("https://www.projektejwkk.de/addCode.php?code="+ str(num))
print(string)
file = open("Codes.txt", "w")
file.write(string)
file.close()
