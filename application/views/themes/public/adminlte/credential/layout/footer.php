
    
    
     <!-- Javascript -->          
    <?php 	
       if(isset($javascript)):
            echo $javascript; 
        endif;
       
    ?>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
		