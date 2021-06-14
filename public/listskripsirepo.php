<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hasil Pencarian</title>
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
      <a href="advancedsearch.php" class="">Advanced Search</a>
    </div>

    <div class="main" style="text-align: center;">
      <div class="text-left">
        <form class="example" action="listskripsirepo.php" method="POST">
          <input type="text" placeholder="Cari Referensi Skripsi..." name="search">
          <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>

    <!--Backend-->
    <?php
        use BorderCloud\SPARQL\SparqlClient;
        require_once('../vendor/autoload.php');

        //Error Handling
        $search = false;
        $title_name = false;
        $name = false;
        $year = false;
        $major = false;
        $id = false;

        echo "
        <div class='content'>
              ";

        if (isset($_POST['search']))
            $search = $_POST['search'];

        if (!$search) {
            echo "<div><h1>Masukkan Pencarian!</h1></div>";
        }

        else {
            $fuseki_server = "http://localhost:3030"; // fuseki server address 
            $fuseki_sparql_db = "ourrepoo"; // fuseki Sparql database 
            $endpoint = $fuseki_server . "/" . $fuseki_sparql_db . "/query";
            $sc = new SparqlClient();
            $sc->setEndpointRead($endpoint);
            $key = explode(" ",$search);
            foreach($key as $kata){
                        $q = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
                        PREFIX owl: <http://www.w3.org/2002/07/owl#>
                        PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
                        PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
                        PREFIX : <http://www.semanticweb.org/user/ontologies/2021/4/untitled-ontology-4#>

                        SELECT ?Title_Name ?Name ?Major ?Abstract ?Year ?id
                        WHERE {{ 
                        ?Author rdf:type :Author . 
                        ?Author :Name ?Name.
                        ?Author :Major ?Major.
                        ?Author :Have ?Title.
                        ?Title rdf:type :Title .
                            OPTIONAL {?Title :Title_Name ?Title_Name . }
                            OPTIONAL {?Title :Abstract ?Abstract . }
                            OPTIONAL {?Title :Year ?Year . }
                            OPTIONAL {?Title :id ?id . }
                        FILTER regex ( ?Title_Name, '$kata', 'i') }
                        
                        UNION {?Author rdf:type :Author . 
                        ?Author :Name ?Name.
                        ?Author :Major ?Major.
                        ?Author :Have ?Title.
                        ?Title rdf:type :Title .
                            OPTIONAL {?Title :Title_Name ?Title_Name . }
                            OPTIONAL {?Title :Abstract ?Abstract . }
                            OPTIONAL {?Title :Year ?Year . }
                            OPTIONAL {?Title :id ?id . }
                        FILTER regex (?Major, '$kata', 'i')}

                        UNION {?Author rdf:type :Author . 
                          ?Author :Name ?Name.
                          ?Author :Major ?Major.
                          ?Author :Have ?Title.
                          ?Title rdf:type :Title .
                              OPTIONAL {?Title :Title_Name ?Title_Name . }
                              OPTIONAL {?Title :Abstract ?Abstract . }
                              OPTIONAL {?Title :Year ?Year . }
                              OPTIONAL {?Title :id ?id . }
                          FILTER regex (?Year, '$kata', 'i')}

                          UNION {?Author rdf:type :Author . 
                            ?Author :Name ?Name.
                            ?Author :Major ?Major.
                            ?Author :Have ?Title.
                            ?Title rdf:type :Title .
                                OPTIONAL {?Title :Title_Name ?Title_Name . }
                                OPTIONAL {?Title :Abstract ?Abstract . }
                                OPTIONAL {?Title :Year ?Year . }
                                OPTIONAL {?Title :id ?id . }
                            FILTER regex (?Name, '$kata', 'i')}
                          }
                  "; 
                }

            // proses ke query 
            $rows = $sc->query($q, 'rows');
            $err = $sc->getErrors();
            if ($err) {
                print_r($err);
                throw new Exception(print_r($err, true));
            }
            echo "<div><h2>Hasil pencarian $search</h2></div>";

            if(empty($rows["result"]["rows"])){
              echo "<div><h2>Hasil tidak ditemukan</h2></div>";
            }

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
