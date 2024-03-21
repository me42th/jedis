# API
## Após configurar a extensão a documentação da api estará na pasta *.http*
### [[Configuração](./README.md)] | [[Desafio](./DESAFIO.md)] | [[API](./API.md)]
<br><br>
> Para poder executar os arquivos .http instale a extensão ```Rest Client``` no vscode

> Após instalar a extensão, configure as variáveis de autenticação atraves do seguinte caminho

```File > Preferences > Settings > Extensions > Rest Client > Environment Variables >> Edit in settings.json ```

> Adicione as seguintes linhas no arquivo que foi aberto e troque SEU_EMAIL e SUA_SENHA pelas suas informações

```
"rest-client.environmentVariables": {
       "local": {
            "host": "http://localhost",
            "email": "SEU_EMAIL",
            "password": "SUA_SENHA",
            "client_id":"CLIENT_ID",
            "client_secret":"CLIENT_SECRET"
        },
         "stage": {
            "host": "https://url",
            "email": "SEU_EMAIL",
            "password": "SUA_SENHA",
            "client_id":"CLIENT_ID",
            "client_secret":"CLIENT_SECRET"
         },
         "pipeline": {
            "host": "https://url",
            "email": "SEU_EMAIL",
            "password": "SUA_SENHA",
            "client_id":"CLIENT_ID",
            "client_secret":"CLIENT_SECRET"
         }
    }
```

> Aperte CTRL+P e digite > Rest Client: Switch Environment(ou CTRL+ALT+E) e escolha o ambiente local ou stage

> Após isso clique em ```Send Request``` no auth, no primeiro uso após abrir o vscode, e depois ```Send Request``` no endpoint desejado

