 <!-- footer -->
 <footer class="footer footer-black  footer-white ">
  <div class="container-fluid">
    <div class="row">
      <nav class="footer-nav">
        <ul>
          <li><a href="#" target="_blank">Fitri Parfum</a></li>
        </ul>
      </nav>
      <div class="credits ml-auto">
        <span class="copyright">
          © <script>
            document.write(new Date().getFullYear())
          </script>, made with <i class="fa fa-heart heart"></i> by Fitri Parfum
        </span>
      </div>
    </div>
  </div>
</footer>
</div>
</div>

{{-- untuk dropdown-btn sidenav activ --}}
<script>
  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;
  
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
  </script>

<!--   Core JS Files   -->
<script src="{{ asset('admin/assets/js/core/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
{{-- <script src="{{ asset('admin/assets/js/plugins/chartjs.min.js') }}"></script> --}}
<!--  Notifications Plugin    -->
<script src="{{ asset('admin/assets/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('admin/assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script>

<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
  });
</script>
</body>



</html>
