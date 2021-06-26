# Procedure to install project
1)  php init  # run the command to get default values
2)  composer update 
3)  Change Databae name in path - common/config/main-local.php
4)  php yii migrate --migrationPath=@mdm/admin/migrations # To create user and menu table
5)  php yii migrate --migrationPath=@yii/rbac/migrations  # To install RBAC functionality
