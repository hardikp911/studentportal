</main>
</div>
<footer class="page-footer docs-footer">
    <div class="grey-text container">

        Copyright (c) Student Portal
        <br>Developed By ❤️ with Hardik Parmar , aaditya singh , amogh pathak , apurv kulkarni , akash pandya , vaibhav patil
        <br>

    </div>
</footer>



</main>
</body>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script>
    setTimeout(function() {
        document.querySelector(".progress").style.display = "none";
    }, 3000);
</script>
<script>
    //after window is loaded completely
    window.onload = function() {
        //hide the preloader
        document.querySelector(".progress").style.display = "none";
    }
</script>

<script>
    $(document).ready(function() {
        $('.modal').modal();
    });

    jQuery(document).ready(function($) {
        $(".clickable-row").dblclick(function() {
            window.location = $(this).data("href");
        });
    });
</script>
<script>
    $(document).ready(function() {

        $('.datepicker').datepicker({

        });

        $('.dropdown-trigger').dropdown({
            hover: true,
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('.sidenav').sidenav();
        $('.collapsible').collapsible();
        $('.collapsible.expandable').collapsible({
            accordion: false
        });

    });

    $(document).ready(function() {
        $('.tooltipped').tooltip();
    });

    $(document).ready(function() {
        $('.tabs').tabs();
    });



    $(document).ready(function() {
        $('.fixed-action-btn').floatingActionButton();
    });



    $(document).ready(function() {
        $('.sidenav').sidenav();
    });


    $(".saveHistory").click(function() {
        window.localStorage.setItem("oldURI", window.location.href);
    });
</script>


<!-- <script src="/js/superajax.js"></script> -->



<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker
            .register('<?=$currentURL ?>/res/sw.js', {
                scope: '/'
            })
            .then(function(registration) {
                //console.log('Service Worker Registered');
            });

        navigator.serviceWorker
            .ready
            .then(function(registration) {
                //console.log('Service Worker Ready');
            });
    }
</script>


</html>
</body>

</html>