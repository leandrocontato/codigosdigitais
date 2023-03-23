Projeto Laravel 9 - Documentação
Este projeto tem como objetivo criar um sistema de gerenciamento de clientes e álbuns, onde é possível realizar cadastros, editar, excluir, visualizar e gerar relatórios. Além disso, serão criados logs de acesso e operações realizadas no sistema.

Item 01 - Configurações
Nesta seção serão realizadas as configurações iniciais do sistema, criando os tipos de acesso e usuários.

Tipos de Acesso
Para controlar o acesso ao sistema, serão criados os seguintes tipos de acesso:

Administrador
Usuário Comum
Usuários
Os usuários terão as seguintes informações:

Nome
Data de Nascimento
Telefone Celular
E-mail (único)
Senha
Confirmação de senha
Situação (Ativo, Inativo ou Bloqueado)
Item 02 - Cadastros
Nesta seção serão realizados os cadastros de clientes, perfis e álbuns.

Clientes
Para cadastrar um cliente, será necessário informar:

Nome de Usuário (único, sem pontos e traços)
Nome Completo
CPF (único)
RG
Data de Nascimento
E-mail (único)
Endereço (CEP, Estado, Cidade, Rua, Número e Complemento)
Telefone Celular
Perfis (Tipo, Nome de Usuário, URL e Último Acesso)
Situação (Ativo, Inativo ou Bloqueado)
Álbuns
Para cadastrar um álbum, será necessário informar:

Cliente
Perfil
Tipo de Álbum (Imagem ou Vídeo)
Título
Descrição
Imagem Principal (somente upload, não é necessário modificar e tratar)
Data de Inclusão
Situação (Disponível Público, Disponível Restrito, Bloqueado ou Excluído)
Item 03 - Relatórios
Nesta seção serão gerados relatórios de álbuns versus clientes.

Item 04 - Logs de Acesso
Nesta seção serão registrados os logs de acesso ao sistema, assim como as operações de inclusão, edição e exclusão de itens.

Autor Desenvolvido por Leandro Miranda.
