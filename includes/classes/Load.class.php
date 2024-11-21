<?
class Load {

  private $ignore;

  function __construct( $ignored ) {
    $this->ignore = $ignored;
  }

  private function getFolders( $dirName ) {
    $folders = array();

    // Open a directory, and read its contents
    if ( is_dir( $dirName ) ) {
      // open the specified directory and check if it's opened successfully
      if ( $dir = opendir( $dirName ) ) {
        // keep reading the directory entries 'til the end
        while ( ( $file = readdir( $dir ) ) !== false ) {
          if ( !in_array( $file, $this->ignore ) ) {
            if ( is_dir( "$dirName/$file" ) ) {
              // found an ordinary file
              $folders[] = $file;
            }
          }
        }
        closedir( $dir );
      }
      natsort( $folders ); //sort
      return $folders;
    }
  }

  private function getFiles( $dirName ) {
    $files = array();

    // Open a directory, and read its contents
    if ( is_dir( $dirName ) ) {
      // open the specified directory and check if it's opened successfully
      if ( $dir = opendir( $dirName ) ) {
        // keep reading the directory entries 'til the end
        while ( ( $file = readdir( $dir ) ) !== false ) {
          if ( !in_array( $file, $this->ignore ) ) {
            if ( !is_dir( "$dirName/$file" ) ) {
              // found an ordinary file
              $files[] = $file;
            }
          }
        }
        closedir( $dir );
      }
      natsort( $files ); //sort
      return $files;
    }
  }

  public function showFolders( string $dirName ) {

    foreach ( $this->getFolders( $dirName ) as $folder )
      echo "<tbody><tr>
                    <td><a href='$folder'>[$folder]</a></td>
                    <td>". date(' d M Y, H:i:s.', filemtime($folder))."  </td>
                    
                  </tr></tbody>";
  }


  public function showFiles( string $dirName ) {
    foreach ( $this->getFiles( $dirName ) as $file )
      printf( "<tbody><tr>
                   <td><a href='$file'>$file</a></td>
                   <td>". date(' d M Y, H:i:s.', filemtime($file))."  </td>
                </tr></tbody>" );

  }

  public function getPath( string $dirname ) {
    echo $dirname;
  }

}


?>