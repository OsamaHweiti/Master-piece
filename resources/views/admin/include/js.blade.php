<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/chartjs.min.js')}}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>


<script>
     let addBtn = document.getElementById('addUser-btn');
    let addDiv = document.getElementById('adddiv');
    addBtn.addEventListener('click', function() {
        addDiv.style.display = 'block';
    })
  
   function cancelbtnuser(){
    document.getElementById('canclebuttonuser').style.display = 'none';
   }


  // Function to change the anchor class

    document.addEventListener('DOMContentLoaded', function () {
     
        var path = window.location.pathname;

      
        var navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(function (link) {
            if (link.getAttribute('href') === path) {
                link.classList.add('bg-gradient-primary');
            }
        });
    });



   

</script>