<script>
    grecaptcha.ready(function() {
      grecaptcha.execute('{{ env('GOOGLE_CAPTCHA_PUBLIC_KEY') }}')    .then(function(token) {
       document.getElementById("recaptcha_token").value = token;
    }); });
</script>
<input type="hidden" id="recaptcha_token" name="recaptcha_token">