import time
import RPi.GPIO as GPIO
from qhue import Bridge
import mysql.connector
import socket
import json

mydb = mysql.connector.connect(
  host="db4free.net",
  user="feedbacklamp",
  passwd="feedbacklamp123",
  database = "feedbacklamp"
)

print(mydb)

mycursor = mydb.cursor()

GPIO.setmode(GPIO.BOARD) # use board pin numbers
# define pin #7 as input pin
pin = 7
GPIO.setup(pin, GPIO.IN)

b = Bridge("192.168.42.5", 'kln6lqpHrW4kkkUEA-WRy5BX2dVbKLzOEm5DYrsB')
groups = b.groups	# as groups are handy, I will contorll all


HOST = '192.168.42.14'  # Standard loopback interface address (localhost)
PORT = 65432        # Port to listen on (non-privileged ports are > 1023)

mindata = 0
middata = 0
maxdata = 0

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
                dbjson = json.loads(data.decode())
                print(dbjson)
                sensorid = dbjson.get("sensor")
                decibel = dbjson.get("value")
                sql = "INSERT INTO sensor_log (Geluidniveau, Decibel, Sensor_auto_id) VALUES (%s, %s, %s)"
                val = (sensorid, decibel, sensorid)
                mycursor.execute(sql, val)

                mydb.commit()

                if mindata == 0:
                    mycursor.execute("""SELECT * FROM limits;""")
                    limitdata = mycursor.fetchall()

                print(limitdata)

                mindata = int(limitdata[0][3])
                maxdata = int(limitdata[1][3])
                middata = int(limitdata[2][3])

                for limit in limitdata:
                    print(limit)


                if int(decibel) < mindata:
                    b.lights[5].state(bri=254, hue=20000)
                elif int(decibel) > mindata and int(decibel) < maxdata:
                    b.lights[5].state(bri=254, hue=4000)
                elif int(decibel) > maxdata:
                    b.lights[5].state(bri=254, hue=1000)



                conn.sendall(data)
