import RPi.GPIO as G
import time as t
import http.client as http
from time import gmtime, strftime

G.setmode(G.BCM)
G.setup(26, G.IN)
G.setup(21, G.OUT)
G.setup(20, G.IN)
print("setup done")

G.output(21, True)
print("output on")

while True:
    input_sensor_a = G.input(26)
    input_sensor_b = G.input(20)
    if input_sensor_a == False | input_sensor_b == False:
        print("sensor triggered")
        time=strftime("%Y-%m-%d %H:%M:%S", gmtime())
        hours=str(int(time[11:13])+1)
        get="/api/upload.php?time=" + time[0:10] + "+" + hours + "%3A" + time[14:16] + "%3A" + time[17:19] + "&value=1&sock=1"
        print(get)
        httpServ = http.HTTPConnection("maladidea.heinemann.at", 80)
        httpServ.connect()
        httpServ.request('GET', get)
        while True:
            input_sensor_a = G.input(26)
            input_sensor_b = G.input(20)
            if input_sensor_a == True | input_sensor_b == True:
                break
