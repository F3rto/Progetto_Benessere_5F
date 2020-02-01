<?php
    //codice da copiare e incollare prima del form di registrazione
    
    if(isset($_POST)){
        //se l'utente è arrivato al form dopo aver compilato i campi della registrazione
        $nome = $_POST['nome'];
        $cognome = $_POST['cognome'];
        $data_nascita = $_POST['data_nascita'];
        $cf = $_POST['cf'];
        $sesso = $_POST['sesso'];
        $telefono = $_POST['telefono'];
        $indirizzo = $_POST['indirizzo'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        //imposto i parametri per la connessione al db e creo la connessione
        $servername = "localhost";
        $username_db = "admin";
        $password_db = "";
        $db_name = "ferraris_wellness";
        $conn = mysqli_connect($servername, $username_db, $password_db, $db_name); 

        //verifichiamo la corretta connessione al db
        if(!$conn){
            die("Connessione al db non riuscita. Errore: " . mysqli_connect_error());
        }
        
        $table_name = "utente";     //nome della tabella utenti
        $my_query = "INSERT INTO $table_name (nome, cognome, data_nascita, CF, sesso, telefono, indirizzo, mail, password)
        VALUES ($nome, $cognome, $data_nascita, $cf, $sesso, $telefono, $indirizzo, $mail, MD5($password))";

        if(mysqli_query($conn, $my_query)){
            //effettuo la query
            //prima controllo che telefono e mail non siano gia presenti nel db
            echo "Registrazione avvenuta";
        }else{
            echo "Errore durante la registrazione: " . mysqli_error($conn);
        }
    }

?>