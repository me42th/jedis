
# Desafio
## Desenvolver uma API REST para cadastro de produtos. O sistema deve permitir que os usuários façam login e gerenciem produtos.
### [[Configuração](./README.md)] | [[Desafio](./DESAFIO.md)] | [[API](./API.md)]
<br><br>
<p>
A autenticação deve ser implementada usando Laravel Passport. O ambiente deve ser configurado com Docker, utilizando as tecnologias citadas abaixo. Configure o  ambiente como preferir.
</p><p>
Este teste é projetado para avaliar as habilidades do candidato em várias áreas, incluindo desenvolvimento de API, autenticação, e uso de tecnologias específicas como Docker, Laravel, PostgreSQL e Nginx. 
</p><p>
O código deve ser disponibilizado em um repositório público em até 5 dias do início do desenvolvimento do teste. Ao iniciar e finalizar o teste, envie um e-mail para jose.guilherme@jedis.com.br e mauricio.vieira@jedis.com.br informando o status.
</p><p>
Fique à vontade para utilizar técnicas ou tecnologias não descritas neste documento, desde que não estejam presentes na definição de “Tecnologias que não podem ser utilizadas”.
</p>

## Tecnologias que não podem ser utilizadas:
- GraphQL
- Apache Kafka

## Requisitos
- Laravel: Use a versão 10 para criar a API.
- Laravel Passport: Implemente a autenticação utilizando Laravel Passport.
- Docker: Configure o ambiente com Docker e Docker Compose.
- PostgreSQL: Utilize PostgreSQL como banco de dados.
- Nginx: Configure Nginx como servidor web.

## Recursos
- Identificação: Desenvolva um CRUD para gerenciamento de usuários e implemente métodos
relacionados a autenticação dos usuários, como login e logout.
Gerenciamento de Produtos: Desenvolva um CRUD para gerenciamento de produtos. Cada
produto deve ter nome, descrição e usuário que cadastrou o produto.

## Documentação
Documente a API, incluindo todos os endpoints e como utilizá-los. A documentação deve estar,
preferencialmente, no arquivo README.

## Critérios de Avaliação
- Código e Estrutura: Organização, legibilidade e adesão às boas práticas.
- Funcionalidade: A API deve funcionar conforme esperado.
- Segurança: Implementação adequada de autenticação.
- Documentação: Clareza na documentação.

_Neste teste não é obrigatório escrever testes unitários, mas será bem avaliado caso os
desenvolva._