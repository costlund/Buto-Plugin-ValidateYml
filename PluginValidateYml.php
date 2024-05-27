<?php
class PluginValidateYml{
  public function validate_yml($field, $form, $data = array()){
    $form = new PluginWfArray($form);
    if($form->get("items/$field/is_valid") && $form->get("items/$field/post_value")){
      if (!$this->is_yml($form->get("items/$field/post_value"))) {
        $form->set("items/$field/is_valid", false);
        $form->set("items/$field/errors/", $form->get("items/$field/label").' is not yml!');
      }
    }
    return $form->get();
  }
  public function is_yml($content){
    try {
      $value = sfYaml::load($content);
      return true;
    } catch (Exception $exc) {
      return false;
    }
  }
}