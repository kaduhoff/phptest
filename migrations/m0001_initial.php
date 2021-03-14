<?php

use kadcore\tcphpmvc\Application;

/**
 * Essas classes não podem ter namespace para 
 * funcionar no migrations
 */

class m0001_initial
{
    public function up()
    {
        $db = Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS public.\"users\" (
            \"id\" SERIAL PRIMARY KEY,
            \"email\" VARCHAR(100),
			\"nome\" VARCHAR(255),
			\"senha\" VARCHAR(512),
			\"status\" SMALLINT DEFAULT 0 NOT NULL,
            \"created_at\" TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );";
        echo $sql;
        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = Application::$app->db;
        $sql = "DROP TABLE public.\"users\";";
        $db->pdo->exec($sql);
    }
}
