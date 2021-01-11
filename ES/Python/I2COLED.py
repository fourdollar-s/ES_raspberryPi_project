
#OLED
import time
import sys
import Adafruit_SSD1306
import os
from datetime import datetime
 
from PIL import Image
from PIL import ImageDraw
from PIL import ImageFont
 

FONT_SIZE = 14

v1 = sys.argv[1]

print(v1)
disp = Adafruit_SSD1306.SSD1306_128_64(rst=0)
 
disp.begin()
disp.clear()
disp.display()
 
width = disp.width
height = disp.height
 
image = Image.new('1', (width, height))
draw = ImageDraw.Draw(image)
 
font=ImageFont.truetype("./ARIALUNI.TTF", FONT_SIZE)

load = os.getloadavg()


#draw.rectangle((0, 0, width, height), outline=0, fill=0)
num=0
for i in v1.split(','):
    if num==0:
        draw.text((0, 0), i,  font=font, fill=255)
        num=num+1
    else:
        draw.text((0, FONT_SIZE*num-1), i,  font=font, fill=255)
        num=num+1
disp.image(image)
disp.display()
time.sleep(0.2)
disp.clear()
