import time
import RPi.GPIO as GPIO
from qhue import Bridge
import socket
import smbus
import json
import sys
import numpy

print(str(sys.argv))

GPIO.setmode(GPIO.BOARD) # use board pin numbers
# define pin #7 as input pin
pin = 7
GPIO.setup(pin, GPIO.IN)

sensor = 1

b = Bridge("192.168.42.5", 'e254339152304b714add57d14a8fdbb')
groups = b.groups # as groups are handy, I will contorll all

soundnumber = 1

#while 1:
#	if GPIO.input(pin) == GPIO.HIGH:
#		soundnumber = soundnumber + 1
#		print(soundnumber)
#	else:
#		soundnumber = 1
	#i = 3 # number of iterations
	#for l in range(1,i+1):
		# this is one of the temporary effects, see official docs
		# at http://www.developers.meethue.com/documentation/core-concepts
	#	b.groups[0].action(alert="select") #group 0 = all lights
	#	time.sleep(1)
	#time.sleep(10)


HOST = '192.168.42.14'  # The server's hostname or IP address
PORT = 65432        # The port used by the server




address = 0x48
A0 = 0x40
A1 = 0x41
A2 = 0x42
A3 = 0x43
bus = smbus.SMBus(1)


bus.write_byte(address,A0)
#value = bus.read_byte(address)
commandline = int(sys.argv[1])
print(commandline)
#print("AOUT:%1.3f  " %(value))
value = 20 * (numpy.log(commandline) / numpy.log(10))
print(int(value))
db = {'sensor' : sensor, 'value' : int(value)}
dbjson = json.dumps(db).encode()
with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
	s.connect((HOST, PORT))
	s.sendall(dbjson)
	data = s.recv(1024)

print('Received', repr(data))

time.sleep(0.1)
