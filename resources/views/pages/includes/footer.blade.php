   <!--  End Modal -->
    <footer class="footer" data-background-color="black">
      <div class=" container ">
        <nav>
          <ul>
            <li>
              <a href="https://volantco.net">
                Volant Co
              </a>
            </li>
            <li>
              <a href="https://volantco.net/aboutus">
                About Us
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>, Designed by
          Coded by
          <a href="#" target="_blank">Obspace Africa</a>.
        </div>
      </div>
    </footer>
  </div>
  <!--   Core JS Files   -->
  <script src="/front/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/front/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/front/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="/front/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="/front/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="/front/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <script src="/front/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
  <script>
    // $(document).ready(function() {
    //   // the body of this function is i front/js/now-ui-kit.js
    //   nowuiKit.initSliders();
    // });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>