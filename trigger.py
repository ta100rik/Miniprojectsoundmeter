import time
import RPi.GPIO as GPIO
from qhue import Bridge
import socket
import smbus
import json
import sys

sensor = 1

HOST = '192.168.0.23'  # The server's hostname or IP address
PORT = 65432        # The port used by the server


print ("This is the name of the script: ", str(sys.argv))


address = 0x48
A0 = 0x40
A1 = 0x41
A2 = 0x42
A3 = 0x43
bus = smbus.SMBus(1)
while True:
	bus.write_byte(address,A0)
	value = bus.read_byte(address)
	print(value)
	print("AOUT:%1.3f  " %(value))
	db = {'sensor' : sensor, 'value' : value}
	dbjson = json.dumps(db).encode()
	if value < 50:
		with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
			s.connect((HOST, PORT))
			s.sendall(dbjson)
			data = s.recv(1024)

		print('Received', repr(data))

	time.sleep(0.1)
