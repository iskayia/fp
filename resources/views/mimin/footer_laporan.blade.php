<!-- footernih -->
<footer class="footer" style=" width: -webkit-fill-available;">
  <div class="container-fluid">
    <div class="row">
      <nav class="footer-nav">
        <ul>
          <li><a href="#" target="_blank">Fitri Parfum</a></li>
        </ul>
      </nav>
      <div class="credits ml-auto">
        <span class="copyright">
          © 2023, made with <i class="fa fa-heart heart"></i> by Fitri Parfum
        </span>
      </div>
    </div>
  </div>
</footer>
</div>
</div>

<script>
  $(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {
      console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
  });
</script>

</body>



</html>