<!DOCTYPE html>
<html>

<head>
  <title>Card Feed</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="button.css">
  
  <style>
    .card {
      margin:10px 20px;

    }
    img{
        max-width:130px !important;
        white-space: nowrap;
    }
  </style>
</head>

<body>


  <div class="container">
    <div class="row">
      <div class="col justify-content-center">


        <?php

ini_set('display_errors',0);



/*
       $ch = curl_init();
       curl_setopt ($ch, CURLOPT_URL, $url);
       curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
       curl_setopt($ch, CURLOPT_HEADER, 1);
       $xml = curl_exec($ch);
       curl_close($ch);
*/



      $urlArr = [
              'http://rss.cnn.com/rss/edition.rss',
              'http://rss.cnn.com/rss/edition_world.rss',
              'http://rss.cnn.com/rss/edition_africa.rss',
              'http://rss.cnn.com/rss/edition_americas.rss',
              'http://rss.cnn.com/rss/edition_asia.rss',
              'http://rss.cnn.com/rss/edition_europe.rss',
              'http://rss.cnn.com/rss/edition_meast.rss',
              'http://rss.cnn.com/rss/edition_us.rss',
              'http://rss.cnn.com/rss/money_news_international.rss',
              'http://rss.cnn.com/rss/edition_technology.rss',
              'http://rss.cnn.com/rss/edition_space.rss',
              'http://rss.cnn.com/rss/edition_entertainment.rss',
              'http://rss.cnn.com/rss/edition_sport.rss',
              'http://rss.cnn.com/rss/edition_football.rss',
              'http://rss.cnn.com/rss/edition_golf.rss',
              'http://rss.cnn.com/rss/edition_motorsport.rss',
              'http://rss.cnn.com/rss/edition_tennis.rss',
              'http://rss.cnn.com/rss/edition_travel.rss',
              'http://rss.cnn.com/rss/cnn_freevideo.rss',
              'http://rss.cnn.com/rss/cnn_latest.rss'
      ];

       
      //print_r($urlArr);
      
      
    $sub = "";
    $imgUrl= "";
    for($i=0; $i <= count($urlArr) ; $i++){ 
        //echo strlen($urlArr[$i]).'<br>';
        
        $feedArr = json_decode(json_encode(simplexml_load_file($urlArr[$i])),true);


        
        //print_r($feedArr['channel']['image']);
        $imgUrl = $feedArr['channel']['image']['url'];
        
        $imgUrl = $imgUrl;

        $onError = "onerror=this.onerror=null;";
        $onErrorF = "this.src=";
        $link = "'https://placeimg.com/200/300/animals'";
        $endError = $onError.$onErrorF.$link;
        

        


        if(isset($feedArr['channel']['item']) && isset($feedArr['channel']['image']['url'])){
            
            foreach ($feedArr['channel']['item'] as $key => $value) {

                if (!empty($feedArr['channel']['title']) && !empty($feedArr['channel']['description'])  && !empty($feedArr['channel']['link']) ) {

                 
                    ?>

                  <div class="card">
                  <button type="submit" name="<?php echo rand(1,546); ?>" class="glow-on-hover" id="transi">ترجمة بواسطة الذكاء الاصطناعي</button>
                      <img  src="<?php 
                      if (isset($value['image'])) {
                        $realUrl = $value['image'];
                      }elseif (isset($imgUrl)) {
                        $realUrl = $imgUrl;
                      }else{
                        $realUrl = 'https://placeimg.com/200/300/animals';
                      }
                      echo $realUrl;

                      ?>"  class="card-img-top  py-4 px-4"
                      alt="RSS IMAGE" >
                      <div class="card-body">
                      <h5 class="card-title">
                          <?php echo $value['title'];?>
                      </h5>
                      <a href="<?php echo $value['link'] ?>">
                      <p class="card-text">
                          <?php echo $valDes = !empty($value['description']) ? $value['description'] : 'إقرأ التفاصيل هنا'  ?>
                      </p>
                      </a>
                      </div>
                  </div>

                    <?php

                  
                  

                }else{
                $sub = "<p class='text-center align-items-center text-md-start'>لايوجد مزيد من المقالات</p>";
                }
      
            }
      

        }else {
             echo '';
        }


    }

      echo $sub;

      
    
    ?>





          </div>
      </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>