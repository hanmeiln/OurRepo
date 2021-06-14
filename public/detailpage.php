<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
          box-sizing: border-box;
        }

        /* Style the body */
        body {
          font-family: Arial, Helvetica, sans-serif;
          margin: 0;
        }

        /* Header/logo Title */
        .header {
          padding: 25px;
          text-align: center;
          background: #DAAD86;
          color: white;
        }

        /* Increase the font size of the heading */
        .header h1 {
          font-size: 40px;
        }

        body {
          font-family: Montserrat;
        }

        * {
          box-sizing: border-box;
        }

        form.example input[type=text] {
          padding: 10px;
          font-size: 17px;
          border: 1px solid grey;
          float: left;
          width: 80%;
          background: #BC986A;
        }

        form.example button {
          float: left;
          width: 20%;
          padding: 10px;
          background: black;
          color: white;
          font-size: 17px;
          border: 1px solid grey;
          border-left: none;
          cursor: pointer;
        }

        form.example button:hover {
          background: #BC986A;
        }

        form.example::after {
          content: "";
          clear: both;
          display: table;
        }

        /* Sticky navbar - toggles between relative and fixed, depending on the scroll position. It is positioned relative until a given offset position is met in the viewport - then it "sticks" in place (like position:fixed). The sticky value is not supported in IE or Edge 15 and earlier versions. However, for these versions the navbar will inherit default position */
        .navbar {
          overflow: hidden;
          background-color: #333;
          position: sticky;
          position: -webkit-sticky;
          top: 0;
        }

        /* Style the navigation bar links */
        .navbar a {
          float: left;
          display: block;
          color: white;
          text-align: center;
          padding: 14px 20px;
          text-decoration: none;
        }


        /* Right-aligned link */
        .navbar a.right {
          float: right;
        }

        /* Change color on hover */
        .navbar a:hover {
          background-color: #ddd;
          color: black;
        }

        /* Active/current link */
        .navbar a.active {
          background-color: #666;
          color: white;
        }


        /* Main column */
        .main {   
          -ms-flex: 70%; /* IE10 */
          flex: 70%;
          background-color: #FBEEC1;
          height:auto;
          padding: 70px;
        }

        /* Fake image, just for this example */
        .fakeimg {
          background-color: #aaa;
          width: 100%;
          padding: 20px;
        }

        /* Footer */
        .footer {
          padding: 2px;
          text-align: center;
          background: #ddd;
        }

        /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 700px) {
          .row {   
            flex-direction: column;
          }
        }

        .row{
            padding: 30px;
            text-align: justify;
        }

        .card{
            background-color: rgba(0, 0, 0, 0.15);
            border-radius: 15px;
            text-align: center;
            font-size: 25px;
            padding: 30px;
        }

        /* Create three equal columns that floats next to each other */
        .column {
          float: left;
          width: 70%;
          padding: 15px;
        }

        .column2{
          float: left;
          width: 30%;
          padding: 15px;
        }

        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
        @media screen and (max-width:600px) {
          .column {
            width: 100%;
          }
          .column2 {
            width: 100%;
          }
        }
    </style>
</head>

<body>
    <div class="header">
      <img src="fmipaunpad.png" alt="FMIPAUnpad" width="400" height="100">
    </div>

    <div class="navbar">
      <a href="index.php" class="">Home</a>
      <a href="advancedsearch.php" class="">Advanced Search</a>
    </div>

    <div class="main">
        <?php
          use BorderCloud\SPARQL\SparqlClient;
          require_once('../vendor/autoload.php');

          $id = $_GET['id'];

          $fuseki_server = "http://localhost:3030"; // fuseki server address 
          $fuseki_sparql_db = "ourrepoo"; // fuseki Sparql database 
          $endpoint = $fuseki_server . "/" . $fuseki_sparql_db . "/query";	
          $sc = new SparqlClient();
          $sc->setEndpointRead($endpoint);
          $q = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
                PREFIX owl: <http://www.w3.org/2002/07/owl#>
                PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
                PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
                PREFIX : <http://www.semanticweb.org/user/ontologies/2021/4/untitled-ontology-4#>
                SELECT ?Title_Name ?Name ?Major ?Abstract ?Year ?id
                WHERE { 
                ?Author rdf:type :Author . 
                ?Author :Have ?Title .
                ?Title rdf:type :Title .
                ?Author :Name ?Name.
                ?Author :Major ?Major.
                ?Title :id '$id'^^xsd:integer .
                ?Title :Title_Name ?Title_Name .
                ?Title :Year ?Year .
                ?Title :Abstract ?Abstract .
                }
              "; 
                      
              $data = $sc->query($q, 'data');
              $row = $data['result']['rows'][0];
              $err = $sc->getErrors();
              if ($err) {
                print_r($err);
                throw new Exception(print_r($err, true));
              }

              $title_name = $row["Title_Name"];
              $name = $row["Name"];
              $year = $row["Year"];
              $major = $row["Major"];
              $abstract = $row["Abstract"];
                                    
              echo"
              <div class='card'>
                <div class='card-body'>$title_name</div>
              </div>
              <div class='row'>
                <div class='column'>
                    <p> <img src='customer.png' alt='profile' width='20' height='20'> $name</p>
                    <p> <img src='book.png' alt='profile' width='20' height='20'> $abstract
                    </p>
                </div>
                <div class='column2'>
                    <div class='card'>
                        <div class='card-body' style='font-size: 20px;'>Download File Here</div>
                        <p style='font-size: 16px;'><a href='#'>
                            <img src='file.png' alt='profile' width='20' height='20'>
                            Skripsi</a>
                        </p>
                    </div>
                </div>
              </div>
              ";     
        ?>
    </div>
</body>
</html>
