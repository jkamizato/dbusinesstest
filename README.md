#### Setup do projeto
1. Clone o repitório
1. Rode `make up` para subir o docker
1. Rode `make pull-db` para importar o banco de dados de /data

#### URL de acesso do site após o build
* http://0.0.0.0:8888

#### Usuário e senha da área logada do site
- user: admin
- pass: q1w2e3r4t5y6

#### Nome do módulo desenvolvido
dbusiness (docroot/modules/custom/dbusiness)

##### Tutorial de utilização do módulo
Como cadastrar:

Cadastrar Slide Item (pode criar direto no spa):
- Menu Content, Add Content (/node/add/slider)

Cadastrar bloco (pode criar direto no spa):
- Menu Structure, Block Layout, aba Custom Block library e add custom block.

Cadastrar SPA:
- Menu Structure, Spa List e Adicionar (/admin/structure/spa_entity)


##### Indicação de módulos contrib utilizados
- smtp
- inline_entity_form
- contact_formatter
- Foi adicionado via library (dbusiness.libraries.yml)o slick.js para cuidar do efeito carrossel.


## Sobre o desenvolvimento

##### Módulo do test para Digital Business
Via administração do Drupal, foram criado os seguinte items:
Foi criado um tipo de conteúdo slider onde é possível cadastrar o single slide.
Foi criado um block type (SPA Block)
Foi criado contact formulário de contato

Via programação, utilizando  Content Entity, foi criado uma Entity SPA que cadastra as páginas.
O slider, block e contact são adicionados no formato entity_reference e cada um com sua particularidade de form e view.


##### Docker
Não ficou claro se deveria deixar as configuracoes na pasta docker ou se deveria criar uma imagem.
Por via das dúvidas repliquei a imagem repositório docker
https://hub.docker.com/r/jkamizato/drupal8