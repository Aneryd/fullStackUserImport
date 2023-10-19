<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Импорт пользователей</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>  
    <div style="padding-left: 50px; padding-top: 50px;">
        <button onclick="importUsers()" id="button">Импортировать пользователей</button>
        <div style="display: block;">
            <p>Всего: <span id="all">{{ $users }}</span></p>
            <p>Добавлено: <span id="add">0</span></p>
            <p>Обновлено: <span id="update">0</span></p>
        </div>
    </div>
</body>

<script>
    function importUsers(){
        $("#button").html("Загрузка...")
        $.ajax({
            url: "{{ route('users_import') }}",
            method: "GET",
            data: {},
            success: function(response){
                $("#button").html("Импортировать пользователей")
                if(response["data"]["error"]){
                    alert(response["data"]["error"]);
                }else{
                    $("#all").html(response["data"]["all_count"]);
                    $("#add").html(response["data"]["create_count"]);
                    $("#update").html(response["data"]["update_count"]);
                }
            }
        })
    }
</script>

</html>