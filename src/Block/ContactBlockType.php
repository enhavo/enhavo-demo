<?php

namespace App\Block;

use App\Entity\Block\FormBlock;
use App\Entity\ContactForm;
use App\Form\Type\ContactType;
use App\Form\Type\Block\FormBlockType as FormBlockFormType;
use Enhavo\Bundle\ApiBundle\Data\Data;
use Enhavo\Bundle\BlockBundle\Block\AbstractBlockType;
use Enhavo\Bundle\BlockBundle\Model\BlockInterface;
use Enhavo\Bundle\VueFormBundle\Form\VueForm;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ContactBlockType extends AbstractBlockType

{



    public function __construct(
        private FormFactoryInterface $formFactory,
        private VueForm $vueForm,
        private UrlGeneratorInterface $urlGenerator
    ) {}

    public function createViewData(BlockInterface $block, Data $data, $resource, array $options)
    {
        $contact = new ContactForm();
        $disclaimerLabel = $block instanceof FormBlock ? $block->getDisclaimerMessage() : null;
        $form = $this->formFactory->createNamed('contact', ContactType::class, $contact, [
            'disclaimer_label' => $disclaimerLabel,
            'action' => $this->urlGenerator->generate('contact_form')
        ]);
        $data->set('form', $this->vueForm->createData($form->createView()));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'model' => FormBlock::class,
            'form' => FormBlockFormType::class,
            'template' => 'theme/block/contact-form.html.twig',
            'label' => 'Form',
            'translationDomain' => null,
            'groups' => ['layout'],
        ]);
    }

    public static function getName(): ?string
    {
        return 'contact';
    }
}
