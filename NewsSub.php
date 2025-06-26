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
<!-- News Carousel -->
<div id="newsCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
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
            <div class="d-block w-100 p-4 bg-light rounded"
                 style="width:800px; height:400px; max-width:100%; max-height:100%; margin:auto; display:flex; flex-direction:column; justify-content:center; align-items:center;">
                <h5 class="mb-3"><?php echo htmlspecialchars($newsItem['title']); ?></h5>
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
<?php
}else{
    if(isset($NewsDatabaseNotFound) && $NewsDatabaseNotFound == True){
        echo "<div class='alert alert-warning'><h3>" . $NewsDatabaseNotFound . "</h3></div>";
    } else {
        echo "<div class='alert alert-info'><h3>" . (isset($SearchLang['NoNewsFound']) ? $SearchLang['NoNewsFound'] : 'No news found') . "</h3></div>";
    }
}
?>
