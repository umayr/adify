tasklist /FI "IMAGENAME eq php.exe" 2>NUL | find /I /N "php.exe">NUL
if %ERRORLEVEL%==0 taskkill /IM "php.exe"

start php artisan serve