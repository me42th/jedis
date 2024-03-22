# API
## Após configurar a extensão a documentação da api estará na pasta *.http*
### [[Configuração](./README.md)] | [[Desafio](./DESAFIO.md)] | [[API](./API.md)]
<br><br>
> Para poder executar os arquivos .http instale a extensão ```Rest Client``` no vscode

> Após instalar a extensão, configure as variáveis de autenticação atraves do seguinte caminho

```File > Preferences > Settings > Extensions > Rest Client > Environment Variables >> Edit in settings.json ```

> Adicione as seguintes linhas no arquivo que foi aberto e troque CLIENT_ID e CLIENT_SECRET pelas informações do comando _passport:client --password_

```
"rest-client.environmentVariables": {
       "local": {
            "host": "http://localhost",
            "email": "test@example.com",
            "password": "test@example.com",
            "client_id":"CLIENT_ID",
            "client_secret":"CLIENT_SECRET"
        },
         "stage": {
            "host": "",
            "email": "",
            "password": "",
            "client_id":"",
            "client_secret":""
         },
         "pipeline": {
            "host": "",
            "email": "",
            "password": "",
            "client_id":"",
            "client_secret":""
         }
    }
```

> Aperte CTRL+P e digite > Rest Client: Switch Environment(ou CTRL+ALT+E) e escolha o ambiente local

> Após isso clique em ```Send Request``` no auth, no primeiro uso após abrir o vscode, e depois ```Send Request``` no endpoint desejado

