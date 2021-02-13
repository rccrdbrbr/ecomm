<?php


function AdVuoto($name_an, $name_ar, $price, $com, $prov, $reg, $date, $visibility, $type, $category, $subcategory, $description)
{
    $risultato;
    if (empty($name_an) || empty($name_ar) || empty($price) || empty($com) || empty($prov) ||empty($reg) ||empty($date) ||empty($visibility) ||empty($type) ||empty($category) || empty($subcategory) || empty($description)) {
        $risultato=true;
    } else {
        $risultato=false;
    }
    return $risultato;
}

function AreaVuota($visibility, $area)
{
    $risultato=false;
    if ($visibility === "ristretto") {
        if (empty($area)) {
            $risultato=true;
        } else {
            $risultato=false;
        }
        return $risultato;
    } else {
        return $risultato;
    }
}

function AreaErrata($visibility, $area)
{
    $risultato=false;
    if ($visibility !== "ristretto") {
        if (!empty($area)) {
            $risultato=true;
        } else {
            $risultato=false;
        }
        return $risultato;
    } else {
        return $risultato;
    }
}

function AssicurazioneErr($type, $ensurance)
{
    $risultato=false;
    if ($type === "usato") {
        if (!empty($ensurance)) {
            $risultato=true;
        } else {
            $risultato=false;
        }
        return $risultato;
    } else {
        return $risultato;
    }
}

function UsuraPeriodoErr($type, $usura, $periodo)
{
    $risultato=false;
    if ($type === "usato") {
        if (empty($usura)|| empty($periodo)) {
            $risultato=true;
        } else {
            $risultato=false;
        }
        return $risultato;
    } elseif ($type === "nuovo") {
        if (!empty($usura)|| !empty($periodo)) {
            $risultato=true;
        } else {
            $risultato=false;
        }
        return $risultato;
    }
}

function DataErrata($date, $type)
{
    $risultato=false;
    $limitenuovo = time() + (10 * 24 * 60 * 60);
    $limiteusato = time() + (3 * 24 * 60 * 60);
    if ($date <= date('Y-m-d')) {
        $risultato=true;
        return $risultato;
    }
    if ($type === "nuovo") {
        if ($date > date('Y-m-d', $limitenuovo)) {
            $risultato=true;
        }
    } elseif ($type === "usato") {
        if ($date > date('Y-m-d', $limiteusato)) {
            $risultato=true;
        }
    }
    return $risultato;
}

function CreaCategoria($conn, $category, $subcategory)
{
    $sql= "INSERT INTO categoria (Categoria, Sottocategoria) VALUES (?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-ad.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $category, $subcategory);
    mysqli_stmt_execute($stmt);
}

function CreaProdotto($conn, $name_ar, $type, $img, $ensurance, $usura, $periodo, $category, $subcategory)
{
    CreaCategoria($conn, $category, $subcategory);
    $sql= "INSERT INTO prodotto (Nome_P, Tipo, Foto, PeriodoAssicurazione, StatoUsura, PeriodoUtilizzo, Categoria, Sottocategoria) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-ad.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssss", $name_ar, $type, $img, $ensurance, $usura, $periodo, $category, $subcategory);
    mysqli_stmt_execute($stmt);


    $last_id = mysqli_insert_id($conn);
    session_start();
    $_SESSION["ID_P"]= $last_id;
}

function CreaVisibilità($conn, $visibility, $area)
{
    $sql= "INSERT INTO Visibilità (Tipo, AreaGeo) VALUES (?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-ad.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $visibility, $area);
    mysqli_stmt_execute($stmt);
}



function CreaAnnuncio($conn, $name_an, $price, $com, $prov, $reg, $date, $visibility, $area, $description)
{
    $state = "in vendita";
    $dateP = date('Y-m-d');
    $cf = $_SESSION["CF"];
    $idp =$_SESSION["ID_P"];
    CreaVisibilità($conn, $visibility, $area);
    $sql= "INSERT INTO annuncio (Nome_A, Prezzo, Comune, Provincia, Regione, DataFine, ID_P, Tipo, AreaGeo, CF, DataPubb, Descrizione) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-ad.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sdssssisssss", $name_an, $price, $com, $prov, $reg, $date, $idp, $visibility, $area, $cf, $dateP, $description);
    mysqli_stmt_execute($stmt);

    $last_id = mysqli_insert_id($conn);
    session_start();
    $_SESSION["ID_A"]= $last_id;
}

function CreaStato($conn)
{
    $state = "in vendita";
    $cf = $_SESSION["CF"];
    $ida =$_SESSION["ID_A"];
    $sql= "INSERT INTO stati (CF, ID_A, Stato) VALUES (?, ?, ?);";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../create-ad.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sis", $cf, $ida, $state);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);
    header("location: ../create-ad.php?error=none");
}

function cambiaImmagine($conn, $ida, $img)
{
    if ($img!== "") {
        $sql= "UPDATE prodotto SET Foto = ? WHERE ID_P = (SELECT ID_P FROM annuncio WHERE ID_A = ? ) ;";
        $stmt= mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../my-account.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "si", $img, $ida);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

function cambiaAnnuncio($conn, $ida, $nameA, $price, $com, $prov, $reg, $visibility, $area)
{
    CreaVisibilità($conn, $visibility, $area);
    $sql= "UPDATE annuncio SET Nome_A = ?, Prezzo = ?, Comune = ?, Provincia = ?, Regione = ?, Tipo = ?, AreaGeo = ? WHERE ID_A = ? ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed1");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sdsssssi", $nameA, $price, $com, $prov, $reg, $visibility, $area, $ida);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function cambiaProdotto($conn, $ida, $nameP, $category, $subcategory)
{
    CreaCategoria($conn, $category, $subcategory);
    $sql= "UPDATE prodotto SET Nome_P = ?, Categoria = ?, Sottocategoria = ? WHERE ID_P = (SELECT ID_P FROM annuncio WHERE ID_A = ? ) ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssi", $nameP, $category, $subcategory, $ida);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function cambiaDescrizione($conn, $ida, $description)
{
    if ($description!== "") {
        $sql= "UPDATE annuncio SET Descrizione = ? WHERE ID_A =  ?  ;";
        $stmt= mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../my-account.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "si", $description, $ida);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

function eliminaAnnuncio($conn, $ida)
{
    $sql= "UPDATE stati SET Stato = 'eliminato' WHERE ID_A =  ?  ;";
    $stmt= mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../my-account.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $ida);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}
