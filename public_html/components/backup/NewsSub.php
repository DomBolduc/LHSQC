<?php

$NewsItems = array(); /* Array to store news items for carousel */

// Inclure la correspondance des équipes et images Newspaper
require_once __DIR__ . '/../includes/TeamNewspaperMapping.php';

Function PrintMainNews($row, $IndexLang, $dbNews, $ImagesCDNPath ){
    global $NewsItems;
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
                if ($CountNews >= $LeagueOutputOption['NumberofNewsinPHPHomePage']){break;}
            }else{
                $Query = "Select LeagueNews.*, TeamProInfo.TeamThemeID, TeamProInfo.Name FROM LeagueNews LEFT JOIN TeamProInfo ON LeagueNews.TeamNumber = TeamProInfo.Number WHERE Remove = 'False' AND LeagueNews.Number = " . $row['AnswerNumber'];
                $NewsTemp = $dbNews->querySingle($Query,True);
                PrintMainNews($NewsTemp, $IndexLang, $dbNews,$ImagesCDNPath );
                $CountNews +=1;
                if ($CountNews >= $LeagueOutputOption['NumberofNewsinPHPHomePage']){break;}
                array_push($NewsPublish, $row['AnswerNumber']);
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
    display: flex !important;
    align-items: stretch;
    justify-content: center;
    background-color: #fff !important;
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
    <div id="newsCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">
        
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
                    <a href="Article.php?id=<?php echo $newsItem['number']; ?>" style="width:100%;text-decoration:none;">
                        <div class="image-container">
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
                            <button class="image-navigation prev" data-bs-target="#newsCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="image-navigation next" data-bs-target="#newsCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>
                    </a>
                   
                    
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <!-- Controls (flèches déjà intégrées sur l'image) -->
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gérer les clics sur les flèches de navigation des images
    const imageNavButtons = document.querySelectorAll('.image-navigation');
    imageNavButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const target = this.getAttribute('data-bs-target');
            const slide = this.getAttribute('data-bs-slide');
            if (target && slide) {
                const carousel = document.querySelector(target);
                if (carousel) {
                    const carouselInstance = bootstrap.Carousel.getInstance(carousel);
                    if (carouselInstance) {
                        if (slide === 'prev') {
                            carouselInstance.prev();
                        } else if (slide === 'next') {
                            carouselInstance.next();
                        }
                    }
                }
            }
        });
    });
});
</script>