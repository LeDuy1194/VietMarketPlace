@ECHO OFF
TITLE Vietmarketplace Auto run server
:home
CLS
ECHO.
ECHO Sever running:
ECHO ==============
ECHO.
ECHO 1) Start Server
ECHO 2) Start Redis
ECHO 3) Stop Redis
Echo 4) Exit
ECHO.
set /p web=Type option:
if "%web%"=="1" goto start-server
if "%web%"=="2" goto start-redis
if "%web%"=="3" goto stop-redis
if "%web%"=="4" exit
pause
goto home
:start-server
net start redis
goto serverNode
:serverNode
cd /D D:\xampp\htdocs\VietMarketPlace\auto_run_server
start server-auto.bat
pause
goto home
:start-redis
net start redis
pause
goto home
:stop-redis
net stop redis
pause
goto home
