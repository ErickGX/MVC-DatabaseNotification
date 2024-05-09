    CREATE DATABASE IF NOT EXISTS comunicasenac;

    use comunicasenac;

    CREATE TABLE notificacoes(

        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        created_at DATE DEFAULT CURRENT_TIMESTAMP NOT NULL,
        mensagem_vista BOOLEAN DEFAULT FALSE,
        read_at varchar(50),
        destinatario varchar(50) NOT NULL,
        agendamento_envio DATE,
        categoria_aviso varchar(100) NOT NULL,
        mensagem varchar(250) NOT NULL,
        turma varchar(50),
        via_encaminhamento varchar(30) NOT NULL
        

    );

    CREATE TABLE mensagens_padrao(
        id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
        created_at DATE DEFAULT CURRENT_TIMESTAMP NOT NULL,
        texto_msg varchar(255) NOT NULL
    );

INSERT INTO mensagens_padrao (`texto_msg`) VALUES 
   ('Rematricula para o Segundo Semestre sera iniciada em 01/06/2024'),
   ('O Professor Raul de Matematica, por motivos pessoais nao podera comparecer a aula de Sexta Feira'),
   ('Oficina de programacao WEB com PHP e Orientacao a Objetos sera realizada em 30/05/2 as 13:00:00');