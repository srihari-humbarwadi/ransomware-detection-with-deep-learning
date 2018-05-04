import flask
import pandas as pd
from keras.models import load_model
from sklearn.preprocessing import LabelEncoder, StandardScaler

app = flask.Flask(__name__)
classifier = None


def load_classifier():
    global classifier
    classifier = load_model('15_10_1tts.h5')


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


@app.route("/")
def hello():
    return "hello world!!!"


@app.route("/predict", methods=["POST"])
def predict():
    data = {"success": False}
    if flask.request.method == "POST":
        if flask.request.form.get("csv"):
            result = score(flask.request.form.get("csv")) * 100
            data["success"] = True
            data["prediction"] =result
        else:
            data["msg"] = "Send log file name in request"
    return flask.jsonify(data)


if __name__ == "__main__":
    load_classifier()
    app.run(port=5000)
