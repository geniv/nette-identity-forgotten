<?php declare(strict_types=1);

namespace Identity\Forgotten;

use GeneralForm\IFormContainer;
use Nette\Application\UI\Form;
use Nette\SmartObject;


/**
 * Class FormContainerStep1
 *
 * @author  geniv
 * @package Identity\Forgotten
 */
class FormContainerStep1 implements IFormContainer
{
    use SmartObject;


    /**
     * Get form.
     *
     * @param Form $form
     */
    public function getForm(Form $form)
    {
        $form->addText('email', 'forgotten-step1-form-email')
            ->setRequired('forgotten-step1-form-email-required')
            ->addRule(Form::EMAIL, 'forgotten-step1-form-email-rule-email');

        $form->addSubmit('send', 'forgotten-step1-form-send');
    }
}
