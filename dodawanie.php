<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie elementów</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>
    <form method="post">
    <!-- potrzebna nazwa, co to jest(kartkówka,sprawdzian,czy zadanie), jak ważne, komentarz, data na kiedy, i od kiedy do kiedy chcesz to robić -->
    <div class="form-floating mb-3">
        <input class="form-control" id="floatingInput" placeholder="Przykłądowy_przedmiot">
        <label for="floatingInput">Nazwa elementu</label>
    </div>
    <div class="form-floating">
    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
        <option selected>Klinij aby otworzyć menu</option>
        <option value="sprawdzian">Sprawdzian</option>
        <option value="kartkowka">Kartkówka</option>
        <option value="zadanie">Zadanie domowe</option>
    </select>
    <label for="floatingSelect">Wybierz typ elementu</label>
    </div>
    <br>
    <div class="form-floating">
    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
        <option selected>Klinij aby otworzyć menu</option>
        <option value="3">Bardzo ważny</option>
        <option value="2">Średnio ważny</option>
        <option value="1">Mało ważny</option>
    </select>
    <label for="floatingSelect">Wybierz jak ważny jest element</label>
    </div>
    <br>
    <input type="text" name="data" value="<?php echo date("m/d/Y") ?>" />
    <label for="floatingSelect">Data elementu</label>
    <br><br>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
        <label for="floatingTextarea2">Komentarz</label>
    </div>
    </form>
</body>
<style>
    body{
        justify-content: center;
        display: flex;
    }
    form{
        background-color: rgb(225,225,225);
        padding: 2%;
        border-radius: 4%;
        margin-top: 5%;
        width: 50%;
    }
</style>
<script>
    $(function() {
    $('input[name="data"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format('YYYY'),10)
    });
    });
</script>
</html>