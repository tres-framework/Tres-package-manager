<?php

namespace Tres\package_manager {
    
    /*
    |--------------------------------------------------------------------------
    | Package data
    |--------------------------------------------------------------------------
    | 
    | This class is used to retrieve data from a package.
    | 
    */
    class Package {
        
        /**
         * The package data.
         * 
         * @var array
         */
        protected $_data = [];
        
        /**
         * Raw format - doesn't change anything.
         */
        const FORMAT_RAW = 0;
        
        /**
         * HTML format - formats to HTML code (e.g. \n to <br />).
         */
        const FORMAT_HTML = 1;
        
        /**
         * Initializes the package data.
         * 
         * @param string $package The URI to the JSON package file.
         */
        public function __construct($package = null){
            // If no package is provided, use Tres package manager's data.
            if(!isset($package)){
                $package = __DIR__.'/package.json';
            }
            
            $data = file_get_contents($package);
            $this->_data = json_decode($data);
        }
        
        /**
         * Gets the requested data.
         * 
         * @return array
         */
        public function get($data = null){
            if(isset($data) && isset($this->_data->$data)){
                return $this->_data->$data;
            }
            
            return '';
        }
        
        /**
         * Gets all data.
         * 
         * @return array
         */
        public function getAll(){
            return $this->_data;
        }
        
        /**
         * Gets the long description.
         * 
         * @param  int    $format Determines how the output should be formatted.
         * @return string
         */
        public function getDescriptionLong($format = self::FORMAT_HTML){
            $desc = '';
            
            if(isset($this->_data->description_long)){
                $desc = $this->_data->description_long;
                $desc = implode('', $desc);
                $desc = $this->_format($desc, $format);
            }
            
            return $desc;
        }
        
        /**
         * Formats the package data output.
         * 
         * @param  string $str    The string to format.
         * @param  int    $format The format.
         * 
         * @return string The formatted string.
         */
        protected function _format($str, $format){
            switch($format){
                case self::FORMAT_RAW:
                break;
                
                case self::FORMAT_HTML:
                    $str = '<p>'.str_replace("\n\n", "</p>\n<p>", $str);
                    $str = rtrim($str, '<p>');
                break;
            }
            
            return $str;
        }
        
    }
    
}
