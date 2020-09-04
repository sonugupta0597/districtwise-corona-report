<?php 
 $district=$_POST['district'];


?>
<table class="table table-bordered" >
  <thead>
    <tr>
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

$count=0;

foreach ($result as $key => $value) {
  
        foreach ($value->districtData as $key1=> $value1) {
          
            
                    

          if($value1->district==$district){

                foreach ($value1 as $key2 => $value2) {
                  

                


?>
     <?php if($key2!="delta") {?>
      <th scope="col"><?php echo $key2; ?></th>
      

<?php }}}}} ?>

    </tr>
  </thead>

  
<tbody>
  <div class="row" >
    <tr style="font-size: 20px; color: red">
  <?php 
       foreach ($result as $key => $value) {
  
        foreach ($value->districtData as $key1=> $value1) {
          
            
                    

          if($value1->district==$district){
            $count++;
                foreach ($value1 as $key2 => $value2) {
                  



   ?>
      
    
     <?php if($key2!="delta") {?>

      <td><?php echo $value2; ?></td>
      
      
    

<?php }}}}} ?>
</tr>

</div>

  <?php 
       foreach ($result as $key => $value) {
              if ($count>9) {
              break;
            }
        foreach ($value->districtData as $key1=> $value1) {
           if ($count>9) {
              break;
            }
            
                    

          if($value1->district!=$district&&$value1->district!="Other State"){

            if ($count>9) {
              break;
            }
                  $count++;
?>


<div class="row">
    <tr>
      <?php  
                foreach ($value1 as $key2 => $value2) {
                  



   ?>
      
    
     <?php if($key2!="delta") {?>

      <td><?php echo $value2; ?></td>
      
      
    

<?php }}}
 
 ?>
</tr>

</div>

<?php 


}} ?>


  </tbody>


</table>