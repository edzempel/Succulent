# Succulent
Class assingment for ICS 499 - Software Engineering Capstone

Group: DynamicInitiative

## Vision
Help people that love succulents track and care for their collection.

## Instructions

### Database
1. Install XAMPP
   - edit php.ini and add 'extension=php_intl.dll' to the end of the file
2. Run MySQL server on port 3306
3. Open Database GUI
4. Run database configuration scripts in this order:
   1. database_tables_population01.sql
   2. users.sql
   3. plants.sql
   4. waters.sql
   5. pots.sql

### Clone project to temporary folder
1. use git to clone the master branch to temp folder on home system

### PHPStorm setup
1. Start new project
2. Install composer in settings
3. Add composer alias to command line tools
4. Run cake installation script (may need to add php to path) 'composer create-project --prefer-dist cakephp/app cms'
5. Copy all files from temporary folder into the PHPStorm project folder, replace files in PHPStorm destination folder
6. Delete temporary projecet folder
7. Setup cake server configuration
8. Configure /config/app.php Datasource to connect to the database

### Source control
1. Open PHPStorm repository in GitKraken to see available branches
