<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie wydarzeń</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
</head>
<body>
    <button type="button" class="btn btn-dark btn-lg" onclick="goBack()" id="back">Wróć</button>
    <form method="post">
    <!-- potrzebna nazwa, co to jest(kartkówka,sprawdzian,czy zadanie), jak ważne, komentarz, data na kiedy, i od kiedy do kiedy chcesz to robić -->
    <div class="form-floating mb-3">
        <input class="form-control" id="floatingInput" placeholder="Przykładowy_przedmiot" name="nazwa">
        <label for="floatingInput">Nazwa elementu</label>
    </div>
    <div class="form-floating">
    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="typ">
        <option selected disabled>Wybierz typ elementu</option>
        <option value="sprawdzian">Sprawdzian</option>
        <option value="kartkowka">Kartkówka</option>
        <option value="zadanie">Zadanie domowe</option>
        <option value="przypomnienie">Przypomnienie</option>
        <option value="obowiazek">Obowiązek domowy</option>
    </select>
    <label for="floatingSelect">Klinij aby otworzyć menu </label>
    </div>
    <br>
    <div class="form-floating">
    <select class="form-select" id="floatingSelect2" aria-label="Floating label select example" name="waznosc">
        <option selected disabled>Wybierz jak ważny jest element</option>
        <option value="3">Bardzo ważny</option>
        <option value="2">Średnio ważny</option>
        <option value="1">Mało ważny</option>
    </select>
    <label for="floatingSelect2">Klinij aby otworzyć menu</label>
    </div>
    <br>
    <div class="mb-0">
    <label for="floatingSelect">Data elementu</label>
    <input class="form-control form-control-solid" placeholder="Pick date rage" id="kt_daterangepicker_3" name="data"/>
    </div>
    <br>
    <div class="form-floating">
    <select class="form-select" id="floatingSelect" disabled aria-label="Floating label select example">
        <option selected disabled>Ile dni przed chcesz się uczyć/robić</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
    </select>
    <label for="floatingSelect">Kliknij aby otworzyć menu</label>
    </div>
    <br>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
    <label class="form-check-label" for="exampleRadios1">
        tylko jeden dzień tyle przed ile wybrałeś
    </label>
    </div>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
    <label class="form-check-label" for="exampleRadios2">
        Przez wszystkie dni przed tyle ile wybrałeś
    </label>
    </div>
    <br>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="komentarz"></textarea>
        <label for="floatingTextarea2">Komentarz</label>
    </div>
    <br>
    <input class="btn btn-primary" type="submit" value="Submit" style="width:100%">
    </form>
    <?php
    if(isset($_POST["nazwa"])){
        $nazwa = $_POST["nazwa"];
        $typ = $_POST["typ"];
        $waznosc = $_POST["waznosc"];
        $data = $_POST["data"];
        $komentarz = $_POST["komentarz"];
        echo $nazwa." ".$typ." ".$waznosc." ".$data." ".$data_od_do." ".$komentarz;   
    }
    ?>
</body>
<style>
    #back{
        position: absolute;
        right: 2%;
        top: 2%;
    }
    body{
        justify-content: center;
        display: flex;
    }
    form{
        background-color: rgb(225,225,225);
        padding: 2%;
        border-radius: 3%;
        margin-top: 5%;
        width: 50%;
    }
        @media only screen and (max-width: 600px) {
    form {
        margin-top: 15%;
        width: 90%;
    }
    }
</style>
<script>
    function goBack(){
        location.href = "kalendarz.php";
    }
    $("#kt_daterangepicker_3").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 1901,
        maxYear: parseInt(moment().format("YYYY"),12)
    });

</script>
</html>