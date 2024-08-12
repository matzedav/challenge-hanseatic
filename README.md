## Software Architecture

![alt text](https://github.com/matzedav/challenge-hanseatic/blob/main/images/Architecture.png?raw=true)


Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Get started



## Endpoints

| Method   | URL | Description |
| -------- | ---------------------------------------- | -------------------------------------------------- |
| `POST`   | `/api/auth` | Authenticate with the backend server. |
| `GET`    | `/api/quotes` | Retrieve five quotes. |

## Authentification

To retrieve data from the quotes endpoint the user has to authentificate with the backend. Sending correct combination of username `username` and `password` will return the bearer token which expires after 10 minutes. This token can be used for the `Bearer Schema`.

```json
{
    "username": "matzdav",
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



## Flow


## Example Flow

Screenshot 1 (auth):
![alt text](https://github.com/matzedav/challenge-hanseatic/blob/main/images/GET_quotes.png?raw=true)

Screenshot 2 (quotes):
![alt text](https://github.com/matzedav/challenge-hanseatic/blob/main/images/POST_auth.png?raw=true)
