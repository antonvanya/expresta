<?
class GenerateNumber {

  // paratlan szamok generalasa
  function generateOddNumbers( $start, $end ) {
    $oddNumbers = [];
    for ( $i = $start; $i <= $end; $i++ ) {
      if ( $i % 2 != 0 ) {
        $oddNumbers[] = $i;
      }
    }
    return implode( ",", $oddNumbers );
  }

  //paros szamok generalasa
  function generateEvenNumbers( $start, $end ) {
    $evenNumbers = [];
    for ( $i = $start; $i <= $end; $i++ ) {
      if ( $i % 2 == 0 ) {
        $evenNumbers[] = $i;
      }
    }
    return implode( ",", $evenNumbers );
  }

}


?>