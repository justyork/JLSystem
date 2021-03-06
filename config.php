<?php 
/*
 * Configuration file 
 * Файл конфигурации
 * 
 * DB_HOST - Server name(usually - localhost)
 *           Имя сервера(обычно - это localhost)
 * DB_USER - User name of your database
 *           Имя пользователя от базы данных
 * DB_PASSWORD - The password for the user of your database
 *               Пароль от пользователя
 * DB_NAME - Your database name
 *           Имя базы данных
 * DB_ENCODE - Encoding database
 *             Кодировка базы 
 * TBL_PREF - Table prefix
 *            Префикс таблицы
 */
 
 
define( 'DB_HOST',     'localhost');
define( 'DB_USER',     'root');
define( 'DB_PASSWORD', '');
        
define( 'DB_NAME',   '');
define( 'DB_ENCODE', 'UTF8'); 
        
define( 'TBL_PREF', '');
define("SECRET_KEY", 'DvLB/KS5+{1tf6G\0.h)yLZ№,.c7vi'); // Необходимо сгенерировать новый

// Пути к файлам
define( 'ROOT_PATH',            $_SERVER['DOCUMENT_ROOT']);		// Путь к корню сайта 

// шаблоны
define( 'TPL_PATH', ROOT_PATH . '/tpl' );   		// Путь к шаблонам
define( 'TPL_FRONT', TPL_PATH . '/front' );   		// Путь к основному сайту

define( 'MODELS_DIR', ROOT_PATH . '/models' );    		// Путь к моделям 
define( 'UPLOAD_DIR', ROOT_PATH . '/upload' );    		// Путь к загрузкам 

define( 'ASSET_FRONT_DIR', '/assets/front' );    		// Путь к загрузкам
define( 'ASSET_ADMIN_DIR', '/assets/admin' );    		// Путь к загрузкам


function startup(){ 

    try {
        $DBH = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        $DBH->exec('SET NAMES '.DB_ENCODE);
        return $DBH;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}