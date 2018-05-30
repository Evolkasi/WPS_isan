<?php
require 'resources/includes/db_conn.php'; // Kopiera all kod som ligger inne i db_conn.php och skriver den här, vilket alltså tillåter oss att connecta till databasen och ger oss en massa variabler.

if ($pdo) {

    // Det vi gör nu är att vi skapar en ny variabel som tillåter oss att dra en post direkt från databasen och visa den utifall vi söker efter den.
    $sql = 'SELECT P.ID, P.Slug, P.Headline, CONCAT(U.Firstname, " ", U.Lastname) AS Name, P.Creation_time, P.Text FROM Posts AS P JOIN Users AS U ON U.ID = P.User_ID ORDER BY P.Creation_time DESC';

    // Vi kollar utifall vi söker efter någonting.
    if (isset($_POST['search'])) {
        // Om vi söker efter någonting, så söks det efter nu.
        $data = $_POST['search'];

        /**********************************************************/
        /*********************** C-UPPGIFT 1 **********************/
        /*** Variabeln $data kan innehålla, som den är utformad, **/
        /********* information som kan skada vår databas. *********/
        /*** För betyget C så kräver jag att ni säkerställer att **/
        /***** $data inte innehåller någon form av skadlig kod ****/
        /**********************************************************/

        /**********************************************************/
        /*********************** C-UPPGIFT 2 **********************/
        /* I filen all-posts.php så skrivs det ut en kortare text */
        /* följt av en länk till berört inlägg. Vore det inte mer */
        /* passande att det istället skrivs ut ord från inlägget? */
        /* För betyget C så kräver jag att ni tar fram en lösning */
        /**** där 10 ord från inlägget skrivs ut före läs mer. ****/
        /************ Tänk implode och/eller explode! *************/
        /**********************************************************/

        /**********************************************************/
        /************************ A-UPPGIFT ***********************/
        /** Som det är just nu så tar vi bara in en variabel som **/
        /******* vi använder när vi söker igenom databasen. *******/
        /* Tittar man på sidor som exempelvis google och facebook */
        /**** så kan din sökning oftast innehålla flera sökord ****/
        /* För betyget A så kräver jag att ni tar fram en lösning */
        /** som gör det möjligt för användaren att kunna söka på **/
        /** flera separerade ord. Att man exempelvis kan söka på **/
        /***** texter som innehåller både "Lorum" och "Ipsum." ****/
        /**********************************************************/

        // Utifall vi inte söker på någonting, så visas alla posts.
        if (!empty($data)) {
            $sql = 'SELECT p.ID, p.Slug, p.Headline, CONCAT(u.Firstname, " ", u.Lastname) AS Name, p.Creation_time, p.Text FROM Posts AS p JOIN Users AS u ON U.ID = P.User_ID WHERE p.Text LIKE "%'.$data.'%" ORDER BY P.Creation_time DESC';
        }
    }

    // Vi skapar en array som kan visa posts. Sedan visar vi alla
    $model = array();
    foreach($pdo->query($sql) as $row) {
        // Här bygger vi upp våran model array, så att den kan visa posts då vi klickar på dom.
        $model += array(
            $row['ID'] => array(
                'slug' => $row['Slug'],
                'title' => $row['Headline'],
                'author' => $row['Name'],
                'date' => $row['Creation_time'],
                'text' => $row['Text']
            )
        );
    }
}
else {
    print_r($pdo->errorInfo());
}
?>
