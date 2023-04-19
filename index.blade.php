<?php
    $url = 'https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJO7Gwp6SXEmsRr7BR379vlV8&key=AIzaSyCZ7BPby09zybIIFcJHdiE4_-I4fiyWzjw';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($curl);
    $datasearch = json_decode($data, false);
    // print_r($datasearch->result->reviews);
?>

<h1>Raging: <?php echo $datasearch->result->rating; ?></h1>

<?php
    foreach($datasearch->result->reviews as $review){
?>

<span><?php echo $review->author_name ; ?></span><br/>
<span><?php echo $review->author_url ; ?></span><br/>
<span><?php echo $review->rating ; ?></span><br/>
<span><?php echo $review->relative_time_description ; ?></span><br/>
<span><?php echo $review->text ; ?></span><br/>
<img src="<?php echo $review->profile_photo_url; ?>" >

<br>
<br>

<?php
}
curl_close($curl);
?>
