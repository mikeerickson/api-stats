---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_87511c9a82703529bdb9878b9f9bc314 -->
## api/v1/appearances

> Example request:

```bash
curl -X GET "http://localhost/api/v1/appearances" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/appearances",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/v1/appearances`

`HEAD api/v1/appearances`


<!-- END_87511c9a82703529bdb9878b9f9bc314 -->

<!-- START_00dfa5ec4157aaf076c05298ec0c63af -->
## api/v1/appearances/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/appearances/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/appearances/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/appearances/create`

`HEAD api/v1/appearances/create`


<!-- END_00dfa5ec4157aaf076c05298ec0c63af -->

<!-- START_f4f68fc5f520b63562cf0d1bd214b700 -->
## api/v1/appearances

> Example request:

```bash
curl -X POST "http://localhost/api/v1/appearances" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/appearances",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/appearances`


<!-- END_f4f68fc5f520b63562cf0d1bd214b700 -->

<!-- START_96c2e60750153675fec23442a6aa1cf3 -->
## api/v1/appearances/{appearance}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/appearances/{appearance}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/appearances/{appearance}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/appearances/{appearance}`

`HEAD api/v1/appearances/{appearance}`


<!-- END_96c2e60750153675fec23442a6aa1cf3 -->

<!-- START_5a5c08ce7531c5a0954a161892baebd0 -->
## api/v1/appearances/{appearance}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/appearances/{appearance}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/appearances/{appearance}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/appearances/{appearance}/edit`

`HEAD api/v1/appearances/{appearance}/edit`


<!-- END_5a5c08ce7531c5a0954a161892baebd0 -->

<!-- START_6069799b8144ab5b10e6adc112363ae2 -->
## api/v1/appearances/{appearance}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/appearances/{appearance}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/appearances/{appearance}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/appearances/{appearance}`

`PATCH api/v1/appearances/{appearance}`


<!-- END_6069799b8144ab5b10e6adc112363ae2 -->

<!-- START_6182b85eec868ad92dfcc1fac772165b -->
## api/v1/appearances/{appearance}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/appearances/{appearance}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/appearances/{appearance}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/appearances/{appearance}`


<!-- END_6182b85eec868ad92dfcc1fac772165b -->

<!-- START_3ca098bdd79bbab8578efe076c1ad9d5 -->
## api/v1/batting

> Example request:

```bash
curl -X GET "http://localhost/api/v1/batting" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batting",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "API Access Requires Endpoint"
}
```

### HTTP Request
`GET api/v1/batting`

`HEAD api/v1/batting`


<!-- END_3ca098bdd79bbab8578efe076c1ad9d5 -->

<!-- START_23a3ab72f2d4e8e4cd17c55e0cbdddaf -->
## api/v1/batting/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/batting/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batting/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/batting/create`

`HEAD api/v1/batting/create`


<!-- END_23a3ab72f2d4e8e4cd17c55e0cbdddaf -->

<!-- START_5f3c6aca3db6fefbb4e8410f752f723b -->
## api/v1/batting

> Example request:

```bash
curl -X POST "http://localhost/api/v1/batting" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batting",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/batting`


<!-- END_5f3c6aca3db6fefbb4e8410f752f723b -->

<!-- START_72b1c77788a88bc5052acb71ffbbb6f3 -->
## api/v1/batting/{batting}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/batting/{batting}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batting/{batting}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/batting/{batting}`

`HEAD api/v1/batting/{batting}`


<!-- END_72b1c77788a88bc5052acb71ffbbb6f3 -->

<!-- START_9259e49d60c7e171a5ec6dcc36997cd0 -->
## api/v1/batting/{batting}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/batting/{batting}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batting/{batting}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/batting/{batting}/edit`

`HEAD api/v1/batting/{batting}/edit`


<!-- END_9259e49d60c7e171a5ec6dcc36997cd0 -->

<!-- START_efd261446d5352eb926570fb118a89dd -->
## api/v1/batting/{batting}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/batting/{batting}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batting/{batting}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/batting/{batting}`

`PATCH api/v1/batting/{batting}`


<!-- END_efd261446d5352eb926570fb118a89dd -->

<!-- START_d215debf0d1bb458a4d30062ff760fdb -->
## api/v1/batting/{batting}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/batting/{batting}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batting/{batting}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/batting/{batting}`


<!-- END_d215debf0d1bb458a4d30062ff760fdb -->

<!-- START_2299015218b20297a8fe36e7cdb2eb9e -->
## api/v1/batters

> Example request:

```bash
curl -X GET "http://localhost/api/v1/batters" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batters",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "API Access Requires Endpoint"
}
```

### HTTP Request
`GET api/v1/batters`

`HEAD api/v1/batters`


<!-- END_2299015218b20297a8fe36e7cdb2eb9e -->

<!-- START_4d8da7c8850af21cf3f5458cbbed29db -->
## api/v1/batters/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/batters/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batters/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/batters/create`

`HEAD api/v1/batters/create`


<!-- END_4d8da7c8850af21cf3f5458cbbed29db -->

<!-- START_8782cc0d50ac98ea2de468864ef30c54 -->
## api/v1/batters

> Example request:

```bash
curl -X POST "http://localhost/api/v1/batters" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batters",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/batters`


<!-- END_8782cc0d50ac98ea2de468864ef30c54 -->

<!-- START_59a80a4d8d50ec39c992724097ced090 -->
## api/v1/batters/{batter}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/batters/{batter}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batters/{batter}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/batters/{batter}`

`HEAD api/v1/batters/{batter}`


<!-- END_59a80a4d8d50ec39c992724097ced090 -->

<!-- START_d1f3a597ac51e25e884cf14105b909e3 -->
## api/v1/batters/{batter}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/batters/{batter}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batters/{batter}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/batters/{batter}/edit`

`HEAD api/v1/batters/{batter}/edit`


<!-- END_d1f3a597ac51e25e884cf14105b909e3 -->

<!-- START_93910ef713f51189e4f2dcd36f1173b2 -->
## api/v1/batters/{batter}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/batters/{batter}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batters/{batter}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/batters/{batter}`

`PATCH api/v1/batters/{batter}`


<!-- END_93910ef713f51189e4f2dcd36f1173b2 -->

<!-- START_7f88c10940cb0fe1027b21e268cb0d0f -->
## api/v1/batters/{batter}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/batters/{batter}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/batters/{batter}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/batters/{batter}`


<!-- END_7f88c10940cb0fe1027b21e268cb0d0f -->

<!-- START_2aab99de652714f31146e3c009ef5298 -->
## api/v1/fielding

> Example request:

```bash
curl -X GET "http://localhost/api/v1/fielding" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/fielding",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "API Access Requires Endpoint"
}
```

### HTTP Request
`GET api/v1/fielding`

`HEAD api/v1/fielding`


<!-- END_2aab99de652714f31146e3c009ef5298 -->

<!-- START_4c8166c39edf9cab250d1f4d17985196 -->
## api/v1/fielding/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/fielding/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/fielding/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/fielding/create`

`HEAD api/v1/fielding/create`


<!-- END_4c8166c39edf9cab250d1f4d17985196 -->

<!-- START_8509d1276319fec4381c288bd9c9cc09 -->
## api/v1/fielding

> Example request:

```bash
curl -X POST "http://localhost/api/v1/fielding" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/fielding",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/fielding`


<!-- END_8509d1276319fec4381c288bd9c9cc09 -->

<!-- START_02d13b456d4222d265b34c380aa059e1 -->
## api/v1/fielding/{fielding}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/fielding/{fielding}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/fielding/{fielding}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/fielding/{fielding}`

`HEAD api/v1/fielding/{fielding}`


<!-- END_02d13b456d4222d265b34c380aa059e1 -->

<!-- START_2b2ce1559c89dbf360ff6cd1cc862fc7 -->
## api/v1/fielding/{fielding}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/fielding/{fielding}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/fielding/{fielding}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/fielding/{fielding}/edit`

`HEAD api/v1/fielding/{fielding}/edit`


<!-- END_2b2ce1559c89dbf360ff6cd1cc862fc7 -->

<!-- START_f4a836c5ff9d76cd691a7c00d2a92b99 -->
## api/v1/fielding/{fielding}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/fielding/{fielding}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/fielding/{fielding}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/fielding/{fielding}`

`PATCH api/v1/fielding/{fielding}`


<!-- END_f4a836c5ff9d76cd691a7c00d2a92b99 -->

<!-- START_b07969abe37e59e137c0c4d7e65e2152 -->
## api/v1/fielding/{fielding}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/fielding/{fielding}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/fielding/{fielding}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/fielding/{fielding}`


<!-- END_b07969abe37e59e137c0c4d7e65e2152 -->

<!-- START_bbedc58d6a9edc70e7807ded1b706f00 -->
## api/v1/players

> Example request:

```bash
curl -X GET "http://localhost/api/v1/players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/players",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "API Access Requires Endpoint"
}
```

### HTTP Request
`GET api/v1/players`

`HEAD api/v1/players`


<!-- END_bbedc58d6a9edc70e7807ded1b706f00 -->

<!-- START_0c1441ed2e7e2bbaa61b57490fab645b -->
## api/v1/players/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/players/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/players/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/players/create`

`HEAD api/v1/players/create`


<!-- END_0c1441ed2e7e2bbaa61b57490fab645b -->

<!-- START_3dea64b0e892a3c7f5e469f29a3fe916 -->
## api/v1/players

> Example request:

```bash
curl -X POST "http://localhost/api/v1/players" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/players",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/players`


<!-- END_3dea64b0e892a3c7f5e469f29a3fe916 -->

<!-- START_142656e9d2310f13b88eb19c0e2e42c5 -->
## api/v1/players/{player}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/players/{player}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/players/{player}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/players/{player}`

`HEAD api/v1/players/{player}`


<!-- END_142656e9d2310f13b88eb19c0e2e42c5 -->

<!-- START_bf6a9f0be98b322ad640875f92ca0ba5 -->
## api/v1/players/{player}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/players/{player}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/players/{player}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/players/{player}/edit`

`HEAD api/v1/players/{player}/edit`


<!-- END_bf6a9f0be98b322ad640875f92ca0ba5 -->

<!-- START_9ec364ececd6c2552a89baa83691f92e -->
## api/v1/players/{player}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/players/{player}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/players/{player}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/players/{player}`

`PATCH api/v1/players/{player}`


<!-- END_9ec364ececd6c2552a89baa83691f92e -->

<!-- START_7b97c32c9850152be9af38730797701f -->
## api/v1/players/{player}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/players/{player}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/players/{player}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/players/{player}`


<!-- END_7b97c32c9850152be9af38730797701f -->

<!-- START_2c9c693c9d6a60cdac932f68a8a4b559 -->
## api/v1/pitching

> Example request:

```bash
curl -X GET "http://localhost/api/v1/pitching" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitching",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "API Access Requires Endpoint"
}
```

### HTTP Request
`GET api/v1/pitching`

`HEAD api/v1/pitching`


<!-- END_2c9c693c9d6a60cdac932f68a8a4b559 -->

<!-- START_0b6755b55e6ecde0e7eed8e0064f936f -->
## api/v1/pitching/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/pitching/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitching/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/pitching/create`

`HEAD api/v1/pitching/create`


<!-- END_0b6755b55e6ecde0e7eed8e0064f936f -->

<!-- START_a7166201d840dd2f1be736037f04ac89 -->
## api/v1/pitching

> Example request:

```bash
curl -X POST "http://localhost/api/v1/pitching" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitching",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/pitching`


<!-- END_a7166201d840dd2f1be736037f04ac89 -->

<!-- START_94a4379770571cbd0f1b80d974837e22 -->
## api/v1/pitching/{pitching}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/pitching/{pitching}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitching/{pitching}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/pitching/{pitching}`

`HEAD api/v1/pitching/{pitching}`


<!-- END_94a4379770571cbd0f1b80d974837e22 -->

<!-- START_a2bae41b9fc09811d6dfb4883b8bb3ef -->
## api/v1/pitching/{pitching}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/pitching/{pitching}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitching/{pitching}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/pitching/{pitching}/edit`

`HEAD api/v1/pitching/{pitching}/edit`


<!-- END_a2bae41b9fc09811d6dfb4883b8bb3ef -->

<!-- START_79894435e4275203c95316bf677fb1e7 -->
## api/v1/pitching/{pitching}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/pitching/{pitching}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitching/{pitching}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/pitching/{pitching}`

`PATCH api/v1/pitching/{pitching}`


<!-- END_79894435e4275203c95316bf677fb1e7 -->

<!-- START_d0145e9f48bea010f8815d8cff147fac -->
## api/v1/pitching/{pitching}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/pitching/{pitching}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitching/{pitching}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/pitching/{pitching}`


<!-- END_d0145e9f48bea010f8815d8cff147fac -->

<!-- START_df0ad0b3f3072e7045f19b61fcae7786 -->
## api/v1/pitchers

> Example request:

```bash
curl -X GET "http://localhost/api/v1/pitchers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitchers",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "API Access Requires Endpoint"
}
```

### HTTP Request
`GET api/v1/pitchers`

`HEAD api/v1/pitchers`


<!-- END_df0ad0b3f3072e7045f19b61fcae7786 -->

<!-- START_6fbd57198ea40941f0af34a8a97cecdb -->
## api/v1/pitchers/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/pitchers/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitchers/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/pitchers/create`

`HEAD api/v1/pitchers/create`


<!-- END_6fbd57198ea40941f0af34a8a97cecdb -->

<!-- START_b9a68c1b096ef00917fee9702c5f9944 -->
## api/v1/pitchers

> Example request:

```bash
curl -X POST "http://localhost/api/v1/pitchers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitchers",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/pitchers`


<!-- END_b9a68c1b096ef00917fee9702c5f9944 -->

<!-- START_197811e19209d7dc20cfbca3b0c167f0 -->
## api/v1/pitchers/{pitcher}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/pitchers/{pitcher}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitchers/{pitcher}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/pitchers/{pitcher}`

`HEAD api/v1/pitchers/{pitcher}`


<!-- END_197811e19209d7dc20cfbca3b0c167f0 -->

<!-- START_db1594c5bcd099c1bf0180261a493e1d -->
## api/v1/pitchers/{pitcher}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/pitchers/{pitcher}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitchers/{pitcher}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/pitchers/{pitcher}/edit`

`HEAD api/v1/pitchers/{pitcher}/edit`


<!-- END_db1594c5bcd099c1bf0180261a493e1d -->

<!-- START_4bdc1a0ec52fbd7c98655bd3ff6d7341 -->
## api/v1/pitchers/{pitcher}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/pitchers/{pitcher}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitchers/{pitcher}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/pitchers/{pitcher}`

`PATCH api/v1/pitchers/{pitcher}`


<!-- END_4bdc1a0ec52fbd7c98655bd3ff6d7341 -->

<!-- START_8b08dd3a2b6a5e1fd66dcd3340b29bfe -->
## api/v1/pitchers/{pitcher}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/pitchers/{pitcher}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/pitchers/{pitcher}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/pitchers/{pitcher}`


<!-- END_8b08dd3a2b6a5e1fd66dcd3340b29bfe -->

<!-- START_7934dca11f6d1c152cd1fa76113de28a -->
## api/v1/managers

> Example request:

```bash
curl -X GET "http://localhost/api/v1/managers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/managers",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "API Access Requires Endpoint"
}
```

### HTTP Request
`GET api/v1/managers`

`HEAD api/v1/managers`


<!-- END_7934dca11f6d1c152cd1fa76113de28a -->

<!-- START_ac131acbe4eefd1b73c43b738f6faae3 -->
## api/v1/managers/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/managers/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/managers/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/managers/create`

`HEAD api/v1/managers/create`


<!-- END_ac131acbe4eefd1b73c43b738f6faae3 -->

<!-- START_68b7b40e9c26a5e860dfb315fc9f21d7 -->
## api/v1/managers

> Example request:

```bash
curl -X POST "http://localhost/api/v1/managers" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/managers",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/managers`


<!-- END_68b7b40e9c26a5e860dfb315fc9f21d7 -->

<!-- START_97a15118a72d229d47bd92869dcb4b3a -->
## api/v1/managers/{manager}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/managers/{manager}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/managers/{manager}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/managers/{manager}`

`HEAD api/v1/managers/{manager}`


<!-- END_97a15118a72d229d47bd92869dcb4b3a -->

<!-- START_be997578350e1663d5ccce1837e9e55d -->
## api/v1/managers/{manager}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/managers/{manager}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/managers/{manager}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/managers/{manager}/edit`

`HEAD api/v1/managers/{manager}/edit`


<!-- END_be997578350e1663d5ccce1837e9e55d -->

<!-- START_ade14ddb1c83f229d8032e83aa7aed6e -->
## api/v1/managers/{manager}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/managers/{manager}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/managers/{manager}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/managers/{manager}`

`PATCH api/v1/managers/{manager}`


<!-- END_ade14ddb1c83f229d8032e83aa7aed6e -->

<!-- START_5306243c16a8decf1355b1a78230afb3 -->
## api/v1/managers/{manager}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/managers/{manager}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/managers/{manager}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/managers/{manager}`


<!-- END_5306243c16a8decf1355b1a78230afb3 -->

<!-- START_64eb6d1359db01295a5285ff98bd73c2 -->
## api/v1/parks

> Example request:

```bash
curl -X GET "http://localhost/api/v1/parks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/parks",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "API Access Requires Endpoint"
}
```

### HTTP Request
`GET api/v1/parks`

`HEAD api/v1/parks`


<!-- END_64eb6d1359db01295a5285ff98bd73c2 -->

<!-- START_5e6380ef6ff3478ab155fd34c435fedf -->
## api/v1/parks/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/parks/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/parks/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/parks/create`

`HEAD api/v1/parks/create`


<!-- END_5e6380ef6ff3478ab155fd34c435fedf -->

<!-- START_7dd182807ea1dea2879e0caa58128756 -->
## api/v1/parks

> Example request:

```bash
curl -X POST "http://localhost/api/v1/parks" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/parks",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/parks`


<!-- END_7dd182807ea1dea2879e0caa58128756 -->

<!-- START_1188e3a72ffb5b5dd3435b9312a16750 -->
## api/v1/parks/{park}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/parks/{park}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/parks/{park}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/parks/{park}`

`HEAD api/v1/parks/{park}`


<!-- END_1188e3a72ffb5b5dd3435b9312a16750 -->

<!-- START_f609f5712d402b768a0b5fa3811f8aee -->
## api/v1/parks/{park}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/parks/{park}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/parks/{park}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/parks/{park}/edit`

`HEAD api/v1/parks/{park}/edit`


<!-- END_f609f5712d402b768a0b5fa3811f8aee -->

<!-- START_73c7fa42ce584d0a0095d7df62770f9a -->
## api/v1/parks/{park}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/parks/{park}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/parks/{park}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/parks/{park}`

`PATCH api/v1/parks/{park}`


<!-- END_73c7fa42ce584d0a0095d7df62770f9a -->

<!-- START_d9440dc1d6d999ed4ab96746a3225719 -->
## api/v1/parks/{park}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/parks/{park}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/parks/{park}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/parks/{park}`


<!-- END_d9440dc1d6d999ed4ab96746a3225719 -->

<!-- START_59b8f9b9e0e46c8d0875e706284aa04b -->
## api/v1/teams

> Example request:

```bash
curl -X GET "http://localhost/api/v1/teams" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teams",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "API Access Requires Endpoint"
}
```

### HTTP Request
`GET api/v1/teams`

`HEAD api/v1/teams`


<!-- END_59b8f9b9e0e46c8d0875e706284aa04b -->

<!-- START_826c9fce2c0c93439e865baa1accd175 -->
## api/v1/teams/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/teams/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teams/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/teams/create`

`HEAD api/v1/teams/create`


<!-- END_826c9fce2c0c93439e865baa1accd175 -->

<!-- START_9c2019f9d2d308844e1949dfa342b380 -->
## api/v1/teams

> Example request:

```bash
curl -X POST "http://localhost/api/v1/teams" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teams",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/teams`


<!-- END_9c2019f9d2d308844e1949dfa342b380 -->

<!-- START_71c4e0a785177353e476ae3f53ed8b68 -->
## api/v1/teams/{team}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/teams/{team}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teams/{team}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/teams/{team}`

`HEAD api/v1/teams/{team}`


<!-- END_71c4e0a785177353e476ae3f53ed8b68 -->

<!-- START_972d9353f2da9dbe5b13c7498d4463bc -->
## api/v1/teams/{team}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/teams/{team}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teams/{team}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/teams/{team}/edit`

`HEAD api/v1/teams/{team}/edit`


<!-- END_972d9353f2da9dbe5b13c7498d4463bc -->

<!-- START_02dc0adeb714bc1c46bd3cde2c952827 -->
## api/v1/teams/{team}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/teams/{team}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teams/{team}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/teams/{team}`

`PATCH api/v1/teams/{team}`


<!-- END_02dc0adeb714bc1c46bd3cde2c952827 -->

<!-- START_f6de42238cfe6bcbd84ba30779151c10 -->
## api/v1/teams/{team}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/teams/{team}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teams/{team}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/teams/{team}`


<!-- END_f6de42238cfe6bcbd84ba30779151c10 -->

<!-- START_bcfdeb248497042205a7c03cbe24ebdc -->
## api/v1/teamsfranchises

> Example request:

```bash
curl -X GET "http://localhost/api/v1/teamsfranchises" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teamsfranchises",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "API Access Requires Endpoint"
}
```

### HTTP Request
`GET api/v1/teamsfranchises`

`HEAD api/v1/teamsfranchises`


<!-- END_bcfdeb248497042205a7c03cbe24ebdc -->

<!-- START_49d051ad3c16e0d8dbe3c27017f5571c -->
## api/v1/teamsfranchises/create

> Example request:

```bash
curl -X GET "http://localhost/api/v1/teamsfranchises/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teamsfranchises/create",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "create"
}
```

### HTTP Request
`GET api/v1/teamsfranchises/create`

`HEAD api/v1/teamsfranchises/create`


<!-- END_49d051ad3c16e0d8dbe3c27017f5571c -->

<!-- START_64a8985bd90d4d9b3f6da0d73ae881f3 -->
## api/v1/teamsfranchises

> Example request:

```bash
curl -X POST "http://localhost/api/v1/teamsfranchises" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teamsfranchises",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/v1/teamsfranchises`


<!-- END_64a8985bd90d4d9b3f6da0d73ae881f3 -->

<!-- START_7c430ffd5884e61b6dbd43c190a7f373 -->
## api/v1/teamsfranchises/{teamsfranchise}

> Example request:

```bash
curl -X GET "http://localhost/api/v1/teamsfranchises/{teamsfranchise}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teamsfranchises/{teamsfranchise}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/teamsfranchises/{teamsfranchise}`

`HEAD api/v1/teamsfranchises/{teamsfranchise}`


<!-- END_7c430ffd5884e61b6dbd43c190a7f373 -->

<!-- START_ab52ec10fe76bb1ae476ca0c40c27dc3 -->
## api/v1/teamsfranchises/{teamsfranchise}/edit

> Example request:

```bash
curl -X GET "http://localhost/api/v1/teamsfranchises/{teamsfranchise}/edit" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teamsfranchises/{teamsfranchise}/edit",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": 501,
    "message": "Unsupported Endpoint",
    "requestedEndpoint": "1"
}
```

### HTTP Request
`GET api/v1/teamsfranchises/{teamsfranchise}/edit`

`HEAD api/v1/teamsfranchises/{teamsfranchise}/edit`


<!-- END_ab52ec10fe76bb1ae476ca0c40c27dc3 -->

<!-- START_85560411b5ac4cabe50f5b79ceafae80 -->
## api/v1/teamsfranchises/{teamsfranchise}

> Example request:

```bash
curl -X PUT "http://localhost/api/v1/teamsfranchises/{teamsfranchise}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teamsfranchises/{teamsfranchise}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/v1/teamsfranchises/{teamsfranchise}`

`PATCH api/v1/teamsfranchises/{teamsfranchise}`


<!-- END_85560411b5ac4cabe50f5b79ceafae80 -->

<!-- START_98b696af7a574daff5191fa0f6a780c5 -->
## api/v1/teamsfranchises/{teamsfranchise}

> Example request:

```bash
curl -X DELETE "http://localhost/api/v1/teamsfranchises/{teamsfranchise}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/v1/teamsfranchises/{teamsfranchise}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/v1/teamsfranchises/{teamsfranchise}`


<!-- END_98b696af7a574daff5191fa0f6a780c5 -->

