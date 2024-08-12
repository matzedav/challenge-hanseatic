## Software Architecture

![alt text](https://github.com/matzedav/challenge-hanseatic/blob/main/images/Architecture.png?raw=true)

1. The request is sent from the Angular/Vue/React frontend and reaches the backend `gateway/router`. 
2. The router handles the request and checks if the user is authorized requesting the source. The auth middleware validates with Eloquent `models` the request and forwards the request to the `controller`. 
3. The controller handles the processing of the request. The controller requests, processes and manipulates the data. Some data is requested from the external `Simpsons-API` and the other data is requested from the mysql database. The data which is stored in the database is accessed through Eloquent models. 
4. The model will directly create new records, read stored data from a specific table, update an existing record or delete a record.
5. The controller reads the fetched data and forms the data as readable.
6. The response is sent to the frontend. 

## Get started

1. To build the docker container the user have to run `docker-compose build` first. The docker will download and install all dependencies and wrap it up in a docker container. The container will contain a mysql-service and the laravel-api-service. 

2. With the command `docker-compose up` Docker will start the container. Now the container should be able to reach locally.

## Endpoints

| Method   | URL           | Description                           | 
| -------- | ------------- |-------------------------------------- |
| `POST`   | `/api/auth`   | Authenticate with the backend server. |
| `GET`    | `/api/quotes` | Retrieve five quotes.                 |

## Authentification and flow

Sending correct combination of username `username` and `password` to the auth endpoint will return the bearer token which expires after 10 minutes.

```json
{
    "username": "matzedav",
    "password": "Test1234#"    
}
```

The response will look like:
```json
{
    "user": {
        "id": 1,
        "username": "matzedav",
        "remember_token": null,
        "created_at": "2024-08-11T08:27:49.000000Z",
        "updated_at": "2024-08-11T08:27:49.000000Z"
    },
    "token": "8|ssoyEHXQ2dKr5hlVPNatG1ZVlAgB5bWNXocwRSJ88a496bc0"
}
```

This token can be used for the `Bearer Schema` authentication header in order to receive data from the quotes endpoint. If the token is expired or the token is not registred the quotes endpoint will return `HTTP 403 - unauthorized`.


## Example Flow

Screenshot 1 (auth):
![alt text](https://github.com/matzedav/challenge-hanseatic/blob/main/images/POST_auth.png?raw=true)

Screenshot 2 (quotes):
![alt text](https://github.com/matzedav/challenge-hanseatic/blob/main/images/GET_quotes.png?raw=true)
