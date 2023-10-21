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
        <option selected>Wybierz typ elementu</option>
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
        <option selected>Wybierz jak ważny jest element</option>
        <option value="3">Bardzo ważny</option>
        <option value="2">Średnio ważny</option>
        <option value="1">Mało ważny</option>
    </select>
    <label for="floatingSelect2">Klinij aby otworzyć menu</label>
    </div>
    <br>
    <label>Wybierz date wydarzenia</label>
    <input type="date" id="dateInput" min="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d") ?>"/>
    <br><br>
    <button type="button" class="btn btn-success" onclick="addStudyDate()" id="add">Dodaj datę nauki</button>
    <br><br>
    <div id="studyDatesContainer"></div>
    <br>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="komentarz"></textarea>
        <label for="floatingTextarea2">Komentarz</label>
    </div>
    <br>
    <input class="btn btn-primary" type="submit" value="Submit" style="width:100%">
    </form>
    <?php
    // if(isset($_POST["nazwa"])){
    //     $nazwa = $_POST["nazwa"];
    //     $typ = $_POST["typ"];
    //     $waznosc = $_POST["waznosc"];
    //     $data = $_POST["data"];
    //     $komentarz = $_POST["komentarz"];
    //     echo $nazwa." ".$typ." ".$waznosc." ".$data." ".$data_od_do." ".$komentarz;   
    // }
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
        background-image: url("img/cool-background.png");
        background-size: cover;
        background-position: center;
    }
    form{
        background: rgba(200, 200, 200, 0.8); /* Transparent white background */
        backdrop-filter: blur(1px); /* Adjust the blur intensity as needed */
        border-radius: 3%;
        padding: 2%;
        width: 50%;
        margin-top: 5%;
    }
        @media only screen and (max-width: 600px) {
    form {
        margin-top: 15%;
        width: 90%;
    }
    }
    #add{
        width: 100%;
    }
</style>
<script>
    function goBack(){
        location.href = "kalendarz.php";
    }
    // Get the input element by its id
    const dateInput = document.getElementById('dateInput');

    // Get the select and date input elements by their respective IDs
    const selectElement = document.getElementById('floatingSelect');
    const add = document.getElementById("add");

    // Add an event listener to the select element
    selectElement.addEventListener('change', function() {
        // Get the selected option's value
        const selectedValue = selectElement.value;

        // Disable the date input if "Obowiązek domowy" is selected, or enable it otherwise
        if (selectedValue === "obowiazek") {
            add.disabled = true;
        } else {
            add.disabled = false;
        }
    });

    // Initialize the state based on the initial select value
    if (selectElement.value === "obowiazek") {
        dateInput.disabled = true;
    }
    function addStudyDate() {
    const studyDatesContainer = document.getElementById('studyDatesContainer');
    const newDateInput = document.createElement('input');
    newDateInput.type = 'date';

    // Set the min attribute to the current date
    const currentDate = new Date();
    const formattedCurrentDate = currentDate.toISOString().split('T')[0];
    newDateInput.min = formattedCurrentDate;

    // Set the max attribute to one day before the event date
    const eventDate = new Date(dateInput.value);
    eventDate.setDate(eventDate.getDate() - 1); // Subtract one day
    const formattedEventDate = eventDate.toISOString().split('T')[0];
    newDateInput.max = formattedEventDate;

    studyDatesContainer.appendChild(newDateInput);
}



</script>
</html>