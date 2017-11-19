import RPi.GPIO as G
import time as t
G.setmode(G.BCM)
G.setup(19, G.OUT)
G.setup(26, G.IN)# pull_up_down=G.PUD_UP)
G.setup(21, G.OUT)
G.setup(20, G.IN, pull_up_down=G.PUD_UP)
print("setup done")

G.output(21, True)
print("output on")

while True:
    input_sensor = G.input(26)
    if input_sensor == False:
        print("sensor triggered")
        G.output(19, True)
        t.sleep(.5)
        G.output(19, False)
    input_taster = G.input(20)
    if input_taster == False:
        print("break")
        break

G.cleanup()
