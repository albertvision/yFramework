<?php

//Отваряне на системни файлове
require dirname(__FILE__).'/System/Config.php';
require dirname(__FILE__).'/System/Core.php';

Config::load(); // Зареждаме конфигурационния файл
\System\Core::load(); // Зареждаме ядрото
\System\Core::loadSystem('Mysqli', 'instance'); // Зарежда файла за Mysqli
\System\Core::loadSystem('Email', 'instance'); // Зарежда файла за Email
\System\Core::loadSystem('Loader', 'instance'); // Зарежда файла за зареждания
\System\Core::loadSystem('YF_Controller', 'instance'); // Зарежда файла за контролери
\System\Core::loadSystem('VirtualPaths', 'instance'); // Зарежда файла за виртуални пътища
?>