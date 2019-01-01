import time
import RPi.GPIO as GPIO
from qhue import Bridge
import mysql.connector
import socket

#mydb = mysql.connector.connect(
#  host="localhost",
#  user="yourusername",
#  passwd="yourpassword"
#)

#print(mydb)


GPIO.setmode(GPIO.BOARD) # use board pin numbers
# define pin #7 as input pin
pin = 7
GPIO.setup(pin, GPIO.IN)

b = Bridge("192.168.1.30", 'e254339152304b714add57d14a8fdbb')
groups = b.groups	# as groups are handy, I will contorll all


HOST = '192.168.0.23'  # Standard loopback interface address (localhost)
PORT = 65432        # Port to listen on (non-privileged ports are > 1023)

while True:
    with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
        s.bind((HOST, PORT))
        s.listen()
        conn, addr = s.accept()
        with conn:
            print('Connected by', addr)
            while True:
                data = conn.recv(1024)
                if not data:
                    break
                conn.sendall(data)
