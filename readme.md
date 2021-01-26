# Projekt aplikacji internetowej dla gabinetów logopedycznych

## 1. Założenia projektu(wstępne):
   * baza danych pacjentów(dzieci), przechowywanie ich danych osobowych, wyników diagnozy, danych osobowych rodziców, grafik zajęć, zadane zadania oraz przesłane rozwiązania
   * baza danych terapeutów
   * zabezpieczenie przechowywanych wrażliwych danych w bazie, kontrola danych na wejściach czyli poprawność wprowadzanych danych w arkuszach, formatu przesyłanych plików.
   * baza danych zadań dodawanych przez terapeutów(pliki) oraz rozwiązań wysyłanych przez pacjentów
   * Możliwość przeszukiwania każdej z dostępnych baz(zależnie od uprawnień użytkownika)
   * system internetowych płatności za zajęcia, rozliczania terapeutów za ich przepracowane godziny
   * grafik zajęć połączony z kalendarzem google’a, w grafiku dane takie jak: terminy zajęć, sposób ich realizacji czyli czy zajęcia odbywają się online czy w gabinecie, ewentualne dodatkowe informacje: Zadania do zrealizowania przed zajęciami, zadania dodatkowe.
   * pracownicy mają możliwość przesyłania za pomocą aplikacji próśb o urlop oraz zgłoszenia L4
   * Trzy typy użytkowników: Właściciel, Terapeuta, Pacjent
        * Właściciel:
            * dodawania/usuwania/edycji danych Pacjentów oraz Terapeutów
            * wglądu w działanie Terapeuty tj. Grafik, zadawane zadania
            * Nadzoru systemu rozliczeniowego
        * Terapeuta:
            * wgląd w dane jego pacjenta, zmianę grafiku, dostosowanie dostępu pacjenta do zadań
            * możliwość modyfikacji swoich danych personalnych oraz danych rozliczeniowych(numeru konta)
            * wgląd w dane kontaktowe innych terapeutów
            * dostęp do wspólnej bazy zadań(dodawanie/przeglądanie/usuwani własnych)
        * Pacjent:
            * Wgląd w dane kontaktowe swojego terapeuty
            * Pobieranie/przeglądanie udostępnionych zadań
            * Wysyłanie rozwiązań do zadań
            * przeglądanie grafiku, termin następnych zadań
              
## 2. Dalsze plany rozwoju.

Udoskonalenie sytemu o możliwość korespondencji między użytkownikami czyli:
   * Właściciel może kontaktować się z każdym użytkownikiem
   * Terapeuta może kontaktować się z właścicielem, innymi terapeutami oraz przypisanymi pacjentami bądź pacjentami z którymi ma zaplanowane zastępstwa 
   * Pacjent może kontaktować się z jego terapeutą i właścicielem.
	
Rozbudowa aplikacji w taki sposób by był to system dostępny dla wielu gabinetów to znaczy że proces logowania polegał by w pierwszej kolejności na wyborze gabinetu a następnie na logowaniu na konkretne konta.
Wprowadzenie możliwości podstawowej personalizacji wyglądu dla każdego z dodanych gabinetów poprzez: możliwość zmiany kolorów elementów, dodawanie spersonalizowanego tła oraz loga.
