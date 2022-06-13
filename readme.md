# Trabalho G2 - Disciplina Linguagens Formais e Automatos - Usos de Regex com PHP

## 1. Introdução
A ideia do projeto é apresentar alguns casos de uso de Regex com PHP utilizando a implementação nativa que vem com a linguagem, usando as funções de preg_match e preg_match_all.



## 2. Estrutura de pastas
As pastas são organizadas da seguinte maneira:
1. `src/`: Arquivos do projeto
2. `tests/`: Testes do projeto. No arquivo `tests/Unit/RegExpUnitTest.php` estão localizados todos os casos de usos pesquisados utilizando PHP.
3. `phpunit.xml`: Configurações do PHP Unit
4. `Dockerfile && docker-compose.yaml`: arquivos de configuração do docker



## 3. Como rodar
Utilizando docker, basta somente rodar o comando `docker-compose up --build` na raiz desta pasta.  
Deste modo, o projeto executará a instalação dos componentes via composer e rodará o comando responsável por executar o phpunit e executar os códigos/testes: `./vendor/bin/phpunit`. O esperado é que todos os 12 testes executem corretamente com as 14 asserções passando.



## 4. Tecnologias Utilizadas
1. PHP v8.1.7
2. PHPUnit 9.5
3. Composer v2



## 5. Integrantes do grupo
Kevin Farias  
Alysson Drews  
  