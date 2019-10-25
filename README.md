# guild-backend


GET https://guild.ehsangazar.com/api/general

## [1] POST https://guild.ehsangazar.com/api/register

Payload:
```
{
    "name": "<NAME>",
    "email": "<EMAIL>",
    "password": "<PASSWORD>",
    "password_confirmation": "<PASSWORD>"
}
```

## [2] POST https://guild.ehsangazar.com/api/login

Payload:
```
{
    "email": "<EMAIL>",
    "password": "<PASSWORD>"
}

```

## [3] GET https://guild.ehsangazar.com/api/logout

## [4] POST https://guild.ehsangazar.com/api/forgot

Payload:
```
{
    "email": "<EMAIL>"
}

```

## [5] POST https://guild.ehsangazar.com/api/reset

Payload:
```
{
    "token": "FROM EMAIL",
    "password": "<PASSWORD>",
    "password_confirmation": "<PASSWORD>"
}

```

## [6] GET https://guild.ehsangazar.com/api/user/details
Header:
```
{
    "Authorization": "Bearer <TOKEN>",
}

```

## [7] POST https://guild.ehsangazar.com/api/user/update
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

## [8] POST https://guild.ehsangazar.com/api/user/update-password
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

## [9] GET https://guild.ehsangazar.com/api/game/list?page=1

## [10] GET https://guild.ehsangazar.com/api/club/list?page=1

## [11] POST https://guild.ehsangazar.com/api/club/join
Header:
```
{
    "Authorization": "Bearer <TOKEN>",
}

```
Payload:
```
{
    "club_id": "<CLUB_ID>"
}
```

## [12] POST https://guild.ehsangazar.com/api/club/leave
Header:
```
{
    "Authorization": "Bearer <TOKEN>",
}
```
Payload:
```
{
    "club_id": "<CLUB_ID>"
}
```

## [13] GET https://guild.ehsangazar.com/api/club/<club_id>
Header:
```
{
    "Authorization": "Bearer <TOKEN>",
}
```

## [14] GET https://guild.ehsangazar.com/api/club/<club_id>/users
Header:
```
{
    "Authorization": "Bearer <TOKEN>",
}
```
