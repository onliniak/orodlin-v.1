# Orodlin7

## Zmiany

1. Działa z PHP 8 (i najprawdopodobniej przestało z PHP 5).
2. Parę zmian graficznych. 
3. Polskie znaki.
4. Odrobinę bezpieczniejsze hasła.
5. Tworzenie miast oparte na folderach (niedokończone).

## Dalsze losy

Gamers Fusion powstało 20 lat temu. Po sklonowaniu i wprowadzeniu zmian 
narodziło się Vallheru. Po sklonowaniu Vallheru powstał Orodlin. Historia 
powtórzyła się raz jeszcze i pojawił się Orodlin7. 

Dziś oryginalnego Vallheru nawet nie uruchomisz. Za to Orodlin to co 
innego. Po lekkim zmodyfikowaniu działa jak trzeba. Jedyne z czym 
trzeba się liczyć to powolne usuwanie PHP4/5. W pewnym momencie po 
prostu pojawi się błąd "funkcja ABC nie istnieje" i koniec. 

Mi osobiście zawsze przeszkadzało jak trudna jest modyfikacja gry. 
Czy gdybym robił to we wczesnych 2000 wyszło by coś lepszego ? Pewnie nie. 
Ale to nie tłumaczy dlaczego nikt nie próbował tego zmienić. 

Mija trochę czasu i … czy ja wiem ? Próbowałem opisać miasto jako foldery 
(miasto), podfoldery (dzielnice) i pliki (poszczególne lokacje). 
Ani to wygodne dla początkujących, ani nie przyśpiesza pracy. Takie 
jakieś to nijakie. 

Czy można to unowocześnić ? A czemu nie ? Wystarczy dodać menedżer wtyczek. 
Miasta, rasy, klasy, poszczególne lokacje i osiągnięcia. Wszystko to można 
by sobie pobrać jako wtyczkę i zbudować swój własny świat. Ale nie chce mi 
się tego robić. 

Najprawdopodobniej najlepszą decyzją byłoby rozpoczęcie od zera. Teksty i 
wzory można wziąć z oryginalnego Vallheru. Ale sam środek ? Doprowadzenie 
tego do stanu używalności zajmie więcej czasu, niż jest to warte.

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
W tym wypadku trzeba też zmienić $gameadress w includes/foot na adres swojej strony (bez http:// i końcowego /).

## Jak to wygląda ?
Nie najlepiej … ale w porównaniu z starym Vallheru jest to wielki krok do przodu.

<a href="https://ibb.co/SDSLCXz"><img src="https://i.ibb.co/V06K4Ws/Screenshot-2019-05-31-Nazwa-gry-G-wne-wrota.jpg" alt="Screenshot-2019-05-31-Nazwa-gry-G-wne-wrota" border="0"></a>
<a href="https://ibb.co/VQL2SBs"><img src="https://i.ibb.co/KL5FqyJ/Screenshot-2019-05-31-Nazwa-gry-city1.jpg" alt="Screenshot-2019-05-31-Nazwa-gry-city1" border="0"></a>
<a href="https://ibb.co/n11hC17"><img src="https://i.ibb.co/ZggymgB/Screenshot-2019-05-31-Nazwa-gry-Statystyki.jpg" alt="Screenshot-2019-05-31-Nazwa-gry-Statystyki" border="0"></a>

To tak dla przypomnienia → stary Orodlin:
<a href="https://ibb.co/qCdGTR1"><img src="https://i.ibb.co/pQxDY3X/Screenshot-2019-05-31-Nazwa-gry-city1.png" alt="Screenshot-2019-05-31-Nazwa-gry-city1" border="0"></a>
