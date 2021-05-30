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


<div class="footer">
  <h4>Credits OurRepo</h4>
  <p>Hana Meilina F - Sharashena Chairani
</div>

</body>
</html>
