@echo off

rem -------------------------------------------------------------
rem  Yii command line init script for Windows.
rem -------------------------------------------------------------

@setlocal

set YII_PATH=%~dp0

if "%PHP_COMMAND%" == "" set PHP_COMMAND=D:/phpStudy/PHPTutorial/php/php-7.0.12-nts/php.exe

"%PHP_COMMAND%" "%YII_PATH%init" %*

@endlocal
