
<?php 
 session_start();
 if(!isset($_SESSION['logged in']))
 {
    header('Location: login.php');
    exit();
 }
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>


 <button type="button" class="btn btn-dark btn-lg" onclick="goBack()" id="back">Wróć</button>
 <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
            Ustawienia użytkownika
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list"
                            href="#account-general">Ogólne</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list"
                            href="#account-change-password">Zmiana hasła</a>
                    </div>
                    
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="img/awatar.png"  width="30%" height="30%" alt
                                    class="d-block ui-w-80">
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Nazwa użytkownika</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $_SESSION['user']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="<?php echo $_SESSION['Email']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Obecne hasło</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nowe hasło</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Powtórz nowe hasło</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                                    </label>
        <div class="text-right mt-3">
            <h5 style="color:red"> *-Wymagane</h5>
            <button type="button" class="btn btn-primary">Zapisz Zmiany</button>&nbsp;
            <button type="button" class="btn btn-default">Cofnij</button>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
 function goBack(){
        location.href = "kalendarz.php";
    }
    </script>


    <?php 
        echo $_SESSION['user'];
    ?>
    <form>
    <?php echo '<a class="dropdowntext" href="logout.php">Logout</a>'; ?> 
    </form>
 </body>


 <style>
        @media only screen and (max-width: 600px) {
    form {
        margin-top: 15%;
        width: 90%;
    }
    }
    #add{
        width: 100%;
    }
    #back{
        position: absolute;
        right: 2%;
        top: 2%;
    }
</style>
 </html>
