<?php

class FormBuilder {

  private $action;
  private $method;
  private $id;
  private $btnText;
  private $btnName;
  private $fields;

  public function __construct( $action = "", $method = "post", $id = "input" ) {

    $this->action = $action;
    $this->method = $method;
    $this->id = $id;
    $this->btnText = "Submit";
    $this->btnName = $id . "Send";
    $this->fields = [];
  }

  public function setBtnText( $btnText ) {
    $this->btnText = $btnText;
    return $this;
  }

  public function add( InputField $field ) {

    $name = $field->getName();
    $field->setId( $this->id . "-" . $name );
    $this->fields[] = $field;
    return $this;

  }
    
    public function onSubmit($method){
        
        if(strtolower($this->method) == "get"){
            $source = $_GET;
        }
        else{
            $source = $_POST;
        }
        
        if(isset($source[$this->btnName])){
            unset($source[$this->btnName]);    // toroljuk a buttont, h ne legyen benne a visszaadott adatokban
            call_user_func($method,$source);   //visszaadja a beviteli mezok adatait
        }
        return $this;
    }
    

  public function getHtml( $model = null ) {
    $html = '<form action="' . $this->action . '" method="' . $this->method . '" id="' . $this->id . '" class="row g-3 needs-validation" novalidate>';

    foreach ( $this->fields as $field ) {

      $name = $field->getName();
      if ( isset( $model[ $name ] ) ) {
        $value = $model[ $name ];
        $field->setValue( $value );
      }

      $html .= $field->getHtml();
    }

    $html .= '<button type="submit" name="' . $this->btnName . '" class="btn btn-outline-primary">' . $this->btnText . '</button>';
    $html .= '</form>';
    return $html;
  }


}


?>