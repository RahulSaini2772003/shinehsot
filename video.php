<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<link href="jquery.fancybox.min.css" rel="stylesheet" />
	
	<script src="jquery-1.10.2.min.js"></script>
	<script src="jquery.fancybox.min.js"></script>
	
	<style>
		.image-grid {
			display: grid;
			grid-column-gap: 9%;
			grid-row-gap: 2rem;
			margin-top: 50px;
			grid-template-columns: repeat(auto-fit, minmax(25%, 25%));
		}
		.image-grid video {
		    
			height: auto;
			width: 28rem;
			object-fit: cover;
		}.image-grid h3{
		    display: grid;
		    font-size: 15px;
        justify-content: center;
		height: 10%;
        width: 21rem;
        overflow: hidden;
        margin: 10px 0 0 0;
		}
		.image-grid div{
		    margin: 0 12% 0 0;
		}
		.image-grid div:hover{
		    color: red;
		    font-size: 12px;
		}
		@media only screen and (max-width:1450px){
				    .image-grid div{
				        height: 20rem;
				    }
			    .img {
  width: 20rem;
  height: 20rem;
  object-fit: cover;
  
}
    .image-grid video {
        width: 28rem;
        height: auto;
        object-fit: cover;
     }
    .image-grid{
               display: grid;
    grid-column-gap: 16rem;
    padding: 0 0 0 20px;
    grid-template-columns: repeat(auto-fit, minmax(25%, 25%));
  
}
				    .image-grid h3{
		    display: grid;
		    font-size: 22px;
        justify-content: center;
		height: 9%;
        width: 21rem;
        overflow: hidden;
        margin: 10px 0 0 0;
		}
				}
	</style>
</head>
<body>
	<div class="image-grid">
		<?php
			$host = "localhost";
            $user = "id19438440_ayanphotography2000";
            $password = "Ayan@2000@database";
            $database = "id19438440_ayanphotography";
			$conn = mysqli_connect($host, $user, $password, $database);
			$query = "SELECT * FROM videos";
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				$image_name = $row['vid'];
				$image_path = "upload/videos/$image_name";
                $image_namee = pathinfo($image_name, PATHINFO_FILENAME);
                ?>
				<div>
				    <video id="myvideo" class="img" width="100%" controls>
				        <source src="<?php echo "$image_path"; ?>">
				    </video>
				<h3><?php echo "$image_namee"; ?></h3>
				</div>
				<?php
			}

			mysqli_close($conn);
		?>
	</div>
</body>
</html>
