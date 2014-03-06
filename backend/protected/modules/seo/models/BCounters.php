<?php
/**
 * @author Alexander Kolobkov <kolobkov@shogo.ru>
 * @link https://github.com/shogodev/argilla/
 * @copyright Copyright &copy; 2003-2014 Shogo
 * @license http://argilla.ru/LICENSE
 * @package backend.modules.seo.models
 *
 * @method static BCounters model(string $class = __CLASS__)
 */
class BCounters extends BActiveRecord
{
  public function tableName()
  {
    return '{{seo_counters}}';
  }

  public function rules()
  {
    return array
    (
      array('name, code', 'required'),
      array('visible', 'numerical', 'integerOnly' => true),
      array('visible, main', 'length', 'max' => 1),
    );
  }

  public function attributeLabels()
  {
    return CMap::mergeArray(parent::attributeLabels(), array(
      'code' => 'Код счетчика',
    ));
  }

  /**
   * @param CDbCriteria $criteria
   *
   * @return CDbCriteria
   */
  protected function getSearchCriteria(CDbCriteria $criteria)
  {
    $criteria->compare('name', $this->name, true);
    $criteria->compare('main', $this->main);
    $criteria->compare('visible', $this->visible);

    return $criteria;
  }
}