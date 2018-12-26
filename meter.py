import time
import RPi.GPIO as GPIO
from qhue import Bridge

GPIO.setmode(GPIO.BOARD) # use board pin numbers
# define pin #7 as input pin
pin = 7
GPIO.setup(pin, GPIO.IN)

b = Bridge("192.168.1.30", 'e254339152304b714add57d14a8fdbb')
groups = b.groups # as groups are handy, I will contorll all

soundnumber = 1

while 1:
	if GPIO.input(pin) == GPIO.HIGH:
		soundnumber = soundnumber + 1
		print(soundnumber)
	else:
		soundnumber = 1
	#i = 3 # number of iterations
	#for l in range(1,i+1):
		# this is one of the temporary effects, see official docs
		# at http://www.developers.meethue.com/documentation/core-concepts
	#	b.groups[0].action(alert="select") #group 0 = all lights
	#	time.sleep(1)
	#time.sleep(10)