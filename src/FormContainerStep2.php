<?php declare(strict_types=1);

namespace Identity\Forgotten;

use GeneralForm\IFormContainer;
use Nette\Application\UI\Form;
use Nette\SmartObject;


/**
 * Class FormContainerStep2
 *
 * @author  geniv
 * @package Identity\Forgotten
 */
class FormContainerStep2 implements IFormContainer
{
    use SmartObject;


    /**
     * Get form.
     *
     * @param Form $form
     */
    public function getForm(Form $form)
    {
        $form->addPassword('password', 'forgotten-step2-form-password')
            ->setRequired('forgotten-step2-form-password-required');

        $form->addPassword('password1', 'forgotten-step2-form-password1')
            ->setRequired('forgotten-step2-form-password1-required')
            ->addRule(Form::EQUAL, 'forgotten-step2-form-password1-equal', $form['password'])
            ->setOmitted();

        $form->addSubmit('send', 'forgotten-step2-form-send');
    }
}
