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
