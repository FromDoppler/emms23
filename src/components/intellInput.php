   <script>
       const input = document.querySelector("#phone");
       const iti = window.intlTelInput(input, {
           hiddenInput: "full_phone",
           separateDialCode: true,
           utilsScript: "src/<?= VERSION ?>/js/vendors/utils.js",
           initialCountry: "auto",
           geoIpLookup: callback => {
               fetch("https://ipapi.co/json")
                   .then(res => res.json())
                   .then(data => callback(data.country_code))
                   .catch(() => callback("us"));
           }
       });
   </script>
