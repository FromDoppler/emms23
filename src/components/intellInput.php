   <script>
       const input = document.querySelector("#phone");
       const iti = window.intlTelInput(input, {
           utilsScript: "src/<?= VERSION ?>/js/vendors/utils.js",
       });
   </script>
