<h1>Bootstrap Tabs ajax</h1>

<p>Этот проект представляет собой веб-страницу, использующую AJAX-запросы для динамического обновления содержимого вкладок на основе данных, полученных с сервера.</p>

<h2>Функциональность:</h2>
<ul>
  <li>Используется jQuery для обработки событий кликов по вкладкам.</li>
  <li>При клике на вкладку с data-room отправляется AJAX-запрос на сервер (server.php).</li>
  <li>Сервер обрабатывает запрос и отправляет ответ, который затем динамически обновляется в соответствующей <code>tab-pane</code>.</li>
  <li>Работает только с вкладками внутри <code>#nav-tab</code>.</li>
</ul>

<h2>Пример использования:</h2>

```html
<ul class="nav" id="nav-tab">
    <li class="nav-item"><a href="#" class="nav-link active" id="nav-101-tab" data-bs-toggle="tab" data-bs-target="#nav-101" role="tab" aria-controls="nav-101" aria-selected="true" data-room="101">Комната 101</a></li>
    <li class="nav-item"><a href="#" class="nav-link" id="nav-102-tab" data-bs-toggle="tab" data-bs-target="#nav-102" role="tab" aria-controls="nav-102" aria-selected="false" data-room="102">Комната 102</a></li>
    <li class="nav-item"><a href="#" class="nav-link" id="nav-103-tab" data-bs-toggle="tab" data-bs-target="#nav-103" role="tab" aria-controls="nav-103" aria-selected="false" data-room="103">Комната 103</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="nav-101" role="tabpanel"></div>
    <div class="tab-pane fade" id="nav-102" role="tabpanel"></div>
    <div class="tab-pane fade" id="nav-103" role="tabpanel"></div>
</div>
```

```js
<script>
    $(document).ready(function() {
        $('#nav-tab .nav-link').click(function(event) {
            event.preventDefault();
            let room = $(this).data('room');
            let targetPane = $(this).data('bs-target');
            
            $('#nav-tab .nav-link').removeClass('active');
            $(this).addClass('active');
            
            $.ajax({
                url: 'server.php',
                type: 'POST',
                data: { room: room },
                success: function(response) {
                    console.log('Ответ от сервера:', response);
                    $(targetPane).html(response);
                },
                error: function(xhr, status, error) {
                    console.error('Ошибка:', error);
                }
            });
        });
    });
</script>
```

<h2>Требования:</h2>
<ul>
  <li>PHP 7.4+</li>
  <li>jQuery 3.6+</li>
</ul>

<h2>📜 Лицензия</h2>
<p>Этот проект распространяется под лицензией MIT. Вы можете использовать и модифицировать код по своему усмотрению.</p>

<h3>⚠️ Важно!</h3>
<p>Данный репозиторий автора нужен только для того, чтобы хранить и делится полезными знаниями. Знаю, можно было сделать по-другом, проще, интереснее, безопаснее и т.д.</p>
