@echo off
set _task=node.exe
set _svr=D:\thy\spider\kj.bat
set _des=start.bat

:checkstart
for /f "tokens=5" %%n in ('qprocess.exe ^| find "%_task%" ') do (
if %%n==%_task% (goto checkag) else goto startsvr
)



:startsvr
echo %time% 
echo ********start*******
echo start at %time% ,please check>> restart_service.txt
echo start %_svr% > %_des%
echo exit >> %_des%
start %_des%
set/p=.<nul
for /L %%i in (1 1 10) do set /p a=.<nul&ping.exe /n 2 127.0.0.1>nul
echo .
echo Wscript.Sleep WScript.Arguments(0) >%tmp%/delay.vbs 
cscript //b //nologo %tmp%/delay.vbs 10000 
del %_des% /Q
echo ********restart********
goto checkstart


:checkag
echo %time% 10s. 
echo Wscript.Sleep WScript.Arguments(0) >%tmp%/delay.vbs 
cscript //b //nologo %tmp%/delay.vbs 10000 
goto checkstart