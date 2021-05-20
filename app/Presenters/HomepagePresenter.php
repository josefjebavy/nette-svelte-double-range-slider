<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

final class HomepagePresenter extends Nette\Application\UI\Presenter

{
    private $min, $max = null;

    public function actionDefault($min, $max): void
    {
        $this->min = $min;
        $this->max = $max;

    }

    protected function createComponentForm(): Form
    {
        if (is_null($this->min) || is_null($this->max)) {
            $min = 0;
            $max = 100;
        } else {

            // todo osetrit velikost
            $min = $this->min;
            $max = $this->max;
        }

        $form = new Form; // means Nette\Application\UI\Form

        // Todo osetrit velikost
        $form->addInteger("number1", "number1 1")
            ->setDefaultValue($min)
            ->setRequired();

        $form->addInteger("number2", "number1 2")
            ->setDefaultValue($max)
            ->setRequired();

        $form->addSubmit('send', "send");

        $form->onSuccess[] = [$this, 'formSucceeded'];

        return $form;
    }


    public function formSucceeded(Form $form, \stdClass $values): void
    {

        bdump($values);

        $this->redirect('Homepage:default', array("min" => $values->number1, "max" => $values->number2));


    }
}
