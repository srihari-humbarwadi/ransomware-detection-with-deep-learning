import flask
from subprocess import call
import socket
app = flask.Flask(__name__)

def get_ip():
    s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    try:
        s.connect(('10.255.255.255', 1))
        IP = s.getsockname()[0]
    except:
        IP = '127.0.0.1'
    finally:
        s.close()
    return IP


HOST = get_ip()


@app.route("/")
def hello():
	return flask.redirect("https://www.google.com", code=302)

	
@app.route('/command')
def command():
	if flask.request.method == "GET":
		if flask.request.args.get('cmd'):
			if flask.request.args.get('cmd') == 'hibernate':
				call(["shutdown", "-h"])
				return "Received hibernate signal from command center"

			elif flask.request.args.get('cmd') == 'shutdown':
			 	call(["shutdown", "-s", "-t", "0"])
			 	return "Received shutdown signal from command center"
	return flask.redirect("https://www.google.com", code=302)


if __name__ == "__main__":
    app.run(debug =True, host=HOST, port = 5000)