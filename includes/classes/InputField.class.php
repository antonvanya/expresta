<?php

class InputField {

  private $labelText;
  private $name;
  private $type;
  private $id;
  private $value;
  private $placeholder;
  private $moreAttributes;
  private $invalidFeedback;

  public function __construct( $labelText, $name, $type = "text" ) {

    $this->labelText = $labelText;
    $this->name = $name;
    $this->type = $type;
    $this->id = $name;
    $this->value = null;
    $this->placeholder = null;
    $this->moreAttributes = "";
    $this->invalidFeedback = "";

  }

  public function getName() {
    return $this->name;
  }
  public function getType() {
    return $this->type;
  }
  public function getId() {
    return $this->id;
  }
  public function getValue() {
    return $this->value;
  }
    
  public function getPlaceholder() {
    return $this->placeholder;
  }

  public function setId( $id ) {
    $this->id = $id;
    return $this;
  }
  public function setValue( $value ) {
    $this->value = $value;
    return $this;
  }
  public function setPlaceholder( $placeholder ) {
    $this->placeholder = $placeholder;
    return $this;
  }
  public function addAttribute( $attribute ) {
    $this->moreAttributes .= ' ' . $attribute;
    return $this;
  }

  public function setInvalidFeedback( $invalidFeedback ) {
    $this->invalidFeedback = $invalidFeedback;
    return $this;
  }


  public function getHtml() {

    $html = '<div class="col-md-6">';
    $html .= $this->createLabel() ;
    $html .= $this->createField();
    $html .= $this->createInvalidFeedback() ;
    $html .= '</div>';


    return $html;

  }

  protected function createLabel() {
    
    $html = '<label for="' . $this->id . '" class="form-label">' . $this->labelText . '</label>';
      
    return $html;
  }

  protected function createField() {
   
    $html = '<input type="' . $this->type . '" class="form-control" name="' . $this->name . '"  id="' . $this->id . '" ';
    if ( $this->value !== null ) {
      $html .= 'value="' . $this->value . '"';
    }
    if ( $this->placeholder ) {
      $html .= 'placeholder="' . $this->placeholder . '"';
    }
      
      
    $html .= $this->moreAttributes . '>';
 
    return $html;
  }
    
  protected function createInvalidFeedback() {
      
    $html = '<div id="' . $this->id . '" class="invalid-feedback">' . $this->invalidFeedback . '</div>';
          
    return $html;


  }


}

?>