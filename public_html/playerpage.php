<?php include "Header.php"; ?>
<?php include "Menu.php"; ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Players Page</title>
  <!-- Lien vers Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


  <!-- Menu déroulant -->
  <div class="container mt-5 p-0 PlayerInfo">
    <div class="dropdown">
      <button class="btn btn-dark dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" style="border-bottom-left-radius: 0; border-bottom-right-radius: 0;font-size: 40px">
        Elias Petterson
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="#">Peter Forsberg</a></li>
        <li><a class="dropdown-item" href="#">Joe Sakic</a></li>
        <li><a class="dropdown-item" href="#">Matt Sundin</a></li>
      </ul>
    </div>
  </div>
  
    <div class="container">
  <!-- Image et Tableau côte à côte (Player Info) -->
  <div class="row mt-0">
    <!-- Colonne pour l'image -->
    <div class="col-md-3 d-flex align-items-center justify-content-center bg-dark">
      <img src="images/Petterson.png" alt="Image Exemple" class="img-fluid" style="width: 80%;">
    </div>
    
    <!-- Colonne pour le tableau -->
    <div class="col-md-6 bg-dark p-0  customPlayerInfo" >
  <table class="table table-borderless text-center text-white customNoPadding">
    <tbody>
      <!-- Lignes du tableau -->
      <tr>
        <td>Position:</td>
        <td>Status:</td>
      </tr>
      <tr>
        <td>Age:</td>
        <td>Contract:</td>
      </tr>
      <tr>
        <td>Height:</td>
        <td>Type:</td>
      </tr>
      <tr>
        <td>Weight:</td>
        <td>Cap Hit:</td>
      </tr>
      <tr>
        <td>Date of Birth:</td>
        <td>Remaining Cap Hit</td>
      </tr>
      <tr>
        <td>Birthplace:</td>
        <td>Clause:</td>
      </tr>
      <tr>
        <td>Draft:</td>
        <td>Expiricy:</td>
      </tr>
    </tbody>
  </table>
</div>

<div class="col-md-3 d-flex align-items-center justify-content-center bg-dark">
  <img src="images/17.png" alt="Image Exemple" class="img-fluid" style="width: 50%;">
</div>


  <!-- Player Stats Section -->
  <div class="container mt-0 p-0 PlayerStats">
    <table class="table table-bordered customBorderTop customBorderBottom ">
      <thead class="text-center fw-bolder customBoldText">
        <tr>
          <th>GP</th>
          <th>G</th>
          <th>A</th>
          <th>PTS</th>
          <th>+/-</th>
          <th>SOG</th>
          <th>S%</th>
          <th>TOI</th>
          <th>PTSPG</th>
          <th>GS AVG</th>
        </tr>
      </thead>
      <tbody class="text-center">
       
        <tr>
          <td>82</td>
          <td>40</td>
          <td>50</td>
          <td>90</td>
          <td>+25</td>
          <td>250</td>
          <td>16%</td>
          <td>20:45</td>
          <td>1.10</td>
          <td>4.25</td>
        </tr>
      </tbody>
    </table>


     <!-- Last 5 Games Section -->

     <h5>Last 5 Games</h5>
  <div class="container mt-0 p-0 lastFiveGames">
   
    <table class="table table-bordered customBorderTop customBorderBottom ">
      <thead class="text-center fw-bolder customBoldText">
        <tr>
          <th>OPP</th>
          <th>G</th>
          <th>A</th>
          <th>PTS</th>
          <th>+/-</th>
          <th>PIM</th>
          <th>PPG</th>
          <th>SHG</th>
          <th>S</th>
          <th>TOI</th>
        </tr>
      </thead>
      <tbody class="text-center">
       
        <tr>
          <td>COL</td>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>+2</td>
          <td>2</td>
          <td>1</td>
          <td>0</td>
          <td>6</td>
          <td>18:22</td>
        </tr>

        <tr>
          <td>DAL</td>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>+2</td>
          <td>2</td>
          <td>1</td>
          <td>0</td>
          <td>6</td>
          <td>18:22</td>
        </tr>

        <tr>
          <td>FLO</td>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>+2</td>
          <td>2</td>
          <td>1</td>
          <td>0</td>
          <td>6</td>
          <td>18:22</td>
        </tr>

      
        <tr>
          <td>ANA</td>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>+2</td>
          <td>2</td>
          <td>1</td>
          <td>0</td>
          <td>6</td>
          <td>18:22</td>
        </tr>

        <tr>
          <td>NJD</td>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>+2</td>
          <td>2</td>
          <td>1</td>
          <td>0</td>
          <td>6</td>
          <td>18:22</td>
        </tr>
      </tbody>
    </table>






   
    <h5>Player Ratings</h5>
    <table class="table table-bordered customBorderTop customBorderBottom">
      <thead class= "text-center fw-bolder customBoldText">
        <tr>
          <th>CON</th>
          <th>CK</th>
          <th>FG</th>
          <th>DI</th>
          <th>SK</th>
          <th>ST</th>
          <th>EN</th>
          <th>DU</th>
          <th>PH</th>
          <th>FO</th>
          <th>PA</th>
          <th>SC</th>
          <th>DF</th>
          <th>PS</th>
          <th>EX</th>
          <th>LD</th>
          <th>PO</th>
          <th>OV</th>
        </tr>
      </thead>
      <tbody class="text-center customBoldText">
              <tr>
          <td>75</td>
          <td>85</td>
          <td>80</td>
          <td>70</td>
          <td>90</td>
          <td>75</td>
          <td>80</td>
          <td>85</td>
          <td>70</td>
          <td>85</td>
          <td>80</td>
          <td>75</td>
          <td>80</td>
          <td>85</td>
          <td>70</td>
          <td>70</td>
          <td>70</td>
          <td>70</td>
        </tr>
      </tbody>
    </table> 
</div>

<!-- Lien vers Bootstrap Bundle (comprend Popper.js et Bootstrap JS) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>


<style>
  .customBorderTop {
    border-top: 4px solid #000;
    border-top-color: red;
  }

  .customBorderBottom {
    border-bottom: 4px solid #000;
    border-bottom-color: red;
  }

  .customPlayerInfo table td {
    color: white !important;
  }

 .customNoPadding td {
    padding: 0 !important;
  }

  .customBoldText th {
    font-weight: bold !important;
  }
</style>