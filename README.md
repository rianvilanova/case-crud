# Case técnico OPOVO - CRUD com PHP
Esse repositório é a solução de um case para o teste prático de Back-end do Grupo de Comunicação O Povo.

## Funcionalidades

* CRUD completo: Criação, leitura, edição (atualização) e exclusão das notícias.
* Listagem ordenada por notícia mais recente.
* Validação dos campos no front-end e back-end.

## Captura de Tela

![Tela principal.](./docs/Screenshot.png)

## Tecnologias
* **Back-end:** PHP
* **Front-end:** HTML, CSS, JavaScript
* MySQL
* Servidor local (XAMPP, Laragon, etc.)

## Instalação
1.  Clone o repositório:
    ```bash
    git clone https://github.com/rianvilanova/case-crud.git
    ```

2. Mova a pasta `case-crud` para o diretório `htdocs` (do XAMPP) ou `www` (do WAMP/Laragon).

3. Acesse seu cliente de banco de dados  e execute o script SQL abaixo. Ele criará o banco `opovo` e a tabela `noticias`.

    ```sql
    CREATE DATABASE IF NOT EXISTS opovo;
    
    USE opovo;
    
    CREATE TABLE IF NOT EXISTS noticias (
      id INT AUTO_INCREMENT PRIMARY KEY,
      titulo VARCHAR(150) NOT NULL,
      subtitulo VARCHAR(255) NULL,
      conteudo TEXT NOT NULL,
      autor VARCHAR(100) NOT NULL,
      categoria VARCHAR(50) NULL,
      tipo ENUM('noticia','analise','opiniao','humor','cronica','checagem de fato') NOT NULL,
      data_publicacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    ```

4.
Abra o arquivo `config/database.php` e configure as credenciais de acordo com a sua onfiguração do MySQL.

 ```php
 $host = "localhost";
 $port = 3306;
 $user = "root";  // <-- Seu usuário
 $pass = "admin"; // <-- Sua senha
 $db   = "opovo";
 ```

5.  **(Opcional)** Popule o banco
    para testar a aplicação com dados, excutando o script SQL abaixo:

    ```sql
    INSERT INTO noticias (titulo, subtitulo, conteudo, autor, categoria, tipo) 
    VALUES 
    (
    'Fortaleza vence o Ceará no Clássico-Rei e avança na Copa do Brasil',
    'Jogo tenso no Castelão foi decidido com gol de Yago Pikachu no final do segundo tempo.',
    'A torcida tricolor fez a festa na noite desta quarta-feira. Em um jogo disputado, o Leão do Pici mostrou superioridade tática e garantiu a vaga para a próxima fase da competição nacional.',
    'Redação O Povo',
    'Esportes',
    'noticia'
    ),
    (
    'O impacto do novo polo de hidrogênio verde no Pecém',
    'O que a instalação do mega-projeto significa para o PIB do Ceará e a geração de empregos na região?',
    'Analisamos os dados do governo e as projeções do mercado. O investimento estrangeiro é vultoso, mas os desafios logísticos e de mão-de-obra qualificada precisam ser endereçados.',
    'Ana Beatriz Gomes',
    'Economia',
    'analise'
    ),
    (
    'O Brasil como mediador de conflitos globais: uma utopia?',
    NULL, -- Subtítulo opcional
    'A posição de neutralidade histórica do Brasil é frequentemente testada. Em um mundo polarizado, manter-se neutro não é o mesmo que ser irrelevante, mas sim uma escolha estratégica que pode (ou não) trazer dividendos.',
    'Marcos Tardin',
    'Geopolítica',
    'opiniao'
    ),
    (
    'É FALSO que novas eleições municipais serão convocadas em Caucaia',
    'Mensagens em grupos de WhatsApp distorcem decisão judicial sobre processo eleitoral.',
    'O Povo Checa investigou a alegação. A decisão do TRE-CE se refere a um caso específico de prestação de contas de um vereador, e não tem qualquer poder de anular o resultado da eleição majoritária.',
    'O Povo Checa',
    'Política',
    'checagem de fato'
    ),
    (
    'A fila do pão na padaria do Seu Zé',
    'Crônica de um dia em que o maior boêmio de Fortaleza decidiu não aparecer para o "trabalho".',
    'Às seis da manhã, a fila não é só para o pão. É o "bom dia" apressado, a fofoca rápida sobre o jogo de ontem, e o cheiro de café que se mistura com a maresia. A padaria é o verdadeiro parlamento do bairro.',
    'Raimundo de Lira',
    'Cotidiano',
    'cronica'
    );
    ```

6.  **Acesse o Projeto:**
    Abra seu navegador e acesse:
    ```
    http://localhost/case-crud/
    ```