#### URL de acesso do site após o build
* http://0.0.0.0:8888

#### Usuário e senha da área logada do site
- user: admin
- pass: q1w2e3r4t5y6

#### Nome do módulo desenvolvido
dbusiness (docroot/modules/custom/dbusiness)

##### Tutorial de utilização do módulo
Via administração do Drupal, foram criado os seguinte items:
Foi criado um tipo de conteúdo slider onde é possível cadastrar o single slide.
Foi criado um block type (SPA Block)
Foi criad formulário de contato

Via programação, utilizando  Content Entity, foi criado uma Entity SPA que cadastra as páginas.
Que tem como referencia as sessões acima.

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
- Foi adicionado via library (dbusiness.libraries.yml)o slick.js para cuidar do efeito carrossel.