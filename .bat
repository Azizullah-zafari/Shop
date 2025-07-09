@echo off
cd /d "%~dp0"

REM بررسی وجود PHP در PATH
where php >nul 2>&1
if errorlevel 1 (
    echo ERROR: PHP not found in PATH.
    echo Please add PHP to your system PATH.
    pause
    exit /b 1
)

echo Starting Laravel development server...
php artisan serve

REM به جای pause از timeout استفاده میکنیم تا 30 ثانیه بعد خودش بسته شود
timeout /t 30 /nobreak >nul
