FORMAT: 1A

# noecs system API docs

# Authorization

## 登录授权 [POST /authorizations]


+ Request (application/json)
    + Body

            {
                "username": "foo",
                "password": "bar",
                "client_id": "client id",
                "client_secret": "client secret",
                "grant_type": "password",
                "scope": ""
            }

# User

## 返回当前登录用户 [GET /user]


+ Request (application/json)
    + Headers

            Authorization: Bearer xxx

# menu

## 获取下拉菜单数据 [GET /menu/select]


+ Request (application/json)
    + Headers

            Authorization: Bearer xxx

## 侧栏数据返回(不包含顶级)。 [GET /sidebar]


+ Request (application/json)
    + Headers

            Authorization: Bearer xxx