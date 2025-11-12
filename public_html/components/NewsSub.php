<?php

$NewsItems = array(); /* Array to store news items for carousel */

// Inclure la correspondance des équipes et images Newspaper
require_once __DIR__ . '/../includes/TeamNewspaperMapping.php';

Function PrintMainNews($row, $IndexLang, $dbNews, $ImagesCDNPath ){
    global $NewsItems;
    
    // DEBUG: Afficher l'ordre de traitement
    echo "<!-- DEBUG: Traitement news #" . $row['Number'] . " - Titre: " . $row['Title'] . " -->\n";
    
    $newsItem = array(
        'number' => $row['Number'],
        'title' => $row['Title'],
        'message' => $row['Message'],
        'time' => $row['Time'],
        'author' => $row['Author'] ?? 'LHSQC',
        'teamNumber' => $row['TeamNumber'] ?? 0,
        'teamThemeID' => $row['TeamThemeID'] ?? 0,
        'teamName' => $row['Name'] ?? ''
    );
    array_push($NewsItems, $newsItem);
}

$NewsPublish = array();
$CountNews = 0;

if (empty($LeagueNews) == false){
    while ($row = $LeagueNews ->fetchArray()) {
        if (!in_array($row['Number'],$NewsPublish) && !in_array($row['AnswerNumber'],$NewsPublish)){
            if ($row['AnswerNumber'] == 0){
                PrintMainNews($row, $IndexLang, $dbNews,$ImagesCDNPath );
                $CountNews +=1;
                array_push($NewsPublish, $row['Number']);
                if ($CountNews >= $LeagueOutputOption['NumberofNewsinPHPHomePage']){break;}
            }else{
                $Query = "Select LeagueNews.*, TeamProInfo.TeamThemeID, TeamProInfo.Name FROM LeagueNews LEFT JOIN TeamProInfo ON LeagueNews.TeamNumber = TeamProInfo.Number WHERE Remove = 'False' AND LeagueNews.Number = " . $row['AnswerNumber'];
                $NewsTemp = $dbNews->querySingle($Query,True);
                if ($NewsTemp && !empty($NewsTemp['Number'])) {
                    PrintMainNews($NewsTemp, $IndexLang, $dbNews,$ImagesCDNPath );
                    $CountNews +=1;
                    array_push($NewsPublish, $row['Number']); // Ajouter l'ID de la réponse, pas de la news principale
                    if ($CountNews >= $LeagueOutputOption['NumberofNewsinPHPHomePage']){break;}
                }
            }
        }
    }
}

if($CountNews > 0 && !empty($NewsItems)){
?>
<!-- Bouton Ajouter -->
<div style="margin:auto; text-align:right; margin-bottom:10px;">
    <a href="NewsEditor.php" class="btn btn-primary" style="font-weight:bold;">Ajouter</a>
</div>
<!-- News Carousel -->
<style>
#news-carousel-container {
    width: 800px;
    height: 350px;
    max-width: 100%;
    margin: 0 auto;
    background-color: white !important;
    border-radius: 8px;
    padding: 2px;
}
#newsCarousel {
    width: 800px !important;
    height: 350px !important;
    max-width: 100% !important;
    margin: 0 auto;
}
.carousel-inner {
    width: 800px !important;
    height: 350px !important;
    max-width: 100% !important;
    margin: 0 auto;
}
.carousel-item {
    width: 800px !important;
    height: 350px !important;
    max-width: 100% !important;
    margin: 0 auto;
    display: none !important; /* Cacher par défaut */
    align-items: stretch;
    justify-content: center;
    background-color: #fff !important;
    transition: none !important; /* Pas d'animation */
    transform: none !important; /* Pas de transformation */
}

.carousel-item.active {
    display: flex !important; /* Montrer seulement la slide active */
    transition: none !important; /* Pas d'animation */
    transform: none !important; /* Pas de transformation */
}

/* Désactiver toutes les transitions Bootstrap du carousel */
#newsCarousel * {
    transition: none !important;
    animation: none !important;
}

#newsCarousel .carousel-inner {
    transition: none !important;
    transform: none !important;
}
.news-carousel-slide {
    width: 800px;
    height: 350px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    background-color: #fff !important;
    border-radius: 8px;
    box-sizing: border-box;
    overflow: hidden;
    margin: 0 auto;
}
.image-container {
    position: relative;
    width: 100%;
    height: 350px;
    display: flex;
    align-items: flex-end;
    justify-content: center;
    background: #eee;
}
.read-more-image {
    width: 100%;
    height: 350px;
    object-fit: cover;
    border-radius: 8px 8px 0 0;
    display: block;
    margin: 0 auto;
    position: relative;
}
.image-title-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0,0,0,0.7);
    border-radius: 0 0 8px 8px;
    padding: 5px 10px;
    color: white;
    font-size: 20px !important;
    text-align: center;
}
.image-title-overlay h6 {
    font-size: 28px !important;
    margin: 0;
    font-weight: bold;
    color: #fff !important;
}
.news-carousel-message {
    width: 100%;
    max-height: 180px;
    min-height: 80px;
    overflow-y: scroll;
    box-sizing: border-box;
    text-align: center;
    font-size: 1.1rem;
    padding: 15px 20px 10px 20px;
    margin: 0;
    background: #fff;
    border-radius: 0 0 8px 8px;
}
.news-carousel-message::-webkit-scrollbar {
    width: 8px;
}
.news-carousel-message::-webkit-scrollbar-thumb {
    background: #ddd;
    border-radius: 4px;
}
.article-meta {
    text-align: center;
    margin-top: 10px;
    font-size: 0.9rem;
    color: #666;
}
.article-author {
    font-weight: 600;
    color: #1e3c72;
    margin-bottom: 5px;
}
.article-date {
    color: #888;
    font-size: 0.8rem;
}
.image-navigation {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.6);
    color: white;
    border: none;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
}
.image-navigation:hover {
    background: rgba(0, 0, 0, 0.8);
    transform: translateY(-50%) scale(1.1);
}
.image-navigation.prev {
    left: 5px;
}
.image-navigation.next {
    right: 5px;
}
</style>
<div id="news-carousel-container">
   <div id="newsCarousel" class="carousel slide" data-bs-ride="false" data-bs-interval="false">

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <?php foreach($NewsItems as $index => $newsItem): ?>
            <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="<?php echo $index; ?>"
                    <?php echo ($index == 0) ? 'class="active" aria-current="true"' : ''; ?>
                    aria-label="Slide <?php echo $index + 1; ?>"></button>
            <?php endforeach; ?>
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
                // Tronquer le message pour l'aperçu
                $previewMessage = strip_tags($message);
                if (strlen($previewMessage) > 200) {
                    $previewMessage = substr($previewMessage, 0, 200) . '...';
                }
                ?>
                <div class="news-carousel-slide">
                    <div class="image-container">
                        <a href="Article.php?id=<?php echo $newsItem['number']; ?>" style="width:100%;text-decoration:none;display:block;">
                            <?php
                            // Déterminer l'image à utiliser
                            if ($imgSrc) {
                                // Utiliser l'image du message si elle existe
                                $finalImageSrc = $imgSrc;
                            } else {
                                // Utiliser l'image Newspaper par défaut de l'équipe
                                $finalImageSrc = getTeamNewspaperImage(
                                    $newsItem['teamNumber'],
                                    $newsItem['teamName'],
                                    $newsItem['teamThemeID']
                                );
                            }
                            ?>
                            <img src="<?php echo htmlspecialchars($finalImageSrc); ?>"
                                 alt="<?php echo htmlspecialchars($newsItem['title']); ?>"
                                 class="read-more-image" />
                            <div class="image-title-overlay">
                                <h6><?php echo htmlspecialchars($newsItem['title']); ?></h6>
                            </div>
                        </a>
                        <!-- Boutons de navigation en dehors du lien -->
                        <button class="image-navigation prev" data-bs-target="#newsCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        </button>
                        <button class="image-navigation next" data-bs-target="#newsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        </button>
                    </div>
                   
                    
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- Controls (flèches déjà intégrées sur l'image) -->
    </div>
</div>



<script>
$(document).ready(function() {
    console.log('Initializing manual-only carousel...');

    // Désactiver complètement Bootstrap carousel
    $('#newsCarousel').off('.bs.carousel');

    var currentSlide = 0;
    var totalSlides = $('.carousel-item').length;

    console.log('Total slides found:', totalSlides);

    function goToSlide(slideIndex) {
        console.log('Going to slide:', slideIndex);

        // Retirer la classe active de tous les items
        $('.carousel-item').removeClass('active');
        $('.carousel-indicators button').removeClass('active').removeAttr('aria-current');

        // Ajouter la classe active au bon item
        $('.carousel-item').eq(slideIndex).addClass('active');
        $('.carousel-indicators button').eq(slideIndex).addClass('active').attr('aria-current', 'true');

        currentSlide = slideIndex;
    }

    function nextSlide() {
        var nextIndex = (currentSlide + 1) % totalSlides;
        goToSlide(nextIndex);
    }

    function prevSlide() {
        var prevIndex = (currentSlide - 1 + totalSlides) % totalSlides;
        goToSlide(prevIndex);
    }

    // Navigation avec les flèches sur l'image
    $('.image-navigation').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        if ($(this).hasClass('prev')) {
            console.log('Previous button clicked');
            prevSlide();
        } else if ($(this).hasClass('next')) {
            console.log('Next button clicked');
            nextSlide();
        }

        return false;
    });

    // Navigation avec les indicateurs (points)
    $('.carousel-indicators button[data-bs-slide-to]').on('click', function(e) {
        e.preventDefault();
        var slideIndex = parseInt($(this).data('bs-slide-to'));
        console.log('Indicator clicked, going to slide:', slideIndex);
        goToSlide(slideIndex);
    });

    // Initialiser à la première slide
    goToSlide(0);



    console.log('Manual-only carousel ready!');
});
</script>
<?php
}else{
    if(isset($NewsDatabaseNotFound) && $NewsDatabaseNotFound == True){
        echo "<div class='alert alert-warning'><h3>" . $NewsDatabaseNotFound . "</h3></div>";
    } else {
        echo "<div class='alert alert-info'><h3>" . (isset($SearchLang['NoNewsFound']) ? $SearchLang['NoNewsFound'] : 'No news found') . "</h3></div>";
    }
}
?>