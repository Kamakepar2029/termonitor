<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- update the version number as needed -->
    <script defer src="/__/firebase/8.2.1/firebase-app.js"></script>
    <!-- include only the Firebase features as you need -->
    <script defer src="/__/firebase/8.2.1/firebase-auth.js"></script>
    <script defer src="/__/firebase/8.2.1/firebase-database.js"></script>
    <script defer src="/__/firebase/8.2.1/firebase-firestore.js"></script>
    <script defer src="/__/firebase/8.2.1/firebase-functions.js"></script>
    <script defer src="/__/firebase/8.2.1/firebase-messaging.js"></script>
    <script defer src="/__/firebase/8.2.1/firebase-storage.js"></script>
    <script defer src="/__/firebase/8.2.1/firebase-analytics.js"></script>
    <script defer src="/__/firebase/8.2.1/firebase-remote-config.js"></script>
    <script defer src="/__/firebase/8.2.1/firebase-performance.js"></script>
    <!-- 
      initialize the SDK after all desired features are loaded, set useEmulator to false
      to avoid connecting the SDK to running emulators.
    -->
    <script defer src="/__/firebase/init.js?useEmulator=true"></script>

    <style media="screen">
      body { background: #ECEFF1; color: rgba(0,0,0,0.87); font-family: Roboto, Helvetica, Arial, sans-serif; margin: 0; padding: 0; }
      #message { background: white; max-width: 360px; margin: 100px auto 16px; padding: 32px 24px; border-radius: 3px; }
      #message h2 { color: #ffa100; font-weight: bold; font-size: 16px; margin: 0 0 8px; }
      #message h1 { font-size: 22px; font-weight: 300; color: rgba(0,0,0,0.6); margin: 0 0 16px;}
      #message p { line-height: 140%; margin: 16px 0 24px; font-size: 14px; }
      .btn { display: block; text-align: center; background: #039be5; text-transform: uppercase; text-decoration: none; color: white; padding: 16px; border-radius: 4px; }
      #message, .btn { box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); }
      #load { color: rgba(0,0,0,0.4); text-align: center; font-size: 13px; }
      @media (max-width: 600px) {
        body, #message { margin-top: 0; background: white; box-shadow: none; }
        body { border-top: 16px solid #ffa100; }
      }
    </style>
  </head>
  <body>
    <div id="message">
      <h2>Admin</h2>
      <h1>Dashboard</h1>
      <div>
      <p>Memory (Hard):</p>
      <div>Total memory: <a id="total">%total%</a> MB</div>
      <div>Used memory: <a id="used">%used%</a> MB</div>
      <div>Free memory: <a id="free">%free%</a> MB</div>
      <div>Shared memory: <a id="shared">%shared%</a> MB</div>
      <div>Buffered memory: <a id="buffered">%buffered%</a> MB</div>
      <div>Avaliable memory: <a id="avail">%avail%</a> MB</div>
      </div>
      <div>
      <p>Memory (Swap):</p>
      <div>Swap total: <a id="sw1">%sw_total%</a> MB</div>
      <div>Swap free: <a id="sw2">%sw_free%</a> MB</div>
      <div>Swap used: <a id="sw3">%sw_used%</a> MB</div>
      </div>
    </div>
    <p id="load">Lol&hellip;</p>
    <script>
    function updateinfo(){
      var file = '/getmemory';
      let total = document.getElementById('total');
      let used = document.getElementById('used');
      let free = document.getElementById('free');
      let shared = document.getElementById('shared');
      let buffer = document.getElementById('buffered');
      let avail = document.getElementById('avail');
      let swap_to = document.getElementById('sw1');
      let swap_fr = document.getElementById('sw2');
      let swap_us = document.getElementById('sw3');
      var xhr = new XMLHttpRequest();
      // 2. Конфигурируем его: GET-запрос на URL 'phones.json'
      xhr.open('GET', '/getmemory', false);
      //{"total":"26069","used":"15418","free":"463","shared":"24","buffered":"10187","avail":"16971","sw_total":"0","sw_free":"0","sw_used":"0"}
      xhr.send();
      // 4. Если код ответа сервера не 200, то это ошибка
      if (xhr.status != 200) {
        // обработать ошибку
        alert( xhr.status + ': ' + xhr.statusText ); // пример вывода: 404: Not Found
      } else {
        // вывести результат
        var responsib = ( xhr.responseText ); // responseText -- текст ответа.
        var pills = JSON.parse(responsib);
        total.innerHTML = pills.total;
        used.innerHTML = pills.used;
        free.innerHTML = pills.free;
        shared.innerHTML = pills.shared;
        buffer.innerHTML = pills.buffered;
        avail.innerHTML = pills.avail;
        swap_to.innerHTML = pills.sw_total;
        swap_fr.innerHTML = pills.sw_free;
        swap_us.innerHTML = pills.sw_used;
      }
    }
    setInterval(updateinfo, 500);
    </script>
  </body>
</html>