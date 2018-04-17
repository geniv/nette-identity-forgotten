<?php declare(strict_types=1);

namespace Identity\Forgotten;

use GeneralForm\GeneralControl;
use GeneralForm\IFormContainer;
use Nette\Application\UI\Form;
use Nette\Localization\ITranslator;


/**
 * Class ForgottenFormStep2
 *
 * @author  geniv
 * @package Identity\Forgotten
 */
class ForgottenFormStep2 extends GeneralControl
{

    /**
     * ForgottenFormStep2 constructor.
     *
     * @param IFormContainer   $formContainer
     * @param array            $events
     * @param ITranslator|null $translator
     */
    public function __construct(IFormContainer $formContainer, array $events, ITranslator $translator = null)
    {
        parent::__construct($formContainer, $events, $translator);

        $this->templatePath = __DIR__ . '/ForgottenFormStep2.latte';    // set path
    }


    /**
     * Create component form.
     *
     * @param string $name
     * @return Form
     */
    protected function createComponentForm(string $name): Form
    {
        $form = new Form($this, $name);
        $form->setTranslator($this->translator);
        $form->addHidden('hash');   // default hash
        $this->formContainer->getForm($form);

        $form->onSuccess[] = $this->eventContainer;
        return $form;
    }
}
