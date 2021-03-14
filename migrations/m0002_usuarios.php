<?php

use kadcore\tcphpmvc\Application;

/**
 * Essas classes não podem ter namespace para 
 * funcionar no migrations
 */

class m0002_usuarios
{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS public.\"userAuthor\" (
            \"userId\" bigint,
            \"resource\" VARCHAR(50),
			\"permission\" SMALLINT DEFAULT 0 NOT NULL,
            PRIMARY KEY (\"userId\", \"resource\")
        );";
        echo $sql;
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE public.\"userAuthor\";";
        $db->pdo->exec($sql);
    }
}
