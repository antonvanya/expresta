<?php
declare ( strict_types = 1 );

ini_set('display_errors','1');
ini_set('display_startup_errors','1');
error_reporting(E_ALL);

include ('../includes/autoloader.inc.php');
include_once('../includes/Config.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Generovanie čísel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>

<body>
    <div class="container">
        
        <a href="https://expresta.studiotm.sk/pages/"><<< späť</a>
    
    <h3>Zadaj rozsah:</h3> 
        <pre>
            <em>Zadaj rozsah a zobrazim ti párne a nepárne čísla.</em>
        </pre>
    
    
    <?php        
     
    $form = new FormBuilder(); // input params:  $action, $method, $id 

    $form->add(( new InputField( "Start", "start", "number" ) )   // default type = text
                    ->addAttribute("required")
                    ->setInvalidFeedback("Zadaj číslo."))
        ->add(( new InputField( "End", "end", "number" ) )
                    ->addAttribute("required")
                    ->setInvalidFeedback("Zadaj číslo."));
      
      
     echo $form->getHtml();
        
        $form->setBtnText( "Register" )->onSubmit( function ( $data ) {   // onSubmit mikor lefut a fugveny visszaadja az adatokat a $data valtozoba

            $generovat = new GenerateNumber();
                   
            if($data['start'] > $data['end']){
                
                echo "<br /><h3>Zadal si neplatny rozsah...</h3>";
            }
            
            echo "<br />";
             echo "Rozsah od: " . $data['start'] . " - do: ".$data['end'];
            
            echo '<H3>Nepárne</H3> (pravá strana) - <em>väzba bude na ľavej strane</em>';
        echo '<pre>';
            // var_dump( $data );
            echo $generovat->generateOddNumbers($data['start'],$data['end']);
        echo '</pre>';
            
        echo '<H3>Párne</H3> (ľavá strana) - <em>väzba bude na pravej strane</em> ';
        echo '<pre>';
            // var_dump( $data );
            echo $generovat->generateEvenNumbers($data['start'],$data['end']);
        echo '</pre>';
        
        
  } );
            
                     

            
    
    ?>
    
       <script> 
    (() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
    </script>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    
</body>
</html>