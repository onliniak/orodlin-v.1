# Orodlin7

## Zmiany

1. Działa z PHP 8 (i najprawdopodobniej przestało z PHP 5).
2. Parę zmian graficznych. 
3. Polskie znaki.
4. Odrobinę bezpieczniejsze hasła.

## Dalsze losy

Gamers Fusion powstało 20 lat temu. Po sklonowaniu i wprowadzeniu zmian 
narodziło się Vallheru. Po sklonowaniu Vallheru powstał Orodlin. Historia 
powtórzyła się raz jeszcze i pojawił się Orodlin7. 

Dziś oryginalnego Vallheru nawet nie uruchomisz. Za to Orodlin to co 
innego. Jedyne z czym trzeba się liczyć to powolne usuwanie PHP4/5. 
W pewnym momencie po prostu pojawi się błąd "funkcja ABC nie istnieje" i koniec. 

Orodlin7 to lekko zmodyfikowana wersja, z której wyrzucono wszystkie 
funkcje usunięte w PHP7/8. Tak że można to uruchomić na współczesnym serwerze.

Dalszych zmian chwilowo nie będzie. Moim zdaniem serwer powinien być mniej świadomy swoich plików.  
A nie że mam listę jeśli jestem w Altarze to jestem w mieście, jeśli jestem 
w Ardulith to jestem na wsi, jeśli jestem w górach to jestem w górach i tak dalej …

## Instalacja

### Manualna

W folderze install znajdziesz plik config.php, przenieś go do folderu includes. 
Zmień dane dostępu do bazy danych, konto admina i adres gry. 

Żeby zaktualizować zależności: 

```
composer update
composer install
rm -r adodb
rm -r libs
rm -r mailer
cp vendor/adodb/adodb-php/ adodb
cp vendor/smarty/smarty/libs/ libs
cp vendor/phpmailer/phpmailer/ mailer
```

## Znane Problemy:

- Na niektórych serwerach użycie ADODB sesji, może spowodować biały ekran po zalogowaniu.
Rozwiązaniem jest usunięcie z includes/session.php wszystkiego oprócz <?php i session_start();
W tym przypadku trzeba też zmienić $gameadress w includes/foot na adres swojej strony (bez http:// i końcowego /).
- Chat/Karczma nie działa. 
- Drobne błędy graficzne.

## Jak to wygląda ?
Nie najlepiej … ale w porównaniu z starym Vallheru jest to wielki krok do przodu.

<a href="https://ibb.co/SDSLCXz"><img src="https://i.ibb.co/V06K4Ws/Screenshot-2019-05-31-Nazwa-gry-G-wne-wrota.jpg" alt="Screenshot-2019-05-31-Nazwa-gry-G-wne-wrota" border="0"></a>
<a href="https://ibb.co/VQL2SBs"><img src="https://i.ibb.co/KL5FqyJ/Screenshot-2019-05-31-Nazwa-gry-city1.jpg" alt="Screenshot-2019-05-31-Nazwa-gry-city1" border="0"></a>
<a href="https://ibb.co/n11hC17"><img src="https://i.ibb.co/ZggymgB/Screenshot-2019-05-31-Nazwa-gry-Statystyki.jpg" alt="Screenshot-2019-05-31-Nazwa-gry-Statystyki" border="0"></a>

To tak dla przypomnienia → stary Orodlin:
<a href="https://ibb.co/qCdGTR1"><img src="https://i.ibb.co/pQxDY3X/Screenshot-2019-05-31-Nazwa-gry-city1.png" alt="Screenshot-2019-05-31-Nazwa-gry-city1" border="0"></a>
