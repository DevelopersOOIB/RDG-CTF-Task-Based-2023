# Раз, два, три, четыре, икс...

Ты же учился в школе, да? А, говоришь, даже университет закончил и всякие умные науки изучал... Тогда это задачка определенно не доставит тебе проблем. Ведь ты же действительно там учился, да?



# WriteUp

В задании используется "**классика**" стеганографических алгоритмов - **сокрытие информации в младших битах**. 

Собрав оттуда поток данных, мы увидим файл, напоминающий **7z-архив**. 

Внутри архива лежит файл **YouMustReadThis.txt**, для его распаковки нужно ввести пароль **AVeryVeryStrongPassword** (добывается из того же самого потока данных, он там в открытом виде). 

После открытия файла **YouMustReadThis.txt** мы видим следующую картину:

**RDG{x^2 - 1234567890\*x - 2454074611437871182856 = 0}**

Выражение в скобках - обычное квадратное уравнение, нас интересует его решение **x = 50159747054**. 

В **YouMustReadThis.txt** указано, что нам нужно "**не забыть про 0x**", что является явным намеком на перевод числа в **16-ричную систему счисления**. 

Переводим и получаем число **0xBADC0FFEE**, что и является флагом.

# Flag
RDG{0xBADC0FFEE}