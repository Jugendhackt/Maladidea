from gpiozero import Buzzer
import RPi.GPIO as GPIO
import time
import requests

GPIO.setmode(GPIO.BCM)

GPIO.setup(18, GPIO.IN, pull_up_down=GPIO.PUD_UP)
buzzer=Buzzer(4)
state = True
try: while state == True:

    r = requests.get("http://maladidea.heinemann.at/api/notifications.php?sock=1")
    print ("in while " + r.text)
    
    if r.text=="1":
        print("in if " + r.text)
        buzzer.beep()
    
    else:
        print("in else " + r.text)
        print(state)
        time.sleep(2)
        input_state = GPIO.input(18)
    
    if input_state == False:
        print('Button Pressed')
        buzzer.off()
        state = False

except KeyboardInterrupt: buzzer.off()

"""try: while not done:

     if state:
         state = False
     else:
        state = True
        time.sleep(0.2)
        buzzer.off()

except KeyboardInterrupt: buzzer.off()"""
