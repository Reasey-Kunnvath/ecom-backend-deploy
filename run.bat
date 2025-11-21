@echo off
echo Starting E-Com (Lavarel 12) and UI Flowbite

start /b "" npm run dev
echo E-Com UI Flowbite on http://localhost:5173
timeout /t 2 /nobreak

start /b "" php artisan serve
echo E-Com started on http://127.0.0.1:8000
timeout /t 2 /nobreak

cd /d "D:\Project\ngrok"
start ngrok http 8000

echo.
echo All services should now be running in this window.
echo - Flowbite UI: http://localhost:5173
echo - Backend: http://127.0.0.1:8000
echo Press Ctrl+C to stop all services and close this window...
pause
