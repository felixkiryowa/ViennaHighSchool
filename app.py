from flask import Flask, request, jsonify 

app = Flask(__name__)

@app.route('/')
def index():
	return jsonify({"message":"Hello World" })

@app.route('/about')
def about():
	return "<p>This is the about page</p>"
@app.route('/register',methods=['POST'])
	def register():
		info = request.get_json()

		username = info.get('username')
		email = info.get('email')
		password= info.get('password')

		user = {
			"username":username,
			"email":email,
			"password":password
		}
	



if __name__ == "__main__":
	app.run(debug=True)
