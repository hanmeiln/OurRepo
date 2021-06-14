<!DOCTYPE html>
<html lang="en">
<head>
    <title>Advanced Search</title>
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

        .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          background: rgba(0, 0, 0, 0.15);
          border-radius: 20px;
          margin: 20px;
          padding: 20px;
          text-align: left;
          font-family: arial;
        }

        th,td {
          color: black;
          padding: 10px;
          text-align: left;
        }

        .content{
            margin-top: 50px;
        }

        button {
          border: none;
          outline: 0;
          display: inline-block;
          padding: 10px;
          color: white;
          background-color: white;
          text-align: center;
          cursor: pointer;
          width: 80px;
          font-size: 12px;
        }

        a {
          text-decoration: none;
          color: black;
        }

        button:hover, a:hover {
          color: red;
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
          padding: 70px;
          height:auto;
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
          color: white;
          text-align: center;
          background: black;
        }

        /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 700px) {
          .row {   
            flex-direction: column;
          }
        }

        /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
        @media screen and (max-width: 400px) {
          .navbar a {
            float: none;
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
      <a href="advance.php" class="active">Advanced Search</a>
    </div>

    <div class="main">
      <form action="advance.php" method="POST">    
        <div class="">
          <div class="">
            <div class="">
              <p>Title Name :</p>
              <input type="text" name="title_name" id="title_name" placeholder="Masukkan judul " style="padding: 10px; font-size: 17px; border: 1px solid grey; float: left; width: 50%; background: #BC986A;" />
            </div>
          </div>
          <br><br>
          
          <div class="">
            <div class="">
              <p>Author :</p>
              <input type="text" name="name" id="name" placeholder="Masukkan nama author " style="padding: 10px; font-size: 17px; border: 1px solid grey; float: left; width: 50%; background: #BC986A;";/>
            </div>
          </div>
          <br><br>
                        
          <div class="">
            <div class="">
              <p>Jurusan :</p>
              <input type="text" name="major" id="major" placeholder="Masukkan jurusan " style="padding: 10px; font-size: 17px; border: 1px solid grey; float: left; width: 50%; background: #BC986A;"/>
            </div>
          </div>
        </div>
        <br><br><br>
        <button class="btn-search" type="submit" style=" width: 30%; background-color: black; color: white; padding: 14px 20px; border: none; border-radius: 4px; cursor: pointer;">Search</button>
        <br><br>          
      </form>

    <!--Backend-->
    <?php
            use BorderCloud\SPARQL\SparqlClient;

            require_once('../vendor/autoload.php');

            //Error Handling
            $title_name = false;
            $name = false;
            $year = false;
            $major = false;
            $id = false;

            if (isset($_POST['title_name']))
                $title_name = $_POST['title_name'];

            if (isset($_POST['name']))
                $name = $_POST['name'];

            if (isset($_POST['major']))
                $major = $_POST['major'];

            if (!$title_name && !$name && !$major) {
                echo "<div><h2>Masukkan Pencarian!</h2></div>";
            }
            //Error Handling
            else {
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
                ?Author :Name ?Name.
                ?Author :Major ?Major.
                ?Author :Have ?Title.
                ?Title rdf:type :Title .
                    OPTIONAL {?Title :Title_Name ?Title_Name . }
                    OPTIONAL {?Title :Abstract ?Abstract . }
                    OPTIONAL {?Title :Year ?Year . }
                    OPTIONAL {?Title :id ?id . }
                FILTER (regex(?Title_Name, '$title_name', 'i') &&
                regex(?Name, '$name', 'i') &&
                regex(?Major, '$major', 'i'))
                }
                    ";
            
                // proses ke query 
                $rows = $sc->query($q, 'rows');
                $err = $sc->getErrors();
                if ($err) {
                    print_r($err);
                    throw new Exception(print_r($err, true));
                }

                if($title_name == ""){
                    $title_name = "-";
                }
                if($name == ""){
                    $name = "-";
                }
                if($major == ""){
                    $major = "-";
                }
                $count = count($rows);
                echo "<div> Hasil Pencarian Judul : <strong>$title_name</strong> | Author : <strong>$name</strong> | Jurusan : <strong>$major</strong> </div>";

                foreach ($rows["result"]["rows"] as $row) {
                    $title_name = $row["Title_Name"];
                    $name = $row["Name"];
                    $year = $row["Year"];
                    $major = $row["Major"];
                    $id = $row["id"];


                    echo"
                    <div class='card'>
                    <table>
                      <tr>
                        <th>Judul</th>
                        <td>:</td>
                        <td>$title_name</td>
                      </tr>
                      <tr>
                        <th>Tahun</th>
                        <td>:</td>
                        <td>$year</td>
                      </tr>
                      <tr>
                          <th>Milik</th>
                          <td>:</td>
                          <td>$name</td>
                        </tr>
                      <tr>
                        <th>Jurusan</th>
                        <td>:</td>
                        <td>$major</td>
                      </tr>
                    </table>
          
                    <button><a href='detailpage.php?id=$id'>Detail</a></button>
                  </div>";
                }
            }
    ?>
    </div>
</body>
</html>
