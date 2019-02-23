
## nginx配置
```
map $http_upgrade $connection_upgrade {
    default upgrade;
    ''      close;
}
server {
    listen 80;
    server_name your.domain.com;
    root /path/to/laravel/public;
    index index.php;

    location = /index.php {
        # Ensure that there is no such file named "not_exists"
        # in your "public" directory.
        try_files /not_exists @swoole;
    }

    location / {
        try_files $uri $uri/ @swoole;
    }

    location @swoole {
        set $suffix "";

        if ($uri = /index.php) {
            set $suffix ?$query_string;
        }

        proxy_set_header Host $http_host;
        proxy_set_header Scheme $scheme;
        proxy_set_header SERVER_PORT $server_port;
        proxy_set_header REMOTE_ADDR $remote_addr;
        proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
        proxy_set_header Upgrade $http_upgrade;
        proxy_set_header Connection $connection_upgrade;

        # IF https
        # proxy_set_header HTTPS "on";

        proxy_pass http://127.0.0.1:1215$suffix;
    }
}
```

## 迁移数据表结构
`php artisan migrate`
> 首次部署生成数据：`php artisan db:seed`。
> 将会导入侧栏菜单数据和基本前台分类数据。
> 
> 导入测试用户：`php artisan db:seed --class=UsersTableSeeder`。
> 此操作将会导入一个系统级别的超级管理员账号，
> 账号：`17793160197`。密码：`123456`

## 填充基本数据
`php artisan `

## 生成加密所需秘钥
`php artisan passport:keys`

## 生成客户端
`php artisan passport:client --password --name='客户端名称'`

## 启动服务
`php artisan swoole:http start`


# 二次开发

### 生成API文档
> 为`dingo/api`开发API接口之后需要生成接口文档
`php artisan api:docs --output-file=documentAPI.md`

