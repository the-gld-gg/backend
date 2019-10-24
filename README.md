# guild-backend


GET https://guild.ehsangazar.com/api/general

## POST https://guild.ehsangazar.com/api/register

Payload:
```
{
    "name": "<NAME>",
    "email": "<EMAIL>",
    "password": "<PASSWORD>",
    "password_confirmation": "<PASSWORD>"
}
```

## POST https://guild.ehsangazar.com/api/login

Payload:
```
{
    "email": "<EMAIL>",
    "password": "<PASSWORD>"
}

```

## GET https://guild.ehsangazar.com/api/logout

## POST https://guild.ehsangazar.com/api/forgot

Payload:
```
{
    "email": "<EMAIL>"
}

```

## POST https://guild.ehsangazar.com/api/reset

Payload:
```
{
    "token": "FROM EMAIL",
    "password": "<PASSWORD>",
    "password_confirmation": "<PASSWORD>"
}

```

## GET https://guild.ehsangazar.com/api/user/details
Header:
```
{
    "Authorization": "Bearer <TOKEN>",
}

```

## POST https://guild.ehsangazar.com/api/user/update
Header:
```
{
    "Authorization": "Bearer <TOKEN>",
}

```
Payload:
```
{
    "name": "<NAME>"
}

```

## POST https://guild.ehsangazar.com/api/user/update-password
Header:
```
{
    "Authorization": "Bearer <TOKEN>",
}

```
Payload:
```
{
    "password": "<PASSWORD>",
    "password_confirmation": "<PASSWORD>"
}

```

## GET https://guild.ehsangazar.com/api/game/list?page=1

### Authentication Needed APIs
