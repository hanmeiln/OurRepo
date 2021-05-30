<!DOCTYPE html>
<html lang="en">
<head>
<title>Welcome to OurRepo</title>
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
  font-family: Arial;
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
  <a href="#" class="active">Home</a>
  <a href="#">Repository</a>
  <a href="#">Link</a>
  <a href="#" class="right">Link</a>
</div>


  <div class="main" style="text-align: center;">
      <div class="text-center">
        <h2>FMIPA REPOSITORY</h2>
        <form class="example" action="/action_page.php">
            <input type="text" placeholder="Cari Referensi Skripsi..." name="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
  </div>

  <div class="content">
    
    <script type="text/javascript">
        //<![CDATA[
        $(function() { $('input[name=query]').focus(); });    //]]>
    </script>
    <div class="form-wrapper">
        <form id="form-search" action="/solrsearch/dispatch" method="post">
            <div id="fieldset-search" class="fieldset-wrapper">
                <fieldset>
                    <div id="edit-search-wrapper" class="form-item">
                        <input type="text" size="30" name="query" id="edit-search" class="form-text" value="">
                    </div>
                    <div id="edit-submit-search-wrapper" class="form-item">
                        <span class="form-submit-wrapper"><input type="submit" id="edit-submit-search" class="form-submit" value="Search"></span>
                    </div>
                </fieldset>
                <p class="footer-link" style="text-align:center;">
                    <a class="link" href="/solrsearch/index/advanced">Advanced Search</a>
                                    | <a id="link-solrsearch-all-documents" class="link" href="/solrsearch/index/search/searchtype/all">All documents&nbsp;(<span id="solrsearch-totalnumofdocs">46.468</span>)</a>
                    | <a class="link" href="/solrsearch/index/search/searchtype/latest">Latest documents</a>
                </p>
    
                <input type="hidden" name="searchtype" id="searchtype" value="simple">
                <input type="hidden" name="start" id="start" value="0">
                <input type="hidden" name="sortfield" id="sortfield" value="score">
                <input type="hidden" name="sordorder" id="sortorder" value="desc">
            </div>
        </form>
    </div>
    </div>

    <!--Backend-->
    <?php
      use BorderCloud\SPARQL\SparqlClient;
      require_once('../vendor/autoload.php');
      
      //Error Handling
        $search = false;
       
      if(isset($_POST['search']))
       $keywords=$_POST['search'];

            if(!$search){
       echo"<h1>Data Kosong!</h1>";
      }
      //Error Handling
      else{
       $fuseki_server = "http://localhost:3030"; // fuseki server address 
       $fuseki_sparql_db = "ourrepo"; // fuseki Sparql database 
       $endpoint = $fuseki_server . "/" . $fuseki_sparql_db . "/query"; 
       $sc = new SparqlClient();
       $sc->setEndpointRead($endpoint);
       $q = "PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
            PREFIX owl: <http://www.w3.org/2002/07/owl#>
            PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
            PREFIX xsd: <http://www.w3.org/2001/XMLSchema#>
            PREFIX : <http://www.semanticweb.org/user/ontologies/2021/4/untitled-ontology-4#>
       
            SELECT ?Title_Name ?Name ?Major ?Abstract ?Year
            WHERE { 
            ?Author rdf:type :Author . 
            ?Author :Name ?Name.
            ?Author :Major ?Major.
            ?Author :Have ?Title.
            ?Title rdf:type :Title .
                OPTIONAL {?Title :Title_Name ?Title_Name . }
                OPTIONAL {?Title :Abstract ?Abstract . }
                OPTIONAL {?Title :Year ?Year . }
            FILTER (regex(?Title_Name, "", "i") || 
                regex(?Major, "", "i") ||
                regex(?Name, "", "i"))
            }
        "; 

       $rows = $sc->query($q, 'rows');
       $err = $sc->getErrors();
       if ($err) {
        print_r($err);
        throw new Exception(print_r($err, true));
       }
       echo"
        <h1>The Trend </h1>
        <h2 id='jenis' hidden>$jenis</h2>
        <h2 id='tahun' hidden>$tahun</h2>

                <div class='semua'>
                <div class='limiter'>
                <div class='container-table10'>
                <div class='wrap-table100'>
                <div class='table100'>
                <table>
                <thead>
                  <tr class='table100-head'>
                    <th class='column1'>Year</th>
                    <th class='column2'>Category</th>
                    <th class='column3'>Style</th>
                    <th class='column4'>Material</th>
                    <th class='column5'>Color</th>
                  </tr>
                </thead>
                <tbody>
                  ";
                  foreach ($rows["result"]["rows"] as $row) {
                    echo"<tr>";
                    foreach ($rows["result"]["variables"] as $variable) {
                      echo "<td class='column1' >$row[$variable]</td>";
                    }
                    echo "</tr>";
                  };
                  echo"
                  </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </div>";
      }
     ?>


<div class="footer">
  <h4>Credits OurRepo</h4>
  <p>Hana Meilina F - Sharashena Chairani
</div>

</body>
</html>
