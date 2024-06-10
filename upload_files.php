<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Media Upload</title>
  <link rel="stylesheet" href="xyx.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.1.1/tailwind.min.css">
  <script src="xyz.js"></script>
</head>
<body class="bg-gray-100">
  <div class="max-w-xl mx-auto p-8 bg-white rounded-md shadow" style="position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-42vw, -200px);
  height: 400px;
  width: 487px;
  background-image: url(images/8.jpg);">
    <h1 class="text-2xl font-bold mb-4" style="margin-top: 15px;">Upload Media</h1>
    <form action="upload_files.php" method="post" enctype="multipart/form-data" style="        position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-30%, -100px);
    width: 295px;">
      <div class="mb-4">
        <label for="images" class="block font-medium text-gray-700">Choose images to upload:</label>
        <input type="file" id="images" name="images[]" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" multiple>
      </div>
      <div class="mb-4">
        <label for="videos" class="block font-medium text-gray-700">Choose videos to upload:</label>
        <input type="file" id="videos" name="videos[]" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" accept="video/*" multiple>
      </div>
      <div class="dropdown" style=" margin-top: 30px;">
        <label for="aulbm">Select a Album:</label>
        <select id="aulbm" name="aulbm" style="width: 90px;" required>
            <option value="">--Select--</option>
          <option value="pw">Prewedding</option>
          <option value="w">Wedding</option>
          <option value="pf">Party/Function</option>
          <option value="">Videos</option>
        </select>
      </div>
      <div class="mt-8" style="     margin: 2rem 0 0 -66px;">
        <button type="submit" name="upload" style="margin: 0 84px 0px 0px;" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Upload
        </button>
        
      </div>
      <div class="mt-8">

<?php
// Database connection settings
$servername = "localhost";
$username = "id19438440_ayanphotography2000";
$password = "Ayan@2000@database";
$dbname = "id19438440_ayanphotography";
$aulbm = $_POST['aulbm'];
// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST{'upload'})){
    $imgcount = count($_FILES['images']['name']);
    for($i=0;$i<$imgcount;$i++){
        $imgn = $_FILES['images']['name'][$i];
        $imgtn = $_FILES['images']['tmp_name'][$i];
        if($aulbm=="pw"){
            $targetp = "./upload/prewedding/".$imgn;
            $tb = "prewedding";
        }
        elseif($aulbm == "w"){
            $targetp = "./upload/wedding/".$imgn;
            $tb = "wedding";
        }
        if($aulbm == "pf"){
            $targetp = "./upload/party/".$imgn;
            $tb = "party";
        }
        if(move_uploaded_file($imgtn,$targetp)){
            $sql = "INSERT INTO $tb(img) VALUES('$imgn')";
            $result = mysqli_query($conn,$sql);
        }
        
    }
    $vidcount = count($_FILES['videos']['name']);
    for($i=0;$i<$vidcount;$i++){
        $vidn = $_FILES['videos']['name'][$i];
        $vidtn = $_FILES['videos']['tmp_name'][$i];
        $targetvp = "./upload/videos/".$vidn;
        if(move_uploaded_file($vidtn,$targetvp)){
            $sql = "INSERT INTO videos(vid) VALUES('$vidn')";
            $result = mysqli_query($conn,$sql);
        }
    }
}




?>

      </div>
    </form>
    <a href="https://databases.000webhost.com/sql.php?db=id19438440_ayanphotography&table=gallery&pos=0"><button type=""  style = "position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(16px, 109px);
    class=: ;
    padding: 10px 20px;
    border-radius: 5px;
    /* border-block-color: red; */
    font-size: 15px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    color: #fff;
    background-color: #34C;
    transition: background-color 0.3s ease;
    cursor: pointer;" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
      Login to Data-Base
    </button></a>
  </div>
</body>
</html>
