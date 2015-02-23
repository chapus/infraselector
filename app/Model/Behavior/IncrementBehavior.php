<?php  
/** 
 * Increment Behavior Class file 
 *  
 * @author Ketan Patel 
 * @license    http://www.opensource.org/licenses/mit-license.php The MIT License 
 * @version 1 
 * 
 */ 

/** 
 * Increment Behavior to allow incrementing a single field by given amount. 
 * 
 */ 
class IncrementBehavior extends AppModel { 

    var $__settings = array(); 
     
    /** 
     * Initiate behavior for the model using specified settings. Available settings: 
     * 
     * - incrementFieldName: (string) The name of the field which needs to be incremented 
     *  
     * 
     * @param object $Model Model using the behaviour 
     * @param array $settings Settings to override for model. 
     * @access public 
     */ 
    public function setup(Model $model, $settings = array()) 
    { 
        $default = array('incrementFieldName' => array('views')); 

        if (!isset($this->__settings[$model->alias])) 
        { 
            $this->__settings[$model->alias] = $default; 
        } 

        $this->__settings[$model->alias] = am($this->__settings[$model->alias], is_array($settings) == true ?  $settings : array() ); 
    } 
     
    function beforeFind($query) {} 

    function afterFind($results, $primary = false)  {} 
     
    function beforeSave($options = array() )  {} 

    function afterSave($created, $options = array() ) {} 

    function beforeDelete($cascade = true)  {} 

    function afterDelete()  {} 

    function onError()  {} 
     
    //Custom Method for a Behavior 
    /** 
     * doIncrement method will allow user to increment 
     * a given field by calling this function from its model. 
     * 
     * @param ModelObject $model 
     * @param integer $id - Record Id for which the $field is to be incremented 
     * @param integer (optional) $incrementValue, default is 1 
     * @param string $field (optional) - If not supplied then field name which was provided 
     *                                      during initialization is used, otherwise 
     *                                      it is overwritten with the supplied argument. 
     * @return boolean 
     */ 
    function doIncrement(Model $model, $id, $incrementValue=1, $field=null) 
    { 
        $answer = false; 
         
        if (empty($field)) 
        { 
            $field = $this->__settings[$model->alias]['incrementFieldName']; 
        } 
         
        // Save the internal variables for the model 
        $recursiveLevel = $model->recursive ;         
        $data = $model->data; 
         
        $model->recursive = -1; 
         
        $model->data = $model->findById((int)$id, array('id', $field)); 
         
        if (!empty($model->data)) 
        { 
            $counter = (int)$model->data[$model->alias][$field] + (int)$incrementValue; 
             
            $conditions = array($model->alias.'.id'=>$id); 
             
            $fields = array($field=>$counter); 
         
            // Issue updateAll as it won't call any other methods like beforeSave and such in the Model or the 
            // Behavior methods. Just a step for saving callbacks which are not required.    
            $answer = $model->updateAll($fields, $conditions); 
        } 
         
        // restore the variables back to original 
        $model->data = $data; 
        $model->recursive = $recursiveLevel; 
         
        return $answer; 
    } 
} 
?>