<!DOCTYPE html>
<html>
    <head>
        <title>yFramework v<?= $version; ?></title>
        <meta charset="UTF-8" />
        <style>
            body {
                font-family: "sans-serif", "Arial";
                font-size: 12pt;
                background-color: #fff;
                color: #555;
            }
            pre {
                padding: 10px;
                font-family: "sans-serif", "Arial";
                font-size: 12pt;
                border: 1px solid #ccc;
                background-color: #f9f9f9;
                color: #002166
            }
            .title {
                font-size: 14pt;
                font-weight: bold;
            }
            p.contacts {
                margin: 0;
                padding: 0;
                float: right;
            }
            .clear {
                clear: both;
            }
            #wrap {
                margin: 0 auto;
                width: 800px;
                border : 1px solid #ccc;
                border-radius: 2px;
                box-shadow: 0px 1px 5px 0.1px #ccc;
            }
            #head {
                padding: 0px 10px;
                border-bottom: 1px solid #ccc;
            }
            #head h1 {
                font-size: 14pt;
            }
            #content {
                padding: 10px 10px 0;
            }
            #footer {
                margin-top: 5px;
                font-size: 10pt;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div id="wrap">
            <div id="head">
                <p class="contacts"><a href="http://yframework.ygeorgiev.com/" title="Уеб сайт">Уеб сайт</a></p>
                <h1>Добре дошли в yFramework v<?= $version; ?>!</h1>
                <div class="clear"></div>
            </div>
            <div id="content">
                <!-- Configuration -->
                <p class="title">Конфигурирация</p>
                <p>Конфигурациянният файл се намира в:</p>
                <pre><?= $config_path; ?></pre>
                <p>За да промените пътя към началния контролер, редактирайте свойството <i>$bootController</i>.</p>
                <p>Ако Вашият проект използва Mysqli, редактирайте следните свойства в метода <i>mysqliConfig</i>:</p>
                <pre>$dbHost, $dbUser, $dbPass, $dbName</pre>
                <p>Ако Вашият проект използва услуга за изпращане на имейли, редактирайте следните свойства в метода <i>mailConfig()</i></p>
                <pre>$smtpServer, $smtpPort, $emailUsername, $emailPassword</pre>
                <!-- End configuration-->
                <!-- This page -->
                <p class="title">За тази страница</p>
                <p>Контролерът на тази страница е <i>HomePage</i>. Той се намира в:</p>
                <pre><?= $controller_path; ?></pre>
                <p>View-то на тази страница се намира в: </p>
                <pre><?= $view_path; ?></pre>
                <!-- End this page-->
                <!-- About -->
                <p class="title">За системата</p>
                <p>yFramework е MVC базиран фреймуорк <i>(framework).</i> Основният кода е написан на PHP. За добълнителните страници са използвани HTML и CSS, за връзка с база с данни е използван Mysqli, а за изпращане на съобщения - Swift Mailer v4.2.1.</p>
                <p>Тази система е направена от <a href="http://ygeorgiev.com/" target="_blank" title="Към сайта на Ясен Георгиев">Ясен Георгиев</a>. Неговият сайт е:</p> 
                <pre>http://ygeorgiev.com/</pre>
                <p>Този фреймуорк е лизенциран под GNU General Public License, version v2. Повече за лиценза можете да прочетете на:</p>
                <pre>http://www.gnu.org/licenses/gpl-2.0.html</pre> или <pre>http://bulgaria.sourceforge.net/prava/gplbg.html</pre>
                <!-- End about -->
            </div>
        </div>
        <div id="footer">&copy; yFramework <?= date('Y'); ?></div>
    </body>
</html>