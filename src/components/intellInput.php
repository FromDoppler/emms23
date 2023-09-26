   <script type="module">
       import {
           setPhoneFlagByUserIp
       } from "./src/<?= VERSION ?>/js/phoneFlag.js";

       const input = document.querySelector("#phone");
       const iti = window.intlTelInput(input, {
           utilsScript: "src/<?= VERSION ?>/js/vendors/utils.js",
       });
       setPhoneFlagByUserIp(input);
   </script>
