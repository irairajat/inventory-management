# inventory-management

To run this project on local server
1. Need to Install Php (If installed ignore) 
2. Need to Install Composer (If installed ignore)
3. Clone this repo into your vs code https://github.com/irairajat/inventory-management.git or download zip file 
4. Need to Install MySql or use phpmyadmin for database for that u need to install xampp
5. Need to set db config 
    change dbname according to yours
        
        return [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=inventory',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',

            // Schema cache options (for production environment)
            //'enableSchemaCache' => true,
            //'schemaCacheDuration' => 60,
            //'schemaCache' => 'cache',
        ];

6. open vscode terminal and run php yii migrate to migrate your model schema to db
7. run php yii serve to up your server.
8. Open your browser and paste this url http://localhost:8080/.


# Thanks
