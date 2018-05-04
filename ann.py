import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import LabelEncoder, OneHotEncoder, StandardScaler
from sklearn.metrics import confusion_matrix
from sklearn.metrics import accuracy_score
from sklearn.feature_selection import VarianceThreshold
from pandas.plotting import scatter_matrix
from pylab import rcParams
rcParams['figure.figsize'] = 30, 30

# Import Data
b_data = pd.read_csv('dataset/benign_new_new.csv', index_col=0)
e_data = pd.read_csv('dataset/exploit_new_new.csv', index_col=0)

# Data Preprocessing
b_data = b_data[sorted(b_data.columns)]
#b_data = b_data[:18240]
e_data = e_data[sorted(e_data.columns)]
e_data = e_data[:5000]

b_data['type'] = 'benign'
e_data['type'] = 'exploit'

frame = [e_data, b_data]
dataset = pd.concat(frame)
dataset = dataset.sample(frac=1).reset_index(drop=True)

for column in dataset.columns:
    if dataset[column].dtype == type(object):
        le = LabelEncoder()
        dataset[column] = le.fit_transform(dataset[column])



nancolumns = dataset.columns[dataset.isnull().any()].tolist()
for nanColumn in nancolumns:
    dataset = dataset.drop(nanColumn, axis=1)


X = dataset.iloc[:, 0:-1].values
Y = dataset.iloc[:, -1:].values


sc_x = StandardScaler()
X = sc_x.fit_transform(X)


# Evaluating accuracy of ANN
import keras
from keras.models import Sequential
from keras.layers import Dense
from keras.wrappers.scikit_learn import KerasClassifier
from sklearn.model_selection import cross_val_score, GridSearchCV
from keras.models import load_model


def build_classifier():
    classifier = Sequential()
    classifier.add(Dense(units=15, kernel_initializer="uniform", activation="tanh", input_dim=20))
    classifier.add(Dense(units=10, kernel_initializer="uniform", activation="tanh"))
    classifier.add(Dense(units=1, kernel_initializer="uniform", activation="hard_sigmoid"))
    classifier.compile(optimizer="rmsprop", loss="binary_crossentropy", metrics=['accuracy'])
    return classifier



classifier = build_classifier()

#keras.utils.plot_model(classifier, to_file='model.png', show_layer_names=True, show_shapes=True)

# training_info = classifier.fit(X, Y, batch_size=256, epochs=100)
# score = classifier.evaluate(X, Y,verbose=1)
# y = classifier.predict(X)
# y = y > 0.5
# print("Test loss:", round(score[0],3))
# print("Test accuracy:", round(score[1],3))

# #plot loss graph
# plt.plot(training_info.history['loss'])
# plt.plot(training_info.history['val_loss'])
# plt.title('model loss')
# plt.ylabel('loss')
# plt.xlabel('epoch')
# plt.legend(['train', 'test'], loc='upper left')
# classifier.save('15_10_1tts.h5')
# cm = confusion_matrix(Y, y,)

