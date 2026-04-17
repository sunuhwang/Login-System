import requests

url = "http://127.0.0.1:8080/login"
while True:
    data = {
        'name': input("enter your name:"),
        'password': input("enter your password:")
    }
    response  =requests.post(url, json=data)
    print(response.text)