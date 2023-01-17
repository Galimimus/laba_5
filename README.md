Разработка сервисов
========================
Задание
------------------------
Разработать и реализовать алгоритм внешней сортировки. Данные хранятся на сервере в массиве, сервер предоставляет доступ к отдельным элементам. Клиент поочерёдно запрашивает отдельные ячейки и сортирует массив.

Возможности пользователей:
- сортировка массива

Ход работы
------------------------

- Разработать пользовательский интерфейс
- Описать сценарии работы
- Описать API сервера и хореографию
- Описать структуру БД и алгоритмы обработки данных
- Написать программный код
- Удостовериться в корректности кода

#### 1. Пользовательский интерфейс
[Главная страница](https://github.com/Galimimus/laba_5/blob/main/Screenshot%20from%202023-01-17%2005-12-26.png)

#### 2. Пользовательский сценарий работы
Пользователь попадает на главную страницу **index.html**, нажимает на кнопку **Sort**, массив на экране становится отсортированным. При нажатии на кнопку **Mix** массив перемешивается. При нажатии кнопки **Reset** массив возвращается к исходным значениям.

#### 3. [API сервера и хореография](https://sequencediagram.org/index.html#initialData=IYYwLg9gTgBIWCCG4QQHCCFYQQvCCCEQAUAB2FMASxELwDswZBCEBUAEQQJhA6stFVMBaAPhoboC4YAcwCmlYQBthAW2EUA2oQC6zUEQBuwMMOp1GtZq3QYAPO3Y89AidNlgFy5gBNhqwhq07e+lsiNcL-DAAzgDuwDgw1jLySpGS0XYAVg6u7toB3oaYpua6gRAA1sxYzqma6Xm0QA)  


#### 6. HTTP запрос/ответ
**Запрос**  
<br>Request URL: http://localhost/laba_5/index.html
<br>Request Method: GET
<br>Status Code: 200 OK
<br>Remote Address: [::1]:80
<br>Referrer Policy: strict-origin-when-cross-origin

<br>Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
<br>Accept-Encoding: gzip, deflate, br
<br>Accept-Language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7
<br>Cache-Control: no-cache
<br>Connection: keep-alive
<br>Cookie: PHPSESSID=v0epsvq16h457ln4jdb1h8evj1
<br>DNT: 1
<br>Host: localhost
<br>Pragma: no-cache
<br>sec-ch-ua: "Not?A_Brand";v="8", "Chromium";v="108", "Google Chrome";v="108"
<br>sec-ch-ua-mobile: ?0
<br>sec-ch-ua-platform: "Linux"
<br>Sec-Fetch-Dest: document
<br>Sec-Fetch-Mode: navigate
<br>Sec-Fetch-Site: none
<br>Sec-Fetch-User: ?1
<br>Upgrade-Insecure-Requests: 1
<br>User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36

**Ответ**
<br>Accept-Ranges: bytes
<br>Connection: Keep-Alive
<br>Content-Encoding: gzip
<br>Content-Length: 689
<br>Content-Type: text/html
<br>Date: Tue, 17 Jan 2023 02:24:20 GMT
<br>ETag: "918-5f23aca855b8d-gzip"
<br>Keep-Alive: timeout=5, max=100
<br>Last-Modified: Sat, 14 Jan 2023 15:13:23 GMT
<br>Server: Apache/2.4.52 (Ubuntu)
<br>Vary: Accept-Encoding

#### 7. Значимые фрагменты кода
**Функция сортировки(index.html)**
```js
 function sort() {
               var i, j;
               for (i = 0; i < arr.length - 1; i++) {
                   for (j = 0; j < arr.length - i - 1; j++) {
                       if (arr[j] > arr[j + 1]) {
                           var temp = arr[j];
                           arr[j] = arr[j + 1];
                           arr[j + 1] = temp;
                           swap(j, j + 1);
                       }
                   }
               }
               document.getElementById("array").innerHTML = arr;
           }
```
**Функция перемешивания(index.html)**
```js
 function mix() {
                var j, x, i;
                for (i = arr.length - 1; i > 0; i--) {
                    j = Math.floor(Math.random() * (i + 1));
                    x = arr[i];
                    arr[i] = arr[j];
                    arr[j] = x;
                    swap(i, j);
                }
                document.getElementById("array").innerHTML = arr;
            }
```

**Функция сброса(index.html)**
```js
function reset() {
                var request = new XMLHttpRequest();
                request.open("GET", "http://localhost/laba_5/reset.php", false);
                request.send();
                location.reload();
            }
```
