

<!-- Footer moderne -->
<footer class="modern-footer">
    <div class="footer-container">
        <div class="footer-content">
            <!-- Section Logo Central -->
            <div class="footer-section footer-logo-section">
                <a href="index.php" class="footer-glow">
                    <img src="images/LHSQC.png" alt="LHSQC" class="footer-logo">
                </a>
                <h3 class="footer-league-name">LHSQC</h3>
                <p class="footer-league-subtitle">Ligue de Hockey Simulée du Québec</p>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-copyright">
            <div class="footer-copyright-text">
                <?php
                echo $Footer . $LeagueOwner;
                if (file_exists($DatabaseFile) == True){
                    try{
                        echo " - " . $DatabaseCreate;
                        if (isset($LeagueGeneralMenu) == True){
                            echo $LeagueGeneralMenu['DatabaseCreationDate'];
                        }
                    } catch (Exception $e) {}
                }

                // Performance monitoring
                if (isset($PerformanceMonitorStart)){
                    echo "<script>console.log('STHS Page PHP Performance : " . (microtime(true)-$PerformanceMonitorStart) . " - Peak Memory Usage : " . round(memory_get_peak_usage() / 1024) . "KB');</script>";
                }
                ?>
            </div>
            <div class="footer-easter-egg" id="tripleClickElement" title="Triple-clic pour les outils">
                <i class="fa-regular fa-hand-peace"></i>
            </div>
        </div>
    </div>
</footer>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.10.0/p5.min.js"></script>



<script>
    let clickCount = 0;
    let clickTimeout;

    const clickTimeWindow = 650; // Time window in milliseconds for triple-click detection (e.g., 500ms)

    document.getElementById('tripleClickElement').addEventListener('click', function() {
        clickCount++;
        clearTimeout(clickTimeout);  // Reset the click count after the defined time window (e.g., 500ms)
        clickTimeout = setTimeout(function() { clickCount = 0;  }, clickTimeWindow);// Reset click count if time window passes

        if (clickCount === 3) {
            clickCount = 0;  // Reset click count after triple-click
            window.location.href = "/tools";  // Trigger action for triple-click
           }   
    });
</script>


<?php if (isset($db) && $db)  $db->close();  // Close the database connection if it exists  ?>
</body>
</html> 