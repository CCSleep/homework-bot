from urllib.request import urlopen as req
from bs4 import BeautifulSoup as soup
import datetime
from time import sleep

def hw():
    try:
        # 1 - URL
        url = 'https://dev1707.tk/page/scrape/api.php'
        #pvid = province id from website

        # 2 - Request URL
        webopen = req(url)
        page_html = webopen.read()
        webopen.close()

        # 3 - Convert page_html to Soup Object

        data = soup(page_html,'html.parser')

        # 4- Find Element ( td:'strokeme' )
        temp = data.findAll('p')
        if str(temp[0]) == "<p>\n</p>":
          return "สำหรับวันนี้ไม่มีการบ้าน ขอให้เคลียร์การบ้านที่เหลือให้เรียบร้อยนะครับ"
        temp = str(temp[0])
        temp = temp.replace("<p>","")
        temp = temp.replace("</p>","")
        temp = temp.replace("<br/>","\n")
        text = temp
        #print(f'จังหวัด: {pv} อุณหภูมิ: {result}')
        return text
    except:
        #print('No Result')
        return 'Error'

import songline
#==https://notify-bot.line.me/my/==#
#token = '..........' #canary 
#token = '..........' #nightly
messenger = songline.Sendline(token)


while True:
  times = str(int(datetime.datetime.now().strftime("%H")) +7 ) + datetime.datetime.now().strftime(" %M %S")
  if times == "16 00 00": # ชม. นท. วิ.
    message = '\nการบ้านประจำวันที่ ' + datetime.datetime.now().strftime("%x") + "\n" + hw()
    print(message)
    messenger.sendtext(message) 
    sleep(10)
  print(times)
  sleep(0.5)
