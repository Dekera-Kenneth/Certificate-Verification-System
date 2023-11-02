    
    </div>
</div>

    <div class="container-fluid">

        <footer id="main-footer" class=" bg-light text-white">
            <div class="conatiner-fluid">
            <div class="row">
                <div class="col">
                <p class="lead text-center">Copyright &copy; Dekera <?php echo date('Y'); ?> Verification System</p>
                </div>
            </div>
            </div>
        </footer> 
    </div>

    <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
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

    function confirmMsg(status) {
        if(status == 1 || status == '1') {
            return confirm('Closing this bid will automatically make the higest bidder the winner, continue?');
        }
        return confirm('Reopening this bid will remove this bid winner, continue?');
    }
  </script>

  </body>
</html>