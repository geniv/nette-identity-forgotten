<?php declare(strict_types=1);

namespace Identity\Forgotten\Bridges\Nette;

use GeneralForm\GeneralForm;
use Identity\Forgotten\ForgottenFormStep1;
use Identity\Forgotten\ForgottenFormStep2;
use Identity\Forgotten\FormContainerStep1;
use Identity\Forgotten\FormContainerStep2;
use Nette\DI\CompilerExtension;


/**
 * Class Extension
 *
 * @author  geniv
 * @package Identity\Forgotten\Bridges\Nette
 */
class Extension extends CompilerExtension
{
    /** @var array default values */
    private $defaults = [
        'autowired'          => true,
        'formContainerStep1' => FormContainerStep1::class,
        'formContainerStep2' => FormContainerStep2::class,
        'eventsStep1'        => [],
        'eventsStep2'        => [],
    ];


    /**
     * Load configuration.
     */
    public function loadConfiguration()
    {
        $builder = $this->getContainerBuilder();
        $config = $this->validateConfig($this->defaults);

        $formContainerStep1 = GeneralForm::getDefinitionFormContainer($this, 'formContainerStep1', 'formContainerStep1');
        $eventsStep1 = GeneralForm::getDefinitionEventContainer($this, 'eventsStep1');

        $formContainerStep2 = GeneralForm::getDefinitionFormContainer($this, 'formContainerStep2', 'formContainerStep2');
        $eventsStep2 = GeneralForm::getDefinitionEventContainer($this, 'eventsStep2');

        // define form step1
        $builder->addDefinition($this->prefix('form1'))
            ->setFactory(ForgottenFormStep1::class, [$formContainerStep1, $eventsStep1])
            ->setAutowired($config['autowired']);

        // define form step2
        $builder->addDefinition($this->prefix('form2'))
            ->setFactory(ForgottenFormStep2::class, [$formContainerStep2, $eventsStep2])
            ->setAutowired($config['autowired']);
    }
}
