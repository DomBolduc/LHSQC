<?php    
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($db) && $db) {  
    $Query = "SELECT * FROM LeagueGeneral";
    $LeagueGeneral = $db->querySingle($Query,true);	

    $query = "SELECT *,'Pro' as Type FROM SchedulePro WHERE Day >= " . ($LeagueGeneral['ScheduleNextDay'] - $LeagueGeneral['DefaultSimulationPerDay']) . " AND PLAY = 'True' ORDER BY GameNumber "; //  TODO  :    set le 365 / 10 JRS back sur la DB, param pour la query et param pour la longueur du gameScroller....
    $scrollerScore = $db->query($query);

    $query = "SELECT SchedulePro.*, 'Pro' AS Type, TeamProStatVisitor.Last10W AS VLast10W, TeamProStatVisitor.Last10L AS VLast10L, TeamProStatVisitor.Last10T AS VLast10T, TeamProStatVisitor.Last10OTW AS VLast10OTW, TeamProStatVisitor.Last10OTL AS VLast10OTL, TeamProStatVisitor.Last10SOW AS VLast10SOW, TeamProStatVisitor.Last10SOL AS VLast10SOL, TeamProStatVisitor.GP AS VGP, TeamProStatVisitor.W AS VW, TeamProStatVisitor.L AS VL, TeamProStatVisitor.T AS VT, TeamProStatVisitor.OTW AS VOTW, TeamProStatVisitor.OTL AS VOTL, TeamProStatVisitor.SOW AS VSOW, TeamProStatVisitor.SOL AS VSOL, TeamProStatVisitor.Points AS VPoints, TeamProStatVisitor.Streak AS VStreak, TeamProStatHome.Last10W AS HLast10W, TeamProStatHome.Last10L AS HLast10L, TeamProStatHome.Last10T AS HLast10T, TeamProStatHome.Last10OTW AS HLast10OTW, TeamProStatHome.Last10OTL AS HLast10OTL, TeamProStatHome.Last10SOW AS HLast10SOW, TeamProStatHome.Last10SOL AS HLast10SOL, TeamProStatHome.GP AS HGP, TeamProStatHome.W AS HW, TeamProStatHome.L AS HL, TeamProStatHome.T AS HT, TeamProStatHome.OTW AS HOTW, TeamProStatHome.OTL AS HOTL, TeamProStatHome.SOW AS HSOW, TeamProStatHome.SOL AS HSOL, TeamProStatHome.Points AS HPoints, TeamProStatHome.Streak AS HStreak FROM (SchedulePRO LEFT JOIN TeamProStat AS TeamProStatHome ON SchedulePRO.HomeTeam = TeamProStatHome.Number) LEFT JOIN TeamProStat AS TeamProStatVisitor ON SchedulePRO.VisitorTeam = TeamProStatVisitor.Number WHERE DAY >= " . $LeagueGeneral['ScheduleNextDay'] . " AND DAY <= " . ($LeagueGeneral['ScheduleNextDay'] + 31 -1) . " ORDER BY Day, GameNumber";
    $scrollerSchedule = $db->query($query);
} 
?>


<div class="gamesScroller mx-0 px-0 ">
    <div class="row  mx-0 px-0">

        <div class="scrollButtons ">
            <div class="scrollDivTop  ">
                <button class="scrollBtn scrollBtnLeft" id="left-button"><img src="/images/arrow-left-yellow.png" ></button>
            </div>
            <div class=" scrollDivBot  ">
                <button class="scrollBtn scrollBtnRight " id="right-button"><img src="images/arrow-right-yellow.png" ></button>
            </div>
        </div>
           
            <div class="scroll-container" id="boxscore">
                <table class="table py-0 my-0">
                        <td style="background:white;width:43px;height:84px;display:block"><br></td>
                        
                    

                        <?php
                        // Add Latest Games with scores to gameScroller.
                        $i = 0;
                        
                        if (empty($scrollerScore) == false) { 
                            while ($row = $scrollerScore->fetchArray()) {  ?>
                          
                                <td class="GameDayTable pastGame">
                                    <table class="" style="margin-left:4px;">
                                        <tr style="font-size:10px;color:#383732;font-weight:bold;line-height:15px; padding:5px;">
                                            <td colspan="2"><?php echo "Day" . $row['Day'] . " - #" . $row['GameNumber']; ?></td>
                                        </tr>
                                        <tr style="line-height:18px;color:#2a2a2a;font-weight:bold;margin:0px;font-size:12px;">
                                            <td style="display:flex;align-items:center;justify-content:space-between;padding:2px 4px;">
                                                <div style="display:flex;align-items:center;">
                                                    <img src="<?php echo "images/" . $row['VisitorTeamThemeID'] . ".png"; ?>" alt="" style="width:20px;height:20px;margin-right:6px;">
                                                    <span><?php echo $row['VisitorTeamAbbre']; ?></span>
                                                </div>
                                                <span style="font-size:16px;font-weight:bold;color:#2a2a2a;"><?php echo $row['VisitorScore']; ?></span>
                                            </td>
                                        </tr>
                                        <tr style="line-height:18px;color:#2a2a2a;font-weight:bold;margin:0px;font-size:12px;">
                                            <td style="display:flex;align-items:center;justify-content:space-between;padding:2px 4px;">
                                                <div style="display:flex;align-items:center;">
                                                    <img src="<?php echo "images/" . $row['HomeTeamThemeID'] . ".png"; ?>" alt="" style="width:20px;height:20px;margin-right:6px;">
                                                    <span><?php echo $row['HomeTeamAbbre']; ?></span>
                                                </div>
                                                <span style="font-size:16px;font-weight:bold;color:#2a2a2a;"><?php echo $row['HomeScore']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="scrollerBoxScore">
                                                <?php echo "<a href=\"" . $row['Link'] ."\">" . $IndexLang['BoxScore'] .  "</a>"; ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>

                                
                                <?php
                               
                                $i = $i+1;
                            }
                        }
                       
                        //  Add next games schedule to gameScroller.
                        if (empty($scrollerSchedule) == false) {
                            while ($row = $scrollerSchedule->fetchArray()) {   ?>
                           
                           <script>
                            var phpVar = <?php echo json_encode($row); ?>;
                            //console.log(JSON.stringify(phpVar, null, 2)); 
                            </script>

                                <td class="GameDayTable upcomingGame">
                                    <table class="" style="margin-left:4px;">
                                        <tr style="font-size:10px;color:#383732;font-weight:bold;line-height:15px; padding:5px;">
                                            <td colspan="2"><?php echo "Day" . $row['Day'] . " - #" . $row['GameNumber']; ?></td>
                                        </tr>
                                        <tr style="line-height:18px;color:#2a2a2a;font-weight:bold;margin:0px;font-size:12px;">
                                            <td style="display:flex;align-items:center;justify-content:space-between;padding:2px 4px;">
                                                <div style="display:flex;align-items:center;">
                                                    <img src="<?php echo $ImagesCDNPath . "/images/" . $row['VisitorTeamThemeID'] . ".png"; ?>" alt="" style="width:20px;height:20px;margin-right:6px;">
                                                    <span><?php echo $row['VisitorTeamAbbre']; ?></span>
                                                </div>
                                                <span style="font-size:14px;font-weight:normal;color:#666;">vs</span>
                                            </td>
                                        </tr>
                                        <tr style="line-height:18px;color:#2a2a2a;font-weight:bold;margin:0px;font-size:12px;">
                                            <td style="display:flex;align-items:center;justify-content:space-between;padding:2px 4px;">
                                                <div style="display:flex;align-items:center;">
                                                    <img src="<?php echo $ImagesCDNPath . "/images/" . $row['HomeTeamThemeID'] . ".png"; ?>" alt="" style="width:20px;height:20px;margin-right:6px;">
                                                    <span><?php echo $row['HomeTeamAbbre']; ?></span>
                                                </div>
                                                <span style="font-size:12px;font-weight:normal;color:#888;">@</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="scrollerBoxScore upcomingBoxScore">
                                                To Be Played
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <?php  
                                $i = $i+1;
                            }
                        }
                       
                        //  There are no game in Database...  display generic message.
                        if ($i == 0) {
                            ?>
                            <td class="STHSTodayGame_GameOverall GameDayTable">
                                <table class="STHSTodayGame_GameData" style="margin-left:4px">
                                    <tr style="font-size:10px;color:#383732;font-weight:bold;line-height:15px;">
                                        <td><div class="noscore ">Schedule not rdy! Stay tuned! </div></td>
                                    </tr>
                                </table>
                            </td>
                            <?php  
                        }
                        ?>

                </table>
            </div>   
        
    </div>
</div>  
    

   
<script>
    const SCROLL_SPD = 2;  // Vitesse de scroll
    const SCROLL_AMOUNT = 220; // Distance de scroll par clic

    var boxscore = document.getElementById('boxscore');
    var startX, scrollLeft, isDown = false;

    // Fonction pour afficher/masquer les boutons selon la position
    function updateScrollButtons() {
        const leftBtn = document.getElementById('left-button');
        const rightBtn = document.getElementById('right-button');
        
        if (boxscore.scrollLeft <= 0) {
            leftBtn.style.opacity = '0.3';
            leftBtn.style.pointerEvents = 'none';
        } else {
            leftBtn.style.opacity = '0.8';
            leftBtn.style.pointerEvents = 'auto';
        }
        
        if (boxscore.scrollLeft >= boxscore.scrollWidth - boxscore.clientWidth - 10) {
            rightBtn.style.opacity = '0.3';
            rightBtn.style.pointerEvents = 'none';
        } else {
            rightBtn.style.opacity = '0.8';
            rightBtn.style.pointerEvents = 'auto';
        }
    }

    // Button click functionality avec animation fluide
    $('#right-button').click(function(event) {
        event.preventDefault();
        const currentScroll = boxscore.scrollLeft;
        const targetScroll = currentScroll + SCROLL_AMOUNT;
        
        $('html, body').animate({ scrollLeft: targetScroll }, {
            duration: 300,
            easing: 'easeOutCubic',
            step: function() {
                boxscore.scrollLeft = targetScroll;
            },
            complete: function() {
                updateScrollButtons();
            }
        });
    });

    $('#left-button').click(function(event) {
        event.preventDefault();
        const currentScroll = boxscore.scrollLeft;
        const targetScroll = Math.max(0, currentScroll - SCROLL_AMOUNT);
        
        $('html, body').animate({ scrollLeft: targetScroll }, {
            duration: 300,
            easing: 'easeOutCubic',
            step: function() {
                boxscore.scrollLeft = targetScroll;
            },
            complete: function() {
                updateScrollButtons();
            }
        });
    });

    // Touch event functionality améliorée
    boxscore.addEventListener('touchstart', function(e) {
        startX = e.touches[0].pageX - boxscore.offsetLeft;
        scrollLeft = boxscore.scrollLeft;
        isDown = true;
        boxscore.classList.add('active');
    });

    boxscore.addEventListener('touchmove', function(e) {
        if (!isDown) return;
        e.preventDefault();
        var x = e.touches[0].pageX - boxscore.offsetLeft;
        var walk = (x - startX) * SCROLL_SPD; 
        boxscore.scrollLeft = scrollLeft - walk;
    });

    boxscore.addEventListener('touchend', function() {
        isDown = false;
        boxscore.classList.remove('active');
        updateScrollButtons();
    });

    // Mouse grab functionality améliorée
    boxscore.addEventListener('mousedown', function(e) {
        isDown = true;
        startX = e.pageX - boxscore.offsetLeft;
        scrollLeft = boxscore.scrollLeft;
        boxscore.classList.add('active');
        boxscore.style.cursor = 'grabbing';
    });

    boxscore.addEventListener('mouseleave', function() {
        isDown = false;
        boxscore.classList.remove('active');
        boxscore.style.cursor = 'grab';
        updateScrollButtons();
    });

    boxscore.addEventListener('mouseup', function() {
        isDown = false;
        boxscore.classList.remove('active');
        boxscore.style.cursor = 'grab';
        updateScrollButtons();
    });

    boxscore.addEventListener('mousemove', function(e) {
        if (!isDown) return;
        e.preventDefault();
        var x = e.pageX - boxscore.offsetLeft;
        var walk = (x - startX) * SCROLL_SPD; 
        boxscore.scrollLeft = scrollLeft - walk;
    });

    // Écouter les changements de scroll pour mettre à jour les boutons
    boxscore.addEventListener('scroll', function() {
        updateScrollButtons();
    });

    // Initialiser l'état des boutons au chargement
    document.addEventListener('DOMContentLoaded', function() {
        updateScrollButtons();
        
        // Ajouter un effet de hover sur les cartes
        const gameCards = document.querySelectorAll('.GameDayTable');
        gameCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-4px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    });

    // Support du clavier pour l'accessibilité
    document.addEventListener('keydown', function(e) {
        if (e.target.closest('#boxscore')) {
            if (e.key === 'ArrowLeft') {
                e.preventDefault();
                $('#left-button').click();
            } else if (e.key === 'ArrowRight') {
                e.preventDefault();
                $('#right-button').click();
            }
        }
    });

    // Fonction pour scroll automatique vers un jeu spécifique
    function scrollToGame(gameIndex) {
        const gameCard = document.querySelectorAll('.GameDayTable')[gameIndex];
        if (gameCard) {
            const containerRect = boxscore.getBoundingClientRect();
            const cardRect = gameCard.getBoundingClientRect();
            const scrollLeft = gameCard.offsetLeft - (containerRect.width / 2) + (cardRect.width / 2);
            
            boxscore.scrollTo({
                left: scrollLeft,
                behavior: 'smooth'
            });
        }
    }

    // Exposer la fonction globalement pour utilisation externe
    window.scrollToGame = scrollToGame;
</script>