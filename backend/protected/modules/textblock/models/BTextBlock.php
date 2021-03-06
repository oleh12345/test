<?php
/**
 * @author Sergey Glagolev <glagolev@shogo.ru>
 * @link https://github.com/shogodev/argilla/
 * @copyright Copyright &copy; 2003-2014 Shogo
 * @license http://argilla.ru/LICENSE
 * @package backend.modules.textblock.models
 *
 * @property string $id
 * @property string $location
 * @property string $name
 * @property integer $position
 * @property string $url
 * @property integer $visible
 * @property string $content
 * @property string $img
 * @property integer $auto_created
 */
class BTextBlock extends BActiveRecord
{
  public function behaviors()
  {
    return array('uploadBehavior' => array('class' => 'UploadBehavior', 'validAttributes' => 'img'));
  }

  public function rules()
  {
    return array(
      array('position, visible', 'numerical', 'integerOnly' => true),
      array('location, name, url', 'length', 'max' => 255),
      array('content', 'safe'),
    );
  }

  public function defaultScope()
  {
    return array('order' => 'auto_created DESC');
  }

  public function afterValidate()
  {
    $this->auto_created = 0;
  }

  /**
   * @param CDbCriteria $criteria
   *
   * @return CDbCriteria
   */
  protected function getSearchCriteria(CDbCriteria $criteria)
  {
    $criteria->compare('location', $this->location, true);

    return $criteria;
  }

  public function attributeLabels()
  {
    return CMap::mergeArray(parent::attributeLabels(), array(
      'name' => 'Описание',
      'auto_created' => 'Создан'
    ));
  }
}