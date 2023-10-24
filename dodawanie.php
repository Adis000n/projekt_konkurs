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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>
    <button type="button" class="btn btn-dark btn-lg" onclick="goBack()" id="back">Wróć</button>
    <form method="post">
    <!-- potrzebna nazwa, co to jest(kartkówka,sprawdzian,czy zadanie), jak ważne, komentarz, data na kiedy, i od kiedy do kiedy chcesz to robić -->
    <div class="form-floating mb-3">
        <input class="form-control" id="floatingInput" placeholder="Przykładowy_przedmiot" name="nazwa">
        <label for="floatingInput">Nazwa wydarzenia</label>
    </div>
    <div class="form-floating">
    <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="typ">
        <option selected>Wybierz typ wydarzenia</option>
        <option value="sprawdzian">Sprawdzian</option>
        <option value="kartkowka">Kartkówka</option>
        <option value="zadanie">Zadanie domowe</option>
        <option value="obowiazek">Obowiązek domowy</option>
    </select>
    <label for="floatingSelect">Klinij aby otworzyć menu </label>
    </div>
    <br>
    <div class="form-floating">
    <select class="form-select" id="floatingSelect2" aria-label="Floating label select example" name="waznosc">
        <option selected>Wybierz jak ważny jest wydarzenie</option>
        <option value="bardzo">Bardzo ważny</option>
        <option value="srednio">Średnio ważny</option>
        <option value="malo">Mało ważny</option>
    </select>
    <label for="floatingSelect2">Klinij aby otworzyć menu</label>
    </div>
    <br>
    <label>Wybierz date wydarzenia</label>
    <input type="date" id="dateInput" min="<?php echo date("Y-m-d") ?>" value="<?php echo date("Y-m-d") ?>" style="border-radius:5px"/>
    <br><br>
    <div id="studyDatesContainer">Data zrobienia/nauki:<br></div>
    <br>
    <button type="button" class="btn btn-success" onclick="addStudyDate()" id="add">Dodaj datę nauki/zrobienia</button>
    <br><br>
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
        background: rgba(200, 200, 200, 0.6); /* Transparent white background */
        backdrop-filter: blur(1.5px); /* Adjust the blur intensity as needed */
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
            document.getElementById('studyDatesContainer').innerHTML = "Data zrobienia/nauki:<br>!!!Ponieważ wybrałeś obowiązek domowy nie ma daty zrobienia/nauki!!!";
        } else {
            add.disabled = false;
            document.getElementById('studyDatesContainer').innerHTML = "Data zrobienia/nauki:<br>";

        }
    });

    // Initialize the state based on the initial select value
    if (selectElement.value === "obowiazek") {
        dateInput.disabled = true;
    }
    function addStudyDate() {
    const studyDatesContainer = document.getElementById('studyDatesContainer');
    const dateInputs = studyDatesContainer.getElementsByTagName('input');
    
    // Get the selected event date
    const eventDate = new Date(dateInput.value);

    // Calculate the number of days between today and the event date
    const today = new Date();
    const daysUntilEvent = Math.ceil((eventDate - today) / (1000 * 60 * 60 * 24));

    // Check if there are more study dates to add
    if (dateInputs.length < daysUntilEvent) {
        const newDateInput = document.createElement('input');
        newDateInput.type = 'date';

        // Set the min attribute to the current date
        const currentDate = today.toISOString().split('T')[0];
        newDateInput.min = currentDate;

        // Set the max attribute to one day before the event date
        eventDate.setDate(eventDate.getDate() - 1);
        const formattedEventDate = eventDate.toISOString().split('T')[0];
        newDateInput.max = formattedEventDate;
        newDateInput.style.borderRadius = "5px";
        document.getElementById("add").innerHTML = "Dodaj kolejną datę nauki/zrobienia";

        studyDatesContainer.appendChild(newDateInput);

        // Check for duplicate dates
        if (hasDuplicateDates()) {
            // Display an alert if duplicate dates are found
            Swal.fire({
                icon: 'error',
                title: 'Oho...',
                text: 'Nie można dodać dwóch takich samych dat nauki/zrobienia.',
            });

            // Remove the duplicate date input
            studyDatesContainer.removeChild(newDateInput);
        }
    } else {
        // If the maximum number of study dates has been reached, display a message
        Swal.fire({
            icon: 'error',
            title: 'Oho...',
            text: 'Dodałeś maksymalną ilość dni, w których możesz się uczyć/zadanie zrobić!',
        });
    }
}

// Function to check for duplicate dates
function hasDuplicateDates() {
    const dateInputs = studyDatesContainer.getElementsByTagName('input');
    const dateValues = Array.from(dateInputs).map(input => input.value);
    const uniqueDateValues = new Set(dateValues);
    return dateValues.length !== uniqueDateValues.size;
}

</script>
</html>