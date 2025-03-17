# StudyEZ - Plataforma de Monitoria Online

O **StudyEZ** é uma plataforma de monitoria online desenvolvida para conectar estudantes e monitores, facilitando o aprendizado e o compartilhamento de conhecimento. A plataforma foi construída utilizando **Laravel** no backend e **Vue.js** no frontend.

## Funcionalidades Principais

- **Calendário com anotações**: Os usuários podem visualizar um calendário interativo.

- **Criação de posts**: Os usuários podem criar posts para compartilhar dúvidas

- **Comunidades**: Os usuários podem criar posts para compartilhar dúvidas.

## Pré-requisitos

Antes de rodar o projeto, certifique-se de ter instalado:

- [PHP](https://www.php.net/) (versão 8.0 ou superior)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (versão 16 ou superior)
- [MySQL](https://www.mysql.com/) ou outro banco de dados suportado pelo Laravel

## Instalação

Siga os passos abaixo para configurar o projeto localmente:

1. **Clone o repositório:**

```bash
  git clone https://github.com/IzesStella/StudyEZ-Projeto2.git
  cd StudyEZ-Projeto2
```

2. **Instale as dependências do PHP:**

   ```bash
   composer install
   ```

3. **Configure o arquivo .env:**

   Crie uma cópia do arquivo `.env.example` e renomeie para `.env` e configure as variáveis de ambiente no arquivo .env, com as credenciais do banco de dados.

4. **Gere a chave da aplicação:**

   ```bash
   php artisan key:generate
   ```

5. **Execute as migrações e seeders:**

   ```bash
   php artisan migrate --seed
   ```

6. **Inicie o servidor de desenvolvimento:(em um terminal)**

   ```bash
   npm install & npm run dev
   ```

7. **Inicie o servidor de desenvolvimento:(em outro terminal)**
   ```bash
   php artisan serve
   ```
   #### A aplicação estará disponível em http://localhost:8000.

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.

## Integrantes

O projeto StudyEZ foi desenvolvido pelos estudantes:

#### [Isabelly Arruda](mailto:https://github.com/IsabellyArrudaa)

#### [Izes Stella](mailto:https://github.com/IzesStella)

#### [José Vinícius](mailto:https://github.com/Vinnijds)

#### [Lucas Souza](mailto:http://github.com/lucazle)

#### [Marcos Antônio](mailto:https://github.com/M4rk1n02)

#### [Mariana Tavares](mailto:https://github.com/marianantavares)

#### [Talita Vitória](mailto:https://github.com/Talitavit)
