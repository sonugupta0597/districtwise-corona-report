<!doctype html>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>DistrictCoronaDetails</title>
  </head>
  <body style="background-color: lightgrey">

<?php 
  
               // From URL to get webpage contents. 
               
               
               $url = "https://api.covid19india.org/v2/state_district_wise.json"; 
                 
               // Initialize a CURL session. 
               $ch = curl_init();  
                 
               // Return Page contents. 
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
                 
               //grab URL and pass it to the variable. 
               curl_setopt($ch, CURLOPT_URL, $url); 
                 
               $result = curl_exec($ch); 
               
               $result=json_decode($result);

               $array1=array();

               foreach ($result as $key => $value) {
  
                                         foreach ($value->districtData as $key1=> $value1) {

                                         	if($value1->district!="Other State" &&$value1->district!="Other state"&&$value1->district!="Other States"&& $value1->district!="Unknown"){
                                                 array_push($array1,$value1->district);

                                               }

                                                 }
         }
                                                 sort($array1);
  
               
  
?>
    <div class="container"  >
    	<div style="text-align: center;">
    	    <h1 style="font-size: 500%;padding-top: 20px ;">
    		DistrictWise Zones Report
    	    </h1>
    	</div>

    	<div>
    		<form >
    			<div class="form-group">
                    <label style="font-size: 20px;padding-top: 20px;font-weight: 20px" for="exampleFormControlSelect1">Select your District</label>
                      <select class="form-control" id="exampleFormControlSelect1" name="district">
                       <?php
                                
                                
                                
  
                                         foreach ($array1 as $x) {
                                               
                                  
                                
                        ?>
                         <option value="<?php print_r($x); ?>"><?php print_r($x); ?></option>
                         <?php }  ?>

                      </select>


                 </div>
                
                <button type="submit" class="btn btn-primary btn-lg" style="width: 100px">Submit</button>
             </form>
    	</div>

    	<div style="padding-top: 100px">
    		<span >
    			
    		</span>
    	</div>
    	
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script type="text/javascript">
        // This is our actual script
        $(document).ready(function(){

         $('button').on('click',function () {
           $('form').bind('submit', function () {
             $.ajax({
               type: 'post',
               url: 'api.php',
               data: $('form').serialize(),
               success: function (data) {
                 $('span').html(data);
               }
             });
             return false;
           });
         });
       });

     </script>


  </body>
</html>