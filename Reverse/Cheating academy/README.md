# Cheating academy

## Описание
Ты чего это сегодня такой серьезный? Расслабься, приятель, сыграй в игрушку!

### Hint
Выложить PDBшку с отладочной инфой, если решивших не будет

## WriteUp


1) По адресу **the_game.exe+14CA** заменяем переход **je** на **nop**, тем самым получаем способность проходить сквозь стены;

2) Следующая проблема, которую надо решить - разбросанные по игровому полю мины. По адресу **the_game.exe+4af5** заменяем **je** на **jmp**, тем самым лишаем мины способности нас убивать

3) Теперь надо что-то сделать со стреляющими в нас солдатами. Самый простой способ - заставить пули не обновлять свою позицию и висеть в одной клетке путем замены **nop'ами** инструкции **call [rax+48]** по адресу **the_game.exe+494d**. Начавшие стрелять солдаты при этом застрелятся.

4) Спокойно добегаем до появившегося на поле флага

# Flag

RDG{G@m30v3r}