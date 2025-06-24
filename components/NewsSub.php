<?php

$NewsItems = array(); /* Array to store news items for carousel */

Function PrintMainNews($row, $IndexLang, $dbNews, $ImagesCDNPath ){
	/* This Function Print a News */
	global $NewsItems;
	
	$newsItem = array(
		'title' => $row['Title'],
		'message' => $row['Message']
	);
	
	array_push($NewsItems, $newsItem);
}

$NewsPublish = array(); /* Array that Contain News Publish Already Publish */
$CountNews = 0; /* Number of New Publish so we can apply the STHS option 'Number of News in Home Page' */

if (empty($LeagueNews) == false){while ($row = $LeagueNews ->fetchArray()) { /* Loop News in Reserve Order of Publish Time */
	if (in_array($row['Number'],$NewsPublish) == FALSE AND in_array($row['AnswerNumber'],$NewsPublish) == FALSE ){ /* Make sure we already didn't publish this news */
		if ($row['AnswerNumber'] == 0){
			/* This row of the Table is not answer comment so it's main news */
			PrintMainNews($row, $IndexLang, $dbNews,$ImagesCDNPath );  /* Print the News */
			
			/* Increment the Number of News Publish */
			$CountNews +=1; 
			
			/* If we publish enough news based on the the STHS option 'Number of News in Home Page', we close the loop */
			If ($CountNews >= $LeagueOutputOption['NumberofNewsinPHPHomePage']){break;} 
		}else{
			/* This is row is answer to previous news. Finding the Main News Information */
			
			$Query = "Select LeagueNews.*, TeamProInfo.TeamThemeID, TeamProInfo.Name FROM LeagueNews LEFT JOIN TeamProInfo ON LeagueNews.TeamNumber = TeamProInfo.Number WHERE Remove = 'False' AND LeagueNews.Number = " . $row['AnswerNumber'];
			$NewsTemp = $dbNews->querySingle($Query,True);
					
			/* Print the News */
			PrintMainNews($NewsTemp, $IndexLang, $dbNews,$ImagesCDNPath );  
			
			/* Increment the Number of News Publish */
			$CountNews +=1; 
			
			/* If we publish enough news based on the the STHS option 'Number of News in Home Page', we close the loop */
			If ($CountNews >= $LeagueOutputOption['NumberofNewsinPHPHomePage']){break;} 
			
			/* Add in the Array the Main News will be publish */
			array_push($NewsPublish, $row['AnswerNumber']); 
		}
	}
}}

/* Generate Carousel HTML */
if($CountNews > 0 && !empty($NewsItems)){
?>
<!-- Bouton Ajouter -->
<div style="margin:auto; text-align:right; margin-bottom:10px;">
    <a href="NewsEditor.php" class="btn btn-primary" style="font-weight:bold;">Ajouter</a>
</div>
<!-- News Carousel -->
<div id="news-carousel-container" style="display:flex; flex-direction:column; align-items:center; justify-content:center;">
    <div id="newsCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2000">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <?php for($i = 0; $i < count($NewsItems); $i++): ?>
            <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="<?php echo $i; ?>" 
                    <?php echo ($i == 0) ? 'class="active" aria-current="true"' : ''; ?> 
                    aria-label="Slide <?php echo ($i + 1); ?>"></button>
            <?php endfor; ?>
        </div>

        <!-- Carousel Inner -->
        <div class="carousel-inner">
            <?php foreach($NewsItems as $index => $newsItem): ?>
            <div class="carousel-item <?php echo ($index == 0) ? 'active' : ''; ?>">
                <?php
                // Chercher une balise <img> dans le message
                $message = $newsItem['message'];
                $imgSrc = null;
                if (preg_match('/<img[^>]+src=["\']([^"\']+)["\']/i', $message, $matches)) {
                    $imgSrc = $matches[1];
                    // Retirer la première balise <img> du message
                    $message = preg_replace('/<img[^>]+src=["\']'.preg_quote($imgSrc, '/').'["\'][^>]*>/i', '', $message, 1);
                }
                ?>
                <div class="d-block w-100 p-4 bg-light rounded news-carousel-slide"
                     style="width:1080px; height:720px; max-width:100%; max-height:100%; margin:auto; display:flex; flex-direction:column; justify-content:flex-start; align-items:center;">
                    <div style="width:100%; display:flex; justify-content:center; align-items:center; margin-bottom:20px;">
                        <h5 style="font-size:2.2rem; font-weight:bold; text-align:center; margin:0; display:block;">
                            <?php echo htmlspecialchars($newsItem['title']); ?>
                        </h5>
                    </div>
                    <?php if ($imgSrc): ?>
                        <div style="width:100%; display:flex; justify-content:center; align-items:center; margin-bottom:24px;">
                            <img src="<?php echo htmlspecialchars($imgSrc); ?>" alt="News image" style="width:475px; height:200px; object-fit:cover; margin-bottom:24px; margin-top:0; margin-left:auto; margin-right:auto; display:block;" />
                        </div>
                    <?php else: ?>
                        <div style="width:100%; display:flex; justify-content:center; align-items:center; margin-bottom:24px;">
                            <img src="images/LHSQC_NEWS.png" alt="Image par défaut" style="width:475px; height:200px; object-fit:cover; margin-bottom:24px; margin-top:0; margin-left:auto; margin-right:auto; display:block;" />
                        </div>
                    <?php endif; ?>
                    <div style="width:100%; text-align:center; display:flex; justify-content:center; align-items:center;">
                        <div class="mb-0" style="font-size:1.2rem; margin:0; display:block; width:100%; text-align:center; overflow-wrap:break-word;">
                            <?php echo $message; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Controls -->
        <?php if(count($NewsItems) > 1): ?>
        <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <?php endif; ?>
    </div>
</div>
<?php
}else{
    if(isset($NewsDatabaseNotFound) && $NewsDatabaseNotFound == True){
        echo "<div class='alert alert-warning'><h3>" . $NewsDatabaseNotFound . "</h3></div>";
    } else {
        echo "<div class='alert alert-info'><h3>" . (isset($SearchLang['NoNewsFound']) ? $SearchLang['NoNewsFound'] : 'No news found') . "</h3></div>";
    }
}
?>
