# -*- coding: utf-8 -*- 
import time
import sys
import codecs
#pip install beautifulsoup4     <=> pip install bs4

SiteUrl = sys.argv[1]
WebType = sys.argv[2]
Referer = sys.argv[3]

import base64
SiteUrl = base64.b64decode(SiteUrl).decode()
Referer = base64.b64decode(Referer).decode()


# "Chrome" or "Firefox" or "curl"
from bs4 import BeautifulSoup

if WebType == "curl" :
	from urllib.request import urlopen
	page_html = urlopen(SiteUrl)

else :
	from selenium import webdriver

	if WebType == "Chrome" :
		driver = webdriver.Chrome()
	else :	# 기본 : Firefox
		driver = webdriver.Firefox()

	if Referer != "not" :
		driver.get(Referer);
		time.sleep(2)

	driver.get(SiteUrl);
	time.sleep(2)
	page_html = driver.page_source
	driver.quit()
	
html = BeautifulSoup(page_html, 'html.parser')
sys.stdout=codecs.getwriter("utf-8")(sys.stdout.detach())
print(html)