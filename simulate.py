import requests
import os
import time

filename = "webui/doughnut/data.json"
historyname = "webui/doughnut/history.json"
API = "http://localhost:5000/predict"


for file in os.listdir('test_csv'):
    payload = {"csv": "test_csv/" + file}
    response = requests.post(API, payload).json()
    if(response["success"]):
        result = response["prediction"]
    outfile = open(filename, "w")
    history = open(historyname, "a+")
    outfile.write("[[" + "%.0f" % (result) + ", \"" + file + "\"]]")
    outfile.close()
    history.write( file + "    =>>    " + "%.0f" % (result) +"\n" )
    history.close()

    print("%.2f" % (result))
    time.sleep(1)
