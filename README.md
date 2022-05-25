# Sporti-app
 A web application for teaming participants of team sports games

Sporti to Aplikacja, która ma za zadanie pomóc w organizacji spotkań o charakterze sportowo-rekreacyjnym, zarówno dla jednej osoby, jak i większej grupy osób poprzez stworzenie uproszczonego procesu wyszukiwania zawodników. Praca jest tworzona w formie aplikacji internetowej z systemem rejestracji i logowania, wysyłania, aplikowania na posty oraz systemu powiadomień

Odwiedzając stronę jesteśmy witani przez ekran powitalny. Zawiera on krótki opis, oraz przyciski Login i Register, które po kliknięciu przeniosą nas do kolejno, ekranu logowania i rejestracji.  

![image](https://user-images.githubusercontent.com/57746916/170326513-f8825620-f55d-4304-bae8-0bd663be21c9.png)

Strona logowania zawiera formularz z dwoma polami tekstowymi do wypełnienia. Pierwsze wymaga podania adresu mailowego, dzięki któremu konto zostało zarejestrowane, w drugim potrzebne jest hasło podane przy rejestracji konta. Klikając przycisk Login, jeśli podane informacje są zgodne, użytkownik zaloguje do serwisu. 

 
![image](https://user-images.githubusercontent.com/57746916/170327362-306d8f8e-e681-45c5-a80d-f839b057c022.png)

Strona rejestracji wyświetla formularz z czteroma rubrykami, które kolejno wymagają podania nazwy użytkownika, adresu mailowego, na które zarejestrowane zostanie tworzone konto, hasło, które wykorzystywane będzie do logowania się do serwisu, oraz potwierdzenie hasła, czyli ponowne wpisanie hasła potwierdzające jego zgodność. Po wypełnieniu wszystkich rubryk, klikając przycisk Register, konto zostanie zarejestrowane w serwisie. 

 ![image](https://user-images.githubusercontent.com/57746916/170327396-73f8341e-0d53-47eb-a139-5eccfdb3e5ec.png)


W przypadku gdy zdarzy się, że hasło do konta zostanie zapomniane, istnieje możliwość jego zresetowania, na stronie resetowania hasła. By się tam przenieść, należy kliknąć link z napisem „Forgot your password?”, znajdujący się na stronie logowania obok przycisku login. W rubryce należy wpisać mail, który podany został przy rejestracji konta. Po kliknięciu przycisku o nazwie „Send Password Reset Link”, na adres mailowy użytkownika, zostaje wysłany link do zresetowania hasła. 

 
![image](https://user-images.githubusercontent.com/57746916/170328933-cd33a5cc-3756-4831-b5fa-e024933172da.png)


Strona wyświetlająca posty, o nazwie Posts ,dostępna jest dla każdego użytkownika, nie wymaga ona bycia zalogowanym w serwisie. Wyświetla ona wszystkie aktualne posty wraz z ich opisami, które zawierają lokację, datę, koszt spotkania, poziom szukanych graczy oraz liczbę szukanych graczy wraz z aktualną liczbą użytkowników, którzy już dołączyli do postu. Poniżej widnieje również informacja zawierająca datę stworzenia postu oraz jego autora. 

 
![image](https://user-images.githubusercontent.com/57746916/170327524-fa007bcd-41d8-43c7-8c6f-b41ab75ddb1f.png)

Strona Posts wyświetla maksymalnie 10 aktualnych postów po czym każdy kolejny przekierowany zostaje na następną podstronę dzięki paginacji. 

 ![image](https://user-images.githubusercontent.com/57746916/170327551-61893378-4ac5-4759-9b82-7b18bd9dea9c.png)
 

Aby dowiedzieć się więcej o danym poście, wystarczy kliknąć na podświetloną na niebiesko nazwę sportu postu, która przekieruje użytkownika na podstronę zawierającą dodatkowe informacje o danym poście. Oprócz informacji wyświetlanych na stronie Posts tutaj, dodatkowo widnieje rubryka o nazwie description, która przedstawia wszystkie dodatkowe informacje o poście, które chciał zamieścić właściciel. 

 
![image](https://user-images.githubusercontent.com/57746916/170327593-9f98b3d1-b5fe-4942-a581-bd66efa3dbd4.png)
 

Na stronie Posts nad wyświetlonymi postami widnieje nagłówek „Search for post” a pod nim przycisk z napisem „Search”. Jest to ukryta funkcja wyszukiwania postów, która wyświetli się dopiero po kliknięciu przycisku Search. Została ona zaimplementowana w ten sposób ze względu na  przejrzystość aplikacji. Użytkownik przeglądający aktualne posty, nie jest rozpraszany przez multum dodatkowych rubryk wyświetlanych na stronie. W momencie gdy użytkownik zechce użyć funkcji wyszukiwania postów, wystarczy, że kliknie w przycisk Search, a na stronie wyświetli się cała funkcjonalność wyszukiwarki.  
Po kliknięciu przycisku Search na stronie pojawia się 11 nowych rubryk, dzięki którym użytkownik ma możliwość bardzo dokładnej filtracji postów. Wyszukiwarka zapewnia  przeszukiwanie po takich danych jak dziedzina sportu, poziom graczy, lokalizacja, data, godzina i koszt spotkania. Możliwe jest użycie każdej kombinacji danych. 

 
![image](https://user-images.githubusercontent.com/57746916/170327647-651940f3-64d9-4479-accd-0ae370ed0e39.png)

Po wypełnieniu wybranych rubryk wystarczy kliknąć przycisk Submit, a na stronie pojawią się wszystkie posty, które spełniają wpisane wcześniej wymagania. 

 

![image](https://user-images.githubusercontent.com/57746916/170327718-69ef68f3-ae41-4af5-9ce0-d3e58659749f.png)
 

Po zalogowaniu do serwisu, użytkownik przekierowywany jest na stronę swojej tablicy Dashboard. Tutaj ma on możliwość tworzenia nowych postów po kliknięciu przycisku Create Post. Dodatkowo wyświetlana zostaje tablica ze wszystkimi postami, których dany użytkownik jest właścicielem. Wyświetlony zostaje tytuł, data stworzenia oraz ilość graczy, którzy dołączyli do postu. Użytkownik ma możliwość edycji oraz usunięcia każdego wyświetlonego tu postu. Ponadto, w dzień spotkania ustalonego przy tworzeniu postu, w kolumnie Attendance, przy danym poście,  pojawia się przycisk o nazwie Rate.  Po jego kliknięciu właściciel postu ma możliwość nadania obecności wszystkim członkom drużyny. 

![image](https://user-images.githubusercontent.com/57746916/170327808-84430971-cd3a-4170-893b-8e9a919e51fb.png)

Po zalogowaniu do serwisu zmienia się również wygląd paska nawigacji. Po prawej stronie, zamiast linków Login i Register, pojawia się nazwa zalogowanego użytkownika oraz ikonka dzwoneczka. Oba te elementy służą jako rozwijane menu.  

 
![image](https://user-images.githubusercontent.com/57746916/170327922-f59d6d30-f95a-4210-a4fd-a0c5d5db07ce.png)
 

Po kliknięciu w nazwę użytkownika rozwija się menu z linkami dostępnymi tylko dla zalogowanego użytkownika, Dashboard, Recieved Applications, My Applications, Joined Posts oraz przycisk Logout, służący do wylogowania z serwisu. 
Ikona dzwoneczka służy jako system notyfikacji. Gdy użytkownik nie otrzymał żadnych aplikacji do swoich postów, ikona pozostaje w kolorze szarym, a po kliknięciu jej widnieje napis o braku nowych notyfikacji. 

W momencie gdy użytkownik otrzyma aplikacje do swojego postu, dzwoneczek zmienia kolor swojego przycisku z szarego na czerwony. 

 ![image](https://user-images.githubusercontent.com/57746916/170328036-487cfc54-0c17-4517-bf9a-663701b48e0e.png)

A po rozwinięciu przycisku notyfikacji widnieje informacja o nowych aplikacjach, służąca również jako link do strony otrzymanych aplikacji. 


Po kliknięciu w przycisk Create Post na stronie Dashboard, użytkownik przekierowywany jest na stronę tworzenia postu. Tutaj przedstawione są wszystkie rubryki, które należy wypełnić by stworzyć post.  

 

![image](https://user-images.githubusercontent.com/57746916/170328115-e24de814-a93c-4674-baf5-d139871a2e00.png)
 

Próba stworzenia postu z pustymi rubrykami, skutkuje wyświetleniem powiadomień o błędnym wypełnieniu formularza. 

 
![image](https://user-images.githubusercontent.com/57746916/170328137-bc7c0cad-bf7a-433f-a857-bce9ebf94fb2.png)

W momencie, gdy użytkownikowi uda się poprawnie wypełnić wszystkie rubryki formularza, klikając przycisk Submit zostanie on przekierowany na stronę główną Posts z powiadomieniem o sukcesie stworzenia postu, a nowostworzony post zostanie umieszczony na liście aktualnych postów. 

![image](https://user-images.githubusercontent.com/57746916/170328168-6a12ca47-cbd0-4313-a4a9-c80c20ab18b9.png)

Po stworzeniu postu, wyświetlając jego dodatkowe informacje, jeśli dany użytkownik jest właścicielem postu,  pojawią się dwa dodatkowe przyciski, Edit i Delete. Umożliwiają one edycje oraz usunięcie postu, bez potrzeby przechodzenia na stronę Dashboard użytkownika. 

 
![image](https://user-images.githubusercontent.com/57746916/170328207-75d67bd2-04e8-4597-b5a1-d38391a0a793.png)

Klikając przycisk Edit, użytkownik zostaje przekierowany na stronę edycji postu. Wyświetlone zostają tu te same rubryki, jak podczas tworzenia postu, z tą różnicą, że każda rubryka wypełniona jest już aktualnymi danymi edytowanego postu. Na tej stronie użytkownik ma możliwość zmiany wszystkich danych wprowadzonych podczas tworzenia postu. Klikając przycisk Submit, wprowadzone zmiany zostają zatwierdzone, a dane postu wyświetlane na stronie Posts zostają automatycznie zaktualizowane. 

![image](https://user-images.githubusercontent.com/57746916/170328235-62046539-5df1-4652-ba79-fa9f782daa7b.png)

Po udanej edycji użytkownik zostaje przekierowany na stronę Posts z komunikatem informującym o udanej aktualizacji postu. 

![image](https://user-images.githubusercontent.com/57746916/170328257-b7afaad9-abb1-4887-b3a3-210dc0f897b3.png)

W przypadku gdy na stronie informacyjnej postu, użytkownik będący jego właścicielem, kliknie w przycisk Delete, post zostanie usunięty, nie będzie wyświetlany już dla innych użytkowników, a właściciel, już usuniętego postu, zostanie przekierowany na stronę Posts z komunikatem informującym o udanym usunięciu postu.  

 
![image](https://user-images.githubusercontent.com/57746916/170328279-70e35bbf-1010-4e31-a9d1-d88ffba13019.png)

 

Każdy użytkownik, nie będący właścicielem danego postu ma możliwość zaaplikowania do niego poprzez kliknięcie przycisku Join, wyświetlonego po wejściu w dodatkowe informacje postu. 
![image](https://user-images.githubusercontent.com/57746916/170328347-363ada73-1cf9-4f25-bb4a-0cf78cb56325.png)

Po kliknięciu przycisku Join, użytkownik zostanie przekierowany na stronę Posts z komunikatem, informującym o sukcesie wysłania aplikacji. 

![image](https://user-images.githubusercontent.com/57746916/170328446-6fb6383b-80f0-4da7-b236-b57a39d98b9e.png)

Jeśli użytkownik wyśle swoją aplikację, i ponownie kliknie w przycisk Join tego samego postu, zostanie on przekierowany na stronę Posts z komunikatem o błędzie aplikowania, ponieważ nie można aplikować kilkakrotnie do tego samego postu. 

![image](https://user-images.githubusercontent.com/57746916/170328482-1941df3b-0d01-46ea-9749-c32f6ff08fe0.png)

Wszystkie aplikacje użytkownika wyświetlane są na stronie My Applications, w kolejności od najnowszej do najstarszej. Każda wysłana aplikacja posiada status, dzięki któremu możliwa jest ocena na jakim etapie się znajduje. 

 

Istnieją cztery rodzaje statusu: 

 

Pending  - Status ten wskazuje na to, że aplikacja została wysłana i oczekuje na decyzję od właściciela postu. Wyświetlana jest w szarej ramce. 

Accepted – Status Accepted oznacza, że prośba aplikacji została zaakceptowana przez właściciela postu i tym samym aplikant został dodany do drużyny spotkania.  Wyświetlona zostaje w zielonej ramce. 

Denied – Status Denied wskazuje na odrzucenie aplikacji przez właściciela postu. Wyświetlona jest w czerwonej ramce. 

Expired – Status Expired oznacza, że aplikacja nie została ani zaakceptowana ani odrzucona, ale minęła już data spotkania aplikowanego postu. Wyświetlona zostaje w szarej ramce. 

 
![image](https://user-images.githubusercontent.com/57746916/170328548-2f0abd1a-2eed-403a-82de-811782d76c75.png)

Wszystkie aplikacje wysłane do właściciela postu wyświetlane są na stronie Recieved Applications. Gdy użytkownik nie posiada żadnych aplikacji, strona wyświetla komunikat o ich braku. 

W momencie gdy właściciel otrzyma prośby aplikacji do swoich postów, ikona notyfikacji (dzwoneczek) zmieni kolor na czerwony , informując o nowych prośbach aplikacji,  a na stronie Recieved Applications pojawią się aplikacje do rozpatrzenia. Każda aplikacja zawiera nazwę aplikującego użytkownika, link do postu, do którego chce dołączyć, oraz jego procentową i liczbową frekwencję, symbolizującą obecność na poprzednich spotkaniach, do których został przyjęty. Następnie wyświetlone zostają przyciski Accept i Decline, dzięki którym właściciel postu ma możliwość zaakceptowania prośby aplikacji albo jej odrzucenia. Po kliknięciu Accept lub Decline, aplikacja znika ze strony, a użytkownik może kontynuować rozpatrzenie reszty próśb aplikantów. 


![image](https://user-images.githubusercontent.com/57746916/170328596-8f234216-9e00-4517-b5ab-039f2972e334.png)

Po zaakceptowaniu aplikacji przez właściciela postu, właściciel aplikacji zostaje automatycznie dodany to drużyny spotkania opisanego w poście, aplikacja zmienia status na Accepted, a post, do którego został zaakceptowany zostaje wyświetlony na stronie Joined Posts. Na tej stronie wyświetlane zostają wszystkie posty, do których użytkownik został zaakceptowany, a których spotkania jeszcze się nie wydarzyły. Oprócz informacji wyświetlanych przy poście, użytkownik ma zawsze możliwość przejścia do bardziej szczegółowego opisu poprzez link zawarty w nazwie sportu postu. 

![image](https://user-images.githubusercontent.com/57746916/170328624-566458b3-aee8-4f5a-b18c-d5845e4b06b7.png)

W dniu spotkania ustalonym przy tworzeniu postu, jego właścicielowi na stronie Dashboard w kolumnie Attendance pojawia się przycisk o nazwie Rate i widnieje on tam do końca dnia spotkania.  

![image](https://user-images.githubusercontent.com/57746916/170328656-b0862b84-59b1-4b36-81cc-dc24bad1c7c6.png)
 

Klikając dany przycisk użytkownik zostanie przeniesiony na stronę User Attendance gdzie wyświetleni zostaną wszyscy członkowie postu, wraz z przyciskami Present i Absent, dzięki którym właściciel postu może nadać obecność jego członkom. 

 
![image](https://user-images.githubusercontent.com/57746916/170328687-8f4c0b25-853f-436b-af4d-3c3674a4a439.png)

Jeśli, któryś z członków nie wstawił się na umówione spotkanie, właściciel postu ma możliwość nadania mu nieobecności poprzez kliknięcie przycisku Absent, natomiast jeśli jest obecny należy nadać mu obecność poprzez kliknięcie przycisku Present. W zależności od klikniętego przycisku tło członka drużyny zmieni się, na kolor zielony w przypadku nadania obecności, a czerwony w przypadku nieobecności. Po nadaniu obecności formularze nie znikają z widoku właściciela, więc ma on możliwość zmiany wcześniej nadanej obecności, aż do końca dnia spotkania. Jest to bardzo ważne ze względu na możliwe spóźnienie graczy i w skutku zbyt wczesną ocenę ich obecności przez właściciela postu.  

 
