# TaskMaster

O **TaskMaster** é um projeto PHP que utiliza Bootstrap, CSS, HTML, JS e PHP puro. O principal propósito é criar uma aplicação simples para gerenciamento de tarefas.

## Recursos

- **Bootstrap:** Utilizado para estilização e layout responsivo.
- **CSS:** Estilos personalizados para aprimorar a aparência da aplicação.
- **HTML:** Estrutura básica da interface do usuário.
- **JavaScript:** Usado para interatividade e manipulação do DOM.
- **PHP:** Linguagem server-side para manipulação de dados e interação com o banco de dados.

## Funcionalidades
1. **Cadastramento de Usuários:**
   - Novos usuários podem se cadastrar na aplicação.
   - Validação para evitar duplicidade de usuários.
     
2. **Login e Logout:**
   - Os usuários podem fazer login na aplicação para acessar funcionalidades exclusivas.
   - Logout para encerrar a sessão.

3. **Lista de Tarefas:**
   - Visualização de tarefas pendentes.
   - Adição de novas tarefas.
   - Edição e remoção de tarefas existentes.

4. **Páginas:**
   - **Home.php:** Página principal da aplicação.
   - **NovaTarefa.php:** Adição de novas tarefas.
   - **TodasTarefas.php:** Visualização de todas as tarefas, independentemente do status.



## Estrutura do Projeto

- **CSS:** Pasta contendo arquivos de estilo personalizados.
- **JS:** Pasta para scripts JavaScript.
- **img:** Armazena imagens utilizadas na aplicação.
- **includes:** Contém arquivos PHP inclusos em várias páginas, como conexão com o banco de dados.
- **Home.php:** Página inicial da aplicação.

## Banco de Dados

- **MySQL:** Utilizado como banco de dados para armazenar informações de usuários e tarefas.

## Instruções de Uso

Certifique-se de ter os seguintes requisitos instalados antes de prosseguir:

- [XAMPP](https://www.apachefriends.org/index.html)
- [Composer](https://getcomposer.org/)

1. Clone o repositório.
2. Configure o servidor web para apontar para o diretório do projeto.
3. Importe o banco de dados MySQL fornecido.
4. Acesse a aplicação pelo navegador.

## Instruções para Executar os Testes
 
**Versão do PHP:** 8.0 ou superior
1. composer install
2. Execute esse comando vendor/bin/phpunit test


## Licença

Este projeto é licenciado sob a [MIT License](LICENSE).
