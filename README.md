# guild-backend


# Public APIs

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


### Authentication Needed APIs
