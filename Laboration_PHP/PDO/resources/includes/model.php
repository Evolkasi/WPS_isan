<?php
// skapa anslutnings uppgifter!!
$host = 'localhost';
$dbname = 'Blogg';
$user = 'admin';
$password = '123ananaskalas';

//skapar ett attribut för vårt PDO objekt
$attr = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);

// Så att vi använder oss utav UTF-8
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

//Skapa PDO projektet Hur sätter man in UFT-8 i PDO?
$pdo = new PDO($dsn, $user, $password);

  //Skapar vår Model-array.
  if($pdo) {
    $model = array();
    foreach($pdo->query("SELECT P.ID, P.Slug, P.Headline, CONCAT(U.First_name, ' ', U.Last_name) AS Name, P.Creation_time, P.Text FROM Posts AS P JOIN users AS U ON U.ID ORDER BY P.Creation_time DESC") as $row) {
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
else{
  print_r($pdo->errorInfo());
}

/*
$oldmodel = array(
    '0' => array(
        'slug' => 'forsta-inlagget',
        'title' => 'Första inlägget',
        'author' => 'Gugge',
        'date' => '2015-01-01',
        'text' => 'Här kommer det första inlägget i sin helhet. Välkommen till Labb 3! Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    ),
    '1' => array(
        'slug' => 'snart-ar-det-var',
        'title' => 'Snart är det vår',
        'author' => 'Gugge',
        'date' => '2015-02-24',
        'text' => 'Snart är det vår! Då övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    ),
    '2' => array(
        'slug' => 'robin-presenterar-sig',
        'title' => 'Robin presenterar sig',
        'author' => 'Robin',
        'date' => '2015-02-25',
        'text' => 'Robin är en trevlig prick som gärna övar på PHP för att som du bli en duktig webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    ),
    '3' => array(
        'slug' => 'senaste-inlagget',
        'title' => 'Senaste inlägget',
        'author' => 'Robin',
        'date' => '2015-02-26',
        'text' => 'Här kommer senaste inlägget i sin helhet. Välkommen till Labb 3! Här övar vi på PHP för att bli duktiga webbserverprogrammerare. Detta är tredje labben och andra labben i en serie labbar som tillsammans bygger ihop detta projekt. Ett enkelt PHP-projekt men väl strukturerat och genomtänkt konstruerat.'
    )
);

echo '<pre>';
foreach($model as $row) {
  print_r($row);
}
echo '</pre';
*/
?>
