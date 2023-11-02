    
    </div>
</div>

    <div class="container-fluid">

        <footer id="main-footer" class=" bg-light text-white">
            <div class="conatiner-fluid">
            <div class="row">
                <div class="col">
                <p class="lead text-center">Copyright &copy; <?php echo date('Y'); ?> Verification System</p>
                </div>
            </div>
            </div>
        </footer> 
    </div>

  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'editor1' );
  </script>
  <script>
    $(document).ready(function(){
        setTimeout(function() {
            $('#success-alert').hide('slow');
        }, 5000)
    });
  </script>

  </body>
</html>