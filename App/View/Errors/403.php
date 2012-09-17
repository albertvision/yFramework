<html>
    <head>
        <title>Грешка 403 - Достъпът забранен</title>
        <style>
            body {
                font-family : arial;
            }
            h1 {
                margin: 0;
                padding: 0;
                font-size: 14pt;
            }
            #container {
                margin: 0 auto;
                padding: 10px 10px 0;
                width: 90%;
                background-color : #ffebe8;
                border : 1px solid #dd3c10;
                border-radius: 2px;
                box-shadow: 0px 1px 5px 0.1px #ccc;
            }
            #footer {
                margin-top: 5px;
                font-size: 10pt;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <h1>Грешка 403</h1>
            <p>Достъпът до тази страница е забранен! Възможности:</p>
            <ul>
                <li>това е системна директория/файл</li>
                <li>администраторът Ви е блокирал</li>
                <li>в контролера, който сте отворили, няма метод <i>index()</i></li>
            </ul>
            <p>Ако смятате, че това е грешка, моля свържете се с <a href="mailto: <?= $_SERVER['SERVER_ADMIN']?>">администратор</a>!</p>
        </div>
        <div id="footer">&copy; yFramework <?= date('Y'); ?></div>
    </body>
</html>