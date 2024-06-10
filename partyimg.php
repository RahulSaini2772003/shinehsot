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
			grid-template-columns: repeat(auto-fit, minmax(25%, 25%));
		}
		.image-grid img {
		    
			height: 20rem;
			width: 20rem;
			object-fit: cover;
		}.image-grid h3{
		    display: grid;
		    font-size: 15px;
        justify-content: center;
		height: 5%;
        width: 21rem;
        overflow: hidden;
        margin: 10px 0 0 0;
		}
		.image-grid div:hover{
		    color: red;
		    font-size: 12px;
		}
				@media only screen and (max-width:1450px){
				    .image-grid div{
				        height: 30rem;
				    }
			    .img {
  width: 20rem;
  height: 20rem;
  object-fit: cover;
  
}
    .image-grid img {
        width: 25rem;
        height: 25rem;
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
		    font-size: 20px;
        justify-content: center;
		height: 4%;
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
			$query = "SELECT * FROM party";
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				$image_name = $row['img'];
				$image_path = "upload/party/$image_name";
                $image_namee = pathinfo($image_name, PATHINFO_FILENAME);
                ?>
				<div>
				<a href="<?php echo "$image_path"; ?>" data-fancybox="gallery" data-caption="<?php echo "$image_namee"; ?>">
                <img src="<?php echo "$image_path"; ?>" alt='<?php echo "$image_name"; ?>'>
                </a>

				<h3><?php echo "$image_namee"; ?></h3>
				</div>
				<script type="text/javascript">
	    $("[data-fancybox]").fancybox({
	        loop: true,
	        preventCaptionOverlap: true,
	        protect: true,
	        animationEffect: "zoom",
	        transitionEffect: "slide",
	        buttons: [
    "zoom",
    "share",
    "slideShow",
    "fullScreen",
    // "download",
    "thumbs",
    "close"
  ],
});
	</script>
				<?php
			}

			mysqli_close($conn);
		?>
	</div>
</body>
</html>
