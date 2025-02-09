<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX data-room</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
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
</body>
</html>
