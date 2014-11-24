<?php

namespace Tres\package_manager {
    
    class Autoload {
        
        /**
         * The root URI of all files.
         * 
         * @var string
         */
        protected $_rootURI = '';
        
        /**
         * The list of namespaces.
         * 
         * @var array
         */
        protected $_namespacePrefixes = [];
        
        /**
         * Sets the root URI.
         * 
         * @param string $rootURI The root URI of all files.
         */
        public function __construct($rootURI){
            $this->_rootURI = rtrim($rootURI, '/');
            
            spl_autoload_register([$this, '_loadClass']);
        }
        
        /**
         * Adds a namespace to let the autoloader know to look for it.
         * 
         * @param string $namespacePrefix A part or the complete namespace.
         * @param string $dir             The directory to look into.
         */
        public function addNamespace($namespacePrefix, $dir){
            $namespacePrefix = trim($namespacePrefix, '\\').'\\';
            $this->_namespacePrefixes[$namespacePrefix] = $dir;
        }
        
        /**
         * Loads the given file.
         * 
         * @param  string $file
         */
        public function loadFile($file){
            if(require_once($this->_rootURI.'/'.$file)){
                return true;
            }
            
            return false;
        }
        
        /**
         * Loads the given class.
         * 
         * @param  string $class The class which was being called.
         * @return bool          Whether it succeeded or not.
         */
        protected function _loadClass($class){
            $namespacePrefix = $class;
            
            while(false !== $pos = strrpos($namespacePrefix, '\\')){
                // Retains the trailing namespace separator in the prefix.
                $namespacePrefix = substr($class, 0, $pos + 1);
                
                // The rest is the class name.
                $className = substr($class, $pos + 1);
                
                // Tries to load a mapped file for the prefix and class name.
                $mappedFile = $this->_loadMappedFile($namespacePrefix, $className);
                
                if($mappedFile){
                    return $mappedFile;
                }
                
                // Removes the trailing namespace separator for the next iteration of strrpos().
                $namespacePrefix = rtrim($namespacePrefix, '\\');   
            }
            
            return false;
        }
        
        /**
         * Loads the class.
         * 
         * @param  string $namespacePrefix A part or the complete namespace.
         * @param  string $className       The class name.
         * @return bool                    Whether it succeeded or not.
         */
        protected function _loadMappedFile($namespacePrefix, $className){
            if(!isset($this->_namespacePrefixes[$namespacePrefix])){
                return false;
            }
            
            $file = $this->_namespacePrefixes[$namespacePrefix].'/'.$className;
            $file = str_replace('\\', '/', $file).'.php';
            
            return $this->loadFile($file);
        }
        
    }
    
}
