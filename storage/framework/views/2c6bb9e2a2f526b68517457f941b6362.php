<!-- This makes the cookie Notice using HTML and JS 
THen checks if the cookie has been set before displaying cookie notice
Needed some help making a cookie in js so used source :  https://www.w3schools.com/js/js_cookies.asp
This is displayed on all pages-->
<?php if(!isset($_COOKIE["cookieAccepted"])): ?> 
<div class="cookie-notice">
    <p>This website uses cookies to ensure you get the best experience on our website.</p>
    <button id="accept-cookie" class="accept-cookie">Accept</button>
    <a href="/cookie-policy" class="cookie-policy-link">Cookie Policy</a>
</div>
<?php endif; ?>
<script>
 function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}
    // Function to close the cookie notice
    function closeCookieNotice() {
    document.querySelector(".cookie-notice").style.display = "none";
    }

    // Event listener for the Accept button
    document.getElementById("accept-cookie").addEventListener("click", function () {
    setCookie("cookieAccepted", "true", 365); 
    closeCookieNotice();
    });
</script>   
</body>
</html>
<?php /**PATH C:\Users\Gareth\OneDrive - Blue Falcon IT\Desktop\cool-tech\resources\views/cookie-notice.blade.php ENDPATH**/ ?>