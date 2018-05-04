import warnings
warnings.simplefilter(action='ignore', category=FutureWarning)
import os
import time
import sys
import numpy as np
import pandas as pd
from keras.models import load_model
from sklearn.preprocessing import LabelEncoder, StandardScaler

classifier = load_model('15_10_1tts.h5')
# filename = sys.argv[1]


def score(file):
    dataset = pd.read_csv(file, index_col=0)
    dataset = dataset[sorted(dataset.columns)]

    for column in dataset.columns:
        if dataset[column].dtype == type(object):
            le = LabelEncoder()
            dataset[column] = le.fit_transform(dataset[column])

    x = dataset.iloc[:, :]
    sc_x = StandardScaler()
    x = sc_x.fit_transform(x)
    result = 0
    count = 0
    y = classifier.predict(x)
    for i in range(len(y)):
        if y[i] > 0.5:
            count += 1
            result = count / len(y)
    return result


filename = "webui/data.json"
for file in os.listdir('prod_csv_exploit'):
    result = score('prod_csv_exploit/' + file)
    if result <= 0.75:
        os.remove('prod_csv_exploit/' + file)
    outfile = open(filename, "w")
    outfile.write("[[" + "%.0f" % (result*100) + ", \"" + file + "\"]]")
    outfile.close()
    print("%.2f" % (result*100))
    
