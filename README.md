# Configuração
##
### [[Configuração](./README.md)] | [[Desafio](./DESAFIO.md)] | [[API](./API.md)]
<br><br>
- php artisan sail:install
- alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
- sail up

~~~
{
     "name": "Listen for XDebug on Docker App",
     "type": "php",
     "request": "launch",
     "port": 9003,
     "pathMappings": {
         "/var/www/html": "${workspaceFolder}"
     },
     "hostname": "localhost",
     "xdebugSettings": {
         "max_data": 65535,
         "show_hidden": 1,
         "max_children": 100,
         "max_depth": 5
     }
 },
~~~