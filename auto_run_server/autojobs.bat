ECHO OFF
TITLE VietMarketPlace: Start Auto Jobs
cd /D D:\xampp\htdocs\VietMarketPlace
D:\xampp\php\php.exe artisan schedule:run 1>> NUL 2>&1
