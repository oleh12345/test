<?php
/**
 * @author Sergey Glagolev <glagolev@shogo.ru>
 * @link https://github.com/shogodev/argilla/
 * @copyright Copyright &copy; 2003-2014 Shogo
 * @license http://argilla.ru/LICENSE
 * @package backend.widgets.grid
 */
Yii::import('bootstrap.widgets.TbButtonColumn');

class BButtonUpdateColumn extends BButtonColumn
{
  public $template = '{update}';

  public $header = 'Действия';

  protected function renderFilterCellContent()
  {
    return;
  }
}