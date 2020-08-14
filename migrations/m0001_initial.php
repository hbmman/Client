<?php


class m0001_initial
{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $SQL = "CREATE TABLE users (
                id INT AUTO_INCREMENT,
                email VARCHAR(255) NOT NULL,
                firstname VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                lastname VARCHAR(255) NOT NULL,
                status TINYINT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY(id)
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);

        $SQL = "CREATE TABLE articles (
                id INT AUTO_INCREMENT,
                title VARCHAR(255) NOT NULL,
                imagelink VARCHAR(255) NOT NULL,
                content VARCHAR(255) NOT NULL,
                author INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY(id), 
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);

        $SQL = "CREATE TABLE comments (
                id INT AUTO_INCREMENT,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NULL,
                url VARCHAR(255) NULL,
                comment VARCHAR(255) NOT NULL,
                article INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY(id),
            )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = \thecodeholic\phpmvc\Application::$app->db;
        $SQL = "DROP TABLE users;";
        $SQL = "DROP TABLE articles;";
        $SQL = "DROP TABLE comments;";
        $db->pdo->exec($SQL);
    }
}
