import http.client as http
from time import gmtime, strftime

time=strftime("%Y-%m-%d %H:%M:%S", gmtime())
get="/api/upload.php?time=" + time[0:10] + "+" + time[11:13] + "%3A" + time[14:16] + "%3A" + time[17:19] + "&value=1&sock=1"
print(get)
httpServ = http.HTTPConnection("maladidea.heinemann.at", 80)
httpServ.connect()
httpServ.request('GET', get)

