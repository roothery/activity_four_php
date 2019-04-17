### Exercício 04 - PHP - sessão ###
--------------------------------------------------

Criação de uma aplicação Web em PHP que realize o cadastro de contatos (Nome e email). A aplicação deve seguir as seguintes regras:

Deve possuir a seguinte estrutura de arquivos:

**Model**

`Contato.php` - classe PHP com nome e email

`GerenciadorContatos.php` - classe PHP para persistência de contatos (não será implementado a persistência por banco de dados por enquanto)

**View**

`index.php` - página com links para cadastro e lista de contatos

`novo.php` - formulário para cadastro de um contato

`mostra.php` - mostra mensagem de sucesso ou falha no cadastro de contatos

`lista.php` - lista os contatos cadastrados

**Controller**

`controle.php` - gerenciador geral da aplicação responsável pela lógica de navegação e seleção da visão apropriada

2.     Utilizar utilizar sessão ($_SESSION) para armazenar os contatos cadastrados.

3.     Nesse exercício, não é necessário implementar a persistência com Banco de Dados.

--------------------------------------------------

### EXERCÍCIO 5 - PHP + BD (DUPLA) ###
--------------------------------------------------

Evoluir a WebApp do exercício 04:

* Ao cadastrar um novo contato, o gerenciador de contatos (renomear para `ContatoFactory`) deve verificar se o e-mail já está cadastrado no Banco.

* Em caso negativo, incluir o contato.

* Em caso positivo, deve retornar uma mensagem de erro.

* Para tanto, é necessário implementar um novo método para busca de contatos pelo e-mail



* Utilizar PDO para conexão com banco.

* Utilizar banco de dados SQLite. Salvar o arquivo do banco em  "Model/DBContato.sqlite"

Obs: Foi mantido o modo anterior de armazenamento com uso de uma varável global **DATABASE_MODE** em global/App.php.