from flask import Flask
from flask_mysqldb import  MySQL

"""   con esto importamos flask que es un framework para trabajar con python"""



""" objeto con parametro name que despues ocuparemos"""
app = Flask(__name__)
app.config ['MYSQL_HOST'] = 'localhost'
app.config ['MYSQL_USER'] = 'root'
app.config ['MYSQL_PASSWORD'] = ''
app.config ['MYSQL_DB'] = 'flaskcontacts'
mysql= MySQL(app)

@app.route('/')
def Index():
    return 'Hello World'
@app.route('/add_contact')   
def add_contact():
    return 'add contact'
@app.route('/edit')
def edit_contact():
    return 'edit contact'
@app.route('/delete')
def delete_contact():
    return 'delete contact'

if __name__ == '__main__':
    app.run(port = 3000, debug = True)
""" parametros con puerto y 
que se reinicie automatico"""
