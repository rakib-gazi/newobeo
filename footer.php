
        <!-- <footer class="container mx-auto py-4">
                <div class="flex justify-center items center">
                       <p class="text-blue-700 font-semibold capitalize text-xl">&copy; <?php //echo date("Y")?> all right reserve by Obeo Limited</p>
                </div>    
        </footer> -->
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
        <script src="./node_modules/preline/dist/preline.js"></script>
        <!-- custom js -->
        <script src="<?php echo $baseurl?>js/custom.js"></script>
        <script>
            // init Isotope
            var $prid = $('.prid').isotope({
                // options
                itemSelector: '.element-item',
                layoutMode: 'fitRows'
            });

            // filter items on button click
            $('.filters-button-group').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $prid.isotope({ filter: filterValue });
            });
        </script>
        </body>
</html>