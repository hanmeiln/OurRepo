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
  <a href="#" class="active">Home</a>
  <a href="#">Repository</a>
  <a href="#">Link</a>
  <a href="#" class="right">Link</a>
</div>

<div class="main">
    <div class="card">
        <div class="card-body">Pengembangan User Interface dan User Experience Menggunakan Metode User Centered Design( Studi Kasus Aplikasi Portal Kota Bandung.go.id)</div>
    </div>

    <div class="row">
        <div class="column">
            <p> <img src="customer.png" alt="profile" width="20" height="20"> Nizariansyah Agung</p>
            <p> <img src="book.png" alt="profile" width="20" height="20">
                Dalam mewujudkan kota Smart City, salah satu elemen pendukungnya adalah aplikasi yang digunakan sebagai solusi akan kompleksnya permasalahan kota. Aplikasi Portal Kota Bandung.go.id dijadikan identitas yang menyediakan pelayanan bagi masyarakat luas. Ada beberapa faktor kesuksesan sebuah aplikasi dalam melayani kebutuhan pengguna diantaranya adalah faktor user interface dan user experience. Penulis melakukan penelitian dalam membangun user interface dan user experience yang sesuai dengan kebutuhan pengguna. 
                Penggunaan metode User Centered Design (UCD) menempatkan pengguna sebagai pusat referensi dilakukannya tahapan dalam proses melalakukan desain user interface dan user experience aplikasi. Dalam penerapan metode UCD, penulis akan melakukan pengambilan data dengan menggunakan dua metode, yaitu field observation dan digital survei untuk mendapatkan referensi utama yang dibutuhkan untuk penelitian ini. 
                Usability testing berbentuk Heuristic Evaluation dengan indikator Severity Ratings digunakan untuk mengetahui keefektifan dari pengembangan user interface dan user experience. Dari hasil usability testing yang dilakukan nantinya akan dibandingkan antara hasil pengujian pada aplikasi lama Bandung.go.id dengan hasil pengujian pada desain aplikasi baru yang telah dibuat. Persentase indikator kelancaran serta keraguan dan kesulitan merupakan angka yang dijadikan sebagai penentu keberhasilan hasil desain user interface dan user experience yang sesuai dengan kebutuhan pengguna.
            </p>
        </div>
        
        <div class="column2">
            <div class="card">
                <div class="card-body" style="font-size: 20px;">Download File Here</div>
                <p style="font-size: 16px;"><a href="#">
                    <img src="file.png" alt="profile" width="20" height="20">
                    Skripsi</a></p>
            </div>
        </div>
      </div>

</div>

<div class="footer">
  <h4>Credits OurRepo</h4>
  <p>Hana Meilina F - Sharashena Chairani
</div>

</body>
</html>
