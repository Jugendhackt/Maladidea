import RPi.GPIO as G

G.setmode(G.BCM)
G.setup(26, G.IN)
G.setup(21, G.OUT)
G.setup(20, G.IN)

G.cleanup()
