# Login or not to login

## Описание
Эй, ты! Мы исследовали компьютер подозреваемого и нашли этот файлик. Этот парень очень хитёр и притворяется обычным заводским работягой, но мы считаем, что это вовсе не так! 
Мы выяснили, что его псевдоним в сети звучит, как **"RDG_USER"**, но пока не знаем пароля от его аккаунта. Держу пари, что с его паролем у нас появятся все необходимые доказательства. Помоги нам!

**P.S.:** Пароль необходимо обернуть в формат флага **RDG{пароль}**

**P.P.S.:** Подозреваемый пользовался системой **Windows 10**.

## Hint
Login or fake login?

---

# WriteUp
Исходный файл представляет собой, исполняемый exe файл, написанный на **С++**.

1) Дизассемблируем код и видим удобные формочки логина.
2) Беглым взглядом можно понять, что функция **sub_401710**(расположенная по адресу **00401710**) является проверкой пользователя и пароля. При анализе данной функции, мы видим, что ключевым условием является равенство длинн хэшей **sha1** и **md5**, что невозможно. Из чего можно сделать вывод, что **данная проверка является фейковой**, анализируем файл дальше.
3) Анализируя функции файла, можно увидеть нестандартную функцию **sub_401410** в которой на строке **00401436** происходит проверка на дебаг. Анализируя её, становится понятно, что именно тут и проверяется юзер и пароль взятые из аргументов консоли.

Альтернативно, можно посмотреть этот файл в дебаггере и заметить, что происходит вызов функции **"NtCurrentTeb()->ProcessEnvironmentBlock->BeingDebugged"** и смотреть вокруг неё.

Чтобы проверить, необходимо в консоли запустить этот файл с параметрами: **Login.exe USER_LOGIN USER_PASSWORD**.

Соответственно для нашего случая, **Login.exe RDG_USER b22027cd58fc2a2.**

**P.S.:** пароль подходит только для **ОС Windows 10+**, так как на более ранних версиях ОС функции библиотеки **Nt** часто построены по другому.

# Flag

RDG{b22027cd58fc2a2}